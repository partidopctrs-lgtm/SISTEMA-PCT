<x-dashboard-layout>
    <x-slot name="title">Admin - Comunicação e Mobilização</x-slot>

    <div class="mb-12">
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Comunicação e Mobilização</h1>
        <p class="text-gray-500 font-medium mt-1">Ferramentas de disparo em massa, gestão de campanhas e engajamento da base.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Central de Disparos -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-100 bg-slate-50">
                    <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        Novo Disparo Nacional
                    </h2>
                </div>
                
                <form class="p-8 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2">Canal de Envio</label>
                            <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold text-pct-blue outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="email">E-mail Marketing</option>
                                <option value="sms">SMS Nacional</option>
                                <option value="push">Notificação PWA (Push)</option>
                                <option value="whatsapp">WhatsApp (API Oficial)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2">Público Alvo</label>
                            <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold text-pct-blue outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="all">Todos os Filiados</option>
                                <option value="admin">Apenas Admins/Coordenadores</option>
                                <option value="state">Por Estado (Filtro posterior)</option>
                                <option value="donors">Apenas Doadores Ativos</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2">Assunto / Título</label>
                        <input type="text" placeholder="Ex: Grande Mobilização Nacional - PCT" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold text-pct-blue outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2">Conteúdo da Mensagem</label>
                        <textarea rows="6" placeholder="Escreva aqui a mensagem institucional..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold text-pct-blue outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                    </div>

                    <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                        <div class="flex items-center gap-2 text-[10px] text-gray-400 font-bold uppercase">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Estimativa: 12.450 destinatários
                        </div>
                        <button type="button" class="px-8 py-4 bg-pct-blue text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                            Iniciar Disparo
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Estatísticas de Campanha -->
        <div class="space-y-6">
            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100">
                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Últimas Campanhas</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-black text-pct-blue uppercase">Apoio em Massa</p>
                            <p class="text-[9px] text-gray-400 font-bold">12/04/2026 • E-mail</p>
                        </div>
                        <span class="text-emerald-500 font-black text-xs">82% Abr.</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-black text-pct-blue uppercase">Alerta de Doação</p>
                            <p class="text-[9px] text-gray-400 font-bold">10/04/2026 • SMS</p>
                        </div>
                        <span class="text-blue-500 font-black text-xs">95% Entr.</span>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-pct-green to-emerald-700 rounded-[2.5rem] p-8 text-white shadow-xl shadow-emerald-900/20">
                <h3 class="text-[10px] font-black text-emerald-200 uppercase tracking-[0.2em] mb-4">Engajamento Social</h3>
                <p class="text-3xl font-black mb-1">+ 24.5k</p>
                <p class="text-xs font-medium text-emerald-100 mb-6">Novas interações (24h)</p>
                <div class="flex gap-2">
                    <div class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </div>
                    <div class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.441 16.892c-2.102 0-3.809-1.707-3.809-3.809 0-2.102 1.707-3.809 3.809-3.809 2.102 0 3.809 1.707 3.809 3.809 0 2.102-1.707 3.809-3.809 3.809zm3.11-8.311c-.552 0-1-.448-1-1s.448-1 1-1 1 .448 1 1-.448 1-1 1z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
