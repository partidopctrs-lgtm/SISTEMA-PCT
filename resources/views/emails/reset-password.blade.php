<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica', sans-serif; background-color: #f4f7f6; margin: 0; padding: 40px; }
        .container { max-width: 600px; background: white; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .header { background: #1e3a8a; padding: 40px; text-align: center; }
        .content { padding: 40px; color: #334155; line-height: 1.6; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #94a3b8; }
        .btn { display: inline-block; padding: 16px 32px; background: #1e3a8a; color: white; text-decoration: none; border-radius: 12px; font-weight: bold; margin-top: 20px; }
        h1 { color: white; margin: 0; font-size: 24px; text-transform: uppercase; letter-spacing: 2px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Recuperação de Acesso</h1>
        </div>
        <div class="content">
            <p>Olá, <strong>{{ $user->name }}</strong>.</p>
            <p>Recebemos uma solicitação para redefinir a senha da sua conta no Movimento PCT.</p>
            <p>Para criar uma nova senha, clique no botão abaixo:</p>
            <center>
                <a href="{{ $url }}" class="btn">REDEFINIR MINHA SENHA</a>
            </center>
            <p style="margin-top: 40px; font-size: 14px; color: #64748b;">Se você não solicitou esta alteração, ignore este e-mail. O link expirará em 60 minutos por motivos de segurança.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Movimento PCT - Partido Cidadania e Trabalho
        </div>
    </div>
</body>
</html>
