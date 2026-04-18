<div class="cert" style="width:680px; background:#fff; position:relative; overflow:hidden; font-family:'Barlow',sans-serif; min-height:500px; border:8px solid #1B4FA8; margin: 0 auto;">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Barlow:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,700;0,800;1,700;1,800&family=Roboto+Mono:wght@400;500;700&display=swap');
    </style>
    
    <!-- Bordas Internas -->
    <div style="position:absolute; inset:14px; border:2px solid #E8A800;"></div>
    <div style="position:absolute; inset:18px; border:0.5px solid rgba(27,79,168,0.25);"></div>

    <!-- Faixas Laterais -->
    <div style="position:absolute; top:0; left:0; bottom:0; width:48px; background:#1B4FA8; display:flex; align-items:center; justify-content:center;">
        <span style="font-family:'Barlow Condensed',sans-serif; font-size:9px; font-weight:800; letter-spacing:4px; color:rgba(255,255,255,0.7); text-transform:uppercase; writing-mode:vertical-rl; transform:rotate(180deg); white-space:nowrap;">
            Escola de Formação Política · PCT – Movimento Cidadania e Trabalho
        </span>
    </div>
    <div style="position:absolute; top:0; right:0; bottom:0; width:48px; background:#228B2F; display:flex; align-items:center; justify-content:center;">
        <span style="font-family:'Barlow Condensed',sans-serif; font-size:9px; font-weight:800; letter-spacing:4px; color:rgba(255,255,255,0.7); text-transform:uppercase; writing-mode:vertical-rl; transform:rotate(180deg); white-space:nowrap;">
            Taquara – Rio Grande do Sul · {{ date('Y') }}
        </span>
    </div>

    <!-- Conteúdo -->
    <div style="margin:0 48px; padding:22px 28px 20px; display:flex; flex-direction:column; align-items:center;">
        
        <!-- Cabeçalho -->
        <div style="width:100%; display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; border-bottom:1.5px solid #E8A800; padding-bottom:10px;">
            <div style="display:flex; flex-direction:column; align-items:center; gap:3px;">
                <div style="width:54px; height:54px; border-radius:50%; background:#1B4FA8; border:3px solid #E8A800; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <div style="font-family:'Barlow Condensed',sans-serif; font-size:19px; font-weight:900; color:#fff; line-height:1; letter-spacing:-1px;">P<span style="color:#E8A800;">C</span>T</div>
                </div>
                <div style="font-family:'Barlow Condensed',sans-serif; font-size:8px; font-weight:700; letter-spacing:1px; color:#1B4FA8; text-transform:uppercase; text-align:center;">PCT · Taquara/RS</div>
            </div>
            
            <div style="flex:1; text-align:center; padding:0 12px;">
                <div style="font-family:'Barlow Condensed',sans-serif; font-size:13px; font-weight:900; color:#1B4FA8; text-transform:uppercase; letter-spacing:1px; line-height:1.2;">PCT – Movimento Cidadania e Trabalho</div>
                <div style="font-family:'Playfair Display',serif; font-size:15px; font-weight:800; color:#0D3A8C; line-height:1.2; margin-top:3px;">Escola de Formação Política</div>
                <div style="font-family:'Barlow',sans-serif; font-size:9px; color:#E8A800; font-weight:700; letter-spacing:2px; text-transform:uppercase; margin-top:4px;">Unir · Defender · Transformar</div>
            </div>

            <div style="display:flex; flex-direction:column; align-items:flex-end; gap:2px;">
                <div style="font-family:'Roboto Mono',monospace; font-size:9px; color:#888; letter-spacing:0.5px;" data-field="num-label">Nº <span data-field="num">{{ $num ?? 'PCT-EFP-2026-001' }}</span></div>
                <div style="font-family:'Barlow',sans-serif; font-size:9px; color:#555;">Taquara – RS</div>
                <div style="font-family:'Barlow',sans-serif; font-size:9px; color:#555;">Turma {{ date('Y') }}</div>
            </div>
        </div>

        <!-- Título -->
        <div style="text-align:center; margin:8px 0 4px; width:100%;">
            <div style="font-family:'Playfair Display',serif; font-size:38px; font-weight:800; color:#1B4FA8; letter-spacing:6px; text-transform:uppercase; line-height:1;">Certificado</div>
            <div style="font-family:'Barlow Condensed',sans-serif; font-size:13px; font-weight:700; letter-spacing:3px; color:#E8A800; text-transform:uppercase; margin-top:4px;">de Conclusão de Curso</div>
        </div>

        <div style="display:flex; align-items:center; gap:8px; width:100%; margin:10px 0;">
            <div style="flex:1; height:1px; background:#1B4FA8; opacity:0.3;"></div>
            <div style="width:8px; height:8px; background:#E8A800; transform:rotate(45deg);"></div>
            <div style="flex:1; height:1px; background:#1B4FA8; opacity:0.3;"></div>
        </div>

        <div style="font-family:'Barlow',sans-serif; font-size:12px; color:#444; text-align:center; line-height:1.6; margin-bottom:6px;">
            A <strong>Escola de Formação Política do PCT – Movimento Cidadania e Trabalho</strong>, Diretório Municipal de Taquara/RS, certifica que
        </div>

        <div style="font-family:'Playfair Display',serif; font-size:30px; font-weight:700; font-style:italic; color:#0D3A8C; text-align:center; border-bottom:2px solid #1B4FA8; padding-bottom:4px; margin:4px 0 10px; width:100%;" data-field="nome">
            {{ $nome ?? 'Marcos Vinicius Dresbach do Amaral' }}
        </div>

        <div style="font-family:'Barlow',sans-serif; font-size:11.5px; color:#333; text-align:center; line-height:1.7; width:100%; margin-bottom:6px;">concluiu com êxito o curso de</div>

        <div style="background:#f0f4ff; border:1.5px solid #1B4FA8; border-radius:4px; padding:8px 20px; text-align:center; margin:4px 0 8px; width:100%;">
            <div style="font-family:'Barlow Condensed',sans-serif; font-size:17px; font-weight:900; color:#1B4FA8; text-transform:uppercase; letter-spacing:1px; line-height:1.2;" data-field="curso">{{ $curso ?? 'Formação Política e Cidadania' }}</div>
            <div style="font-family:'Barlow',sans-serif; font-size:10px; color:#555; margin-top:3px;" data-field="modulo">{{ $modulo ?? 'Módulo I — Fundamentos' }}</div>
        </div>

        <div style="font-family:'Barlow',sans-serif; font-size:11.5px; color:#333; text-align:center; line-height:1.7; width:100%; margin-bottom:6px;">
            promovido pela <strong>Escola de Formação Política do PCT</strong>, com carga horária de <em style="color:#1B4FA8; font-weight:700; font-style:normal;" data-field="ch">{{ $ch ?? '40 horas' }}</em>, realizado em <strong style="color:#1B4FA8; font-weight:700;" data-field="periodo">{{ $periodo ?? 'Março a Abril de 2026' }}</strong>, em conformidade com o <strong>Art. 2º do Estatuto Social do PCT</strong>.
        </div>

        <!-- Detalhes -->
        <div style="display:flex; justify-content:center; border:1px solid #cdd8f0; border-radius:4px; overflow:hidden; margin:6px 0 10px; width:100%;">
            <div style="flex:1; text-align:center; padding:6px 8px; border-right:1px solid #cdd8f0;">
                <div style="font-family:'Barlow',sans-serif; font-size:8px; font-weight:700; text-transform:uppercase; letter-spacing:1px; color:#1B4FA8;">Carga Horária</div>
                <div style="font-family:'Barlow Condensed',sans-serif; font-size:13px; font-weight:800; color:#111; margin-top:2px;" data-field="ch">{{ $ch ?? '40 horas' }}</div>
            </div>
            <div style="flex:1; text-align:center; padding:6px 8px; border-right:1px solid #cdd8f0;">
                <div style="font-family:'Barlow',sans-serif; font-size:8px; font-weight:700; text-transform:uppercase; letter-spacing:1px; color:#1B4FA8;">Conceito</div>
                <div style="font-family:'Barlow Condensed',sans-serif; font-size:13px; font-weight:800; color:#228B2F; margin-top:2px;" data-field="conc">{{ $conc ?? 'Aprovado(a)' }}</div>
            </div>
            <div style="flex:1; text-align:center; padding:6px 8px;">
                <div style="font-family:'Barlow',sans-serif; font-size:8px; font-weight:700; text-transform:uppercase; letter-spacing:1px; color:#1B4FA8;">Modalidade</div>
                <div style="font-family:'Barlow Condensed',sans-serif; font-size:13px; font-weight:800; color:#111; margin-top:2px;">{{ $modalidade ?? 'Presencial' }}</div>
            </div>
        </div>

        <!-- Assinaturas -->
        <div style="display:flex; justify-content:space-around; gap:16px; margin:8px 0 6px; width:100%;">
            <div style="flex:1; display:flex; flex-direction:column; align-items:center;">
                <div style="border-top:1.5px solid #333; width:100%; margin:28px 0 3px;"></div>
                <div style="font-family:'Barlow Condensed',sans-serif; font-size:10px; font-weight:700; color:#1B4FA8; text-align:center;">Marcos Vinicius Dresbach do Amaral</div>
                <div style="font-family:'Barlow',sans-serif; font-size:8px; color:#666; text-align:center;">Presidente – PCT Diretório Taquara/RS</div>
            </div>
            <div style="flex:1; display:flex; flex-direction:column; align-items:center;">
                <div style="border-top:1.5px solid #333; width:100%; margin:28px 0 3px;"></div>
                <div style="font-family:'Barlow Condensed',sans-serif; font-size:10px; font-weight:700; color:#1B4FA8; text-align:center;">{{ $coord ?? '[Coordenador(a)]' }}</div>
                <div style="font-family:'Barlow',sans-serif; font-size:8px; color:#666; text-align:center;">Coordenador(a) Escola de Formação</div>
            </div>
        </div>

        <!-- Rodapé -->
        <div style="width:100%; display:flex; align-items:center; justify-content:space-between; border-top:1px solid #E8A800; padding-top:8px; margin-top:4px;">
            <div style="display:flex; flex-direction:column; gap:1px;">
                <span style="font-family:'Barlow',sans-serif; font-size:7px; color:#999; text-transform:uppercase;">Protocolo de emissão</span>
                <span style="font-family:'Roboto Mono',monospace; font-size:9px; color:#1B4FA8; font-weight:700;" data-field="num-raw">{{ $num ?? 'PCT-EFP-2026-001' }}</span>
            </div>
            <div style="font-family:'Barlow',sans-serif; font-size:8px; color:#666; text-align:center;">
                Válido como comprovante de conclusão de curso junto ao PCT.
            </div>
            <div style="display:flex; flex-direction:column; align-items:flex-end;">
                <div style="font-family:'Roboto Mono',monospace; font-size:7px; color:#aaa; letter-spacing:1px;" data-field="bc-num">PCTEFP202600001</div>
            </div>
        </div>
    </div>
</div>
