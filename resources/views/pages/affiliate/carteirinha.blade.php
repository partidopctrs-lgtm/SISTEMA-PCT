@php
    $user = auth()->user();
    $pctId = $user->pct_id ?? 'PCT-' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
    $cargo = $user->role === 'admin' ? 'Presidente Fundador Nacional' : ($user->role === 'committee' ? 'Coordenador de Comitê' : 'Filiado');
    $diretorio = $user->committee_city ? strtoupper($user->committee_city) . '/' . strtoupper($user->state ?? '') : strtoupper($user->city ?? 'NACIONAL') . '/' . strtoupper($user->state ?? '');
    $cargoCompleto = strtoupper($cargo) . ($diretorio ? ' — DIRETÓRIO ' . $diretorio : '');
    $validade = now()->addYears(2)->format('m/Y');
    $emissao = now()->format('m/Y');
    $photoUrl = $user->photo ? asset('storage/' . $user->photo) : null;
@endphp

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carteirinha PCT — {{ $user->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Barlow:wght@300;400;500;600&family=Roboto+Mono:wght@400;500&family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;background:#1a1f2e;min-height:100vh;padding:2rem 1rem;}

        .page-header{
            max-width:800px;margin:0 auto 2rem;display:flex;align-items:center;justify-content:space-between;
        }
        .page-title{color:#fff;font-size:1.25rem;font-weight:900;letter-spacing:0.05em;}
        .page-title span{color:#E8A800;}
        .btn-back{color:rgba(255,255,255,0.5);font-size:0.75rem;font-weight:700;text-decoration:none;letter-spacing:0.1em;text-transform:uppercase;}
        .btn-back:hover{color:#E8A800;}

        /* Print button */
        .print-actions{
            max-width:800px;margin:0 auto 1.5rem;display:flex;gap:0.75rem;
        }
        .btn-print{
            padding:0.75rem 2rem;background:#E8A800;color:#0a0f1e;border:none;
            border-radius:8px;font-family:'Barlow Condensed',sans-serif;font-size:0.9rem;
            font-weight:800;letter-spacing:2px;text-transform:uppercase;cursor:pointer;
        }
        .btn-print:hover{background:#F5C200;}
        .btn-comp{
            padding:0.75rem 2rem;background:transparent;color:#E8A800;border:1px solid #E8A800;
            border-radius:8px;font-family:'Barlow Condensed',sans-serif;font-size:0.9rem;
            font-weight:800;letter-spacing:2px;text-transform:uppercase;cursor:pointer;
        }
        .btn-comp:hover{background:rgba(232,168,0,0.1);}

        .stage{
            display:flex;flex-direction:column;align-items:center;gap:32px;
            padding:2rem 1rem 2.5rem;background:#1a1f2e;border-radius:16px;
            max-width:420px;margin:0 auto;
        }
        .label-section{
            font-family:'Barlow',sans-serif;font-size:11px;font-weight:600;
            letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.3);
            width:100%;text-align:center;padding-bottom:8px;
            border-bottom:0.5px solid rgba(255,255,255,0.06);
        }
        .card{width:340px;height:214px;border-radius:12px;position:relative;overflow:hidden;flex-shrink:0;}
        .card-front{background:#0D3A8C;}
        .card-front::before{content:'';position:absolute;top:-40px;right:-30px;width:180px;height:300px;background:#1B4FA8;transform:rotate(15deg);opacity:0.6;}
        .card-front::after{content:'';position:absolute;top:0;right:0;width:8px;height:100%;background:#228B2F;}
        .gold-bar{position:absolute;top:0;left:0;right:0;height:5px;background:#E8A800;}
        .photo-box{position:absolute;top:22px;left:18px;width:68px;height:80px;background:#0a2a6e;border:2px solid #E8A800;border-radius:4px;display:flex;flex-direction:column;align-items:center;justify-content:center;overflow:hidden;}
        .photo-box img{width:100%;height:100%;object-fit:cover;}
        .photo-placeholder{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:4px;}
        .photo-icon{width:28px;height:28px;border-radius:50%;background:#1B4FA8;border:1.5px solid rgba(255,255,255,0.2);}
        .photo-body{width:36px;height:18px;border-radius:12px 12px 0 0;background:#1B4FA8;border:1.5px solid rgba(255,255,255,0.2);}
        .photo-text{font-family:'Barlow',sans-serif;font-size:8px;color:rgba(255,255,255,0.35);letter-spacing:0.5px;text-transform:uppercase;position:absolute;bottom:5px;}
        .front-logo{position:absolute;top:18px;left:100px;right:20px;display:flex;align-items:center;gap:8px;}
        .logo-pct{font-family:'Barlow Condensed',sans-serif;font-size:32px;font-weight:900;color:#fff;line-height:1;letter-spacing:-1px;}
        .logo-pct span{color:#E8A800;}
        .logo-stars{display:flex;gap:2px;margin-bottom:2px;}
        .star{width:8px;height:8px;background:#E8A800;clip-path:polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%);}
        .org-name{font-family:'Barlow',sans-serif;font-size:8.5px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:rgba(255,255,255,0.65);line-height:1.3;}
        .front-data{position:absolute;bottom:14px;left:100px;right:18px;}
        .field-label{font-family:'Barlow',sans-serif;font-size:7.5px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:#E8A800;margin-bottom:2px;}
        .field-value{font-family:'Barlow Condensed',sans-serif;font-size:15px;font-weight:700;color:#fff;letter-spacing:0.2px;margin-bottom:8px;line-height:1.1;}
        .field-value.cargo{font-size:11px;color:rgba(255,255,255,0.8);font-weight:600;letter-spacing:0.5px;}
        .reg-row{display:flex;align-items:center;gap:12px;position:absolute;bottom:14px;left:18px;width:72px;}
        .reg-badge{font-family:'Roboto Mono',monospace;font-size:8px;color:rgba(255,255,255,0.5);letter-spacing:0.5px;writing-mode:horizontal-tb;text-align:center;line-height:1.4;}
        .chip-row{position:absolute;bottom:14px;right:18px;display:flex;flex-direction:column;align-items:flex-end;gap:4px;}
        .validade-line{font-family:'Barlow',sans-serif;font-size:8px;color:rgba(255,255,255,0.45);letter-spacing:0.5px;}
        .val-date{font-family:'Roboto Mono',monospace;font-size:11px;color:rgba(255,255,255,0.8);font-weight:500;}
        /* VERSO */
        .card-back{background:#0a2458;}
        .card-back::after{content:'';position:absolute;top:0;left:0;right:0;height:5px;background:#228B2F;}
        .mag-stripe{position:absolute;top:28px;left:0;right:0;height:36px;background:#0a0f1e;}
        .sig-area{position:absolute;top:80px;left:18px;right:18px;height:36px;background:#fff;border-radius:3px;display:flex;align-items:center;padding:0 10px;gap:10px;}
        .sig-label{font-family:'Barlow',sans-serif;font-size:7px;font-weight:600;letter-spacing:1px;text-transform:uppercase;color:#888;min-width:50px;}
        .sig-line{flex:1;height:1px;background:repeating-linear-gradient(90deg,#ccc 0,#ccc 4px,transparent 4px,transparent 8px);}
        .sig-name{font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;color:#1B4FA8;font-style:italic;}
        .back-info{position:absolute;top:130px;left:18px;right:18px;}
        .back-org{font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:rgba(255,255,255,0.7);margin-bottom:4px;}
        .back-slogan{font-family:'Barlow',sans-serif;font-size:9px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:#E8A800;margin-bottom:8px;}
        .back-details{display:flex;justify-content:space-between;align-items:flex-end;}
        .back-detail-item{display:flex;flex-direction:column;gap:2px;}
        .back-detail-label{font-family:'Barlow',sans-serif;font-size:7.5px;color:rgba(255,255,255,0.35);letter-spacing:1px;text-transform:uppercase;}
        .back-detail-value{font-family:'Roboto Mono',monospace;font-size:10px;color:rgba(255,255,255,0.8);font-weight:500;}
        .barcode{display:flex;gap:1px;height:28px;align-items:stretch;}
        .b-bar{background:rgba(255,255,255,0.7);border-radius:0.5px;}
        .back-logo-row{display:flex;align-items:center;gap:6px;}
        .back-pct-badge{font-family:'Barlow Condensed',sans-serif;font-size:18px;font-weight:900;color:#fff;letter-spacing:-0.5px;}
        .back-pct-badge span{color:#E8A800;}
        .brasil-stripe{position:absolute;bottom:0;left:0;right:0;height:4px;background:linear-gradient(90deg,#1B4FA8 33%,#228B2F 33%,#228B2F 66%,#E8A800 66%);}

        /* Flip Card Logic */
        .card-perspective {
            perspective: 1000px;
            width: 340px;
            height: 214px;
            cursor: pointer;
            margin: 0 auto;
        }
        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }
        .card-perspective.is-flipped .card-inner {
            transform: rotateY(180deg);
        }
        .card-front, .card-back {
            position: absolute !important;
            width: 100% !important;
            height: 100% !important;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 12px;
            top: 0;
            left: 0;
            margin: 0 !important;
        }
        .card-back {
            transform: rotateY(180deg);
        }

        /* Adjustments for flip */
        .stage {
            padding: 2rem 1rem;
        }

        .flip-controls {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }

        .btn-flip {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-flip:hover {
            background: #E8A800;
            color: #0a0f1e;
            border-color: #E8A800;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(232, 168, 0, 0.3);
        }

        @media print {
            body { background: #fff !important; padding: 0 !important; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
            .no-print { display: none !important; }
            .stage { background: #fff !important; display: block !important; max-width: none !important; padding: 0 !important; }
            .card-perspective {
                perspective: none !important;
                width: 340px !important;
                height: auto !important;
                margin: 20px auto !important;
            }
            .card-inner {
                transform: none !important;
                transform-style: flat !important;
                height: auto !important;
            }
            .card {
                position: relative !important;
                display: block !important;
                transform: none !important;
                backface-visibility: visible !important;
                margin-bottom: 50px !important;
                page-break-inside: avoid !important;
                box-shadow: none !important;
                border: 0.5px solid #eee !important;
            }
            .card-back {
                transform: none !important;
                left: 0 !important;
                top: 0 !important;
            }
            .label-section { display: block !important; margin-bottom: 10px; color: #000 !important; font-weight: bold !important; border-bottom: 1px solid #eee !important; }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <div class="page-header">
            <p class="page-title">Carteirinha <span>PCT</span> Oficial</p>
            <a href="{{ route('affiliate.dashboard') }}" class="btn-back">← Voltar ao Painel</a>
        </div>
        <div class="print-actions">
            <button class="btn-print" onclick="window.print()">🖨️ Imprimir Carteirinha</button>
            <a href="{{ route('affiliate.carteirinha.comprovante') }}" class="btn-comp">📄 Comprovante</a>
            <a href="{{ route('affiliate.membership_form') }}" class="btn-comp">📝 Ficha de Apoio</a>
        </div>
    </div>

    <div class="stage">
        <div class="label-section no-print" id="side-label">Frente</div>

        <div class="card-perspective" id="card-trigger" onclick="toggleFlip()">
            <div class="card-inner" id="card-inner">
                <!-- FRENTE -->
                <div class="card card-front">
                    <div class="gold-bar"></div>

                    <!-- Foto -->
                    <div class="photo-box">
                        @if($photoUrl)
                            <img src="{{ $photoUrl }}" alt="Foto">
                        @else
                            <div class="photo-placeholder">
                                <div class="photo-icon"></div>
                                <div class="photo-body"></div>
                                <span class="photo-text">foto</span>
                            </div>
                        @endif
                    </div>

                    <!-- Registro -->
                    <div class="reg-row">
                        <div class="reg-badge">{{ substr($pctId, 0, 8) }}<br>{{ substr($pctId, 8) }}</div>
                    </div>

                    <!-- Logo -->
                    <div class="front-logo">
                        <div>
                            <div class="logo-stars">
                                <div class="star"></div><div class="star"></div><div class="star"></div>
                            </div>
                            <div class="logo-pct">P<span>C</span>T</div>
                            <div class="org-name">Movimento<br>Cidadania e Trabalho</div>
                        </div>
                    </div>

                    <!-- Dados -->
                    <div class="front-data">
                        <div class="field-label">Nome do Filiado</div>
                        <div class="field-value">{{ $user->name }}</div>
                        <div class="field-label">Cargo / Função</div>
                        <div class="field-value cargo">{{ Str::limit($cargoCompleto, 50) }}</div>
                    </div>

                    <!-- Validade -->
                    <div class="chip-row">
                        <div class="validade-line">VALIDADE</div>
                        <div class="val-date">{{ $validade }}</div>
                    </div>
                </div>

                <!-- VERSO -->
                <div class="card card-back">
                    <div class="mag-stripe"></div>

                    <div class="sig-area">
                        <span class="sig-label">Assinatura</span>
                        <div class="sig-line"></div>
                        <span class="sig-name">{{ implode(' ', array_slice(explode(' ', $user->name), 0, 3)) }}</span>
                    </div>

                    <div class="back-info">
                        <div class="back-org">PCT — {{ $diretorio ?: 'Coordenação Nacional' }}</div>
                        <div class="back-slogan">Unir · Defender · Transformar</div>
                        <div class="back-details">
                            <div class="back-logo-row">
                                <div class="back-pct-badge">P<span>C</span>T</div>
                            </div>
                            <div class="back-detail-item">
                                <span class="back-detail-label">Registro</span>
                                <span class="back-detail-value">{{ $pctId }}</span>
                            </div>
                            <div class="back-detail-item">
                                <span class="back-detail-label">Emissão</span>
                                <span class="back-detail-value">{{ $emissao }}</span>
                            </div>
                            <div class="barcode" id="barcode"></div>
                        </div>
                    </div>

                    <div class="brasil-stripe"></div>
                </div>
            </div>
        </div>

        <div class="flip-controls no-print">
            <button class="btn-flip" onclick="toggleFlip()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <span>Ver Verso da Carteirinha</span>
            </button>
        </div>
    </div>

    <script>
        let flipped = false;
        function toggleFlip() {
            flipped = !flipped;
            const card = document.getElementById('card-trigger');
            const label = document.getElementById('side-label');
            const btnSpan = document.querySelector('.btn-flip span');
            
            if (flipped) {
                card.classList.add('is-flipped');
                label.innerText = 'Verso';
                btnSpan.innerText = 'Ver Frente da Carteirinha';
            } else {
                card.classList.remove('is-flipped');
                label.innerText = 'Frente';
                btnSpan.innerText = 'Ver Verso da Carteirinha';
            }
        }

        function gerarBarcode() {
            const bc = document.getElementById('barcode');
            if(!bc) return;
            bc.innerHTML = '';
            const widths = [2,1,3,1,2,1,1,2,3,1,2,1,1,3,2,1,2,1,3,1,2,2,1,1,3,1,2,1];
            widths.forEach((w, i) => {
                const bar = document.createElement('div');
                bar.className = 'b-bar';
                bar.style.width = w + 'px';
                bar.style.opacity = i % 2 === 0 ? '0.9' : '0';
                bc.appendChild(bar);
            });
        }
        gerarBarcode();
    </script>
</body>
</html>
