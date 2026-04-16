<x-dashboard-layout>
    <x-slot name="title">Tesouraria Digital - PCT</x-slot>

    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-pct-blue">Tesouraria Digital</h1>
            <p class="text-gray-500">Gestão financeira completa, transparente e auditável.</p>
        </div>
        <button class="btn-primary flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Nova Transação</span>
        </button>
    </div>

    <!-- Finance Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass p-6 rounded-3xl shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Saldo Atual</p>
            <h3 class="text-3xl font-black text-pct-blue">R$ 45.230,00</h3>
            <p class="text-xs text-pct-green font-bold mt-2">↑ 5.4% este mês</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Entradas (Mês)</p>
            <h3 class="text-3xl font-black text-pct-green">R$ 12.800,00</h3>
            <p class="text-xs text-gray-500 mt-2">145 doações individuais</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Saídas (Mês)</p>
            <h3 class="text-3xl font-black text-red-500">R$ 4.120,50</h3>
            <p class="text-xs text-gray-500 mt-2">Despesas operacionais e eventos</p>
        </div>
    </div>

    <!-- Transactions Table -->
    <div class="glass rounded-3xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-pct-blue text-lg">Últimas Movimentações</h3>
            <div class="flex space-x-2">
                <button class="px-4 py-1.5 text-xs font-bold border border-gray-200 rounded-lg hover:bg-gray-50">Exportar PDF</button>
                <button class="px-4 py-1.5 text-xs font-bold border border-gray-200 rounded-lg hover:bg-gray-50">Filtrar</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-bold border-b border-gray-100">Data</th>
                        <th class="px-6 py-4 font-bold border-b border-gray-100">Descrição</th>
                        <th class="px-6 py-4 font-bold border-b border-gray-100">Categoria</th>
                        <th class="px-6 py-4 font-bold border-b border-gray-100 text-right">Valor</th>
                        <th class="px-6 py-4 font-bold border-b border-gray-100 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 border-b border-gray-50 font-medium">12/04/2026</td>
                        <td class="px-6 py-4 border-b border-gray-50">Doação Voluntária #9982</td>
                        <td class="px-6 py-4 border-b border-gray-50"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-[10px] font-bold uppercase">Entrada</span></td>
                        <td class="px-6 py-4 border-b border-gray-50 text-right font-bold text-pct-green">+ R$ 250,00</td>
                        <td class="px-6 py-4 border-b border-gray-50 text-center">
                             <div class="flex items-center justify-center space-x-1 decoration-pct-green">
                                <span class="h-1.5 w-1.5 rounded-full bg-pct-green"></span>
                                <span class="text-[10px] font-bold text-pct-green uppercase">Confirmado</span>
                             </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 border-b border-gray-50 font-medium">10/04/2026</td>
                        <td class="px-6 py-4 border-b border-gray-50">Aluguel Sede Municipal - PoA</td>
                        <td class="px-6 py-4 border-b border-gray-50"><span class="px-2 py-1 bg-red-100 text-red-700 rounded-md text-[10px] font-bold uppercase">Saída</span></td>
                        <td class="px-6 py-4 border-b border-gray-50 text-right font-bold text-red-500">- R$ 1.200,00</td>
                        <td class="px-6 py-4 border-b border-gray-50 text-center">
                             <div class="flex items-center justify-center space-x-1">
                                <span class="h-1.5 w-1.5 rounded-full bg-pct-green"></span>
                                <span class="text-[10px] font-bold text-pct-green uppercase">Pago</span>
                             </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 border-b border-gray-50 font-medium">08/04/2026</td>
                        <td class="px-6 py-4 border-b border-gray-50">Material Gráfico - Panfletos</td>
                        <td class="px-6 py-4 border-b border-gray-50"><span class="px-2 py-1 bg-red-100 text-red-700 rounded-md text-[10px] font-bold uppercase">Saída</span></td>
                        <td class="px-6 py-4 border-b border-gray-50 text-right font-bold text-red-500">- R$ 450,00</td>
                        <td class="px-6 py-4 border-b border-gray-50 text-center">
                             <div class="flex items-center justify-center space-x-1">
                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                <span class="text-[10px] font-bold text-yellow-600 uppercase">Processando</span>
                             </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 flex justify-end space-x-4">
        <a href="{{ route('finance.ficha_filiacao') }}" class="inline-flex items-center space-x-3 px-6 py-3 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md hover:border-pct-green transition-all group">
            <div class="p-2 bg-emerald-50 text-pct-green rounded-lg group-hover:bg-pct-green group-hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <span class="text-xs font-black text-pct-blue uppercase tracking-widest">Ficha de Filiação</span>
        </a>

        <a href="{{ route('finance.modelos_oficios') }}" class="inline-flex items-center space-x-3 px-6 py-3 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md hover:border-pct-blue transition-all group">
            <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg group-hover:bg-pct-blue group-hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <span class="text-xs font-black text-pct-blue uppercase tracking-widest">Modelos de Ofícios</span>
            <svg class="w-4 h-4 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</x-dashboard-layout>
