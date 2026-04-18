<x-dashboard-layout>
    <x-slot name="title">Processos Disciplinares - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Comitê de Ética</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Processos Disciplinares</h1>
            <p class="text-gray-500 font-medium">Tramitação interna de suspensões, advertências e expulsões.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-6 py-2 bg-red-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-red-700 transition-all shadow-lg shadow-red-600/20">Instaurar Processo</button>
        </div>
    </div>

    <div class="card-premium p-0 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Processos em Andamento</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Processo</th>
                        <th class="px-6 py-4">Membro Alvo</th>
                        <th class="px-6 py-4">Infração</th>
                        <th class="px-6 py-4">Fase Atual</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-600">
                    @forelse($processos as $p)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4 font-black text-pct-blue">#{{ $p->id }}</td>
                        <td class="px-6 py-4 font-bold">{{ $p->target_member_name }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $p->violation_type }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-amber-100 text-amber-600 rounded text-[9px] font-black uppercase">{{ $p->status }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="px-4 py-1.5 bg-pct-blue text-white rounded-lg text-[10px] font-black uppercase tracking-widest">Gerenciar</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 font-medium">Nenhum processo disciplinar ativo.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
