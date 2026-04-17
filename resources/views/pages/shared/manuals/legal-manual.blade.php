<x-public-layout>
    <x-slot name="title">Manual do Núcleo Jurídico - PCT</x-slot>

    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header do Documento -->
            <div class="bg-white rounded-[2.5rem] p-12 shadow-sm border border-slate-100 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8">
                    <span class="px-4 py-2 bg-blue-50 text-pct-blue rounded-full text-[10px] font-black uppercase tracking-widest border border-blue-100">PCT-JUR-001</span>
                </div>
                
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-pct-blue rounded-2xl flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">Manual do Núcleo Jurídico</h1>
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
                        <p class="text-gray-900 text-pct-green">Jurídico</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-8">
                <!-- 1. Finalidade -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-6 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">1</span>
                        Finalidade do Núcleo Jurídico
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach([
                            'Garantir conformidade legal do movimento',
                            'Proteger institucionalmente o PCT',
                            'Apoiar diretórios, membros e candidatos',
                            'Padronizar documentos e procedimentos',
                            'Prevenir riscos e conflitos internos'
                        ] as $item)
                        <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <svg class="w-5 h-5 text-pct-green mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-sm font-bold text-gray-700 leading-tight">{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- 3. Estrutura -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">2</span>
                        Estrutura do Núcleo Jurídico
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="p-6 bg-gradient-to-r from-pct-blue to-blue-900 rounded-[2rem] text-white">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="px-3 py-1 bg-pct-green text-pct-blue text-[9px] font-black rounded-full uppercase">Nível Nacional</span>
                                <h3 class="text-lg font-black uppercase tracking-widest">Coordenação Jurídica Nacional</h3>
                            </div>
                            <p class="text-sm text-blue-100 font-medium">Define diretrizes, aprova documentos oficiais, supervisiona a atuação nacional e resolve casos críticos.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="p-6 bg-blue-50 rounded-[2rem] border border-blue-100">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="px-3 py-1 bg-blue-100 text-pct-blue text-[9px] font-black rounded-full uppercase">Estadual</span>
                                    <h3 class="font-bold text-pct-blue">Coordenador Estadual</h3>
                                </div>
                                <p class="text-xs text-gray-600 font-medium">Supervisiona advogados locais e garante a aplicação das diretrizes nacionais no estado.</p>
                            </div>
                            <div class="p-6 bg-emerald-50 rounded-[2rem] border border-emerald-100">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="px-3 py-1 bg-emerald-100 text-pct-green text-[9px] font-black rounded-full uppercase">Local</span>
                                    <h3 class="font-bold text-pct-green">Advogado do Comitê</h3>
                                </div>
                                <p class="text-xs text-gray-600 font-medium">Atende demandas locais, orienta o diretório e valida documentos básicos de fundação.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- 5. Fluxo de Atendimento -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-10 flex items-center gap-3">
                        <span class="h-8 w-8 bg-blue-50 text-pct-blue rounded-lg flex items-center justify-center text-sm font-black">3</span>
                        Fluxo Oficial de Atendimento
                    </h2>

                    <div class="flex flex-col items-center gap-4">
                        <div class="w-full grid grid-cols-1 md:grid-cols-5 gap-4">
                            @foreach([
                                ['Solicitante', 'Afiliado/Comitê', 'bg-white border-slate-200'],
                                ['Jurídico Local', 'Primeira Análise', 'bg-emerald-50 border-emerald-100 text-pct-green'],
                                ['Jurídico Estadual', 'Supervisão', 'bg-blue-50 border-blue-100 text-pct-blue'],
                                ['Jurídico Nacional', 'Estratégico', 'bg-pct-blue text-white'],
                                ['Resposta Final', 'Encerramento', 'bg-pct-green text-white']
                            ] as $step)
                            <div class="p-4 rounded-2xl border flex flex-col items-center text-center {{ $step[2] }}">
                                <span class="text-[9px] font-black uppercase mb-1 opacity-70">{{ $step[0] }}</span>
                                <span class="text-[10px] font-bold leading-tight">{{ $step[1] }}</span>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-8 p-6 bg-slate-50 rounded-2xl border border-slate-100 w-full">
                            <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Prazos Recomendados</h4>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400">RESPOSTA INICIAL</p>
                                    <p class="text-lg font-black text-pct-blue">48 horas</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400">ANÁLISE COMPLETA</p>
                                    <p class="text-lg font-black text-pct-blue">5 dias úteis</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400">CASOS URGENTES</p>
                                    <p class="text-lg font-black text-pct-green">Imediato</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Footer do Manual -->
                <div class="text-center pt-10">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Infraestrutura Jurídica Institucional</p>
                    <p class="text-xs text-gray-500 italic max-w-lg mx-auto leading-relaxed">Este manual é de cumprimento obrigatório e visa proteger o PCT enquanto o movimento cresce. Sem estrutura jurídica, não há expansão segura.</p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
