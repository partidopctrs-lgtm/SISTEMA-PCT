<x-public-layout>
    <x-slot name="title">Código Disciplinar - PCT</x-slot>

    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header do Documento -->
            <div class="bg-white rounded-[2.5rem] p-12 shadow-sm border border-slate-100 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8">
                    <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-indigo-100">PCT-ETH-002</span>
                </div>
                
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-600/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">Código Disciplinar Nacional</h1>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-8 border-t border-slate-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                    <div>
                        <p class="mb-1">Versão</p>
                        <p class="text-gray-900">1.0</p>
                    </div>
                    <div>
                        <p class="mb-1">Data</p>
                        <p class="text-gray-900">Abril / 2026</p>
                    </div>
                    <div>
                        <p class="mb-1">Abrangência</p>
                        <p class="text-gray-900">Nacional</p>
                    </div>
                    <div>
                        <p class="mb-1">Área</p>
                        <p class="text-gray-900">Ética e Disciplina</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-8">
                <!-- 4. Tipos de Infração -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-sm font-black">1</span>
                        Classificação de Infrações
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-6 rounded-[2rem] bg-emerald-50 border border-emerald-100">
                            <h3 class="font-black text-pct-green uppercase text-[10px] mb-2">Leves</h3>
                            <p class="text-[11px] text-gray-600 font-medium">Falta de participação ou descumprimento pontual de tarefas organizacionais.</p>
                        </div>
                        <div class="p-6 rounded-[2rem] bg-amber-50 border border-amber-100">
                            <h3 class="font-black text-amber-600 uppercase text-[10px] mb-2">Moderadas</h3>
                            <p class="text-[11px] text-gray-600 font-medium">Desrespeito interno, descumprimento de normas e falta de registro de atividades.</p>
                        </div>
                        <div class="p-6 rounded-[2rem] bg-orange-50 border border-orange-100">
                            <h3 class="font-black text-orange-600 uppercase text-[10px] mb-2">Graves</h3>
                            <p class="text-[11px] text-gray-600 font-medium">Uso indevido do nome do PCT, danos à imagem e falta de transparência financeira.</p>
                        </div>
                        <div class="p-6 rounded-[2rem] bg-red-50 border border-red-100">
                            <h3 class="font-black text-red-600 uppercase text-[10px] mb-2">Críticas</h3>
                            <p class="text-[11px] text-gray-600 font-medium">Fraude, corrupção, atos ilegais e quebra grave de confiança institucional.</p>
                        </div>
                    </div>
                </section>

                <!-- 5. Medidas Disciplinares -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-sm font-black">2</span>
                        Escala de Medidas Disciplinares
                    </h2>
                    
                    <div class="flex flex-col md:flex-row gap-4">
                        @foreach([
                            ['Orientação', 'Conversa formal e correção', 'bg-slate-50 text-gray-400'],
                            ['Advertência', 'Registro formal no sistema', 'bg-amber-50 text-amber-600'],
                            ['Suspensão', 'Afastamento e bloqueio', 'bg-orange-50 text-orange-600'],
                            ['Desligamento', 'Exclusão definitiva', 'bg-red-50 text-red-600']
                        ] as $index => $medida)
                        <div class="flex-1 p-6 rounded-[2rem] {{ $medida[2] }} border border-current/10 text-center">
                            <span class="text-[9px] font-black uppercase mb-2 block opacity-60">Nível {{ $index + 1 }}</span>
                            <h4 class="font-black uppercase text-xs mb-2">{{ $medida[0] }}</h4>
                            <p class="text-[10px] font-bold leading-tight">{{ $medida[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- 7. Fluxo Formal -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100 relative overflow-hidden">
                    <h2 class="text-xl font-bold text-pct-blue mb-10 flex items-center gap-3">
                        <span class="h-8 w-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-sm font-black">3</span>
                        Fluxo Formal do Processo
                    </h2>

                    <div class="relative">
                        <div class="absolute top-0 left-6 bottom-0 w-0.5 bg-slate-100"></div>
                        <div class="space-y-6 relative z-10">
                            @foreach([
                                'Denúncia e Registro no Sistema',
                                'Análise Preliminar e Classificação',
                                'Abertura de Processo e Notificação',
                                'Prazo para Defesa (3 a 7 dias)',
                                'Análise Final e Decisão',
                                'Aplicação da Medida e Arquivamento'
                            ] as $step)
                            <div class="flex items-center gap-6">
                                <div class="h-4 w-4 bg-white border-4 border-indigo-600 rounded-full shadow-sm"></div>
                                <p class="text-sm font-bold text-gray-700">{{ $step }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- Footer do Manual -->
                <div class="text-center pt-10">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Proteção Institucional e Justiça Interna</p>
                    <p class="text-xs text-gray-500 italic max-w-lg mx-auto leading-relaxed">Disciplina não é punição. É proteção do movimento. Com este código, o PCT garante um padrão ético forte e capacidade de crescimento seguro.</p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
