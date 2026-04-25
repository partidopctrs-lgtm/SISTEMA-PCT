<?php

namespace App\Http\Controllers\Committee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Directory;
use App\Models\Membership;
use App\Models\DirectoryDocument;
use App\Models\Expense;
use App\Models\ContractedService;
use App\Models\Solicitation;
use App\Models\Reimbursement;
use App\Models\Provider;
use App\Models\DirectoryTask;
use App\Models\User;

class CommitteeDashboardController extends Controller
{
    private function getDirectoryId()
    {
        return auth()->user()->committee_id;
    }

    public function index()
    {
        $directoryId = $this->getDirectoryId();
        $directory = Directory::find($directoryId);

        $entrances = \App\Models\FinancialRecord::where('directory_id', $directoryId)
            ->where('type', 'revenue')
            ->where('status', 'approved')
            ->sum('amount');

        $exits = Expense::where('directory_id', $directoryId)
            ->whereIn('status', ['aprovado', 'pago'])
            ->sum('value');

        $frExits = \App\Models\FinancialRecord::where('directory_id', $directoryId)
            ->where('type', 'expense')
            ->where('status', 'approved')
            ->sum('amount');

        $totalBalance = $entrances - $exits - $frExits;
        $fundoReserva = $totalBalance * 0.10; // 10% do saldo total
        $investimentoEscola = $totalBalance * 0.05; // 5% do saldo total
        $caixaLivre = $totalBalance - $fundoReserva - $investimentoEscola;

        $stats = [
            'total_members' => Membership::where('directory_id', $directoryId)->count(),
            'active_members' => Membership::where('directory_id', $directoryId)->where('membership_status', 'active')->count(),
            'pending_solicitations' => Solicitation::where('directory_id', $directoryId)->where('status', 'aberto')->count(),
            'month_expenses' => Expense::where('directory_id', $directoryId)->whereMonth('date', now()->month)->sum('value'),
            'pending_documents' => DirectoryDocument::where('directory_id', $directoryId)->where('status', 'enviado')->count(),
            'hino_plays' => \App\Models\AudioInteraction::where('type', 'play')->count(),
            'hino_downloads' => \App\Models\AudioInteraction::where('type', 'download')->count(),
            'balance' => $caixaLivre,
            'fundo_reserva' => $fundoReserva,
            'investimento_escola' => $investimentoEscola,
        ];

        $recentActivities = collect();
        
        // Buscar despesas recentes
        Expense::where('directory_id', $directoryId)->latest()->limit(3)->get()->each(function($item) use ($recentActivities) {
            $recentActivities->push([
                'type' => 'expense',
                'title' => 'Nova Despesa: ' . $item->description,
                'subtitle' => 'R$ ' . number_format($item->value, 2, ',', '.'),
                'date' => $item->created_at,
                'status' => $item->status
            ]);
        });

        // Buscar documentos recentes
        DirectoryDocument::where('directory_id', $directoryId)->latest()->limit(3)->get()->each(function($item) use ($recentActivities) {
            $recentActivities->push([
                'type' => 'document',
                'title' => 'Documento: ' . $item->title,
                'subtitle' => $item->category,
                'date' => $item->created_at,
                'status' => $item->status
            ]);
        });

        $recentActivities = $recentActivities->sortByDesc('date')->take(5);

        return view('pages.committee.dashboard', compact('directory', 'stats', 'recentActivities'));
    }

    public function members(Request $request)
    {
        $directoryId = $this->getDirectoryId();
        $query = Membership::with('user')->where('directory_id', $directoryId);

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('cpf', 'like', "%{$search}%");
            });
        }

        $members = $query->paginate(20);
        return view('pages.committee.members.index', compact('members'));
    }

    public function storeMember(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cpf' => 'nullable|string|max:20|unique:users',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'role' => 'required|string',
        ]);

        $directoryId = $this->getDirectoryId();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'password' => \Illuminate\Support\Facades\Hash::make('PCT@2026'),
            'role' => 'affiliate',
            'status' => 'active', // Ativo imediatamente — cadastrado pelo gestor
            'committee_id' => $directoryId,
            'registration_number' => 'PCT-2026-' . str_pad(User::max('id') + 1, 5, '0', STR_PAD_LEFT),
        ]);

        // Criar o Perfil de Afiliado para garantir acesso à área
        $user->profiles()->create([
            'profile_type' => 'affiliate',
            'level' => 'local',
            'is_primary' => true
        ]);

        Membership::create([
            'user_id' => $user->id,
            'directory_id' => $directoryId,
            'membership_status' => 'active',
            'joined_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Membro cadastrado com sucesso e vinculado ao seu diretório!');
    }

    // Módulo de Documentos
    public function documents()
    {
        $directoryId = $this->getDirectoryId();
        $documents = DirectoryDocument::where('directory_id', $directoryId)->orderBy('created_at', 'desc')->paginate(20);
        return view('pages.committee.documents.index', compact('documents'));
    }

    public function storeDocument(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'file' => 'required|file|mimes:pdf,docx,xml|max:10240',
        ]);

        $path = $request->file('file')->store('documents/committee/' . $this->getDirectoryId(), 'public');

        DirectoryDocument::create([
            'directory_id' => $this->getDirectoryId(),
            'category' => $request->category,
            'title' => $request->title,
            'file_path' => $path,
            'status' => 'enviado',
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Documento enviado com sucesso.');
    }

    // Central de Solicitações
    public function solicitations()
    {
        $directoryId = $this->getDirectoryId();
        $solicitations = Solicitation::where('directory_id', $directoryId)->orderBy('created_at', 'desc')->paginate(20);
        return view('pages.committee.solicitations.index', compact('solicitations'));
    }

    public function storeSolicitation(Request $request)
    {
        $request->validate([
            'destination' => 'required',
            'type' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ]);

        Solicitation::create([
            'directory_id' => $this->getDirectoryId(),
            'requester_id' => auth()->id(),
            'destination' => $request->destination,
            'type' => $request->type,
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => 'aberto',
        ]);

        return redirect()->back()->with('success', 'Solicitação aberta com sucesso.');
    }

    // Gestão de Despesas
    public function financial()
    {
        $directoryId = $this->getDirectoryId();
        $expenses = Expense::with('provider')->where('directory_id', $directoryId)->orderBy('date', 'desc')->paginate(20);
        return view('pages.committee.financial.index', compact('expenses'));
    }

    public function storeFinancialRecord(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'value' => 'required|numeric',
            'date' => 'required|date',
            'receipt' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        ]);

        $value = $request->value;
        $approvalLevel = 'simples';

        if ($value > 500) {
            $approvalLevel = 'nacional';
        } elseif ($value > 150) {
            $approvalLevel = 'presidente';
        }

        $path = $request->file('receipt') ? $request->file('receipt')->store('receipts/committee/' . $this->getDirectoryId(), 'public') : null;

        Expense::create([
            'directory_id' => $this->getDirectoryId(),
            'category' => $request->category,
            'description' => $request->description,
            'value' => $value,
            'date' => $request->date,
            'receipt_path' => $path,
            'status' => 'pendente',
            'approval_level' => $approvalLevel,
        ]);

        return redirect()->back()->with('success', 'Despesa registrada e aguardando aprovação conforme regras de valor.');
    }

    // Métodos do Menu Taquara (Realistas)
    public function signatures()
    {
        $directoryId = $this->getDirectoryId();
        // Buscar assinaturas de apoio vinculadas à cidade do diretório
        $directory = Directory::find($directoryId);
        $signatures = \App\Models\PartySignature::where('city', $directory->city)
            ->where('state', $directory->state)
            ->latest()
            ->paginate(20);
        
        return view('pages.committee.signatures.index', compact('signatures'));
    }

    public function demands()
    {
        $directoryId = $this->getDirectoryId();
        $directory = Directory::find($directoryId);
        $demands = \App\Models\PublicDemand::where('city', $directory->city)
            ->where('state', $directory->state)
            ->latest()
            ->paginate(20);

        return view('pages.committee.demands.index', compact('demands'));
    }

    public function communication()
    {
        return view('pages.committee.communication.index');
    }

    public function tasks()
    {
        $directoryId = $this->getDirectoryId();
        $tasks = DirectoryTask::where('directory_id', $directoryId)->orderBy('due_date', 'asc')->paginate(20);
        return view('pages.committee.tasks.index', compact('tasks'));
    }

    public function reports()
    {
        return view('pages.committee.reports.index');
    }

    public function services() { return view('pages.committee.services.index'); }
    public function reimbursements() { return view('pages.committee.reimbursements.index'); }
    public function providers() { return view('pages.committee.providers.index'); }

    public function sede()
    {
        $directoryId = $this->getDirectoryId();
        $directory = Directory::find($directoryId);
        return view('pages.committee.sede', compact('directory'));
    }

    public function modelosOficios() { return view('pages.shared.manuals.governance-manual'); }
    public function fichaFiliacao() { return view('pages.shared.ficha-filiacao'); }

    public function impersonate($id)
    {
        $user = User::findOrFail($id);
        
        // Verificar se o usuário pertence ao diretório do gestor atual
        if ($user->committee_id !== $this->getDirectoryId() && !auth()->user()->hasRole('admin')) {
            abort(403);
        }

        // Salvar o ID do gestor na sessão para permitir "voltar" depois se quisermos implementar
        session(['impersonator_id' => auth()->id()]);
        
        auth()->login($user);
        
        // Redireciona para o painel do afiliado na mesma origem
        return redirect('/dashboard');
    }
}
