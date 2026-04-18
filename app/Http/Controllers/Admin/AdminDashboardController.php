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
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => \Illuminate\Support\Facades\Hash::make('PCT@123456'), // Senha padrão
            'registration_number' => 'PCT' . strtoupper(substr(uniqid(), -5)), // Gerar um número mock
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
        $committees = \App\Models\Directory::withCount('memberships')->paginate(15);
        return view('pages.admin.directories', compact('committees'));
    }

    // --- 4. Governança Interna ---
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
        $totalUsers = \App\Models\User::count();
        $newUsersThisMonth = \App\Models\User::whereMonth('created_at', now()->month)->count();
        $newUsersLastMonth = \App\Models\User::whereMonth('created_at', now()->subMonth()->month)->count();
        
        $growth = 0;
        if ($newUsersLastMonth > 0) {
            $growth = (($newUsersThisMonth - $newUsersLastMonth) / $newUsersLastMonth) * 100;
        } elseif ($newUsersThisMonth > 0) {
            $growth = 100;
        }

        $efficiency = \App\Models\Goal::avg(\DB::raw('(current_members / target_members) * 10')) ?? 0;
        $totalPoints = \App\Models\Point::sum('amount');
        
        $topDirectories = \App\Models\Directory::withCount('memberships')
            ->orderBy('memberships_count', 'desc')
            ->limit(5)
            ->get();

        return view('pages.admin.intelligence', compact('totalUsers', 'newUsersThisMonth', 'growth', 'topDirectories', 'efficiency', 'totalPoints'));
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
