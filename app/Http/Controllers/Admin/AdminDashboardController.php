<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard');
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
