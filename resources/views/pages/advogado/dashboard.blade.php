<x-lawyer-layout>
    @slot('slot_title') Dashboard @endslot

    <div class="mb-10">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-2 opacity-60">Painel do Advogado</p>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Meu Painel</h1>
        <p class="text-slate-500 font-medium mt-1">Bem-vindo, {{ $user->name }} — Corpo Jurídico Nacional PCT</p>
    </div>

    <!-- Métricas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Tarefas Ativas</p>
            <p class="text-4xl font-black text-slate-800">{{ $myTasks->count() }}</p>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Concluídas</p>
            <p class="text-4xl font-black text-emerald-600">{{ $myCompleted }}</p>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Total Recebidas</p>
            <p class="text-4xl font-black text-blue-600">{{ $myTotal }}</p>
        </div>
        <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-3xl p-6 shadow-sm text-white">
            <p class="text-[10px] font-black text-red-200 uppercase tracking-widest mb-3">Urgentes</p>
            <p class="text-4xl font-black">{{ $urgentCount }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Minhas Tarefas Ativas -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h2 class="text-base font-black text-slate-800 uppercase tracking-widest">Próximas Tarefas</h2>
                <a href="{{ route('advogado.tarefas') }}" class="text-[10px] font-black text-amber-600 uppercase tracking-widest hover:text-amber-700">Ver todas →</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($myTasks->take(5) as $task)
                <div class="p-5 hover:bg-slate-50/50 transition-colors">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-black text-slate-800">{{ Str::limit($task->title, 45) }}</p>
                            <p class="text-[10px] text-slate-500 font-bold uppercase mt-1">{{ $task->request_type }} • {{ $task->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="px-2 py-1 text-[8px] font-black uppercase rounded-lg flex-shrink-0
                            {{ $task->priority === 'urgent' ? 'bg-red-100 text-red-700' : ($task->priority === 'high' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-600') }}">
                            {{ $task->priority }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="p-10 text-center">
                    <p class="text-slate-400 text-sm font-medium">Nenhuma tarefa ativa.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Denúncias Recentes -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <h2 class="text-base font-black text-slate-800 uppercase tracking-widest">Denúncias Pendentes</h2>
                <a href="{{ route('advogado.denuncias') }}" class="text-[10px] font-black text-amber-600 uppercase tracking-widest hover:text-amber-700">Ver todas →</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($complaints as $complaint)
                <div class="p-5 hover:bg-slate-50/50 transition-colors">
                    <p class="text-sm font-black text-slate-800">{{ Str::limit($complaint->title ?? 'Denúncia #'.$complaint->id, 45) }}</p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="px-2 py-0.5 bg-amber-100 text-amber-700 text-[8px] font-black rounded-full uppercase">Pendente</span>
                        <p class="text-[10px] text-slate-400 font-bold">{{ $complaint->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <div class="p-10 text-center">
                    <p class="text-slate-400 text-sm font-medium">Nenhuma denúncia pendente.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-lawyer-layout>
