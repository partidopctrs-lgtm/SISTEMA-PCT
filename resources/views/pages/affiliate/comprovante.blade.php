@php
    $user = auth()->user();
    $pctId = $user->pct_id ?? 'PCT-' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
    $cargo = $user->role === 'admin' ? 'Presidente Fundador Nacional' : ($user->role === 'committee' ? 'Coordenador de Comitê' : 'Filiado');
    $diretorioNome = $user->committee_city ? strtoupper($user->committee_city) . ' – ' . strtoupper($user->state ?? '') : strtoupper($user->city ?? 'NACIONAL') . ' – ' . strtoupper($user->state ?? '');
    $cargoCompleto = strtoupper($cargo) . ($diretorioNome ? ' – DIRETÓRIO ' . $diretorioNome : '');
    $validade = '31 de Dezembro de ' . now()->addYears(2)->year;
    $emissao = now()->translatedFormat('d \d\e F \d\e Y');
    $dataFiliacao = $user->created_at->translatedFormat('F / Y');
    $nascimento = $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') : '__/__/____';
    $protocolo = 'PCT-FIL-' . now()->year . '-' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
@endphp

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Comprovante de Filiação — {{ $user->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Barlow:wght@300;400;500;600;700&family=Roboto+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0;}
        body{background:#f0f2f5;font-family:'Barlow',sans-serif;}

        .no-print {
            max-width: 660px;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-action {
            padding: 10px 20px;
            border-radius: 6px;
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.3s;
        }

        .btn-print { background: #1B4FA8; color: #fff; border: none; }
        .btn-print:hover { background: #0D3A8C; }
        .btn-back { background: #fff; color: #1B4FA8; border: 1px solid #1B4FA8; }
        .btn-back:hover { background: #f0f4ff; }

        .wrap{
            padding: 0 1.5rem 2.5rem;
            display:flex;flex-direction:column;align-items:center;gap:20px;
        }

        .doc{
            width:660px;
            background:#fff;
            border:2px solid #1B4FA8;
            border-radius:4px;
            overflow:hidden;
        }

        .brasil-top{
            height:6px;
            background:linear-gradient(90deg,#1B4FA8 0%,#1B4FA8 33%,#228B2F 33%,#228B2F 66%,#E8A800 66%,#E8A800 100%);
        }

        .doc-header{
            background:#1B4FA8;
            padding:10px 16px;
            display:flex;align-items:center;gap:14px;
        }
        .hdr-seal{
            width:56px;height:56px;border-radius:50%;
            background:#fff;border:3px solid #E8A800;
            display:flex;flex-direction:column;align-items:center;justify-content:center;
            flex-shrink:0;gap:1px;
        }
        .seal-pct{font-family:'Barlow Condensed',sans-serif;font-size:20px;font-weight:900;color:#1B4FA8;line-height:1;letter-spacing:-1px;}
        .seal-pct span{color:#E8A800;}
        .seal-stars{display:flex;gap:2px;margin-bottom:1px;}
        .s-star{width:6px;height:6px;background:#E8A800;clip-path:polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%);}
        .hdr-text{flex:1;}
        .hdr-org{font-family:'Barlow Condensed',sans-serif;font-size:16px;font-weight:900;color:#fff;text-transform:uppercase;letter-spacing:0.5px;line-height:1.1;}
        .hdr-sub{font-family:'Barlow',sans-serif;font-size:10px;color:rgba(255,255,255,0.75);letter-spacing:0.3px;margin-top:2px;}
        .hdr-right{text-align:right;}
        .hdr-cnpj{font-family:'Roboto Mono',monospace;font-size:9px;color:rgba(255,255,255,0.6);}
        .hdr-date{font-family:'Roboto Mono',monospace;font-size:10px;color:#E8A800;font-weight:700;}

        .title-bar{
            background:#228B2F;
            padding:7px 16px;
            display:flex;align-items:center;justify-content:space-between;
        }
        .doc-title{
            font-family:'Barlow Condensed',sans-serif;
            font-size:20px;font-weight:900;color:#fff;
            text-transform:uppercase;letter-spacing:1px;
        }
        .doc-num{
            font-family:'Roboto Mono',monospace;
            font-size:11px;color:rgba(255,255,255,0.85);
            letter-spacing:1px;
        }

        .doc-body{padding:16px 18px;display:flex;flex-direction:column;gap:12px;}

        .declaration-text{
            font-family:'Barlow',sans-serif;font-size:12px;color:#111;
            line-height:1.65;text-align:justify;
            border-left:4px solid #1B4FA8;padding-left:12px;
        }
        .declaration-text strong{color:#1B4FA8;font-weight:700;}

        .fields-grid{
            display:grid;grid-template-columns:1fr 1fr;gap:0;
            border:1.5px solid #1B4FA8;border-radius:4px;overflow:hidden;
        }
        .fields-grid.three{grid-template-columns:1fr 1fr 1fr;}
        .field-cell{
            padding:7px 10px;
            border-right:1px solid #cdd8f0;
            border-bottom:1px solid #cdd8f0;
        }
        .field-cell:last-child { border-right: none; }
        .field-cell.full{grid-column:span 2; border-right: none;}
        .field-cell.header-row{
            background:#1B4FA8;padding:4px 10px;
            grid-column:span 2;border-right:none;border-bottom:1px solid #0D3A8C;
        }
        .fields-grid.three .field-cell.header-row{grid-column:span 3;}
        .header-row-lbl{
            font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:800;
            color:#fff;text-transform:uppercase;letter-spacing:2px;
        }
        .f-lbl{
            font-family:'Barlow',sans-serif;font-size:8px;font-weight:700;
            text-transform:uppercase;letter-spacing:1px;color:#1B4FA8;margin-bottom:2px;
        }
        .f-val{
            font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:700;color:#111;line-height:1.1;
        }
        .f-val.mono{font-family:'Roboto Mono',monospace;font-size:12px;}
        .f-val.sm{font-size:12px;}

        .statute-box{
            background:#f0f4ff;border:1px solid #b0c0e8;border-radius:4px;
            padding:8px 12px;
            font-family:'Barlow',sans-serif;font-size:10.5px;color:#2a2a4a;line-height:1.6;
        }
        .statute-box strong{color:#1B4FA8;}

        .sig-area{
            display:flex;justify-content:space-between;align-items:flex-end;gap:16px;
            margin-top:4px;
        }
        .sig-block{flex:1;display:flex;flex-direction:column;gap:2px;}
        .sig-line{border-top:1.5px solid #333;margin-top:36px;}
        .sig-name{font-family:'Barlow Condensed',sans-serif;font-size:12px;font-weight:700;color:#1B4FA8;text-align:center;margin-top:3px;}
        .sig-role{font-family:'Barlow',sans-serif;font-size:9px;color:#555;text-align:center;}
        .sig-divider{width:1px;height:60px;background:#ddd;flex-shrink:0;}

        .protocol-box{
            background:#1B4FA8;border-radius:4px;
            padding:8px 14px;
            display:flex;align-items:center;justify-content:space-between;gap:12px;
        }
        .prot-left{display:flex;flex-direction:column;gap:2px;}
        .prot-lbl{font-family:'Barlow',sans-serif;font-size:8px;color:rgba(255,255,255,0.6);letter-spacing:1.5px;text-transform:uppercase;}
        .prot-num{font-family:'Roboto Mono',monospace;font-size:13px;color:#E8A800;font-weight:700;letter-spacing:1.5px;}
        .prot-right{display:flex;flex-direction:column;align-items:flex-end;gap:4px;}
        .barcode{display:flex;gap:1.5px;height:28px;align-items:stretch;}
        .b-b{border-radius:0.5px;background:rgba(255,255,255,0.8);}
        .prot-barnum{font-family:'Roboto Mono',monospace;font-size:8px;color:rgba(255,255,255,0.5);letter-spacing:2px;}

        .doc-footer{
            background:#0D3A8C;padding:6px 16px;
            display:flex;align-items:center;justify-content:space-between;
        }
        .footer-txt{font-family:'Barlow',sans-serif;font-size:8px;color:rgba(255,255,255,0.65);line-height:1.5;}
        .footer-slogan{font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:800;color:#E8A800;letter-spacing:2px;text-transform:uppercase;white-space:nowrap;}

        @media print {
            body { background: #fff; }
            .no-print { display: none; }
            .wrap { padding: 0; }
            .doc { border: none; width: 100%; }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <a href="{{ route('affiliate.carteirinha') }}" class="btn-action btn-back">← Voltar</a>
        <button onclick="window.print()" class="btn-action btn-print">Imprimir Documento</button>
    </div>

    <div class="wrap">
        <div class="doc">
            <div class="brasil-top"></div>

            <!-- HEADER -->
            <div class="doc-header">
                <div class="hdr-seal">
                    <div class="seal-stars"><div class="s-star"></div><div class="s-star"></div><div class="s-star"></div></div>
                    <div class="seal-pct">P<span>C</span>T</div>
                </div>
                <div class="hdr-text">
                    <div class="hdr-org">PCT – Movimento Cidadania e Trabalho</div>
                    <div class="hdr-sub">Diretório {{ $user->committee_city ? 'Municipal de ' . $user->committee_city : 'Nacional' }} – {{ $user->state ?? 'BR' }}</div>
                    <div class="hdr-sub">Sede: {{ $user->city ?? 'Brasil' }} – {{ $user->state ?? '' }} &nbsp;|&nbsp; UNIR · DEFENDER · TRANSFORMAR</div>
                </div>
                <div class="hdr-right">
                    <div class="hdr-cnpj">CNPJ 00.000.000/0001-00</div>
                    <div class="hdr-date">{{ $user->city ?? 'Brasil' }}, {{ $emissao }}</div>
                </div>
            </div>

            <!-- TÍTULO -->
            <div class="title-bar">
                <div class="doc-title">Comprovante de Filiação</div>
                <div class="doc-num">Protocolo nº {{ $protocolo }}</div>
            </div>

            <div class="doc-body">
                <!-- TEXTO DECLARATÓRIO -->
                <div class="declaration-text">
                    O <strong>PCT – Movimento Cidadania e Trabalho</strong>, por meio de sua Diretoria Executiva, vem por meio deste instrumento <strong>DECLARAR E ATESTAR</strong> que o(a) cidadão(ã) identificado(a) abaixo encontra-se devidamente filiado(a) ao Movimento, tendo seu cadastro aprovado em conformidade com o <strong>Art. 9º do Estatuto Social</strong> do PCT, estando em pleno gozo de seus direitos como membro.
                </div>

                <!-- DADOS DO FILIADO -->
                <div class="fields-grid">
                    <div class="field-cell header-row">
                        <span class="header-row-lbl">Dados do Filiado</span>
                    </div>
                    <div class="field-cell full">
                        <div class="f-lbl">Nome Completo</div>
                        <div class="f-val">{{ $user->name }}</div>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">CPF</div>
                        <div class="f-val mono">{{ $user->cpf ?? '---.---.---' }}</div>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">Data de Nascimento</div>
                        <div class="f-val sm">{{ $nascimento }}</div>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">Naturalidade</div>
                        <div class="f-val sm">{{ $user->city ?? '---' }} – {{ $user->state ?? '--' }}</div>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">Nacionalidade</div>
                        <div class="f-val sm">{{ $user->nationality ?? 'Brasileiro(a)' }}</div>
                    </div>
                </div>

                <!-- DADOS DA FILIAÇÃO -->
                <div class="fields-grid three">
                    <div class="field-cell header-row">
                        <span class="header-row-lbl">Dados da Filiação</span>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">Nº de Registro</div>
                        <div class="f-val mono">{{ $pctId }}</div>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">Data de Filiação</div>
                        <div class="f-val sm">{{ $dataFiliacao }}</div>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">Validade</div>
                        <div class="f-val sm">{{ $validade }}</div>
                    </div>
                    <div class="field-cell" style="grid-column:span 2;">
                        <div class="f-lbl">Cargo / Função no Movimento</div>
                        <div class="f-val">{{ $cargoCompleto }}</div>
                    </div>
                    <div class="field-cell">
                        <div class="f-lbl">Situação</div>
                        <div class="f-val" style="color:#228B2F;">ATIVO</div>
                    </div>
                </div>

                <!-- BASE LEGAL -->
                <div class="statute-box">
                    <strong>Base Legal:</strong> Art. 8º – Poderão integrar o PCT todas as pessoas físicas maiores de 16 anos que manifestarem interesse em participar do movimento e aceitarem integralmente as disposições deste Estatuto. Art. 9º – A admissão de novos membros será realizada mediante cadastro formal e aprovação da Diretoria Executiva. Art. 10º – Os membros do PCT possuem direito de participar das atividades, votar e ser votados, apresentar propostas e solicitar informações sobre a gestão do movimento.
                </div>

                <!-- ASSINATURAS -->
                <div class="sig-area">
                    <div class="sig-block">
                        <div class="sig-line"></div>
                        <div class="sig-name">MARCOS VINICIUS DRESBACH</div>
                        <div class="sig-role">Presidente Nacional – PCT</div>
                    </div>
                    <div class="sig-divider"></div>
                    <div class="sig-block">
                        <div class="sig-line"></div>
                        <div class="sig-name">{{ $user->name }}</div>
                        <div class="sig-role">Assinatura do Filiado</div>
                    </div>
                </div>

                <!-- PROTOCOLO -->
                <div class="protocol-box">
                    <div class="prot-left">
                        <span class="prot-lbl">Número de Protocolo</span>
                        <span class="prot-num">{{ $protocolo }}</span>
                        <span class="prot-lbl" style="margin-top:3px;">Emitido em <span style="color:rgba(255,255,255,0.85);">{{ now()->format('d/m/Y H:i') }}</span></span>
                    </div>
                    <div class="prot-right">
                        <div class="barcode" id="barcode"></div>
                        <div class="prot-barnum">{{ str_replace('-', '', $protocolo) }}</div>
                    </div>
                </div>
            </div>

            <!-- RODAPÉ -->
            <div class="doc-footer">
                <div class="footer-txt">
                    Este documento tem validade como comprovante de filiação ao PCT – Movimento Cidadania e Trabalho.<br>
                    {{ $user->city ?? 'Brasil' }} – {{ $user->state ?? '' }} &nbsp;|&nbsp; Em caso de dúvidas, valide o protocolo no portal oficial.
                </div>
                <div class="footer-slogan">Unir · Defender · Transformar</div>
            </div>
            <div class="brasil-top"></div>
        </div>
    </div>

    <script>
        (function(){
            const bcs=[2,1,3,1,2,1,1,3,2,1,2,2,1,1,3,1,2,1,3,2,1,1,2,3,1,2,1,1,3,2,2,1,1];
            const bc=document.getElementById('barcode');
            if(!bc) return;
            bcs.forEach((w,i)=>{
                const b=document.createElement('div');
                b.className='b-b';
                b.style.width=w+'px';
                b.style.opacity=i%2===0?'1':'0';
                bc.appendChild(b);
            });
        })();
    </script>
</body>
</html>
