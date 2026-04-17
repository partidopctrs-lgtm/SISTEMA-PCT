<x-public-layout>
    <x-slot name="title">Sistema de Canais de Denúncia - PCT</x-slot>

    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header do Documento -->
            <div class="bg-white rounded-[2.5rem] p-12 shadow-sm border border-slate-100 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8">
                    <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-indigo-100">PCT-ETH-001</span>
                </div>
                
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-600/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">Sistema de Canais de Denúncia</h1>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-8 border-t border-slate-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                    <div>
                        <p class="mb-1">Versão</p>
                        <p class="text-gray-900">1.0</p>
                    </div>
                    <div>
                        <p class="mb-1">Abrangência</p>
                        <p class="text-gray-900">Nacional</p>
                    </div>
                    <div>
                        <p class="mb-1">Área</p>
                        <p class="text-gray-900">Ética e Controle</p>
                    </div>
                    <div>
                        <p class="mb-1">Status</p>
                        <p class="text-indigo-600">Integridade Ativa</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-8">
                <!-- Divisão dos Canais -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-sm font-black">1</span>
                        Divisão Estratégica dos Canais
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-8 rounded-[2.5rem] bg-blue-50 border border-blue-100">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-pct-blue shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="font-black text-pct-blue uppercase text-xs">Canal Popular (Externo)</h3>
                            </div>
                            <p class="text-xs text-gray-600 font-medium leading-relaxed">Para cidadãos denunciarem problemas públicos, má gestão e demandas sociais relevantes para a atuação do PCT.</p>
                        </div>

                        <div class="p-8 rounded-[2.5rem] bg-indigo-50 border border-indigo-100">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-indigo-600 shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <h3 class="font-black text-indigo-600 uppercase text-xs">Canal de Conduta (Interno)</h3>
                            </div>
                            <p class="text-xs text-gray-600 font-medium leading-relaxed">Dedicado a denúncias contra membros, lideranças ou diretórios por falta de ética ou uso indevido do movimento.</p>
                        </div>
                    </div>
                </section>

                <!-- Classificação de Gravidade -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-sm font-black">2</span>
                        Níveis de Gravidade e Conduta
                    </h2>
                    
                    <div class="space-y-3">
                        @foreach([
                            ['Leve', 'Comportamento inadequado inicial.', 'bg-emerald-100 text-pct-green'],
                            ['Moderada', 'Descumprimento de regras internas.', 'bg-amber-100 text-amber-600'],
                            ['Grave', 'Dano à imagem pública do PCT.', 'bg-orange-100 text-orange-600'],
                            ['Crítica', 'Fraude, ilegalidade ou corrupção.', 'bg-red-100 text-red-600']
                        ] as $nivel)
                        <div class="flex items-center gap-4 p-5 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $nivel[2] }}">{{ $nivel[0] }}</span>
                            <span class="text-sm font-bold text-gray-700 flex-1">{{ $nivel[1] }}</span>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- Proteção e Sigilo -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <div class="flex flex-col md:flex-row gap-10 items-center">
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-pct-blue mb-6">Proteção do Denunciante</h2>
                            <p class="text-sm text-gray-600 font-medium leading-relaxed mb-6">O PCT garante total confidencialidade, não retaliação e a possibilidade de anonimato em todas as etapas do processo de investigação.</p>
                            <div class="flex gap-4">
                                <div class="px-4 py-2 bg-slate-50 rounded-xl text-[10px] font-black text-gray-400 border border-slate-100 uppercase tracking-widest">Confidencialidade</div>
                                <div class="px-4 py-2 bg-slate-50 rounded-xl text-[10px] font-black text-gray-400 border border-slate-100 uppercase tracking-widest">Não Retaliação</div>
                            </div>
                        </div>
                        <div class="h-32 w-32 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-600">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 3c1.268 0 2.39.234 3.468.657m-3.42 16.142A8.959 8.959 0 014.412 14.11m0 0a8.959 8.959 0 015.588-5.588m0 0l1.103-1.103m0 0l1.103-1.103m0 0l1.103-1.103m0 0l1.103-1.103"></path></svg>
                        </div>
                    </div>
                </section>

                <!-- Footer do Manual -->
                <div class="text-center pt-10">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Ética, Integridade e Controle Institucional</p>
                    <p class="text-xs text-gray-500 italic max-w-lg mx-auto leading-relaxed">Um movimento cresce quando confia internamente e escuta externamente. O canal de denúncia é um dos pilares fundamentais da nossa credibilidade nacional.</p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
