<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LawyerAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.lawyer-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $user = Auth::user();

            // Somente usuários com role legal ou admin podem acessar o painel do advogado
            if (in_array($user->role, ['legal', 'admin'])) {
                $request->session()->regenerate();
                return redirect()->route('advogado.dashboard');
            }

            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Acesso restrito ao Corpo Jurídico do PCT. Verifique suas credenciais ou contate a Coordenação Nacional.',
            ]);
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('advogado.login');
    }
}
