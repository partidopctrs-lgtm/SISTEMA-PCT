<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Helvetica', sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f4f7f6; padding-bottom: 40px; }
        .main { background-color: #ffffff; margin: 0 auto; width: 100%; max-width: 600px; border-spacing: 0; font-family: sans-serif; color: #4a4a4a; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .header { background-color: #1e3a8a; padding: 40px; text-align: center; }
        .content { padding: 40px; }
        .footer { background-color: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #94a3b8; }
        .button { display: inline-block; padding: 16px 32px; background-color: #10b981; color: #ffffff !important; text-decoration: none; border-radius: 12px; font-weight: bold; margin-top: 20px; }
        h1 { color: #ffffff; margin: 0; font-size: 24px; text-transform: uppercase; letter-spacing: 2px; }
        h2 { color: #1e3a8a; margin-top: 0; }
    </style>
</head>
<body>
    <div class="wrapper">
        <table class="main">
            <tr>
                <td class="header">
                    <h1>@yield('title', 'Movimento PCT')</h1>
                </td>
            </tr>
            <tr>
                <td class="content">
                    @yield('content')
                </td>
            </tr>
            <tr>
                <td class="footer">
                    &copy; {{ date('Y') }} Movimento PCT - Partido Cidadania e Trabalho<br>
                    Este é um e-mail automático, por favor não responda.
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
