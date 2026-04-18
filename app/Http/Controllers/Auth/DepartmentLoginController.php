<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DepartmentLoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $path = $request->segment(1);
        $titles = [
            'admin' => 'Portal da Presidência (Admin)',
            'login' => 'Portal do Afiliado',
            'affiliate' => 'Portal do Afiliado',
            'candidate' => 'Gabinete Digital do Candidato',
            'committee' => 'Painel do Comitê Regional',
            'finance' => 'Tesouraria Digital (Financeiro)',
            'legal' => 'Compliance & Jurídico',
            'communication' => 'Portal da Comunicação',
            'login-diretorio' => 'Portal da Presidência (Admin)',
        ];

        $title = $titles[$path] ?? 'Portal PCT';
        
        return view('auth.department-login', compact('title', 'path'));
    }

    public function login(Request $request)
    {
        $path = $request->segment(1);
        $role = match($path) {
            'login-diretorio' => 'admin',
            'login' => 'affiliate',
            default => $path
        };
        
        $email = $request->email;
        // Map legacy admin e‑mail to the current one
        if (strtolower($email) === 'admin@pct.org.br' || strtolower($email) === 'admin@pct.social.br') {
            // Ensure we use the exact email in the database if needed, 
            // but for now we just allow the attempt with what's provided.
        }

        // Validate the (potentially updated) credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = Auth::user();

            if ($user->hasRole('admin') || $user->role === $role) {
                $request->session()->regenerate();
                
                // Se o usuário é admin mas logou pelo portal de afiliado, direciona pro afiliado
                $targetPath = match ($role) {
                    'admin' => 'admin',
                    'affiliate' => 'affiliate',
                    default => $path
                };
                
                return redirect("/{$targetPath}/dashboard");
            }

            Auth::logout();
            throw ValidationException::withMessages([
                'email' => "Acesso negado: Você está tentando acessar um portal incompatível com o seu perfil. Verifique a URL correta do seu departamento.",
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
        return redirect('/login');
    }
}
