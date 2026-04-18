<x-dashboard-layout>
    <x-slot name="title">Central de Documentos - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6 no-print">
        <div>
            <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Repositório Oficial</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Central de Documentos</h1>
            <p class="text-gray-500 font-medium">Acesse atas, estatutos, modelos de ofícios e documentos institucionais.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 h-[calc(100vh-250px)]">
        <!-- Lista de Documentos (Esquerda) -->
        <div class="lg:col-span-4 space-y-6 overflow-y-auto pr-2 no-print" id="doc-list-container">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm mb-4" style="border-top: 4px solid {{ $portals[$currentPortal]['color'] }}">
                <h2 class="text-xl font-black text-pct-blue tracking-tight">{{ $portals[$currentPortal]['name'] }}</h2>
                <p class="text-[10px] text-gray-500 font-medium uppercase mt-1">{{ $portals[$currentPortal]['desc'] }}</p>
            </div>

            @foreach($portals[$currentPortal]['categories'] as $catName => $docs)
                <div class="space-y-3">
                    <h3 class="text-[9px] font-black text-gray-400 uppercase tracking-widest pl-2">{{ $catName }}</h3>
                    <div class="grid grid-cols-1 gap-3">
                        @foreach($docs as $doc)
                            <div class="bg-white p-4 rounded-2xl border border-slate-100 hover:border-pct-blue hover:shadow-lg transition-all group cursor-pointer"
                                 onclick="openDocument('{{ $doc['tpl'] }}', '{{ $doc['name'] }}', '{{ $portals[$currentPortal]['color'] }}')">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="p-1.5 bg-slate-50 rounded-lg text-pct-blue group-hover:bg-pct-blue group-hover:text-white transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <span class="text-[8px] font-black uppercase px-2 py-0.5 {{ $doc['status'] === 'Aprovado' ? 'bg-emerald-100 text-emerald-600' : 'bg-amber-100 text-amber-600' }} rounded-md">
                                        {{ $doc['status'] }}
                                    </span>
                                </div>
                                <h4 class="text-xs font-black text-pct-blue truncate">{{ $doc['name'] }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Visualizador Lateral (Direita) -->
        <div class="lg:col-span-8 bg-white rounded-3xl border border-slate-100 shadow-xl overflow-hidden flex flex-col" id="doc-viewer">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between bg-slate-50 no-print" id="viewer-header">
                <h3 id="modal-title" class="text-[10px] font-black text-pct-blue uppercase tracking-widest">Documento</h3>
                <div class="flex gap-2 modal-header-btns">
                    <button onclick="window.print()" class="p-2 bg-pct-blue text-white rounded-lg hover:bg-blue-900 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    </button>
                </div>
            </div>
            <div id="modal-body" class="p-12 overflow-y-auto flex-grow doc-render bg-white">
                <div class="flex flex-col items-center justify-center h-full text-center text-gray-400 no-print" id="empty-state">
                    <svg class="w-16 h-16 mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <p class="text-sm font-medium">Clique em um documento para visualizar</p>
                </div>
                <div id="doc-content" class="hidden"></div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800;900&family=Barlow:wght@400;500;600;700&display=swap');

        .doc-render { font-family: 'Barlow', sans-serif; color: #111; line-height: 1.6; background: #fff; }
        .doc-render h1 { font-family: 'Barlow Condensed', sans-serif; font-size: 24px; font-weight: 900; color: #1B4FA8; text-align: center; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 4px; }
        .doc-render h2 { font-family: 'Barlow Condensed', sans-serif; font-size: 15px; font-weight: 800; color: #1B4FA8; text-transform: uppercase; letter-spacing: 1px; margin: 16px 0 8px; border-bottom: 2px solid #E8A800; padding-bottom: 4px; }
        .doc-render .subtitle { text-align: center; font-size: 11px; color: #666; margin-bottom: 18px; letter-spacing: 1px; font-weight: 600; }
        .doc-render .doc-body-text { text-align: justify; color: #222; margin-bottom: 10px; font-size: 12.5px; }
        
        .doc-render .header-doc { display: flex; align-items: flex-start; justify-content: space-between; border-bottom: 2.5px solid #1B4FA8; padding-bottom: 12px; margin-bottom: 16px; }
        .doc-render .hd-org { font-family: 'Barlow Condensed', sans-serif; font-size: 14px; font-weight: 900; color: #1B4FA8; text-transform: uppercase; }
        .doc-render .hd-sub { font-size: 10px; color: #666; font-weight: 500; }
        
        .doc-render .field-row { display: flex; gap: 14px; margin-bottom: 8px; }
        .doc-render .field { flex: 1; border-bottom: 1.5px solid #ddd; padding-bottom: 3px; position: relative; }
        .doc-render .field label { display: block; font-size: 9px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: #1B4FA8; margin-bottom: 2px; }
        .doc-render .field [contenteditable="true"] { font-family: 'Barlow Condensed', sans-serif; font-size: 14px; font-weight: 700; color: #111; min-height: 20px; display: block; outline: none; }
        .doc-render .field [contenteditable="true"]:empty:before { content: ".................................................."; color: #ccc; }
        .doc-render .field [contenteditable="true"]:focus { background: #f0f7ff; border-radius: 4px; }

        .doc-render .sig-row { display: flex; gap: 24px; margin-top: 30px; }
        .doc-render .sig { flex: 1; border-top: 2px solid #333; padding-top: 6px; text-align: center; }
        .doc-render .sig-name { font-size: 12px; font-weight: 800; color: #1B4FA8; }
        .doc-render .sig-role { font-size: 10px; color: #666; font-weight: 600; }

        .doc-render table { width: 100%; border-collapse: collapse; margin: 12px 0; font-size: 11.5px; }
        .doc-render table th { background: #1B4FA8; color: #fff; padding: 6px 10px; text-align: left; font-size: 10.5px; font-weight: 800; letter-spacing: 0.5px; text-transform: uppercase; }
        .doc-render table td { padding: 6px 10px; border-bottom: 1px solid #eee; color: #222; }
        .doc-render table tr:nth-child(even) td { background: #f8faff; }

        .brasil-bar { height: 5px; background: linear-gradient(90deg, #1B4FA8 33%, #228B2F 33%, #228B2F 66%, #E8A800 66%); margin-bottom: 14px; border-radius: 2px; }
        .info-box { background: #f0f4ff; border: 1px solid #b0c0e8; border-radius: 6px; padding: 12px 16px; margin: 12px 0; font-size: 11.5px; color: #222; }
        .info-box strong { color: #1B4FA8; font-weight: 800; }

        @media print {
            .no-print { display: none !important; }
            main { margin: 0 !important; padding: 0 !important; }
            .lg\:col-span-8 { width: 100% !important; border: none !important; box-shadow: none !important; }
            .doc-render { padding: 20mm !important; }
            .brasil-bar { display: block !important; -webkit-print-color-adjust: exact; }
            .doc-render [contenteditable="true"]:empty:before { content: "______________________________"; color: #000; }
        }
    </style>

    @push('scripts')
    <script>
        const TEMPLATES = {
            manifesto: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Movimento Cidadania e Trabalho</div><div class="hd-sub">Diretório Municipal de Taquara – RS</div></div><div style="font-size:10px;color:#888;text-align:right;">Versão 1.0 · Abril/2026<br>Código: PCT-INST-001</div></div><h1>Manifesto do Movimento</h1><p class="subtitle">PCT – Unir · Defender · Transformar</p><h2>Nossa Declaração</h2><p class="doc-body-text">O PCT – Movimento Cidadania e Trabalho nasce da convicção de que a política deve servir ao povo. Somos um movimento de cidadãos comprometidos com a transformação da realidade municipal, guiados pelos valores da ética, da participação democrática e do desenvolvimento social.</p><h2>Nossas Causas</h2><div class="info-box"><strong>1. Cidadania ativa:</strong> Todo cidadão tem o direito e o dever de participar das decisões que afetam sua comunidade.<br><strong>2. Trabalho digno:</strong> Defendemos políticas que gerem emprego, renda e desenvolvimento econômico local.<br><strong>3. Transparência:</strong> Exigimos gestão pública honesta, transparente e responsável.</div><h2>Nosso Compromisso</h2><p class="doc-body-text">Comprometemo-nos a atuar com integridade, ouvir a população, defender os direitos fundamentais e construir pontes entre cidadãos e poder público.</p><div class="sig-row"><div class="sig" style="margin-top:30px;"><div class="sig-name">Marcos V. Dresbach do Amaral</div><div class="sig-role">Presidente – PCT Taquara/RS</div></div></div>`,

            missao: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Movimento Cidadania e Trabalho</div><div class="hd-sub">Missão, Visão e Valores Institucionais</div></div><div style="font-size:10px;color:#888;text-align:right;">Versão 1.0 · Abril/2026<br>Código: PCT-INST-002</div></div><h1>Missão, Visão e Valores</h1><h2>Missão</h2><p class="doc-body-text">Promover a cidadania ativa, incentivar a participação social e política, desenvolver ações educacionais e comunitárias, fomentando a formação de lideranças comprometidas com princípios éticos, democráticos e sociais.</p><h2>Visão</h2><p class="doc-body-text">Ser referência em formação política e cidadã no município de Taquara e região, consolidando-se como um movimento plural, ético e transformador da realidade local.</p><h2>Valores</h2><table><tr><th>Valor</th><th>Descrição</th></tr><tr><td><strong>Legalidade</strong></td><td>Atuação dentro dos marcos legais e constitucionais</td></tr><tr><td><strong>Moralidade</strong></td><td>Conduta ética e íntegra em todas as ações</td></tr><tr><td><strong>Transparência</strong></td><td>Prestação de contas e acesso público às informações</td></tr><tr><td><strong>Participação</strong></td><td>Democracia interna e escuta ativa dos membros</td></tr><tr><td><strong>Dignidade</strong></td><td>Respeito incondicional à pessoa humana</td></tr></table>`,

            carta_principios: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Movimento Cidadania e Trabalho</div><div class="hd-sub">Carta de Princípios</div></div><div style="font-size:10px;color:#888;text-align:right;">Versão 1.0 · Abril/2026<br>Código: PCT-INST-003</div></div><h1>Carta de Princípios</h1><p class="doc-body-text">O PCT fundamenta sua atuação nos seguintes princípios inegociáveis:</p><div class="info-box"><strong>Art. 1º — Democracia:</strong> O PCT defende a democracy plena como único sistema legítimo de organização política.<br><br><strong>Art. 2º — Igualdade:</strong> Todos os cidadãos são iguais em direitos e deveres, sem distinção de raça, gênero, religião ou origem.<br><br><strong>Art. 3º — Participação:</strong> A participação popular é condição essencial para a legitimidade de qualquer decisão política.<br><br><strong>Art. 4º — Responsabilidade:</strong> Todo dirigente responde por seus atos perante os membros e a sociedade.</div><div class="sig-row"><div class="sig" style="margin-top:30px;"><div class="sig-name">Marcos V. Dresbach do Amaral</div><div class="sig-role">Presidente</div></div><div class="sig" style="margin-top:30px;"><div class="sig-name">[Secretário(a) Geral]</div><div class="sig-role">Secretário(a) Geral</div></div></div>`,

            regimento: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Movimento Cidadania e Trabalho</div><div class="hd-sub">Regimento Interno</div></div><div style="font-size:10px;color:#888;text-align:right;">Versão 1.0 · Abril/2026<br>Código: PCT-ADM-001</div></div><h1>Regimento Interno</h1><h2>Capítulo I – Disposições Gerais</h2><p class="doc-body-text art"><strong>Art. 1º</strong> – O presente Regimento Interno disciplina o funcionamento operacional do PCT, complementando o Estatuto Social.</p><p class="doc-body-text art"><strong>Art. 2º</strong> – As reuniões da Diretoria Executiva realizar-se-ão quinzenalmente, em data e local definidos pelo Presidente.</p><h2>Capítulo II – Das Reuniões</h2><p class="doc-body-text art"><strong>Art. 3º</strong> – O quórum mínimo para deliberações é de maioria simples (50%+1) dos membros da Diretoria.</p><p class="doc-body-text art"><strong>Art. 4º</strong> – As decisões serão registradas em ata, assinada por todos os presentes.</p><h2>Capítulo III – Das Responsabilidades</h2><p class="doc-body-text art"><strong>Art. 5º</strong> – Cada dirigente é responsável pelas ações de sua área, devendo prestar contas mensalmente.</p>`,

            ata_fundacao: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Diretório Municipal de Taquara/RS</div><div class="hd-sub">Ata de Fundação do Diretório</div></div><div style="font-size:10px;color:#888;text-align:right;">Código: PCT-DIR-001<br>Aprovado: Abril/2026</div></div><h1>Ata de Fundação do Diretório</h1><p class="doc-body-text">Aos <span contenteditable="true">_____</span> dias do mês de <span contenteditable="true">____________</span> de 2026, reuniram-se os signatários abaixo, com o objetivo de fundar o Diretório Municipal do PCT – Movimento Cidadania e Trabalho, com sede no município de Taquara, Estado do Rio Grande do Sul.</p><h2>Deliberações</h2><p class="doc-body-text art"><strong>1.</strong> Aprovação da constituição do Diretório Municipal de Taquara/RS.</p><p class="doc-body-text art"><strong>2.</strong> Eleição da Diretoria Executiva provisória.</p><p class="doc-body-text art"><strong>3.</strong> Aprovação do Plano Local de Atuação.</p><h2>Fundadores</h2><table><tr><th>Nome</th><th>CPF</th><th>Cargo</th><th>Assinatura</th></tr><tr><td>Marcos V. Dresbach do Amaral</td><td>___.___.___-__</td><td>Presidente</td><td></td></tr><tr><td><span contenteditable="true"></span></td><td><span contenteditable="true"></span></td><td><span contenteditable="true"></span></td><td></td></tr></table><div class="sig-row"><div class="sig" style="margin-top:20px;"><div class="sig-name">Marcos V. Dresbach do Amaral</div><div class="sig-role">Presidente Fundador</div></div></div>`,

            estatuto: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Movimento Cidadania e Trabalho</div><div class="hd-sub">Estatuto Social – Versão Oficial</div></div><div style="font-size:10px;color:#888;text-align:right;">Código: PCT-JUR-002<br>Aprovado: Abril/2026</div></div><h1>Estatuto Social</h1><p class="subtitle">PCT – Unir · Defender · Transformar · Sede: Taquara/RS</p><h2>Capítulo I – Da Denominação e Finalidade</h2><p class="doc-body-text art"><strong>Art. 1º</strong> – O PCT é uma associação civil de direito privado, sem fins lucrativos, com sede em Taquara/RS, constituída por prazo indeterminado.</p><p class="doc-body-text art"><strong>Art. 2º</strong> – Tem por finalidade promover a cidadania, incentivar a participação social e política e desenvolver ações educacionais e comunitárias.</p><p class="doc-body-text art"><strong>Art. 4º</strong> – O PCT não possui fins lucrativos, sendo vedada a distribuição de lucros a seus membros.</p><p class="doc-body-text art"><strong>Art. 5º</strong> – O PCT não possui natureza de partido político, atuando como organização da sociedade civil.</p><h2>Capítulo II – Dos Princípios</h2><p class="doc-body-text art"><strong>Art. 6º</strong> – O PCT orienta suas atividades pelos princípios da legalidade, moralidade, transparência, ética e responsabilidade social.</p><h2>Capítulo III – Dos Membros</h2><p class="doc-body-text art"><strong>Art. 8º</strong> – Poderão integrar o PCT todas as pessoas físicas maiores de 16 anos.</p><p class="doc-body-text art"><strong>Art. 9º</strong> – A admissão de novos membros será realizada mediante cadastro formal e aprovação da Diretoria Executiva.</p>`,

            termo_filiacao: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Jurídico · Compliance</div><div class="hd-sub">Termo de Filiação</div></div><div style="font-size:10px;color:#888;text-align:right;">Código: PCT-JUR-COMP-001</div></div><h1>Termo de Filiação</h1><div class="field-row"><div class="field"><label>Nome</label><span contenteditable="true"></span></div><div class="field"><label>CPF</label><span contenteditable="true"></span></div></div><div class="field-row"><div class="field"><label>Data de Nascimento</label><span contenteditable="true"></span></div><div class="field"><label>Naturalidade</label><span contenteditable="true"></span></div></div><h2>Declaração</h2><div class="info-box">Eu, identificado(a) acima, declaro meu desejo de filiar-me ao PCT – Movimento Cidadania e Trabalho, afirmando que:<br><br>1. Li e aceito integralmente o Estatuto Social do PCT;<br>2. Comprometo-me a cumprir as decisões da Assembleia Geral e da Diretoria Executiva;<br>3. Atuarei com ética e respeito aos princípios do Movimento;<br>4. Estou ciente de que meus dados serão tratados conforme a LGPD.</div><div class="sig-row"><div class="sig" style="margin-top:30px;"><div class="sig-name">[Filiado(a)]</div><div class="sig-role">Assinatura</div></div><div class="sig" style="margin-top:30px;"><div class="sig-name">Marcos V. Dresbach do Amaral</div><div class="sig-role">Presidente</div></div></div>`,
            
            oficio: `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Movimento Cidadania e Trabalho</div><div class="hd-sub">Diretório Municipal de Taquara – RS</div></div><div style="font-size:10px;color:#888;text-align:right;">Ofício nº <span contenteditable="true">___</span>/2026<br>Taquara, <span contenteditable="true">___/___/2026</span></div></div><h1>Ofício</h1><div class="field-row"><div class="field"><label>Destinatário</label><span contenteditable="true"></span></div></div><div class="field-row"><div class="field"><label>Cargo</label><span contenteditable="true"></span></div><div class="field"><label>Instituição</label><span contenteditable="true"></span></div></div><h2>Assunto</h2><p class="doc-body-text"><strong>Ref.:</strong> <span contenteditable="true"></span></p><h2>Texto</h2><p class="doc-body-text">Senhor(a),</p><p class="doc-body-text" contenteditable="true">O PCT – Movimento Cidadania e Trabalho, por meio de sua Diretoria Executiva, vem respeitosamente a Vossa Senhoria ____________________________________________________________________________________________________________________________________</p><p class="doc-body-text">Certos de vossa atenção, subscrevemo-nos.</p><div class="sig-row"><div class="sig" style="margin-top:30px;"><div class="sig-name">Marcos V. Dresbach do Amaral</div><div class="sig-role">Presidente – PCT Diretório Taquara/RS</div></div></div>`,
        };

        function getGenericTemplate(name) {
            return `<div class="brasil-bar"></div><div class="header-doc"><div><div class="hd-org">PCT – Movimento Cidadania e Trabalho</div><div class="hd-sub">${name}</div></div><div style="font-size:10px;color:#888;text-align:right;">Versão 1.0 · Abril/2026</div></div><h1>${name}</h1><p class="subtitle">Documento em Processo de Elaboração Técnica</p><div class="field-row"><div class="field"><label>Responsável</label><span contenteditable="true"></span></div><div class="field"><label>Data</label><span contenteditable="true"></span></div></div><p class="doc-body-text" contenteditable="true">Digite o conteúdo do documento aqui...</p><div class="sig-row"><div class="sig" style="margin-top:30px;"><div class="sig-name"><span contenteditable="true"></span></div><div class="sig-role">Responsável</div></div><div class="sig" style="margin-top:30px;"><div class="sig-name">Marcos V. Dresbach do Amaral</div><div class="sig-role">Presidente</div></div></div>`;
        }

        function openDocument(tpl, name, color) {
            document.getElementById('empty-state').classList.add('hidden');
            document.getElementById('doc-content').classList.remove('hidden');
            document.getElementById('viewer-header').style.borderTop = `4px solid ${color}`;
            document.getElementById('modal-title').textContent = name;
            document.getElementById('doc-content').innerHTML = TEMPLATES[tpl] || getGenericTemplate(name);
            
            if (window.innerWidth < 1024) {
                document.getElementById('doc-viewer').scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>
    @endpush
</x-dashboard-layout>
