@extends('emails.layouts.pct')

@section('title', 'Recuperação de Acesso')

@section('content')
    <p>Olá, <strong>{{ $user->name }}</strong>.</p>
    <p>Recebemos uma solicitação para redefinir a senha da sua conta no Movimento PCT.</p>
    <p>Para criar uma nova senha, clique no botão abaixo:</p>
    
    <center>
        <a href="{{ $url }}" class="button">REDEFINIR MINHA SENHA</a>
    </center>

    <p style="margin-top: 40px; font-size: 14px; color: #64748b;">
        Se você não solicitou esta alteração, ignore este e-mail. O link expirará em 60 minutos por motivos de segurança.
    </p>
@endsection
