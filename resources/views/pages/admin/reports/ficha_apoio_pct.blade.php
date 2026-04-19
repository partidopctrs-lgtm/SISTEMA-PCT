{{-- resources/views/pages/admin/reports/ficha_apoio_pct.blade.php --}}
{{-- View para UMA ficha individual. Usada tanto no loop do lote quanto na ficha avulsa --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ficha de Apoio – PCT</title>
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

        /* ── QUEBRA DE PÁGINA (lote) ─────────────────────────────── */
        .page-break { page-break-after: always; }
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
            <div class="org-slogan">UNIR · DEFENDER · TRANSFORMAR</div>
            <div class="org-local">Taquara – Rio Grande do Sul</div>
        </td>
        <td class="ficha-num" width="130">
            <strong style="color:#1A3A6B;">Nº DE FICHA:</strong><br>
            <span class="ficha-num-val">{{ $sig->protocol_number }}</span><br>
            <small style="color:#999; font-size:7px;">Preenchimento interno</small>
        </td>
    </tr>
</table>

{{-- ── FAIXA TÍTULO ──────────────────────────────────────────────────── --}}
<div class="title-bar">
    <h1>Ficha de Apoio à Criação de Partido Político</h1>
    <p>Nos termos da Lei nº 9.096/1995 e Resoluções do Tribunal Superior Eleitoral</p>
</div>
<div class="barra-amarela"></div>

{{-- ── SEÇÃO 1 — IDENTIFICAÇÃO ──────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">1</span> Identificação do Apoiante
</div>
<div class="section-body">

    {{-- Nome --}}
    <span class="label">Nome completo</span>
    <div class="input-box input-grande">{{ $sig->full_name }}</div>

    {{-- CPF + Nascimento --}}
    <table width="100%">
        <tr>
            <td width="55%">
                <span class="label">CPF <small style="color:#999;font-weight:normal;">(recomendado)</small></span>
                <div class="input-box">{{ $sig->cpf ?? '___.___.___-__' }}</div>
            </td>
            <td width="3%"></td>
            <td width="42%">
                <span class="label">Data de nascimento <small style="color:#999;font-weight:normal;">(recomendada)</small></span>
                <div class="input-box">
                    {{ $sig->user && $sig->user->birth_date
                        ? \Carbon\Carbon::parse($sig->user->birth_date)->format('d/m/Y')
                        : '__/__/____' }}
                </div>
            </td>
        </tr>
    </table>

    {{-- Título de eleitor — destaque total --}}
    <span class="label">
        Título de eleitor
        <span class="label-obrig">★ OBRIGATÓRIO</span>
    </span>
    <div class="input-box input-grande" style="border-bottom: 3px solid #1A3A6B;">
        {{ $sig->voter_title ?? '________________' }}
    </div>

    {{-- Bloco Zona / Seção --}}
    <div class="bloco-zona">
        <div class="bloco-zona-titulo">▸ Zona e Seção Eleitorais — necessários para validação eleitoral</div>
        <table width="100%">
            <tr>
                <td width="48%">
                    <span class="label">Zona Eleitoral <span class="label-obrig">★</span></span>
                    <div class="input-box input-destaque">
                        {{ $sig->voter_zone ?? $sig->user?->voter_zone ?? '______' }}
                    </div>
                </td>
                <td width="4%"></td>
                <td width="48%">
                    <span class="label">Seção Eleitoral <span class="label-obrig">★</span></span>
                    <div class="input-box input-destaque">
                        {{ $sig->voter_section ?? $sig->user?->voter_section ?? '______' }}
                    </div>
                </td>
            </tr>
        </table>
    </div>

    {{-- Bloco Município / Estado --}}
    <div class="bloco-domicilio">
        <div class="bloco-domicilio-titulo">▸ Domicílio Eleitoral</div>
        <table width="100%">
            <tr>
                <td width="70%">
                    <span class="label">Município <span class="label-obrig">★</span></span>
                    <div class="input-box">{{ $sig->city ?? '______________________' }}</div>
                </td>
                <td width="3%"></td>
                <td width="27%">
                    <span class="label">Estado (UF) <span class="label-obrig">★</span></span>
                    <div class="input-box" style="text-align:center;">
                        {{ $sig->state ?? '__' }}
                    </div>
                </td>
            </tr>
        </table>
    </div>

</div>

{{-- ── SEÇÃO 2 — DECLARAÇÃO ─────────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">2</span> Declaração de Apoio
</div>
<div class="section-body">
    <div class="decl-box">
        Eu, eleitor(a) identificado(a) neste instrumento, portador(a) do título de eleitor acima
        referenciado, no pleno exercício de minha capacidade civil e eleitoral,
        <b>DECLARO, para os devidos fins legais, que apoio a criação do Partido Cidadania e
        Trabalho (PCT)</b>, nos termos do art. 7º e seguintes da Lei Federal nº 9.096, de 19 de
        setembro de 1995, bem como das normas expedidas pelo Tribunal Superior Eleitoral sobre
        a constituição de partidos políticos.<br><br>
        Declaro, ainda, estar em pleno gozo dos meus direitos políticos, nos termos da legislação
        vigente, e que as informações prestadas neste documento são verdadeiras, assumindo inteira
        responsabilidade civil e penal pelos dados fornecidos, conforme previsto na legislação
        eleitoral vigente.
    </div>
</div>

{{-- ── SEÇÃO 3 — ASSINATURA ────────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">3</span> Assinatura, Local e Data
</div>
<div class="section-body">

    <span class="label">Assinatura do eleitor(a) apoiante</span>
    <div class="ass-linha"></div>
    <div class="ass-nota">(assinatura conforme documento de identificação)</div>

    <table width="100%" style="margin-top: 12px;">
        <tr>
            <td width="57%">
                <span class="label">Local</span>
                <div class="input-box">{{ $sig->city ?? '__________________________' }}</div>
            </td>
            <td width="3%"></td>
            <td width="40%">
                <span class="label">Data</span>
                <div class="input-box">
                    {{ $sig->created_at ? $sig->created_at->format('d/m/Y') : '__/__/____' }}
                </div>
            </td>
        </tr>
    </table>

</div>

{{-- ── SEÇÃO 4 — USO INTERNO ───────────────────────────────────────── --}}
<div class="section-header">
    <span class="circle">4</span> Uso Interno — Controle de Protocolo
</div>
<div class="section-body">
    <div class="uso-interno">
        <div class="uso-titulo">Preenchimento exclusivo da equipe PCT</div>
        <table width="100%">
            <tr>
                <td width="31%">
                    <span class="label">Data de recebimento</span>
                    <div class="input-box">__/__/____</div>
                </td>
                <td width="3%"></td>
                <td width="38%">
                    <span class="label">Responsável pela coleta</span>
                    <div class="input-box"> </div>
                </td>
                <td width="3%"></td>
                <td width="25%">
                    <span class="label">Protocolo nº</span>
                    <div class="input-box">{{ $sig->protocol_number }}</div>
                </td>
            </tr>
        </table>
        <table width="100%" style="margin-top:4px;">
            <tr>
                <td width="48%">
                    <span class="label">Status</span>
                    <div class="input-box"> </div>
                </td>
                <td width="4%"></td>
                <td width="48%">
                    <span class="label">Núcleo / Regional</span>
                    <div class="input-box"> </div>
                </td>
            </tr>
        </table>
    </div>
</div>

{{-- ── RODAPÉ ───────────────────────────────────────────────────────── --}}
<div class="footer">
    Este documento destina-se exclusivamente ao processo de apoio à criação do
    <strong>Partido Cidadania e Trabalho (PCT)</strong>, nos termos da Lei nº 9.096/1995.<br>
    PCT – Partido Cidadania e Trabalho &nbsp;|&nbsp; Taquara – RS &nbsp;|&nbsp;
    <strong>pct.social.br</strong> &nbsp;|&nbsp; movimento@pct.social.br &nbsp;|&nbsp; (51) 93380-6899
</div>

</body>
</html>
