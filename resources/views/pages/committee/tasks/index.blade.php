<x-dashboard-layout>
    <x-slot name="title">Tarefas - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gestão de Tarefas</h1>
                <p class="text-gray-500 font-medium mt-1">Organização interna e prazos do diretório.</p>
            </div>
            <button class="btn-primary flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Nova Tarefa
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach(['Nova', 'Em Andamento', 'Concluída'] as $status)
            <div class="space-y-6">
                <div class="flex items-center justify-between px-4">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest">{{ $status }}</h3>
                    <span class="px-2 py-0.5 bg-slate-100 text-slate-500 text-[10px] font-black rounded-full border border-slate-200">0</span>
                </div>
                
                <div class="space-y-4">
                    <!-- Placeholder de Tarefa -->
                    <div class="card-premium cursor-move hover:shadow-md transition-all">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[8px] font-black rounded-full border border-blue-100 uppercase">Administrativo</span>
                        </div>
                        <h4 class="text-xs font-black text-pct-blue leading-tight mb-4">Atualizar cadastro de membros no sistema nacional</h4>
                        <div class="flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div class="h-6 w-6 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-[8px] font-black text-slate-500 uppercase">U</div>
                            </div>
                            <span class="text-[9px] font-bold text-red-500 uppercase">Prazo: Amanhã</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
