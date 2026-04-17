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
        ];

        $topDirectories = \App\Models\Directory::withCount('memberships')
            ->orderBy('memberships_count', 'desc')
            ->limit(5)
            ->get();

        $recentUsers = \App\Models\User::orderBy('created_at', 'desc')->limit(5)->get();

        return view('pages.admin.dashboard', compact('stats', 'topDirectories', 'recentUsers'));
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

    public function perfis() { return view('pages.admin.profiles'); }
    public function carteirinhas() { return view('pages.admin.carteirinhas'); }
    public function escola() { return view('pages.admin.escola'); }
    public function referrals() { return view('pages.admin.referrals'); }
    public function missoes() { return view('pages.admin.missoes'); }
    public function comunidade() { return view('pages.admin.comunidade'); }
    public function documentos() { return view('pages.admin.documentos'); }

    public function modelosOficios()
    {
        return view('pages.shared.modelos-oficios');
    }

    public function fichaFiliacao()
    {
        return view('pages.shared.ficha-filiacao');
    }

    public function eventos() { return view('pages.admin.eventos'); }
    public function financeiro() { return view('pages.admin.financeiro'); }
    public function suporte() { return view('pages.admin.suporte'); }
    public function configuracoes() { return view('pages.admin.configuracoes'); }
}
