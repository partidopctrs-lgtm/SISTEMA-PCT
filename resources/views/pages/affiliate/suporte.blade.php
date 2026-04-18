<x-dashboard-layout>
    <x-slot name="title">Suporte e Ajuda - PCT</x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Suporte e Ajuda</h1>
            <p class="text-gray-500 font-medium">Estamos aqui para apoiar sua jornada no movimento. Tire suas dúvidas ou abra um chamado.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Contact Channels -->
            <div class="lg:col-span-2 space-y-8">
            <!-- Contact Channels -->
            <div class="lg:col-span-2 space-y-8">
                <div class="card-premium">
                    <div class="flex gap-4 mb-8 border-b border-slate-50 pb-4">
                        <button onclick="switchTab('geral')" id="tab-geral" class="text-sm font-black uppercase tracking-widest text-pct-blue border-b-2 border-pct-blue pb-2 transition-all">Suporte Geral</button>
                        <button onclick="switchTab('legal')" id="tab-legal" class="text-sm font-black uppercase tracking-widest text-gray-400 border-b-2 border-transparent pb-2 hover:text-pct-blue transition-all">Canal Jurídico ⚖️</button>
                    </div>

                    <!-- Suporte Geral -->
                    <div id="content-geral">
                        <h3 class="text-xl font-bold text-pct-blue mb-6">Abrir um Chamado</h3>
                        <form action="#" method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Assunto</label>
                                    <select class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                                        <option>Dúvida sobre Filiação</option>
                                        <option>Problemas com a Escola PCT</option>
                                        <option>Sugestão de Atividade</option>
                                        <option>Suporte Técnico do Painel</option>
                                        <option>Outros</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Prioridade</label>
                                    <select class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                                        <option>Baixa</option>
                                        <option>Média</option>
                                        <option>Alta</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Mensagem</label>
                                <textarea rows="5" placeholder="Descreva sua solicitação em detalhes..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all resize-none"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="btn-primary px-12">Enviar Chamado</button>
                            </div>
                        </form>
                    </div>

                    <!-- Canal Jurídico -->
                    <div id="content-legal" class="hidden">
                        <div class="flex items-center gap-3 mb-6">
                            <h3 class="text-xl font-bold text-pct-blue">Solicitação Jurídica Oficial</h3>
                            <span class="px-3 py-1 bg-blue-50 text-pct-blue text-[9px] font-black rounded-full uppercase border border-blue-100">Hierarquia Local/Estadual/Nacional</span>
                        </div>
                        <form action="{{ route('affiliate.suporte.legal.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Título da Demanda</label>
                                    <input type="text" name="title" required placeholder="Ex: Dúvida sobre fundação de diretório" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tipo de Questão</label>
                                    <select name="request_type" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                                        <option value="legal_question">Dúvida Jurídica Geral</option>
                                        <option value="document_review">Revisão de Documento</option>
                                        <option value="internal_conflict">Conflito Interno / Disciplinar</option>
                                        <option value="compliance_issue">Questão de Conformidade</option>
                                        <option value="candidate_support">Apoio Jurídico a Candidato</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Prioridade de Urgência</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        @foreach(['low' => 'Baixa', 'medium' => 'Média', 'high' => 'Alta', 'urgent' => 'Urgente'] as $val => $label)
                                        <label class="flex items-center gap-3 p-4 border border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-50 transition-all">
                                            <input type="radio" name="priority" value="{{ $val }}" {{ $val == 'medium' ? 'checked' : '' }} class="text-pct-blue focus:ring-pct-blue">
                                            <span class="text-xs font-bold text-gray-600">{{ $label }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Descrição Detalhada</label>
                                <textarea name="description" rows="5" required placeholder="Forneça todos os detalhes necessários para que o jurídico possa analisar o caso..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all resize-none"></textarea>
                            </div>
                            <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100 flex items-start gap-4">
                                <svg class="w-5 h-5 text-amber-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p class="text-[10px] text-amber-900 font-bold leading-relaxed">Conforme o manual <span class="text-pct-blue">PCT-JUR-001</span>, sua solicitação será analisada inicialmente pelo jurídico local. Caso não haja resposta em 48h, será automaticamente escalada para o nível estadual.</p>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-pct-blue text-white font-black px-12 py-4 rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Protocolar Solicitação</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- FAQ Teaser -->
                <div class="card-premium">
                    <h3 class="text-xl font-bold text-pct-blue mb-8">Dúvidas Frequentes</h3>
                    <div class="space-y-4">
                        @foreach([
                            ['Como valido minha presença em um evento?', 'Basta apresentar o QR Code da sua carteirinha digital na entrada.'],
                            ['Como ganho mais pontos de mobilização?', 'Participando das missões semanais e indicando novos membros.'],
                            ['Posso criar um comitê na minha cidade?', 'Sim, entre em contato com a coordenação estadual através deste canal.']
                        ] as $faq)
                        <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 group cursor-pointer hover:bg-white hover:shadow-lg transition-all">
                            <h4 class="text-sm font-bold text-pct-blue mb-2 group-hover:text-pct-green">{{ $faq[0] }}</h4>
                            <p class="text-xs text-gray-500 font-medium leading-relaxed">{{ $faq[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Side Sidebar: Status & Direct Contact -->
            <div class="space-y-8">
                <div class="card-premium bg-gradient-to-br from-pct-blue to-blue-900 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-lg font-black mb-6 uppercase tracking-widest text-pct-green">Status Jurídico</h3>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center justify-between text-sm py-2">
                                <span class="opacity-60 font-medium">Solicitações Ativas</span>
                                <span class="font-bold">{{ $activeLegalRequests->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm py-2">
                                <span class="opacity-60 font-medium">Total Histórico</span>
                                <span class="font-bold">{{ $legalRequestsCount }}</span>
                            </div>
                        </div>
                        <p class="text-[10px] text-blue-200 font-bold leading-relaxed mb-6">SLA Nível Local: <span class="text-white">48 horas</span></p>
                        <div class="h-2 w-full bg-white/10 rounded-full">
                            <div class="h-full bg-pct-green w-[{{ $activeLegalRequests->count() > 0 ? 50 : 100 }}%] rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Manuais Institucionais -->
                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Manuais Oficiais</h3>
                    <div class="space-y-3">
                        @foreach([
                            ['Jurídico', route('manual.legal'), 'bg-blue-50 text-pct-blue'],
                            ['Diretórios', route('manual.directories'), 'bg-emerald-50 text-pct-green'],
                            ['Governança', route('manual.governance'), 'bg-red-50 text-red-600'],
                            ['Expansão', route('manual.expansion'), 'bg-amber-50 text-amber-600'],
                            ['Mobilização', route('manual.mobilization'), 'bg-blue-50 text-blue-600'],
                            ['Ética', route('manual.ethics'), 'bg-indigo-50 text-indigo-600'],
                            ['Disciplinar', route('manual.disciplinary'), 'bg-slate-50 text-gray-400']
                        ] as $doc)
                        <a href="{{ $doc[1] }}" class="flex items-center justify-between p-3 {{ $doc[2] }} rounded-xl font-bold text-[10px] uppercase tracking-widest hover:scale-[1.02] transition-all">
                            {{ $doc[0] }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Canais Diretos</h3>
                    <div class="space-y-4">
                        <a href="https://wa.me/5551933806899" target="_blank" class="flex items-center gap-4 p-4 bg-emerald-50 text-emerald-700 rounded-2xl group hover:bg-emerald-100 transition-all">
                            <div class="h-10 w-10 bg-white text-pct-green rounded-xl flex items-center justify-center shadow-sm">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .004 5.408.001 12.045a11.811 11.811 0 001.591 5.976L0 24l6.117-1.604a11.83 11.83 0 005.93 1.597h.005c6.634 0 12.043-5.408 12.043-12.045a11.81 11.81 0 00-3.52-8.511z"></path></svg>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-black">Suporte WhatsApp</p>
                                <p class="text-[10px] opacity-70 font-bold uppercase">Atendimento Direto</p>
                            </div>
                        </a>

                        <a href="https://chat.whatsapp.com/Hw91zhGHumI5gtKM6S41OX" target="_blank" class="flex items-center gap-4 p-4 bg-blue-50 text-blue-700 rounded-2xl group hover:bg-blue-100 transition-all border border-blue-100">
                            <div class="h-10 w-10 bg-white text-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-black text-blue-900">Grupo de Discussão</p>
                                <p class="text-[10px] opacity-70 font-bold uppercase">Comunidade no WhatsApp</p>
                            </div>
                        </a>

                        <a href="https://www.facebook.com/share/g/1AxgCCJ8Mu/" target="_blank" class="flex items-center gap-4 p-4 bg-slate-50 text-slate-700 rounded-2xl group hover:bg-white border border-slate-100 transition-all hover:shadow-md">
                            <div class="h-10 w-10 bg-blue-600 text-white rounded-xl flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                <span class="font-black text-xs italic">f</span>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-black text-slate-900">Grupo Facebook</p>
                                <p class="text-[10px] opacity-70 font-bold uppercase">Fórum do Movimento</p>
                            </div>
                        </a>

                        <a href="mailto:contato@pct.social.br" class="flex items-center gap-4 p-4 text-gray-500 hover:text-pct-blue transition-colors">
                            <div class="text-left w-full">
                                <p class="text-[10px] font-black uppercase text-center border-t border-gray-100 pt-4">contato@pct.social.br</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function switchTab(tab) {
            const contentGeral = document.getElementById('content-geral');
            const contentLegal = document.getElementById('content-legal');
            const tabGeral = document.getElementById('tab-geral');
            const tabLegal = document.getElementById('tab-legal');

            if (tab === 'geral') {
                contentGeral.classList.remove('hidden');
                contentLegal.classList.add('hidden');
                tabGeral.classList.add('text-pct-blue', 'border-pct-blue');
                tabGeral.classList.remove('text-gray-400', 'border-transparent');
                tabLegal.classList.remove('text-pct-blue', 'border-pct-blue');
                tabLegal.classList.add('text-gray-400', 'border-transparent');
            } else {
                contentGeral.classList.add('hidden');
                contentLegal.classList.remove('hidden');
                tabLegal.classList.add('text-pct-blue', 'border-pct-blue');
                tabLegal.classList.remove('text-gray-400', 'border-transparent');
                tabGeral.classList.remove('text-pct-blue', 'border-pct-blue');
                tabGeral.classList.add('text-gray-400', 'border-transparent');
            }
        }
    </script>
</x-dashboard-layout>

