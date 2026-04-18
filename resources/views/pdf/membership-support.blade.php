<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Termo de Apoio - PCT</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #1a202c;
            line-height: 1.5;
            margin: 0;
            padding: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #1e40af; /* Deep Blue */
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 14px;
            color: #4b5563;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .content {
            margin-top: 20px;
            text-align: justify;
        }
        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        .field-group {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #374151;
        }
        .field-value {
            border-bottom: 1px dotted #9ca3af;
            display: inline-block;
            min-width: 200px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
        }
        .signature-box {
            margin-top: 60px;
            text-align: center;
        }
        .signature-line {
            width: 300px;
            border-top: 1px solid #000;
            margin: 0 auto;
            padding-top: 5px;
        }
        .protocol-badge {
            position: absolute;
            top: 40px;
            right: 40px;
            padding: 10px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            font-size: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="protocol-badge">
        PROTOCOLO<br>
        <strong>{{ $user->registration_number }}</strong>
    </div>

    <div class="header">
        <div class="logo">PCT</div>
        <div class="subtitle">Movimento Cidadania e Trabalho</div>
    </div>

    <div class="title">FICHA DE APOIO E FILIAÇÃO INSTITUCIONAL</div>

    <div class="content">
        <p>Eu, <strong>{{ $user->name }}</strong>, brasileiro(a), portador(a) do CPF nº <strong>{{ $user->cpf }}</strong> e RG nº <strong>{{ $user->rg }}</strong>, residente e domiciliado em {{ $user->city }} - {{ $user->state }}, declaro para os devidos fins meu apoio formal à fundação e consolidação do <strong>Movimento Cidadania e Trabalho (PCT)</strong>.</p>
        
        <p>Ao assinar este termo, manifesto minha concordância com os princípios estatutários, o código de ética e a cartilha institucional do movimento, comprometendo-me a atuar em conformidade com as diretrizes democráticas e republicanas que regem esta instituição.</p>

        <div class="field-group">
            <span class="field-label">NOME COMPLETO:</span>
            <span class="field-value">{{ $user->name }}</span>
        </div>

        <div class="field-group">
            <span class="field-label">DATA DE NASCIMENTO:</span>
            <span class="field-value">{{ $user->birth_date }}</span>
        </div>

        <div class="field-group">
            <span class="field-label">TÍTULO DE ELEITOR:</span>
            <span class="field-value">{{ $user->voter_id }}</span> (ZONA: {{ $user->voter_zone }} / SEÇÃO: {{ $user->voter_section }})
        </div>

        <p>Ratifico que as informações aqui prestadas são verdadeiras e estou ciente das responsabilidades civis e estatutárias decorrentes deste ato de filiação/apoio.</p>
    </div>

    <div class="signature-box">
        <div class="signature-line"></div>
        <p><strong>{{ $user->name }}</strong><br>ASSINATURA DO APOIADOR</p>
    </div>

    <div class="footer">
        Este documento é gerado eletronicamente pelo Sistema de Gestão PCT.<br>
        Verificação de autenticidade disponível em: {{ config('app.url') }}/verificar/{{ $user->registration_number }}<br>
        Gerado em: {{ now()->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>
