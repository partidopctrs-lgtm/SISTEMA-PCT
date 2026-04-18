<x-dashboard-layout>
    <x-slot name="title">Manual de Diretórios - PCT</x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto">
            <!-- Header do Documento -->
            <div class="bg-white rounded-[2.5rem] p-12 shadow-sm border border-slate-100 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8">
                    <span class="px-4 py-2 bg-emerald-50 text-pct-green rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">PCT-ORG-001</span>
                </div>
                
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-pct-green rounded-2xl flex items-center justify-center text-white shadow-lg shadow-pct-green/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">Manual Completo de Diretórios</h1>
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
                        <p class="text-gray-900 text-pct-green">Organização</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-8 text-slate-700">
                <!-- 3. Estrutura Mínima -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-emerald-50 text-pct-green rounded-lg flex items-center justify-center text-sm font-black">1</span>
                        Estrutura Mínima Obrigatória
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100 text-center group hover:bg-white transition-all">
                            <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-pct-blue mx-auto mb-4 shadow-sm group-hover:shadow-md transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <h3 class="font-black text-pct-blue uppercase text-xs mb-2">Presidente</h3>
                            <p class="text-[10px] text-gray-500 font-bold uppercase">Liderança Geral</p>
                        </div>
                        <div class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100 text-center group hover:bg-white transition-all">
                            <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-pct-blue mx-auto mb-4 shadow-sm group-hover:shadow-md transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                            </div>
                            <h3 class="font-black text-pct-blue uppercase text-xs mb-2">Secretário</h3>
                            <p class="text-[10px] text-gray-500 font-bold uppercase">Administrativo</p>
                        </div>
                        <div class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100 text-center group hover:bg-white transition-all">
                            <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-pct-blue mx-auto mb-4 shadow-sm group-hover:shadow-md transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="font-black text-pct-blue uppercase text-xs mb-2">Tesoureiro</h3>
                            <p class="text-[10px] text-gray-500 font-bold uppercase">Gestão Financeira</p>
                        </div>
                    </div>

                    <div class="p-6 bg-blue-50 rounded-2xl border border-blue-100 shadow-sm">
                        <h4 class="text-[10px] font-black text-pct-blue uppercase tracking-widest mb-4">Estrutura de Expansão Recomendada</h4>
                        <div class="flex flex-wrap gap-4">
                            @foreach(['Coordenador de Comunicação', 'Coordenador de Formação', 'Advogado Local'] as $cargo)
                            <span class="px-4 py-2 bg-white rounded-xl text-xs font-bold text-gray-600 border border-blue-100 shadow-sm">{{ $cargo }}</span>
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- 5. Rotina Operacional -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-emerald-50 text-pct-green rounded-lg flex items-center justify-center text-sm font-black">2</span>
                        Rotina Operacional Padrão
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest border-l-4 border-pct-green pl-4">Semanal</h3>
                            <ul class="space-y-3">
                                @foreach(['Reunião de equipe', 'Acompanhamento de membros', 'Atualização do sistema'] as $task)
                                <li class="flex items-center gap-3 text-sm font-bold text-gray-700">
                                    <div class="h-1.5 w-1.5 bg-pct-green rounded-full"></div>
                                    {{ $task }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest border-l-4 border-pct-blue pl-4">Mensal</h3>
                            <ul class="space-y-3">
                                @foreach(['Evento ou ação pública', 'Relatório de atividades', 'Prestação de contas'] as $task)
                                <li class="flex items-center gap-3 text-sm font-bold text-gray-700">
                                    <div class="h-1.5 w-1.5 bg-pct-blue rounded-full"></div>
                                    {{ $task }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- 7. Criação de Diretório -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100 overflow-hidden relative">
                    <h2 class="text-xl font-bold text-pct-blue mb-10 flex items-center gap-3">
                        <span class="h-8 w-8 bg-emerald-50 text-pct-green rounded-lg flex items-center justify-center text-sm font-black">3</span>
                        Processo de Criação (Fluxo)
                    </h2>

                    <div class="relative">
                        <div class="absolute top-0 left-6 bottom-0 w-0.5 bg-slate-100"></div>
                        <div class="space-y-8 relative z-10">
                            @foreach([
                                'Reunião de Fundação e Definição de Cargos',
                                'Assinatura da Ata de Fundação',
                                'Cadastro no Sistema PCT',
                                'Validação pela Coordenação Nacional',
                                'Diretório Ativo e Operacional'
                            ] as $index => $step)
                            <div class="flex items-center gap-6 group">
                                <div class="h-12 w-12 bg-white border-4 border-slate-50 rounded-2xl flex items-center justify-center text-pct-blue font-black group-hover:border-pct-green transition-colors shadow-sm">
                                    {{ $index + 1 }}
                                </div>
                                <p class="text-sm font-bold text-gray-700 group-hover:text-pct-blue transition-colors">{{ $step }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- Footer do Manual -->
                <div class="text-center pt-10">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Gestão Organizacional Nacional</p>
                    <p class="text-xs text-gray-500 italic max-w-lg mx-auto leading-relaxed">Diretórios não são grupos informais. São unidades operacionais do PCT. Organização gera crescimento e expansão nacional.</p>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
