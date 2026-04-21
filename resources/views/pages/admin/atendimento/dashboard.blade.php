<x-dashboard-layout>
    <x-slot name="title">Centro de Comando: Atendimento PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Inteligência e Defesa Popular</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Painel de Controle Água no RS</h1>
    </div>

    <!-- Stats Matrix -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-12">
        <div class="card-premium border-t-4 border-t-pct-blue">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Total de Relatos</p>
            <p class="text-3xl font-black text-pct-blue">{{ $stats['total'] }}</p>
        </div>
        <div class="card-premium border-t-4 border-t-red-600 animate-pulse-slow">
            <p class="text-[9px] font-black text-red-600 uppercase tracking-widest mb-2">🔥 Casos Urgentes</p>
            <p class="text-3xl font-black text-red-600">{{ $stats['urgent'] }}</p>
        </div>
        <div class="card-premium border-t-4 border-t-amber-500">
            <p class="text-[9px] font-black text-amber-500 uppercase tracking-widest mb-2">⚖️ Em Triagem</p>
            <p class="text-3xl font-black text-amber-500">{{ $stats['triage'] }}</p>
        </div>
        <div class="card-premium border-t-4 border-t-indigo-600">
            <p class="text-[9px] font-black text-indigo-600 uppercase tracking-widest mb-2">🔍 Em Análise</p>
            <p class="text-3xl font-black text-indigo-600">{{ $stats['in_analysis'] }}</p>
        </div>
        <div class="card-premium border-t-4 border-t-pct-green">
            <p class="text-[9px] font-black text-pct-green uppercase tracking-widest mb-2">✅ Resolvidos</p>
            <p class="text-3xl font-black text-pct-green">{{ $stats['resolved'] }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Intelligent Map / List of Cities -->
        <div class="lg:col-span-2 card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest">Inteligência Territorial (Top 10 Cidades)</h3>
            <div class="space-y-4">
                @foreach($reportsByCity as $city)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 group hover:border-pct-blue transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-2 h-2 rounded-full {{ $city->total > 10 ? 'bg-red-500 animate-ping' : 'bg-blue-400' }}"></div>
                        <span class="text-xs font-black text-pct-blue uppercase tracking-widest">{{ $city->city }}</span>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="text-right">
                            <span class="text-xs font-black text-pct-blue">{{ $city->total }} relatos</span>
                            <div class="w-32 h-1.5 bg-slate-200 rounded-full mt-1 overflow-hidden">
                                <div class="h-full bg-pct-blue" style="width: {{ ($city->total / $stats['total']) * 100 }}%"></div>
                            </div>
                        </div>
                        <a href="{{ route('admin.atendimento.index', ['city' => $city->city]) }}" class="p-2 text-slate-300 hover:text-pct-blue transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Activity & Triage -->
        <div class="space-y-8">
            <div class="card-premium">
                <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest">Últimas Ocorrências</h3>
                <div class="space-y-6">
                    @foreach($recentReports as $report)
                    <div class="flex gap-4 p-4 rounded-2xl border border-transparent hover:bg-slate-50 transition-all">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-pct-blue font-black text-[10px]">
                                {{ substr($report->city, 0, 2) }}
                            </div>
                        </div>
                        <div class="flex-grow min-w-0">
                            <p class="text-[11px] font-black text-pct-blue uppercase truncate">{{ $report->problem_type }}</p>
                            <p class="text-[9px] text-gray-400 font-bold">{{ $report->city }} • {{ $report->created_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ route('admin.atendimento.show', $report->id) }}" class="flex-shrink-0 self-center">
                            <span class="px-2 py-1 bg-white border border-slate-100 rounded-lg text-[8px] font-black text-pct-blue uppercase hover:bg-pct-blue hover:text-white transition-all">Ver</span>
                        </a>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('admin.atendimento.triage') }}" class="block text-center text-[10px] font-black text-amber-600 uppercase tracking-widest mt-8 hover:underline">Ir para Fila de Triagem</a>
            </div>

            <!-- Action Center -->
            <div class="card-premium bg-slate-900 text-white border-none">
                <h3 class="text-sm font-black uppercase tracking-[0.2em] mb-6 opacity-60">Ações Rápidas</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('admin.atendimento.mobilization') }}" class="p-4 bg-white/5 rounded-2xl border border-white/10 text-center hover:bg-white/10 transition-all">
                        <p class="text-[9px] font-black uppercase tracking-widest mb-1">Agrupar Casos</p>
                        <p class="text-[8px] opacity-40">Criar Dossiês</p>
                    </a>
                    <a href="#" class="p-4 bg-white/5 rounded-2xl border border-white/10 text-center hover:bg-white/10 transition-all">
                        <p class="text-[9px] font-black uppercase tracking-widest mb-1">Alertar Regional</p>
                        <p class="text-[8px] opacity-40">Notificações</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
