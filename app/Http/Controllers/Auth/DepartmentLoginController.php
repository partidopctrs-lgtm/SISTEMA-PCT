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
        $host = $request->getHost();
        
        $titles = [
            'login'     => 'Área do Membro',
            'affiliate' => 'Área do Membro',
        ];

        $title = $titles[$path] ?? 'Portal PCT';
        
        // Se estiver no subdomínio administrativo, força o título correto
        if (str_contains($host, 'administrativo')) {
            $title = 'Gestão Nacional (Administrativo)';
        }
        
        return view('auth.department-login', compact('title', 'path'));
    }

    public function login(Request $request)
    {
        $path = $request->segment(1);
        $host = $request->getHost();
        
        $role = match($path) {
            'login' => 'affiliate',
            default => 'affiliate'
        };

        // Se estiver no subdomínio administrativo, o papel esperado é admin
        if (str_contains($host, 'administrativo')) {
            $role = 'admin';
        }
        
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

            // Conta pendente de verificação de e-mail
            if ($user->status === 'pending') {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => "Sua conta está pendente de verificação. Verifique seu e-mail e clique no link de confirmação para ativar o acesso.",
                ]);
            }

            // Conta explicitamente bloqueada/inativa (ignora null = cadastrado pelo gestor)
            if (!in_array($user->status, ['active', null])) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => "Sua conta está inativa. Entre em contato com o responsável pelo seu diretório.",
                ]);
            }

            // Verifica compatibilidade do papel com o portal
            $allowedRoles = ['admin', $role, 'committee', 'affiliate'];
            if ($user->hasRole('admin') || in_array($user->role, $allowedRoles)) {
                $request->session()->regenerate();

                $host = $request->getHost();
                $scheme = $request->getScheme();
                $port = $request->getPort();
                $fullHost = $request->getHttpHost();

                if ($user->hasRole('admin')) {
                    $targetHost = 'administrativo.' . $host;
                    if (!str_starts_with($fullHost, 'administrativo.')) {
                        return redirect()->away($scheme . '://' . $targetHost . ($port ? ':' . $port : '') . '/dashboard');
                    }
                } elseif ($user->hasRole('affiliate')) {
                    $targetHost = 'afiliado.' . $host;
                    if (!str_starts_with($fullHost, 'afiliado.')) {
                        return redirect()->away($scheme . '://' . $targetHost . ($port ? ':' . $port : '') . '/dashboard');
                    }
                }

                return redirect()->intended('/dashboard');
            }

            Auth::logout();
            throw ValidationException::withMessages([
                'email' => "Acesso negado: seu perfil não tem permissão para este portal. Verifique a URL correta do seu departamento.",
            ]);
        }

        throw ValidationException::withMessages([
            'email' => "E-mail ou senha incorretos. Verifique seus dados e tente novamente.",
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
