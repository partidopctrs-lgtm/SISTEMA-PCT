<x-dashboard-layout>
    <x-slot name="title">Gestão de Equipe - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Mobilização de Rua</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Equipe de Campanha</h1>
            <p class="text-gray-500 font-medium">Gestão de cabos eleitorais, fiscais e voluntários.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-6 py-2 bg-pct-blue text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Novo Integrante</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Total Integrantes</p>
            <h3 class="text-3xl font-black text-pct-blue">42</h3>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Cabos Eleitorais</p>
            <h3 class="text-3xl font-black text-pct-blue">12</h3>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Voluntários</p>
            <h3 class="text-3xl font-black text-pct-blue">25</h3>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Fiscais</p>
            <h3 class="text-3xl font-black text-pct-blue">5</h3>
        </div>
    </div>

    <div class="card-premium p-0 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Lista da Equipe</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Nome</th>
                        <th class="px-6 py-4">Função</th>
                        <th class="px-6 py-4">Local de Atuação</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4 font-bold text-pct-blue">João Carlos</td>
                        <td class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">Cabo Eleitoral</td>
                        <td class="px-6 py-4 text-gray-500">Centro Histórico</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-600 rounded text-[9px] font-black uppercase">Ativo</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-pct-blue hover:underline font-black text-[10px] uppercase">Detalhes</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
