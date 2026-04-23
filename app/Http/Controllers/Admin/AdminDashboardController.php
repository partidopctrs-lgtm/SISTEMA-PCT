<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Cálculos de Crescimento Real
        $now = now();
        $thisMonth = \App\Models\User::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count();
        $lastMonth = \App\Models\User::whereMonth('created_at', $now->subMonth()->month)->whereYear('created_at', $now->year)->count();
        
        $growth = 0;
        if ($lastMonth > 0) {
            $growth = (($thisMonth - $lastMonth) / $lastMonth) * 100;
        } elseif ($thisMonth > 0) {
            $growth = 100; // 100% se for o primeiro mês com dados
        }

        $stats = [
            'total_members' => \App\Models\User::count(),
            'total_directories' => \App\Models\Directory::count(),
            'total_revenue' => \App\Models\FinancialRecord::where('type', 'revenue')->where('status', 'approved')->sum('amount'),
            'total_expenses' => \App\Models\FinancialRecord::where('type', 'expense')->where('status', 'approved')->sum('amount'),
            'legal_requests_new' => \App\Models\LegalRequest::where('status', 'new')->count(),
            'hino_plays' => \App\Models\AudioInteraction::where('type', 'play')->count(),
            'hino_downloads' => \App\Models\AudioInteraction::where('type', 'download')->count(),
            'growth' => $growth,
            'active_states' => \App\Models\User::whereNotNull('state')->distinct('state')->count(),
        ];

        $topDirectories = \App\Models\Directory::withCount('memberships')
            ->orderBy('memberships_count', 'desc')
            ->limit(5)
            ->get();

        $recentUsers = \App\Models\User::orderBy('created_at', 'desc')->limit(5)->get();

        return view('pages.admin.dashboard', compact('stats', 'topDirectories', 'recentUsers'));
    }

    public function commandCenter()
    {
        return view('pages.admin.command-center');
    }

    public function storeMember(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'cpf' => 'nullable|string|max:20|unique:users',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'password' => \Illuminate\Support\Facades\Hash::make('PCT@123456'), // Senha padrão
            'registration_number' => 'PCT-' . str_pad(\App\Models\User::count() + 1, 5, '0', STR_PAD_LEFT),
        ]);

        return redirect()->route('admin.members')->with('success', 'Membro cadastrado com sucesso! A senha padrão é PCT@123456');
    }

    // Management Modules
    public function members(Request $request)
    {
        $query = \App\Models\User::with(['memberships.directory']);

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('cpf', 'like', '%' . $request->search . '%');
        }

        if ($request->has('state')) {
            $query->where('state', $request->state);
        }

        $members = $query->orderBy('created_at', 'desc')->paginate(50);
        $states = \App\Models\User::distinct()->whereNotNull('state')->pluck('state');

        return view('pages.admin.members', compact('members', 'states'));
    }

    // --- 1. Partido em Formação (Assinaturas) ---
    public function partyFormation()
    {
        $signatures = \App\Models\PartySignature::latest()->paginate(15);
        $totalSignatures = \App\Models\PartySignature::count();
        $goal = 500000;
        return view('pages.admin.party', compact('signatures', 'totalSignatures', 'goal'));
    }

    public function exportSignaturesCsv()
    {
        $fileName = 'apoios_partido_pct_' . date('Y-m-d') . '.csv';
        $signatures = \App\Models\PartySignature::all();

        $headers = array(
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['Protocolo', 'Nome Completo', 'CPF', 'Titulo de Eleitor', 'Municipio', 'UF', 'Status', 'Data'];

        $callback = function() use($signatures, $columns) {
            $file = fopen('php://output', 'w');
            // Add UTF-8 BOM for Excel compatibility
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $columns, ';');

            foreach ($signatures as $sig) {
                fputcsv($file, [
                    $sig->protocol_number,
                    $sig->full_name,
                    $sig->cpf,
                    $sig->voter_title,
                    $sig->city,
                    $sig->state,
                    $sig->status,
                    $sig->created_at->format('d/m/Y H:i')
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportSignaturesPdf()
    {
        $signatures = \App\Models\PartySignature::all();
        $data = [
            'signatures' => $signatures,
            'date' => date('d/m/Y H:i'),
            'total' => $signatures->count()
        ];

        $pdf = Pdf::loadView('pages.admin.reports.signatures-pdf', $data);
        return $pdf->download('relatorio_apoios_pct.pdf');
    }

    public function approveSignature(\App\Models\PartySignature $signature)
    {
        $signature->update(['status' => 'validado']);
        return redirect()->back()->with('success', 'Apoio de ' . $signature->full_name . ' validado com sucesso!');
    }

    public function exportSingleSignaturePdf(\App\Models\PartySignature $signature)
    {
        $signature->load('user');
        $data = [
            'sig' => $signature,
            'user' => $signature->user,
            'date' => date('d/m/Y H:i')
        ];

        $pdf = Pdf::loadView('pages.admin.reports.single-signature-pdf', $data);
        return $pdf->download('ficha_apoio_' . $signature->protocol_number . '.pdf');
    }

    // --- 2. Demandas da População ---
    public function publicDemands()
    {
        $demands = \App\Models\PublicDemand::latest()->paginate(15);
        $urgentDemands = \App\Models\PublicDemand::where('is_urgent', true)->count();
        return view('pages.admin.demands', compact('demands', 'urgentDemands'));
    }

    // --- 3. Gestão de Diretórios ---
    public function directories()
    {
        // Limpeza solicitada
        \App\Models\Directory::where('name', 'like', '%Porto Alegre%')->delete();
        
        $committees = \App\Models\Directory::withCount('memberships')->latest()->paginate(15);
        $users = \App\Models\User::orderBy('name')->get();
        return view('pages.admin.directories', compact('committees', 'users'));
    }

    public function storeDirectory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'directory_type' => 'required|string',
            'president_id' => 'nullable|exists:users,id',
            'secretary_id' => 'nullable|exists:users,id',
            'treasurer_id' => 'nullable|exists:users,id',
            'address_base' => 'nullable|string',
        ]);

        $directory = \App\Models\Directory::create([
            'name' => $request->name,
            'city' => $request->city,
            'state' => $request->state,
            'directory_type' => $request->directory_type,
            'president_id' => $request->president_id,
            'secretary_id' => $request->secretary_id,
            'treasurer_id' => $request->treasurer_id,
            'address_base' => $request->address_base,
            'operational_status' => 'pending', 
            'affiliation_status' => 'applicant',
            'legal_status' => 'not_formalized',
            'submitted_at' => now(),
        ]);

        $directory->seedChecklist();

        return redirect()->back()->with('success', 'Solicitação de Implantação registrada! Protocolo gerado automaticamente.');
    }

    public function updateDirectory(Request $request, \App\Models\Directory $directory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'directory_type' => 'required|string',
            'status' => 'required|string',
        ]);

        $directory->update($request->all());

        return redirect()->back()->with('success', 'Diretório atualizado com sucesso!');
    }

    public function approveDirectory(Request $request, \App\Models\Directory $directory)
    {
        $errors = $directory->getValidationErrors();
        if (count($errors) > 0) {
            return redirect()->back()->withErrors($errors)->with('error', 'Aprovação institucional travada por pendências.');
        }

        $directory->update([
            'operational_status' => 'approved',
            'affiliation_status' => 'provisional',
            'approved_at' => now(),
        ]);

        \App\Models\DirectoryAction::create([
            'directory_id' => $directory->id,
            'user_id' => auth()->id(),
            'action' => 'approved',
            'level' => 'nacional',
            'reason' => 'Requisitos de implantação validados.'
        ]);

        // Notificar Presidente
        if ($directory->president && $directory->president->email) {
            $directory->president->notify(new \App\Notifications\DiretorioAtivado([
                'name' => $directory->president->name,
                'directory_name' => $directory->name,
                'protocol' => $directory->protocol_number,
                'status' => 'Aprovado (Provisório)'
            ]));
        }

        return redirect()->back()->with('success', 'Diretório aprovado institucionalmente! Agora está em estágio Provisório.');
    }

    public function releaseDirectory(\App\Models\Directory $directory)
    {
        if ($directory->operational_status !== 'approved') {
            return redirect()->back()->with('error', 'O diretório precisa estar APROVADO antes de ser OFICIALIZADO.');
        }

        $directory->update([
            'operational_status' => 'active',
            'affiliation_status' => 'official',
            'activated_at' => now(),
        ]);

        \App\Models\DirectoryAction::create([
            'directory_id' => $directory->id,
            'user_id' => auth()->id(),
            'action' => 'released',
            'level' => 'nacional',
            'reason' => 'Vínculo oficializado nacionalmente.'
        ]);

        // Notificar Presidente
        if ($directory->president && $directory->president->email) {
            $directory->president->notify(new \App\Notifications\DiretorioAtivado([
                'name' => $directory->president->name,
                'directory_name' => $directory->name,
                'protocol' => $directory->protocol_number,
                'status' => 'Ativo (Oficial)'
            ]));
        }

        return redirect()->back()->with('success', 'Diretório OFICIALIZADO e liberado para operação plena!');
    }

    public function blockDirectory(Request $request, \App\Models\Directory $directory)
    {
        $request->validate(['reason' => 'required|string']);

        $directory->update([
            'operational_status' => 'blocked',
            'affiliation_status' => 'suspended',
            'blocked_at' => now(),
        ]);

        \App\Models\DirectoryAction::create([
            'directory_id' => $directory->id,
            'user_id' => auth()->id(),
            'action' => 'blocked',
            'level' => 'nacional',
            'reason' => $request->reason
        ]);

        return redirect()->back()->with('warning', 'Diretório bloqueado por intervenção administrativa.');
    }

    public function rejectDirectory(Request $request, \App\Models\Directory $directory)
    {
        $request->validate(['reason' => 'required|string']);

        $directory->update([
            'operational_status' => 'rejected',
            'rejected_at' => now(),
        ]);

        \App\Models\DirectoryAction::create([
            'directory_id' => $directory->id,
            'user_id' => auth()->id(),
            'action' => 'rejected',
            'level' => 'nacional',
            'reason' => $request->reason
        ]);

        return redirect()->back()->with('error', 'Solicitação de implantação rejeitada.');
    }

    public function exportDirectory(\App\Models\Directory $directory)
    {
        $directory->loadCount('memberships');
        return view('pages.admin.reports.directory-sheet', compact('directory'));
    }

    public function governance()
    {
        $positions = \App\Models\InternalPosition::orderBy('hierarchy_weight', 'desc')->get();
        $totalPositions = \App\Models\InternalPosition::count();
        $occupiedPositions = \App\Models\User::whereNotNull('position_id')->count();
        
        return view('pages.admin.governance', compact('positions', 'totalPositions', 'occupiedPositions'));
    }

    // --- 5. Comunicação e Mobilização ---
    public function communication()
    {
        return view('pages.admin.communication');
    }

    // --- 6. Inteligência e Controle ---
    public function intelligence()
    {
        $totalUsers = \App\Models\User::where(function($q) {
            $q->whereIn('status', ['active', 'ativo'])->orWhereNull('status');
        })->count();

        $newUsersThisMonth = \App\Models\User::where(function($q) {
            $q->whereIn('status', ['active', 'ativo'])->orWhereNull('status');
        })->whereMonth('created_at', now()->month)->count();

        $newUsersLastMonth = \App\Models\User::where(function($q) {
            $q->whereIn('status', ['active', 'ativo'])->orWhereNull('status');
        })->whereMonth('created_at', now()->subMonth()->month)->count();
        
        $growth = 0;
        if ($newUsersLastMonth > 0) {
            $growth = (($newUsersThisMonth - $newUsersLastMonth) / $newUsersLastMonth) * 100;
        } elseif ($newUsersThisMonth > 0) {
            $growth = 100;
        }

        $efficiency = \App\Models\Goal::where('target_members', '>', 0)
            ->avg(\Illuminate\Support\Facades\DB::raw('(current_members / target_members) * 10')) ?? 0;
            
        $totalPoints = \App\Models\Point::sum('amount') ?? 0;
        
        $topDirectories = \App\Models\Directory::withCount('memberships')
            ->orderBy('memberships_count', 'desc')
            ->limit(5)
            ->get();

        return view('pages.admin.intelligence', compact('totalUsers', 'newUsersThisMonth', 'growth', 'topDirectories', 'efficiency', 'totalPoints'));
    }

    public function intelligenceReport()
    {
        $user = auth()->user()->load('position');
        
        // Contagem de membros: considera 'active', 'ativo' ou nulo
        $totalUsers = \App\Models\User::where(function($q) {
            $q->whereIn('status', ['active', 'ativo'])->orWhereNull('status');
        })->count();

        // Busca a lista de nomes para conferência (ajuda a identificar se são testes)
        $memberList = \App\Models\User::where(function($q) {
                $q->whereIn('status', ['active', 'ativo'])->orWhereNull('status');
            })
            ->select('name', 'city', 'state')
            ->get();

        $newUsersThisMonth = \App\Models\User::where(function($q) {
            $q->whereIn('status', ['active', 'ativo'])->orWhereNull('status');
        })->whereMonth('created_at', now()->month)->count();

        $efficiency = \App\Models\Goal::where('target_members', '>', 0)
            ->avg(\Illuminate\Support\Facades\DB::raw('(current_members / target_members) * 10')) ?? 0;

        $totalPoints = \App\Models\Point::sum('amount') ?? 0;
        
        // Todos os diretórios
        $allDirectories = \App\Models\Directory::withCount('memberships')
            ->orderBy('memberships_count', 'desc')
            ->get();

        $statsByState = \App\Models\User::select('state', \Illuminate\Support\Facades\DB::raw('count(*) as count'))
            ->groupBy('state')
            ->orderBy('count', 'desc')
            ->get();

        return view('pages.admin.reports.intelligence', compact('user', 'totalUsers', 'newUsersThisMonth', 'allDirectories', 'efficiency', 'totalPoints', 'statsByState', 'memberList'));
    }

    // --- 7. Jurídico Institucional ---
    public function legal()
    {
        $complaints = \App\Models\LegalComplaint::latest()->paginate(10);
        $activeProcesses = \App\Models\LegalDisciplinaryProcess::where('status', '!=', 'concluido')->count();
        return view('pages.admin.legal', compact('complaints', 'activeProcesses'));
    }

    public function issueCertificate()
    {
        return view('pages.admin.issue-certificate');
    }

    public function configuracoes()
    {
        return view('pages.admin.configuracoes');
    }

    public function showDirectory(\App\Models\Directory $directory)
    {
        $directory->load(['president', 'secretary', 'treasurer', 'actions.user', 'members.user']);
        return view('pages.admin.directories.show', compact('directory'));
    }

    public function assignMember(Request $request, \App\Models\Directory $directory)
    {
        $request->validate([
            'name' => 'required|string',
            'cpf' => 'required|string',
            'member_type' => 'required|in:founder,board_member',
        ]);

        // Regra Partidária: Unicidade de CPF em Fundadores de diferentes diretórios
        if ($request->member_type === 'founder') {
            $exists = \App\Models\DirectoryMember::where('cpf', $request->cpf)
                ->where('member_type', 'founder')
                ->where('directory_id', '!=', $directory->id)
                ->exists();
            if ($exists) {
                return back()->with('error', 'Este CPF já consta como fundador em outro diretório.');
            }
        }

        $directory->members()->create($request->all());

        return back()->with('success', 'Membro cadastrado com sucesso.');
    }

    public function removeMember(\App\Models\Directory $directory, \App\Models\DirectoryMember $member)
    {
        $member->delete();
        return back()->with('success', 'Membro removido com sucesso.');
    }
}
