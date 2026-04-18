<x-lawyer-layout>
    @slot('slot_title') Minhas Tarefas @endslot

    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Minhas Tarefas</h1>
            <p class="text-slate-500 font-medium mt-1">Solicitações jurídicas atribuídas a você</p>
        </div>
    </div>

    <!-- Filtros -->
    <form method="GET" class="flex flex-wrap gap-3 mb-6">
        <select name="status" onchange="this.form.submit()" class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-bold text-slate-700 outline-none focus:ring-2 focus:ring-amber-500">
            <option value="">Todos os status</option>
            <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>Novo</option>
            <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>Em Andamento</option>
            <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Concluído</option>
        </select>
        <select name="priority" onchange="this.form.submit()" class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-bold text-slate-700 outline-none focus:ring-2 focus:ring-amber-500">
            <option value="">Todas as prioridades</option>
            <option value="urgent" {{ request('priority') === 'urgent' ? 'selected' : '' }}>Urgente</option>
            <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>Alta</option>
            <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Média</option>
            <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Baixa</option>
        </select>
    </form>

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Código</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Título</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tipo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Prioridade</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Prazo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Ação</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($tarefas as $tarefa)
                    <tr class="hover:bg-slate-50/50 transition-colors {{ $tarefa->priority === 'urgent' ? 'border-l-4 border-red-400' : '' }}">
                        <td class="px-8 py-4 text-xs font-black text-amber-600 uppercase">{{ $tarefa->request_code }}</td>
                        <td class="px-8 py-4">
                            <p class="text-sm font-black text-slate-800">{{ Str::limit($tarefa->title, 40) }}</p>
                            <p class="text-[10px] text-slate-400 mt-0.5">{{ $tarefa->requester->name ?? 'N/A' }}</p>
                        </td>
                        <td class="px-8 py-4 text-xs font-medium text-slate-600 uppercase">{{ $tarefa->request_type }}</td>
                        <td class="px-8 py-4">
                            <span class="px-2 py-1 text-[9px] font-black uppercase rounded-lg
                                {{ $tarefa->priority === 'urgent' ? 'bg-red-100 text-red-700' : ($tarefa->priority === 'high' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-600') }}">
                                {{ $tarefa->priority }}
                            </span>
                        </td>
                        <td class="px-8 py-4">
                            <span class="px-2 py-1 text-[9px] font-black uppercase rounded-lg
                                {{ $tarefa->status === 'new' ? 'bg-blue-100 text-blue-700' : ($tarefa->status === 'in_progress' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700') }}">
                                {{ $tarefa->status }}
                            </span>
                        </td>
                        <td class="px-8 py-4 text-xs text-slate-500 font-medium">{{ $tarefa->created_at->addDays(7)->format('d/m/Y') }}</td>
                        <td class="px-8 py-4">
                            <a href="{{ route('advogado.tarefas.show', $tarefa->id) }}"
                                class="px-3 py-1.5 bg-amber-50 text-amber-700 text-[10px] font-black uppercase tracking-widest rounded-lg border border-amber-100 hover:bg-amber-100 transition-colors">
                                Abrir
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-8 py-16 text-center text-slate-400 text-sm font-medium">Nenhuma tarefa encontrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($tarefas->hasPages())
        <div class="p-4 border-t border-slate-100">{{ $tarefas->links() }}</div>
        @endif
    </div>
</x-lawyer-layout>
