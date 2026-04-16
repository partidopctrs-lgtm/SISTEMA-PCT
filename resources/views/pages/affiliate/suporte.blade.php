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
                <div class="card-premium">
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
                        <h3 class="text-lg font-black mb-6 uppercase tracking-widest text-pct-green">Status dos Chamados</h3>
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center justify-between text-sm py-2">
                                <span class="opacity-60 font-medium">Chamados Abertos</span>
                                <span class="font-bold">0</span>
                            </div>
                            <div class="flex items-center justify-between text-sm py-2">
                                <span class="opacity-60 font-medium">Em Resolução</span>
                                <span class="font-bold">0</span>
                            </div>
                        </div>
                        <p class="text-[10px] text-blue-200 font-bold leading-relaxed mb-6">Tempo médio de resposta: <span class="text-white">24 horas úteis</span></p>
                        <div class="h-2 w-full bg-white/10 rounded-full">
                            <div class="h-full bg-pct-green w-[100%] rounded-full"></div>
                        </div>
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

                        <a href="mailto:contato@pct.org.br" class="flex items-center gap-4 p-4 text-gray-500 hover:text-pct-blue transition-colors">
                            <div class="text-left w-full">
                                <p class="text-[10px] font-black uppercase text-center border-t border-gray-100 pt-4">contato@pct.org.br</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
