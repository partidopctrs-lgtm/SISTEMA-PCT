<x-dashboard-layout>
    <x-slot name="title">Admin - Jurídico Institucional</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Jurídico Institucional</h1>
                @if($activeProcesses > 0)
                    <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-black rounded-full uppercase tracking-widest border border-amber-200">{{ $activeProcesses }} Processos Ativos</span>
                @endif
            </div>
            <p class="text-gray-500 font-medium mt-1">Supervisão de compliance, auditoria disciplinar e denúncias nacionais.</p>
        </div>
        <div class="flex gap-4">
            <button class="px-6 py-3 bg-white border border-slate-200 text-pct-blue rounded-xl text-xs font-black uppercase tracking-widest hover:bg-slate-50 transition-all shadow-sm flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Auditoria de Ética
            </button>
        </div>
    </div>

    <!-- Métricas Jurídicas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Denúncias Pendentes</p>
            <p class="text-4xl font-black text-pct-blue">{{ $complaints instanceof \Illuminate\Pagination\LengthAwarePaginator ? $complaints->total() : $complaints->count() }}</p>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Processos em Curso</p>
            <p class="text-4xl font-black text-amber-600">{{ $activeProcesses }}</p>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Advogados Ativos</p>
            <p class="text-4xl font-black text-pct-blue">12</p>
        </div>
        <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-3xl p-6 shadow-sm text-white">
            <p class="text-[10px] font-black text-emerald-200 uppercase tracking-widest mb-3">Taxa de Resolução</p>
            <p class="text-4xl font-black">94%</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Tabela de Denúncias -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest">Denúncias para Triagem</h2>
                <a href="#" class="text-[10px] font-black text-blue-600 uppercase tracking-widest hover:underline">Ver todas →</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse($complaints as $complaint)
                <div class="p-8 hover:bg-slate-50/50 transition-all flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-black text-pct-blue">{{ Str::limit($complaint->title ?? 'Denúncia de má conduta', 40) }}</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mt-1">{{ $complaint->created_at->diffForHumans() }} • Protocolo: {{ $complaint->id }}</p>
                    </div>
                    <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[9px] font-black rounded-full uppercase border border-amber-200">Pendente</span>
                </div>
                @empty
                <!-- Demo Data -->
                @foreach(['Uso indevido da marca', 'Conflito de interesse local', 'Inconformidade financeira'] as $title)
                <div class="p-8 hover:bg-slate-50/50 transition-all flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-black text-pct-blue">{{ $title }}</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mt-1">Hoje às 14:30 • Protocolo: #{{ rand(1000, 9999) }}</p>
                    </div>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 text-[9px] font-black rounded-full uppercase border border-blue-200">Em Análise</span>
                </div>
                @endforeach
                @endforelse
            </div>
        </div>

        <!-- Tabela de Processos Disciplinares -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest text-amber-600">Processos Disciplinares</h2>
                <button class="px-4 py-2 bg-amber-100 text-amber-700 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-amber-200 transition-all">
                    Novo Processo
                </button>
            </div>
            <div class="divide-y divide-slate-100">
                @if($activeProcesses == 0)
                <div class="p-12 text-center">
                    <div class="h-12 w-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-300 mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <p class="text-xs text-gray-400 font-medium">Nenhum processo disciplinar ativo no momento.</p>
                </div>
                @else
                <!-- Demo Data for Processes -->
                <div class="p-8 hover:bg-slate-50/50 transition-all flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-black text-pct-blue">Processo #{{ rand(100, 999) }} - Diretório RS</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mt-1">Acusado: J. Silva • Relator: Adv. Carlos</p>
                    </div>
                    <span class="px-3 py-1 bg-red-100 text-red-700 text-[9px] font-black rounded-full uppercase border border-red-200">Grave</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-dashboard-layout>
