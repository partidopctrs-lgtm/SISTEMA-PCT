<x-dashboard-layout>
    <x-slot name="title">Gestão de Doadores - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Engajamento Financeiro</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">CRM de Doadores</h1>
            <p class="text-gray-500 font-medium">Gestão de apoiadores, recorrentes e grandes doadores.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-6 py-2 bg-emerald-500 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-600/20">Nova Captação</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Total de Doadores</p>
            <h3 class="text-3xl font-black text-pct-blue">1.450</h3>
            <p class="text-[10px] text-emerald-600 font-bold mt-2">↑ 12% este mês</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Ticket Médio</p>
            <h3 class="text-3xl font-black text-pct-blue">R$ 85,00</h3>
            <p class="text-[10px] text-gray-400 font-bold mt-2">Doações individuais</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Recorrência (Mensal)</p>
            <h3 class="text-3xl font-black text-pct-blue">R$ 15.400</h3>
            <p class="text-[10px] text-blue-500 font-bold mt-2">Plano de Apoio PCT</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Conversão</p>
            <h3 class="text-3xl font-black text-pct-blue">18%</h3>
            <p class="text-[10px] text-gray-400 font-bold mt-2">Filiados -> Doadores</p>
        </div>
    </div>

    <div class="card-premium p-0 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Apoiadores em Destaque</h3>
            <div class="flex gap-2">
                <input type="text" placeholder="Buscar doador..." class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-pct-blue focus:outline-none focus:ring-2 focus:ring-pct-blue/10">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Doador</th>
                        <th class="px-6 py-4">Total Doado</th>
                        <th class="px-6 py-4">Última Doação</th>
                        <th class="px-6 py-4">Tipo</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-600">
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 rounded-full bg-slate-100 flex items-center justify-center font-black text-pct-blue text-[10px]">RS</div>
                                <div>
                                    <p class="font-bold text-pct-blue">Ricardo Silva</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase">Porto Alegre - RS</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-black">R$ 2.450,00</td>
                        <td class="px-6 py-4 text-gray-500">Há 3 dias</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-amber-100 text-amber-600 rounded text-[9px] font-black uppercase tracking-tighter">Recorrente (Ouro)</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-pct-blue hover:underline font-black text-[10px] uppercase">Histórico</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
