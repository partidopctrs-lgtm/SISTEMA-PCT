<x-public-layout>
    <x-slot name="title">Sistema de Mobilização em Massa - PCT</x-slot>

    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header do Documento -->
            <div class="bg-white rounded-[2.5rem] p-12 shadow-sm border border-slate-100 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8">
                    <span class="px-4 py-2 bg-blue-50 text-pct-blue rounded-full text-[10px] font-black uppercase tracking-widest border border-blue-100">PCT-MOB-001</span>
                </div>
                
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-pct-green rounded-2xl flex items-center justify-center text-white shadow-lg shadow-pct-green/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">Sistema de Mobilização em Massa</h1>
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
                        <p class="mb-1">Objetivo</p>
                        <p class="text-gray-900">Engajamento Ativo</p>
                    </div>
                    <div>
                        <p class="mb-1">Foco</p>
                        <p class="text-pct-green">Recrutamento Real</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-8">
                <!-- Funil de Mobilização -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100 text-center">
                    <h2 class="text-xl font-bold text-pct-blue mb-12 flex items-center gap-3 justify-center">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">1</span>
                        Funil de Mobilização (Core)
                    </h2>
                    
                    <div class="max-w-md mx-auto space-y-2">
                        <div class="p-6 bg-slate-100 rounded-t-[3rem] text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Público Geral</div>
                        <div class="p-6 bg-blue-50 text-pct-blue font-bold text-xs border-x border-blue-100 italic">Conteúdo (Redes Sociais)</div>
                        <div class="p-6 bg-blue-100 text-pct-blue font-black text-xs border-x border-blue-200">Interesse e Cadastro</div>
                        <div class="p-8 bg-pct-blue text-white rounded-b-[3rem] shadow-xl shadow-pct-blue/20">
                            <p class="text-lg font-black uppercase tracking-widest">Membro Ativo</p>
                            <p class="text-[10px] opacity-70 font-bold mt-2">Engajamento e Liderança</p>
                        </div>
                    </div>
                </section>

                <!-- Pilares da Mobilização -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">2</span>
                        Os 4 Pilares da Ativação
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach([
                            ['Atração', 'Trazer pessoas para o movimento via conteúdo estratégico.', 'bg-blue-50 text-blue-600'],
                            ['Conversão', 'Transformar interesse em cadastro real no site oficial.', 'bg-emerald-50 text-pct-green'],
                            ['Engajamento', 'Fazer o membro participar ativamente de reuniões e eventos.', 'bg-amber-50 text-amber-600'],
                            ['Ativação', 'Transformar o membro engajado em uma nova liderança.', 'bg-red-50 text-red-600']
                        ] as $pilar)
                        <div class="p-6 rounded-[2rem] {{ $pilar[2] }} border border-current/10">
                            <h3 class="font-black uppercase text-xs mb-2">{{ $pilar[0] }}</h3>
                            <p class="text-xs font-medium leading-relaxed opacity-80">{{ $pilar[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- Sistema de Indicação e Gamificação -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">3</span>
                        Indicação e Gamificação
                    </h2>
                    
                    <div class="bg-slate-50 rounded-[2rem] p-8 border border-slate-100">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="text-center">
                                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-pct-green mx-auto mb-4 shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                </div>
                                <h4 class="text-[10px] font-black text-gray-400 uppercase mb-2">Rastreamento</h4>
                                <p class="text-xs font-bold text-pct-blue">Links exclusivos por membro</p>
                            </div>
                            <div class="text-center">
                                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-pct-green mx-auto mb-4 shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="text-[10px] font-black text-gray-400 uppercase mb-2">Pontuação</h4>
                                <p class="text-xs font-bold text-pct-blue">Indicação e participação geram pontos</p>
                            </div>
                            <div class="text-center">
                                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-pct-green mx-auto mb-4 shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <h4 class="text-[10px] font-black text-gray-400 uppercase mb-2">Reconhecimento</h4>
                                <p class="text-xs font-bold text-pct-blue">Destaque interno e ranking nacional</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Footer do Manual -->
                <div class="text-center pt-10">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Recrutamento e Engajamento Ativo</p>
                    <p class="text-xs text-gray-500 italic max-w-lg mx-auto leading-relaxed">Mobilização sem organização gera caos. Organização sem mobilização gera estagnação. O PCT precisa dos dois para construir a nação.</p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
