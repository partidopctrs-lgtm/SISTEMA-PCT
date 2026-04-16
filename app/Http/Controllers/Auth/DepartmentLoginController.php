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
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = Auth::user();

            // Validate if user has the correct role OR is national admin
            if ($user->role === $role || $user->role === 'admin') {
                $request->session()->regenerate();
                $targetPath = match ($role) {
                    'admin' => 'admin',
                    'affiliate' => 'affiliate',
                    default => $path
                };
                return redirect("/{$targetPath}/dashboard");
            }

            Auth::logout();
            throw ValidationException::withMessages([
                'email' => "Você não possui permissão para acessar o Portal " . ucfirst($path) . ".",
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
