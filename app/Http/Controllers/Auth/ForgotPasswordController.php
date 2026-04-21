<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string', // Pode ser Email ou CPF
        ]);

        $identifier = $request->identifier;

        // Tenta buscar por e-mail ou CPF
        $user = User::where('email', $identifier)
            ->orWhere('cpf', $identifier)
            ->first();

        if (!$user) {
            return back()->withErrors(['identifier' => 'Não encontramos nenhum cadastro com este dado.']);
        }

        // Gera token de recuperação
        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        $url = route('password.reset', ['token' => $token, 'email' => $user->email]);

        try {
            Mail::to($user->email)->send(new ResetPasswordMail($user, $url));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erro ao enviar e-mail de recuperação: ' . $e->getMessage());
            return back()->with('error', 'Erro ao enviar o e-mail. Verifique suas configurações de SMTP.');
        }

        return back()->with('success', 'Encontramos seu cadastro! Enviamos um link de recuperação para o e-mail: ' . $this->maskEmail($user->email));
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$record) {
            return back()->withErrors(['email' => 'Este link de recuperação é inválido ou expirou.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Sua senha foi redefinida com sucesso! Já pode acessar o portal.');
    }

    private function maskEmail($email)
    {
        $parts = explode('@', $email);
        $name = $parts[0];
        $domain = $parts[1];
        $maskedName = substr($name, 0, 3) . str_repeat('*', strlen($name) - 3);
        return $maskedName . '@' . $domain;
    }
}
