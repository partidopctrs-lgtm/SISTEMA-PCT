<x-public-layout>
    <x-slot name="title">Estratégia Nacional de Expansão - PCT</x-slot>

    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header do Documento -->
            <div class="bg-white rounded-[2.5rem] p-12 shadow-sm border border-slate-100 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8">
                    <span class="px-4 py-2 bg-emerald-50 text-pct-green rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">PCT-EXP-001</span>
                </div>
                
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-pct-blue rounded-2xl flex items-center justify-center text-white shadow-lg shadow-pct-blue/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.483V8.517a2 2 0 011.553-1.943L9 4l5.447 2.574A2 2 0 0116 8.517v6.966a2 2 0 01-1.553 1.943L9 20z"></path></svg>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">Estratégia Nacional de Expansão</h1>
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
                        <p class="text-gray-900">Expansão Territorial</p>
                    </div>
                    <div>
                        <p class="mb-1">Foco</p>
                        <p class="text-pct-green">Qualidade Estrutural</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-8">
                <!-- 3. Modelo de Expansão (Fases) -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-10 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">1</span>
                        As 4 Fases da Expansão Nacional
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach([
                            ['Fase 1: Estado Piloto', 'Escolher 1 estado base (ex: RS) para validar o modelo completo.', 'border-blue-200 bg-blue-50'],
                            ['Fase 2: Expansão Regional', 'Replicar para estados próximos ou estratégicos via influência.', 'border-emerald-200 bg-emerald-50'],
                            ['Fase 3: Cobertura Estrutural', 'Garantir presença institucional mínima: 1 diretório por estado.', 'border-amber-200 bg-amber-50'],
                            ['Fase 4: Expansão Massiva', 'Crescimento acelerado após estrutura validada nacionalmente.', 'border-red-200 bg-red-50']
                        ] as $fase)
                        <div class="p-6 rounded-[2rem] border {{ $fase[2] }}">
                            <h3 class="font-black text-pct-blue uppercase text-xs mb-2">{{ $fase[0] }}</h3>
                            <p class="text-xs text-gray-600 font-medium leading-relaxed">{{ $fase[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- 4. Priorização por Estado -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">2</span>
                        Priorização Estratégica
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-6 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="h-10 w-10 bg-amber-400 rounded-xl flex items-center justify-center text-white font-black">HI</span>
                            <div>
                                <h4 class="text-sm font-black text-pct-blue uppercase">Prioridade Alta (Estados Chave)</h4>
                                <p class="text-[10px] text-gray-500 font-bold uppercase mt-1">SP, MG, RJ, PR, RS</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="h-10 w-10 bg-slate-400 rounded-xl flex items-center justify-center text-white font-black">MD</span>
                            <div>
                                <h4 class="text-sm font-black text-pct-blue uppercase">Prioridade Média</h4>
                                <p class="text-[10px] text-gray-500 font-bold uppercase mt-1">SC, GO, BA, PE</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- 7. Modelo de Replicação -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100 text-center">
                    <h2 class="text-xl font-bold text-pct-blue mb-10 flex items-center gap-3 justify-center">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">3</span>
                        Modelo de Replicação em Rede
                    </h2>
                    
                    <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-4 mb-8">
                        <div class="p-6 bg-pct-blue text-white rounded-[2rem] shadow-lg shadow-pct-blue/20 w-48">
                            <p class="text-[10px] font-black uppercase mb-2">Cidade A</p>
                            <p class="text-xs font-bold">Consolidação e Formação</p>
                        </div>
                        <svg class="w-8 h-8 text-pct-green rotate-90 md:rotate-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        <div class="p-6 bg-white border-2 border-pct-green rounded-[2rem] w-48">
                            <p class="text-[10px] font-black text-pct-green uppercase mb-2">Novo Líder</p>
                            <p class="text-xs font-bold text-gray-700">Apoio Nacional</p>
                        </div>
                        <svg class="w-8 h-8 text-pct-green rotate-90 md:rotate-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        <div class="p-6 bg-emerald-50 border border-emerald-100 text-pct-green rounded-[2rem] w-48">
                            <p class="text-[10px] font-black uppercase mb-2">Cidade B</p>
                            <p class="text-xs font-bold">Novo Diretório</p>
                        </div>
                    </div>
                    
                    <p class="text-xs text-gray-400 font-bold italic">"O PCT não cresce abrindo em todo lugar. Cresce por núcleos fortes que replicam."</p>
                </section>

                <!-- 13. Estratégia de Crescimento Real -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">4</span>
                        Ciclo de Crescimento Real
                    </h2>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach(['Organizar', 'Validar', 'Replicar', 'Expandir'] as $index => $label)
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 text-center group hover:bg-pct-blue hover:text-white transition-all">
                            <span class="text-[10px] font-black uppercase opacity-40 mb-2 block">Passo {{ $index + 1 }}</span>
                            <span class="text-xs font-black uppercase tracking-widest">{{ $label }}</span>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- Footer do Manual -->
                <div class="text-center pt-10">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Expansão Territorial Estruturada</p>
                    <p class="text-xs text-gray-500 italic max-w-lg mx-auto leading-relaxed">O PCT não deve crescer rápido. Deve crescer certo. Crescimento desorganizado destrói movimentos; crescimento estruturado constrói a nação.</p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
