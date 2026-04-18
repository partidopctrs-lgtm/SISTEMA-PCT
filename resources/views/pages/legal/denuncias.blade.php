<x-dashboard-layout>
    <x-slot name="title">Canal de Ética e Denúncias - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Compliance & Integridade</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Canal de Ética</h1>
        <p class="text-gray-500 font-medium">Gestão anônima e segura de infrações ao estatuto do partido.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="card-premium border-l-4 border-l-red-500">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Denúncias Pendentes</p>
            <h3 class="text-3xl font-black text-pct-blue">{{ $stats['pendente'] }}</h3>
            <p class="text-[10px] text-red-600 font-bold mt-2 uppercase tracking-tighter">Ação Requerida</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Em Análise</p>
            <h3 class="text-3xl font-black text-pct-blue">{{ $stats['em_analise'] }}</h3>
            <p class="text-[10px] text-blue-500 font-bold mt-2 uppercase tracking-tighter">Workflow Ativo</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Total Histórico</p>
            <h3 class="text-3xl font-black text-pct-blue">{{ $stats['total'] }}</h3>
            <p class="text-[10px] text-gray-400 font-bold mt-2 uppercase tracking-tighter">Registros de Integridade</p>
        </div>
    </div>

    <div class="card-premium p-0 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Protocolos Recentes</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Protocolo</th>
                        <th class="px-6 py-4">Categoria</th>
                        <th class="px-6 py-4">Data</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($complaints as $complaint)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4 font-black text-pct-blue">#{{ $complaint->id }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $complaint->category }}</td>
                        <td class="px-6 py-4 text-gray-400">{{ $complaint->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-red-100 text-red-600 rounded text-[9px] font-black uppercase">{{ $complaint->status }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-pct-blue hover:underline font-black text-[10px] uppercase">Analisar</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 font-medium">Nenhuma denúncia pendente.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
