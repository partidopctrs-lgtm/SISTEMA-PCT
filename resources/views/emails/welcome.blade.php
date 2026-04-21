@extends('emails.layouts.pct')

@section('title', 'Bem-vindo ao PCT!')

@section('content')
    <p>Olá, <strong>{{ $user->name }}</strong>!</p>
    <p>É uma honra ter você conosco no <strong>Movimento Cidadania e Trabalho</strong>. Seu cadastro foi realizado com sucesso e seu número de registro oficial é:</p>
    
    <div style="background: #eff6ff; padding: 30px; border-radius: 20px; text-align: center; font-size: 28px; font-weight: 900; color: #1e3a8a; margin: 25px 0; border: 2px dashed #1e3a8a;">
        {{ $user->registration_number }}
    </div>

    <p>Agora você já pode acessar o portal oficial, emitir sua carteirinha e participar das nossas missões nacionais.</p>
    
    <center>
        <a href="https://pct.social.br/login" class="button">ACESSAR MEU PORTAL</a>
    </center>

    <p style="margin-top: 40px; font-size: 14px; text-align: center; color: #64748b;">
        <em>"Seja a mudança que o Brasil precisa através do trabalho e da liberdade."</em>
    </p>
@endsection
