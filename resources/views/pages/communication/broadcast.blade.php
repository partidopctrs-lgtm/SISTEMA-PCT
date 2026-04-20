<x-dashboard-layout>
    <x-slot name="title">Broadcast - PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Comunicação em Massa</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Broadcast Institucional</h1>
            <p class="text-gray-500 font-medium">Gestão de disparos de e-mail e mensagens para a base.</p>
        </div>
        <button class="px-6 py-3 bg-pct-blue text-white text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-blue-800 transition-all shadow-lg shadow-blue-900/20">Novo Disparo</button>
    </div>

    <div class="grid grid-cols-1 gap-8">
        <div class="card-premium">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Histórico de Disparos</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Assunto</th>
                            <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Segmento</th>
                            <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Enviados</th>
                            <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Data</th>
                            <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($broadcasts as $broadcast)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-4">
                                <p class="text-xs font-black text-pct-blue">{{ $broadcast->subject }}</p>
                            </td>
                            <td class="px-8 py-4">
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 text-[9px] font-black rounded-full uppercase">{{ $broadcast->target_segment }}</span>
                            </td>
                            <td class="px-8 py-4 text-xs font-bold text-gray-600">{{ $broadcast->sent_count }}</td>
                            <td class="px-8 py-4 text-xs font-medium text-gray-500">{{ $broadcast->sent_at ? $broadcast->sent_at->format('d/m/Y H:i') : 'Pendente' }}</td>
                            <td class="px-8 py-4">
                                <span class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">Concluído</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-12 text-center text-gray-400 text-sm font-medium">Nenhum disparo registrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>
