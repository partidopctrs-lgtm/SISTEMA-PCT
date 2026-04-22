<x-dashboard-layout>
    <x-slot name="title">Centro de Comando: Atendimento PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Inteligência e Defesa Popular</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Painel de Controle Água no RS</h1>
    </div>

    <!-- Stats Matrix -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="card-premium border-t-4 border-t-pct-blue bg-white">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">🏙️ Cidades no Sistema AGERGS</p>
            <p class="text-3xl font-black text-pct-blue">{{ $stats['total_cities_regulated'] }}</p>
            <p class="text-[8px] text-gray-400 font-bold mt-2 uppercase">Base Institucional RS</p>
        </div>
        <div class="card-premium border-t-4 border-t-red-600 bg-white">
            <p class="text-[9px] font-black text-red-600 uppercase tracking-widest mb-2">⚠️ Planejamento Crítico</p>
            <p class="text-3xl font-black text-red-600">{{ $stats['critical_planning_cities'] }}</p>
            <p class="text-[8px] text-red-400 font-bold mt-2 uppercase">PMSB Não Atualizado / Atrasado</p>
        </div>
        <div class="card-premium border-t-4 border-t-amber-500 bg-white">
            <p class="text-[9px] font-black text-amber-500 uppercase tracking-widest mb-2">⚖️ Cidades Multadas (AGERGS)</p>
            <p class="text-3xl font-black text-amber-500">{{ $stats['cities_with_infringements'] }}</p>
            <p class="text-[8px] text-amber-600 font-bold mt-2 uppercase">Histórico de Autos de Infração</p>
        </div>
        <div class="card-premium border-t-4 border-t-pct-green bg-white">
            <p class="text-[9px] font-black text-pct-green uppercase tracking-widest mb-2">📢 Cidades Afetadas (2026)</p>
            <p class="text-3xl font-black text-pct-green">{{ $stats['affected_cities_count'] }}</p>
            <p class="text-[8px] text-pct-green font-bold mt-2 uppercase">Relatos Ativos da População</p>
        </div>
    </div>

    <!-- Secondary Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-blue-900 text-white p-6 rounded-[2rem] flex items-center justify-between shadow-xl">
            <div>
                <p class="text-[8px] font-black uppercase tracking-widest opacity-60">Total Relatos</p>
                <p class="text-2xl font-black">{{ $stats['total'] }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>
        <div class="bg-red-50 text-red-600 p-6 rounded-[2rem] border border-red-100 flex items-center justify-between">
            <div>
                <p class="text-[8px] font-black uppercase tracking-widest opacity-60">Urgentes</p>
                <p class="text-2xl font-black">{{ $stats['urgent'] }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
        </div>
        <div class="bg-amber-50 text-amber-600 p-6 rounded-[2rem] border border-amber-100 flex items-center justify-between">
            <div>
                <p class="text-[8px] font-black uppercase tracking-widest opacity-60">Em Triagem</p>
                <p class="text-2xl font-black">{{ $stats['triage'] }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            </div>
        </div>
        <div class="bg-pct-green/10 text-pct-green p-6 rounded-[2rem] border border-pct-green/20 flex items-center justify-between">
            <div>
                <p class="text-[8px] font-black uppercase tracking-widest opacity-60">Resolvidos</p>
                <p class="text-2xl font-black">{{ $stats['resolved'] }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-pct-green/20 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
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

            <!-- Critical Cities Analysis -->
            <div class="card-premium border-l-4 border-l-red-600 bg-red-50/30">
                <h3 class="text-lg font-black text-red-600 mb-6 uppercase tracking-widest flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Focos de Risco Estrutural
                </h3>
                <p class="text-[10px] text-red-800 font-bold mb-6 uppercase opacity-70 italic">Cidades com PMSB atrasado + Relatos ativos</p>
                
                <div class="space-y-4">
                    @forelse($criticalCitiesWithReports as $city)
                    <div class="p-4 bg-white rounded-2xl border border-red-100 flex items-center justify-between">
                        <span class="text-[10px] font-black text-red-600 uppercase">{{ $city->city }}</span>
                        <span class="px-3 py-1 bg-red-600 text-white rounded-lg text-[9px] font-black">{{ $city->total }} RELATOS</span>
                    </div>
                    @empty
                    <div class="text-center py-6">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Nenhum foco crítico detectado</p>
                    </div>
                    @endforelse
                </div>
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
