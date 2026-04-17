<x-dashboard-layout>
    <x-slot name="title">Transparência Financeira - PCT</x-slot>

    <div class="max-w-5xl mx-auto py-8 px-4">
        <div class="mb-10 text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-pct-blue uppercase tracking-tighter mb-2">Relatório de Transparência Financeira</h1>
                <p class="text-sm font-medium text-gray-500">PCT – Movimento Cidadania e Trabalho</p>
            </div>
            <div class="text-right bg-blue-50/50 p-4 rounded-xl border border-blue-100/50">
                <p class="text-[10px] font-black text-pct-blue uppercase tracking-widest mb-1">Diretriz do PCT</p>
                <p class="text-xs font-bold text-gray-600">👉 Transparência não é opcional</p>
                <p class="text-xs font-bold text-gray-600">👉 É padrão obrigatório do movimento</p>
            </div>
        </div>

        <!-- Minhas Contribuições (Personal) -->
        <div class="mb-12">
            <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-pct-green pl-3">Sua Participação</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-premium border-t-4 border-t-pct-green bg-white rounded-[2rem] shadow-xl p-8 flex flex-col justify-between min-h-[160px]">
                    <h3 class="text-sm font-black text-pct-green uppercase tracking-widest mb-4">Minhas Contribuições</h3>
                    <div class="text-right mt-auto">
                        <span class="text-lg font-black text-pct-green">Nenhum</span>
                    </div>
                </div>
                <div class="md:col-span-2 card-premium bg-gradient-to-br from-emerald-50 to-white flex items-center justify-between p-8 rounded-[2rem]">
                    <div>
                        <h3 class="text-lg font-black text-pct-blue mb-2">Apoie o Movimento</h3>
                        <p class="text-sm text-gray-500 font-medium max-w-md">Sua contribuição mensal fortalece os diretórios locais e garante a expansão das ideias do PCT em todo o Brasil.</p>
                    </div>
                    <button class="px-8 py-4 bg-pct-green text-white font-black rounded-xl text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-600/20 whitespace-nowrap">Contribuir Agora</button>
                </div>
            </div>
        </div>

        <!-- Identificação -->
        <div class="card-premium mb-8 bg-slate-900 text-white border-0">
            <h2 class="text-sm font-black uppercase tracking-widest text-pct-green mb-6 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Identificação
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">Código</p>
                    <p class="text-sm font-black">PCT-FIN-REP-001</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">Versão</p>
                    <p class="text-sm font-black">1.0</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">Período</p>
                    <p class="text-sm font-black uppercase">{{ now()->translatedFormat('F/Y') }}</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">Diretório</p>
                    <p class="text-sm font-black uppercase">{{ auth()->user()->committee_city ?? 'Diretório Nacional' }}</p>
                </div>
            </div>
        </div>

        <!-- Resumo Financeiro -->
        <div class="mb-10">
            <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-pct-green pl-3">1. Resumo Financeiro</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card-premium border-t-4 border-t-emerald-500">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <span>💰</span> Receitas
                    </p>
                    <p class="text-2xl font-black text-slate-800">R$ {{ number_format($totalIncome, 2, ',', '.') }}</p>
                </div>
                <div class="card-premium border-t-4 border-t-red-500">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <span>💸</span> Despesas
                    </p>
                    <p class="text-2xl font-black text-slate-800">R$ {{ number_format($totalExpense, 2, ',', '.') }}</p>
                </div>
                <div class="card-premium border-t-4 border-t-blue-500">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <span>🎓</span> Investimento Escola
                    </p>
                    <p class="text-2xl font-black text-slate-800">R$ {{ number_format($schoolInvestment, 2, ',', '.') }}</p>
                </div>
                <div class="card-premium border-t-4 border-t-yellow-500">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <span>🏦</span> Fundo de Reserva
                    </p>
                    <p class="text-2xl font-black text-slate-800">R$ {{ number_format($reserveFund, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-10">
            <!-- Detalhamento Receitas -->
            <div>
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-emerald-500 pl-3">2. Detalhamento de Receitas</h2>
                <div class="card-premium p-0 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <th class="p-4 border-b border-slate-100">Data</th>
                                <th class="p-4 border-b border-slate-100">Origem</th>
                                <th class="p-4 border-b border-slate-100">Descrição</th>
                                <th class="p-4 border-b border-slate-100 text-right">Valor</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-gray-700">
                            @forelse($records->where('type', 'income') as $rec)
                            <tr class="hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0">
                                <td class="p-4">{{ $rec->created_at->format('d/m') }}</td>
                                <td class="p-4 uppercase text-[10px] font-bold">{{ $rec->category }}</td>
                                <td class="p-4">{{ $rec->description }}</td>
                                <td class="p-4 text-right font-black text-emerald-600">R$ {{ number_format($rec->amount, 2, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">Nenhuma receita registrada no período.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Detalhamento Despesas -->
            <div>
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-red-500 pl-3">3. Detalhamento de Despesas</h2>
                <div class="card-premium p-0 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <th class="p-4 border-b border-slate-100">Data</th>
                                <th class="p-4 border-b border-slate-100">Categoria</th>
                                <th class="p-4 border-b border-slate-100">Descrição</th>
                                <th class="p-4 border-b border-slate-100 text-right">Valor</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-gray-700">
                            @forelse($records->where('type', 'expense') as $rec)
                            <tr class="hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-0">
                                <td class="p-4">{{ $rec->created_at->format('d/m') }}</td>
                                <td class="p-4 uppercase text-[10px] font-bold">{{ $rec->category }}</td>
                                <td class="p-4">{{ $rec->description }}</td>
                                <td class="p-4 text-right font-black text-red-600">R$ {{ number_format($rec->amount, 2, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">Nenhuma despesa registrada no período.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
            <!-- Investimento Formação -->
            <div>
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-blue-500 pl-3">4. Investimento em Formação</h2>
                <div class="card-premium p-0 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <th class="p-4 border-b border-slate-100">Tipo</th>
                                <th class="p-4 border-b border-slate-100">Descrição</th>
                                <th class="p-4 border-b border-slate-100 text-right">Valor</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-gray-700">
                            @if($schoolInvestment > 0)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4 font-bold">Curso</td>
                                    <td class="p-4">Plataforma Escola PCT</td>
                                    <td class="p-4 text-right font-black">R$ {{ number_format($schoolInvestment, 2, ',', '.') }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="3" class="p-8 text-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">Nenhum investimento no período.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Fundo de Reserva -->
            <div>
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-yellow-500 pl-3">5. Fundo de Reserva</h2>
                <div class="card-premium p-0 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <th class="p-4 border-b border-slate-100">Tipo</th>
                                <th class="p-4 border-b border-slate-100 text-right">Valor</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-gray-700">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="p-4 font-bold">Saldo Atual</td>
                                <td class="p-4 text-right font-black">R$ {{ number_format($reserveFund, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Saldo Final -->
        <div class="card-premium bg-gradient-to-r from-pct-blue to-blue-900 border-0 text-white mb-10">
            <h2 class="text-lg font-black uppercase tracking-widest mb-6 text-pct-green">6. Saldo Final</h2>
            <p class="text-sm font-bold text-blue-200 mb-2">💵 Resultado do mês: Receitas - Despesas = Saldo</p>
            <div class="flex items-center gap-4 flex-wrap">
                <span class="text-2xl font-black">R$ {{ number_format($totalIncome, 2, ',', '.') }}</span>
                <span class="text-xl font-bold text-blue-300">–</span>
                <span class="text-2xl font-black">R$ {{ number_format($totalExpense, 2, ',', '.') }}</span>
                <span class="text-xl font-bold text-blue-300">=</span>
                <span class="text-3xl md:text-4xl font-black {{ $balance >= 0 ? 'text-pct-green' : 'text-red-400' }}">
                    R$ {{ number_format($balance, 2, ',', '.') }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Observações -->
            <div>
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-slate-300 pl-3">7. Observações</h2>
                <div class="card-premium space-y-4">
                    <p class="text-sm font-medium text-gray-600 flex items-start gap-3">
                        <svg class="w-5 h-5 text-pct-green shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Todas as despesas possuem comprovantes registrados no sistema
                    </p>
                    <p class="text-sm font-medium text-gray-600 flex items-start gap-3">
                        <svg class="w-5 h-5 text-pct-green shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        O diretório mantém transparência total das movimentações
                    </p>
                    <p class="text-sm font-medium text-gray-600 flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        Valores sujeitos à auditoria interna
                    </p>
                </div>
            </div>

            <!-- Responsabilidade -->
            <div>
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-slate-300 pl-3">8. Responsabilidade</h2>
                <div class="card-premium">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest leading-relaxed mb-8">
                        "Declaro que as informações acima são verdadeiras e refletem a movimentação financeira do período."
                    </p>
                    <div class="space-y-6">
                        <div>
                            <div class="border-b-2 border-slate-200 border-dashed w-full mb-2"></div>
                            <p class="text-[10px] font-black text-pct-blue uppercase tracking-widest">Tesoureiro</p>
                        </div>
                        <div>
                            <div class="border-b-2 border-slate-200 border-dashed w-full mb-2"></div>
                            <p class="text-[10px] font-black text-pct-blue uppercase tracking-widest">Presidente</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
