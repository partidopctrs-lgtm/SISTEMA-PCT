<x-lawyer-layout>
    @slot('slot_title') Denúncias @endslot

    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Denúncias Recebidas</h1>
        <p class="text-slate-500 font-medium mt-1">Denúncias enviadas pela base para análise jurídica</p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">ID</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Denunciante</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Categoria</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Alvo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Data</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($complaints as $c)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-4 text-xs font-black text-amber-600">#{{ $c->id }}</td>
                        <td class="px-8 py-4 text-sm font-bold text-slate-800">{{ $c->complainant_name ?? 'Anônimo' }}</td>
                        <td class="px-8 py-4 text-xs font-medium text-slate-600 uppercase">{{ $c->category ?? '—' }}</td>
                        <td class="px-8 py-4 text-xs font-medium text-slate-600">{{ $c->accused_name ?? '—' }}</td>
                        <td class="px-8 py-4">
                            <span class="px-2 py-1 text-[9px] font-black uppercase rounded-lg
                                {{ $c->status === 'pendente' ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ $c->status }}
                            </span>
                        </td>
                        <td class="px-8 py-4 text-xs text-slate-500">{{ $c->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-16 text-center text-slate-400 text-sm">Nenhuma denúncia registrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($complaints->hasPages())
        <div class="p-4 border-t border-slate-100">{{ $complaints->links() }}</div>
        @endif
    </div>
</x-lawyer-layout>
