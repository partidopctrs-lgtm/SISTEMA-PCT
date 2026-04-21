<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica', sans-serif; background-color: #f4f7f6; margin: 0; padding: 40px; }
        .container { max-width: 600px; background: white; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .header { background: #1e3a8a; padding: 40px; text-align: center; }
        .content { padding: 40px; color: #334155; line-height: 1.6; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #94a3b8; }
        .btn { display: inline-block; padding: 16px 32px; background: #10b981; color: white; text-decoration: none; border-radius: 12px; font-weight: bold; margin-top: 20px; }
        h1 { color: white; margin: 0; font-size: 24px; text-transform: uppercase; letter-spacing: 2px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bem-vindo ao PCT!</h1>
        </div>
        <div class="content">
            <p>Olá, <strong>{{ $user->name }}</strong>!</p>
            <p>É uma honra ter você conosco no <strong>Movimento Cidadania e Trabalho</strong>. Seu cadastro foi realizado com sucesso e seu número de registro oficial é:</p>
            <div style="background: #eff6ff; padding: 20px; border-radius: 12px; text-align: center; font-size: 24px; font-weight: bold; color: #1e3a8a; margin: 20px 0;">
                {{ $user->registration_number }}
            </div>
            <p>Agora você já pode acessar o portal oficial, emitir sua carteirinha e participar das nossas missões nacionais.</p>
            <center>
                <a href="https://pct.social.br/login" class="btn">ACESSAR MEU PORTAL</a>
            </center>
            <p style="margin-top: 40px; font-size: 14px;">Seja a mudança que o Brasil precisa através do trabalho e da liberdade.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Movimento PCT - Partido Cidadania e Trabalho
        </div>
    </div>
</body>
</html>
