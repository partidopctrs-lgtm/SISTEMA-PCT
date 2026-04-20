<x-dashboard-layout>
    <x-slot name="title">Tribunal Digital - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Justiça Partidária</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Tribunal Digital</h1>
        <p class="text-gray-500 font-medium">Gestão de processos disciplinares e ética partidária.</p>
    </div>

    <div class="card-premium">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Processos em Tramitação</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Processo</th>
                        <th class="px-6 py-4">Acusado</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Data Abertura</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($processos as $proc)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4 font-black text-pct-blue">#{{ str_pad($proc->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-6 py-4 font-bold text-gray-700">{{ $proc->member->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-amber-100 text-amber-600 rounded text-[9px] font-black uppercase">{{ $proc->status }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $proc->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">
                            <button class="text-pct-blue hover:underline font-black text-[10px] uppercase">Acessar Autos</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 text-sm font-medium">Nenhum processo em tramitação.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
