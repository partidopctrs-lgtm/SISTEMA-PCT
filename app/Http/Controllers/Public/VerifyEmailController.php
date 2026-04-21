<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class VerifyEmailController extends Controller
{
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Link de confirmação inválido ou expirado.');
        }

        // Ativa o usuário
        $user->update([
            'status' => 'active',
            'email_verified_at' => now(),
            'verification_token' => null,
        ]);

        // Autentica automaticamente
        Auth::login($user);

        // Envia o e-mail de Boas-Vindas oficial agora que está ativo
        try {
            Mail::to($user->email)->send(new WelcomeMail($user));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erro ao enviar e-mail de boas-vindas após ativação: ' . $e->getMessage());
        }

        // Redireciona para o dashboard
        $redirectRoute = 'affiliate.dashboard';
        if ($user->hasRole('admin')) $redirectRoute = 'admin.dashboard';
        
        return redirect()->route($redirectRoute)->with('success', 'E-mail confirmado com sucesso! Seja bem-vindo ao Movimento PCT.');
    }
}
