<x-public-layout>
    <x-slot name="title">Sistema de Governança Nacional - PCT</x-slot>

    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header do Documento -->
            <div class="bg-white rounded-[2.5rem] p-12 shadow-sm border border-slate-100 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8">
                    <span class="px-4 py-2 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-red-100">PCT-GOV-001</span>
                </div>
                
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-red-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-red-600/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">Sistema de Governança Nacional</h1>
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
                        <p class="mb-1">Aplicação</p>
                        <p class="text-gray-900">Todos os Diretórios</p>
                    </div>
                    <div>
                        <p class="mb-1">Nível</p>
                        <p class="text-red-600">Governança Central</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-8">
                <!-- 2. Pilares -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center text-sm font-black">1</span>
                        Os 4 Pilares da Governança PCT
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach([
                            ['Métricas', 'Dados reais', 'bg-blue-50 text-blue-600'],
                            ['Pontuação', 'Cálculo de mérito', 'bg-emerald-50 text-pct-green'],
                            ['Ranking', 'Comparativo nacional', 'bg-amber-50 text-amber-600'],
                            ['Intervenção', 'Correção de falhas', 'bg-red-50 text-red-600']
                        ] as $pilar)
                        <div class="p-6 rounded-[2rem] {{ $pilar[2] }} border border-current/10 text-center">
                            <h3 class="font-black uppercase text-xs mb-1">{{ $pilar[0] }}</h3>
                            <p class="text-[9px] font-bold opacity-70 uppercase tracking-tighter">{{ $pilar[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- 3. Pontuação -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-10 flex items-center gap-3">
                        <span class="h-8 w-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center text-sm font-black">2</span>
                        Critérios de Pontuação Mensal
                    </h2>

                    <div class="space-y-4">
                        @foreach([
                            ['Crescimento de Membros', '+10 a +20 pontos', '👥'],
                            ['Atividade Local (Eventos)', '+15 a +25 pontos', '📅'],
                            ['Formação Política (Escola)', '+10 a +15 pontos', '🎓'],
                            ['Regularidade Financeira', '+15 a +25 pontos', '💰'],
                            ['Conformidade Jurídica', '+10 a +20 pontos', '⚖️']
                        ] as $item)
                        <div class="flex items-center justify-between p-5 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="flex items-center gap-4">
                                <span class="text-xl">{{ $item[2] }}</span>
                                <span class="text-sm font-bold text-gray-700">{{ $item[0] }}</span>
                            </div>
                            <span class="text-xs font-black text-pct-green">{{ $item[1] }}</span>
                        </div>
                        @endforeach
                        
                        <div class="mt-6 p-6 bg-red-50 rounded-2xl border border-red-100">
                            <h4 class="text-[10px] font-black text-red-600 uppercase tracking-widest mb-4">Penalidades Críticas</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="text-xs font-bold text-red-900 flex justify-between">
                                    <span>Inatividade (30 dias)</span>
                                    <span>-20 pts</span>
                                </div>
                                <div class="text-xs font-bold text-red-900 flex justify-between">
                                    <span>Falta de Prestação de Contas</span>
                                    <span>-30 pts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- 4. Ranking Status -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center text-sm font-black">3</span>
                        Classificação de Desempenho
                    </h2>
                    
                    <div class="space-y-3">
                        @foreach([
                            ['Ouro (Excelência)', '80+ pontos', 'bg-amber-400'],
                            ['Prata (Bom Desempenho)', '60-79 pontos', 'bg-slate-300'],
                            ['Bronze (Aceitável)', '40-59 pontos', 'bg-orange-400'],
                            ['Observação (Baixo)', '20-39 pontos', 'bg-blue-400'],
                            ['Crítico (Intervenção)', '< 20 pontos', 'bg-red-600']
                        ] as $status)
                        <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="h-3 w-3 rounded-full {{ $status[2] }}"></div>
                            <span class="text-sm font-black text-pct-blue flex-1">{{ $status[0] }}</span>
                            <span class="text-xs font-bold text-gray-500">{{ $status[1] }}</span>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- 7. Sistema de Intervenção -->
                <section class="bg-white rounded-[2rem] p-10 shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-pct-blue mb-8 flex items-center gap-3">
                        <span class="h-8 w-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center text-sm font-black">4</span>
                        Níveis de Intervenção
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100">
                            <h3 class="text-xs font-black text-amber-600 uppercase mb-4">Nível 1 & 2</h3>
                            <p class="text-xs text-gray-600 font-medium leading-relaxed">Alertas automáticos e monitoramento assistido para correções de curso rápidas e preventivas.</p>
                        </div>
                        <div class="p-6 bg-red-50 rounded-[2rem] border border-red-100">
                            <h3 class="text-xs font-black text-red-600 uppercase mb-4">Nível 3 & 4</h3>
                            <p class="text-xs text-gray-600 font-medium leading-relaxed">Intervenção direta e reestruturação de liderança. Ações drásticas para garantir o padrão nacional.</p>
                        </div>
                    </div>
                </section>

                <!-- Footer do Manual -->
                <div class="text-center pt-10">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Governança Baseada em Dados e Desempenho</p>
                    <p class="text-xs text-gray-500 italic max-w-lg mx-auto leading-relaxed">Sem governança, o movimento cresce desorganizado. Com governança, o PCT cresce com controle, qualidade e força nacional.</p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
