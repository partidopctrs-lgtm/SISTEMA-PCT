<x-lawyer-layout>
    @slot('slot_title') Processos @endslot

    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Processos Disciplinares</h1>
        <p class="text-slate-500 font-medium mt-1">Processos disciplinares ativos e histórico</p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Processo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Membro</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tipo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Abertura</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($processos as $p)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-4 text-xs font-black text-amber-600 uppercase">{{ $p->process_code ?? '#'.$p->id }}</td>
                        <td class="px-8 py-4 text-sm font-bold text-slate-800">{{ $p->member->name ?? 'N/A' }}</td>
                        <td class="px-8 py-4 text-xs font-medium text-slate-600 uppercase">{{ $p->type ?? '—' }}</td>
                        <td class="px-8 py-4">
                            <span class="px-2 py-1 text-[9px] font-black uppercase rounded-lg
                                {{ $p->status === 'concluido' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                {{ $p->status }}
                            </span>
                        </td>
                        <td class="px-8 py-4 text-xs text-slate-500">{{ $p->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-16 text-center text-slate-400 text-sm">Nenhum processo registrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($processos->hasPages())
        <div class="p-4 border-t border-slate-100">{{ $processos->links() }}</div>
        @endif
    </div>
</x-lawyer-layout>
