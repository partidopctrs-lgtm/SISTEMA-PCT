<x-dashboard-layout>
    <x-slot name="title">Assinaturas de Apoio - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Criação do Partido</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Coleta de Assinaturas</h1>
        <p class="text-gray-500 font-medium">Gestão de fichas de apoio para a oficialização do partido na sua região.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Meta Local</p>
            <h3 class="text-3xl font-black text-pct-blue">1.500</h3>
            <p class="text-[10px] text-gray-400 font-bold mt-2 uppercase">Assinaturas validadas</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Coletadas</p>
            <h3 class="text-3xl font-black text-pct-blue">450</h3>
            <div class="w-full h-1.5 bg-slate-100 rounded-full mt-4 overflow-hidden">
                <div class="h-full bg-pct-blue" style="width: 30%"></div>
            </div>
        </div>
        <div class="card-premium border-l-4 border-l-emerald-500">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Aprovação TSE</p>
            <h3 class="text-3xl font-black text-pct-blue">320</h3>
            <p class="text-[10px] text-emerald-600 font-bold mt-2 uppercase">Já conferidas pelo cartório</p>
        </div>
    </div>

    <div class="card-premium p-0 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Fichas Enviadas</h3>
            <button class="px-6 py-2 bg-pct-blue text-white rounded-xl text-[10px] font-black uppercase tracking-widest">Lançar Nova Ficha</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Eleitor</th>
                        <th class="px-6 py-4">CPF / Título</th>
                        <th class="px-6 py-4">Data Coleta</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($signatures as $sig)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4 font-bold text-pct-blue">{{ $sig->name }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $sig->cpf }}</td>
                        <td class="px-6 py-4 text-gray-400">{{ $sig->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 rounded text-[9px] font-black uppercase">{{ $sig->status }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-pct-blue hover:underline font-black text-[10px] uppercase">Ver Ficha</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 font-medium">Nenhuma assinatura registrada nesta zona.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
