{{-- resources/views/pages/admin/reports/member-sheet-pdf.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ficha de Filiação – PCT</title>
    <style>
        /* ── Reset base DomPDF ──────────────────────────────────── */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 10px;
            color: #222;
            padding: 18px 20px;
            background: #fff;
        }

        /* ── Cores PCT ──────────────────────────────────────────── */
        /* azul: #1A3A6B | verde: #1E7A3A | amarelo: #F5A800 */

        /* ── CABEÇALHO ──────────────────────────────────────────── */
        .header-table {
            width: 100%;
            border-bottom: 3px solid #1E7A3A;
            padding-bottom: 8px;
            margin-bottom: 0;
        }
        .header-table td { vertical-align: middle; }
        .org-nome {
            font-size: 13px;
            font-weight: bold;
            color: #1A3A6B;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .org-slogan {
            font-size: 7.5px;
            font-weight: bold;
            color: #1E7A3A;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 2px;
        }
        .org-local { font-size: 7.5px; color: #555; margin-top: 1px; }
        .ficha-num {
            text-align: right;
            font-size: 9px;
            color: #555;
            line-height: 1.6;
        }
        .ficha-num-val {
            font-size: 10px;
            font-weight: bold;
            color: #1A3A6B;
            border-bottom: 1px dotted #888;
            padding: 0 4px;
        }

        /* ── FAIXA TÍTULO ───────────────────────────────────────── */
        .title-bar {
            background: #1A3A6B;
            padding: 10px 12px 8px;
            text-align: center;
            margin-top: 0;
        }
        .title-bar h1 {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
        }
        .title-bar p {
            color: #adc4e8;
            font-size: 7.5px;
            margin: 3px 0 0;
        }
        .barra-amarela {
            background: #F5A800;
            height: 4px;
            width: 100%;
        }

        /* ── CABEÇALHO DE SEÇÃO ─────────────────────────────────── */
        .section-header {
            background: #1A3A6B;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 10px;
        }
        .circle {
            background: #F5A800;
            color: #1A3A6B;
            width: 16px;
            height: 16px;
            border-radius: 8px;
            display: inline-block;
            text-align: center;
            line-height: 16px;
            font-weight: 900;
            font-size: 9px;
            margin-right: 6px;
        }
        .section-body {
            border: 1px solid #1A3A6B;
            border-top: none;
            padding: 10px;
            background: #fff;
        }

        /* ── LABELS E CAMPOS ────────────────────────────────────── */
        .label {
            font-size: 7.5px;
            font-weight: bold;
            color: #1A3A6B;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            margin-bottom: 2px;
        }
        .label-verde { color: #1E7A3A !important; }
        .label-obrig { color: #F5A800; font-size: 7px; }

        .input-box {
            border: 1px solid #C8CDD6;
            border-bottom: 2px solid #1A3A6B;
            padding: 4px 7px;
            background: #FAFBFD;
            min-height: 20px;
            margin-bottom: 7px;
            font-size: 10px;
            color: #111;
        }
        .input-grande {
            font-size: 13px;
            font-weight: bold;
            border-bottom: 2.5px solid #1A3A6B;
            letter-spacing: 0.5px;
        }
        .input-destaque {
            background: #E8EEF7;
            border: 2px solid #1A3A6B !important;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #1A3A6B;
            letter-spacing: 1px;
        }

        /* ── BLOCOS COLORIDOS ───────────────────────────────────── */
        .bloco-zona {
            background: #E8EEF7;
            border: 2px solid #1A3A6B;
            padding: 8px 10px;
            margin-top: 8px;
            margin-bottom: 8px;
        }
        .bloco-zona-titulo {
            font-size: 7px;
            font-weight: bold;
            color: #1A3A6B;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 6px;
        }
        .bloco-domicilio {
            border-left: 4px solid #1E7A3A;
            border: 1px solid #C8CDD6;
            border-left: 4px solid #1E7A3A;
            background: #F5FAF6;
            padding: 8px 10px;
            margin-top: 8px;
        }
        .bloco-domicilio-titulo {
            font-size: 7px;
            font-weight: bold;
            color: #1E7A3A;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 6px;
        }

        /* ── DECLARAÇÃO ─────────────────────────────────────────── */
        .decl-box {
            background: #F2F4F7;
            border-left: 4px solid #1A3A6B;
            border: 1px solid #C8CDD6;
            border-left: 4px solid #1A3A6B;
            padding: 10px 12px;
            font-size: 9.5px;
            line-height: 1.6;
            text-align: justify;
            color: #1a1a1a;
        }

        /* ── ASSINATURA ─────────────────────────────────────────── */
        .ass-linha {
            border-bottom: 1.5px solid #888;
            height: 40px;
            margin-bottom: 4px;
        }
        .ass-nota {
            font-size: 8px;
            font-style: italic;
            color: #999;
            text-align: center;
        }

        /* ── USO INTERNO ────────────────────────────────────────── */
        .uso-interno {
            border: 1.5px dashed #C8CDD6;
            background: #F8F9FB;
            padding: 10px;
        }
        .uso-titulo {
            font-size: 7.5px;
            font-weight: bold;
            color: #1A3A6B;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 7px;
            border-bottom: 1px solid #C8CDD6;
            padding-bottom: 4px;
        }

        /* ── RODAPÉ ─────────────────────────────────────────────── */
        .footer {
            background: #1A3A6B;
            color: #adc4e8;
            padding: 8px 12px;
            text-align: center;
            font-size: 7.5px;
            margin-top: 12px;
            line-height: 1.6;
        }
        .footer strong { color: #F5A800; }

        /* ── TABELAS UTILITÁRIAS ─────────────────────────────────── */
        table { border-collapse: collapse; }
        td { vertical-align: top; padding: 0 4px 0 0; }
        td:last-child { padding-right: 0; }
    </style>
</head>
<body>

{{-- ── CABEÇALHO ─────────────────────────────────────────────────────── --}}
<table class="header-table">
    <tr>
        <td width="90">
            <img src="{{ public_path('logo partido_cropped.png') }}"
                 height="52" alt="Logo PCT">
        </td>
        <td>
            <div class="org-nome">PCT – PARTIDO CIDADANIA E TRABALHO</div>
            <div class="org-slogan">FILIAÇÃO PARTIDÁRIA OFICIAL</div>
            <div class="org-local">Diretório Municipal de Taquara – RS</div>
        </td>
        <td class="ficha-num" width="130">
            <strong style="color:#1A3A6B;">MATRÍCULA:</strong><br>
            <span class="ficha-num-val">{{ $user->registration_number }}</span><br>
            <small style="color:#999; font-size:7px;">Registro Institucional</small>
        </td>
    </tr>
</table>

{{-- ── FAIXA TÍTULO ──────────────────────────────────────────────────── --}}
<div class="title-bar">
    <h1>Ficha de Filiação Partidária</h1>
    <p>Conforme Lei nº 9.096/95 e Estatuto do Partido Cidadania e Trabalho</p>
</div>
<div class="barra-amarela"></div>

{{-- ── SEÇÃO 1 — IDENTIFICAÇÃO ──────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">1</span> Dados do Filiado
</div>
<div class="section-body">

    <span class="label">Nome completo</span>
    <div class="input-box input-grande">{{ $user->name }}</div>

    <table width="100%">
        <tr>
            <td width="55%">
                <span class="label">CPF</span>
                <div class="input-box">{{ $user->cpf ?? '___.___.___-__' }}</div>
            </td>
            <td width="3%"></td>
            <td width="42%">
                <span class="label">Data de nascimento</span>
                <div class="input-box">
                    {{ $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') : '__/__/____' }}
                </div>
            </td>
        </tr>
    </table>

    <span class="label">Título de eleitor</span>
    <div class="input-box input-grande">
        {{ $user->voter_id ?? '________________' }}
    </div>

    <div class="bloco-zona">
        <div class="bloco-zona-titulo">▸ Dados Eleitorais</div>
        <table width="100%">
            <tr>
                <td width="48%">
                    <span class="label">Zona</span>
                    <div class="input-box input-destaque">{{ $user->voter_zone ?? '___' }}</div>
                </td>
                <td width="4%"></td>
                <td width="48%">
                    <span class="label">Seção</span>
                    <div class="input-box input-destaque">{{ $user->voter_section ?? '___' }}</div>
                </td>
            </tr>
        </table>
    </div>

    <span class="label">Endereço de Domicílio</span>
    <div class="input-box">{{ $user->address ?? '________________________________________________' }}</div>
    
</div>

{{-- ── SEÇÃO 2 — COMPROMISSO ───────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">2</span> Termo de Compromisso e Filiação
</div>
<div class="section-body">
    <div class="decl-box">
        Pela presente, <b>solicito minha filiação ao Partido Cidadania e Trabalho (PCT)</b>, declarando sob as penas da lei que aceito e submeto-me às normas estatutárias e ao programa político da legenda.<br><br>
        Declaro estar no pleno gozo de meus direitos políticos e civis, não estando filiado a qualquer outra agremiação partidária, em conformidade com a legislação eleitoral vigente (Lei nº 9.096/95). Comprometo-me a zelar pela ética partidária e pelos princípios de liberdade e trabalho defendidos por este movimento.
    </div>
</div>

{{-- ── SEÇÃO 3 — ASSINATURA ────────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">3</span> Assinatura do Filiado
</div>
<div class="section-body">
    <span class="label">Assinatura conforme documento oficial</span>
    <div class="ass-linha"></div>
    <table width="100%" style="margin-top: 12px;">
        <tr>
            <td width="57%">
                <span class="label">Local</span>
                <div class="input-box">{{ $user->city ?? 'Taquara' }} / {{ $user->state ?? 'RS' }}</div>
            </td>
            <td width="3%"></td>
            <td width="40%">
                <span class="label">Data da Solicitação</span>
                <div class="input-box">{{ now()->format('d/m/Y') }}</div>
            </td>
        </tr>
    </table>
</div>

{{-- ── SEÇÃO 4 — CONTROLE ──────────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">4</span> Controle do Diretório
</div>
<div class="section-body">
    <div class="uso-interno">
        <table width="100%">
            <tr>
                <td width="50%">
                    <span class="label">Cargo / Função Local</span>
                    <div class="input-box">{{ $user->membership?->role ?? 'Membro Comum' }}</div>
                </td>
                <td width="4%"></td>
                <td width="46%">
                    <span class="label">Status de Aprovação</span>
                    <div class="input-box">DEFERIDO / ATIVO</div>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="footer">
    Este documento é de uso institucional exclusivo do <strong>Partido Cidadania e Trabalho (PCT)</strong>.<br>
    PCT – Partido Cidadania e Trabalho &nbsp;|&nbsp; <strong>pct.social.br</strong> &nbsp;|&nbsp; movimento@pct.social.br
</div>

</body>
</html>
