<x-dashboard-layout>
    <x-slot name="title">Mapa de Votos - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Inteligência Eleitoral</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Mapa de Calor de Apoiadores</h1>
        <p class="text-gray-500 font-medium">Geolocalização de votos potenciais e concentração de base.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 card-premium bg-slate-100 min-h-[400px] flex items-center justify-center border-dashed border-4 border-slate-200">
            <div class="text-center">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7"></path></svg>
                <p class="text-sm font-black text-slate-400 uppercase tracking-widest">Integração com Google Maps API Pendente</p>
                <button class="mt-6 px-6 py-2 bg-white border border-slate-200 rounded-xl text-[10px] font-black text-pct-blue uppercase tracking-widest hover:bg-slate-50 transition-all">Configurar API Key</button>
            </div>
        </div>

        <div class="space-y-6">
            <div class="card-premium">
                <h3 class="text-sm font-black text-pct-blue mb-6 uppercase tracking-widest">Concentração por Região</h3>
                <div class="space-y-4">
                    @forelse($projections as $proj)
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-500">{{ $proj->neighborhood ?? $proj->city }}</span>
                        <span class="text-xs font-black text-pct-blue">{{ $proj->actual_votes }} / {{ $proj->expected_votes }} votos</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-pct-blue" style="width: {{ $proj->expected_votes > 0 ? ($proj->actual_votes / $proj->expected_votes) * 100 : 0 }}%"></div>
                    </div>
                    @empty
                    <p class="text-xs text-gray-400 font-medium italic">Nenhuma projeção registrada.</p>
                    @endforelse
                </div>
            </div>

            <div class="card-premium bg-emerald-500 text-white border-none shadow-xl shadow-emerald-500/20">
                <h3 class="text-lg font-black mb-2 uppercase tracking-tighter">Meta de Votos</h3>
                <p class="text-4xl font-black mb-4 uppercase">12.500</p>
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-emerald-100">Progresso:</span>
                    <span class="text-[10px] font-black uppercase tracking-widest">15% da meta</span>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
