<x-dashboard-layout>
    <x-slot name="title">Gestão de Despesas - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gestão de Despesas</h1>
                <p class="text-gray-500 font-medium mt-1">Registro e controle de gastos com aprovação automática por valor.</p>
            </div>
            <button class="btn-primary bg-emerald-600 shadow-emerald-600/20 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Registrar Despesa
            </button>
        </div>

        <!-- Governança Teaser -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="p-6 bg-white rounded-[2rem] border-l-4 border-l-emerald-500 shadow-sm">
                <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Limite Simples</h4>
                <p class="text-lg font-black text-pct-blue">Até R$ 150,00</p>
                <p class="text-[10px] text-emerald-600 font-bold mt-1">APROVAÇÃO IMEDIATA</p>
            </div>
            <div class="p-6 bg-white rounded-[2rem] border-l-4 border-l-amber-500 shadow-sm">
                <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Validação Local</h4>
                <p class="text-lg font-black text-pct-blue">R$ 151,00 a R$ 500,00</p>
                <p class="text-[10px] text-amber-600 font-bold mt-1">EXIGE VISTO DO PRESIDENTE</p>
            </div>
            <div class="p-6 bg-white rounded-[2rem] border-l-4 border-l-red-500 shadow-sm">
                <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Análise Nacional</h4>
                <p class="text-lg font-black text-pct-blue">Acima de R$ 500,00</p>
                <p class="text-[10px] text-red-600 font-bold mt-1">REVISÃO PELO FINANCEIRO NACIONAL</p>
            </div>
        </div>

        <!-- Tabela de Despesas -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Lançamentos Recentes</h3>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold text-gray-400">Total do Mês:</span>
                        <span class="text-sm font-black text-pct-green">R$ 1.840,00</span>
                    </div>
                </div>
            </div>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Data</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Descrição</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Valor</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Fluxo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($expenses as $exp)
                    <tr class="hover:bg-slate-50/30 transition-colors">
                        <td class="px-8 py-5 text-xs font-bold text-gray-500">{{ $exp->date->format('d/m/Y') }}</td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-black text-pct-blue">{{ $exp->description }}</p>
                            <p class="text-[9px] text-gray-400 font-bold uppercase">{{ $exp->category }}</p>
                        </td>
                        <td class="px-8 py-5 text-sm font-black text-pct-blue">R$ {{ number_format($exp->value, 2, ',', '.') }}</td>
                        <td class="px-8 py-5">
                            <span class="text-[9px] font-black text-gray-500 uppercase px-2 py-0.5 bg-slate-100 rounded-full border border-slate-200">
                                {{ $exp->approval_level }}
                            </span>
                        </td>
                        <td class="px-8 py-5">
                            @php
                                $statusColors = [
                                    'pendente' => 'text-amber-600',
                                    'aprovada' => 'text-emerald-600',
                                    'rejeitada' => 'text-red-600',
                                    'paga' => 'text-blue-600',
                                ];
                                $color = $statusColors[$exp->status] ?? 'text-gray-600';
                            @endphp
                            <div class="flex items-center gap-1.5">
                                <span class="h-1.5 w-1.5 rounded-full {{ str_replace('text', 'bg', $color) }}"></span>
                                <span class="text-[10px] font-black uppercase {{ $color }}">{{ $exp->status }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-right">
                            @if($exp->receipt_path)
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="Ver Comprovante">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-12 text-center text-gray-400 italic">Nenhuma despesa registrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
