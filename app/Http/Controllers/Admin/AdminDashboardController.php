<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_members' => \App\Models\User::count(),
            'total_directories' => \App\Models\Directory::count(),
            'total_revenue' => \App\Models\FinancialRecord::where('type', 'revenue')->where('status', 'approved')->sum('amount'),
            'total_expenses' => \App\Models\FinancialRecord::where('type', 'expense')->where('status', 'approved')->sum('amount'),
            'legal_requests_new' => \App\Models\LegalRequest::where('status', 'new')->count(),
            'hino_plays' => \App\Models\AudioInteraction::where('type', 'play')->count(),
            'hino_downloads' => \App\Models\AudioInteraction::where('type', 'download')->count(),
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

        return redirect()->route('admin.dashboard')->with('success', 'Membro cadastrado com sucesso! A senha padrão é PCT@123456');
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
        
        $committees = \App\Models\Directory::withCount('memberships')->paginate(15);
        return view('pages.admin.directories', compact('committees'));
    }

    public function storeDirectory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'directory_type' => 'required|string',
        ]);

        \App\Models\Directory::create([
            'name' => $request->name,
            'city' => $request->city,
            'state' => $request->state,
            'directory_type' => $request->directory_type,
            'status' => 'pending', // Novos diretórios começam como pendentes
        ]);

        return redirect()->back()->with('success', 'Novo diretório registrado com sucesso!');
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
}
