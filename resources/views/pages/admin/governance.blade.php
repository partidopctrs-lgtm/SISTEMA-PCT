<x-dashboard-layout>
    <x-slot name="title">Admin - Governança Interna</x-slot>

    <div class="mb-12">
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Governança Interna</h1>
        <p class="text-gray-500 font-medium mt-1">Gestão de cargos, hierarquia e estrutura de comando do movimento.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Estrutura de Cargos -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest">Cargos e Funções</h2>
                    <button class="px-4 py-2 bg-slate-100 text-pct-blue text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-slate-200 transition-all">
                        Adicionar Cargo
                    </button>
                </div>
                
                <div class="divide-y divide-slate-100">
                    @forelse($positions as $pos)
                    <div class="p-8 flex items-center justify-between hover:bg-slate-50/50 transition-all">
                        <div class="flex items-center gap-6">
                            <div class="h-12 w-12 bg-blue-50 rounded-2xl flex items-center justify-center text-pct-blue font-black shadow-inner">
                                {{ $pos->hierarchy_weight ?? 1 }}
                            </div>
                            <div>
                                <p class="text-base font-black text-pct-blue uppercase">{{ $pos->title ?? 'Presidente Nacional' }}</p>
                                <p class="text-[10px] text-gray-400 font-bold tracking-widest uppercase">Nível: {{ $pos->level ?? 'Nacional' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            @php $occupiedBy = $pos->users; @endphp
                            @forelse($occupiedBy as $u)
                                <div class="flex items-center gap-2">
                                    <div class="text-right">
                                        <p class="text-[11px] font-black text-pct-blue uppercase">{{ $u->name }}</p>
                                        <p class="text-[9px] text-gray-400 font-bold uppercase">{{ $u->city }} / {{ $u->state }}</p>
                                    </div>
                                    <div class="h-8 w-8 bg-pct-blue rounded-lg flex items-center justify-center text-[10px] text-white font-black">
                                        {{ substr($u->name, 0, 1) }}
                                    </div>
                                </div>
                            @empty
                                <span class="px-4 py-1.5 bg-slate-100 text-slate-400 text-[9px] font-black rounded-full uppercase border border-slate-200">Vago</span>
                            @endforelse
                        </div>
                    </div>
                    @empty
                    <div class="p-12 text-center">
                        <p class="text-sm text-gray-400 font-medium italic">Nenhum cargo cadastrado no sistema.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar Resumo -->
        <div class="space-y-6">
            <div class="bg-pct-blue rounded-[2.5rem] p-8 text-white shadow-xl shadow-blue-900/20">
                <h3 class="text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] mb-6">Auditoria de Governança</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-medium text-blue-200">Cargos Totais</p>
                        <p class="text-xl font-black">{{ $totalPositions }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-medium text-blue-200">Cargos Ocupados</p>
                        <p class="text-xl font-black">{{ $occupiedPositions }}</p>
                    </div>
                    <div class="pt-6 border-t border-white/10">
                        <div class="h-2 bg-blue-950/50 rounded-full overflow-hidden">
                            <div class="h-full bg-pct-green" style="width: {{ $totalPositions > 0 ? ($occupiedPositions / $totalPositions) * 100 : 0 }}%"></div>
                        </div>
                        <p class="text-[10px] font-black text-pct-green mt-2 uppercase">{{ $totalPositions > 0 ? round(($occupiedPositions / $totalPositions) * 100) : 0 }}% da Estrutura Ocupada</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 text-center">
                <div class="h-16 w-16 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-500 mx-auto mb-4 border border-amber-100">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h4 class="text-sm font-black text-pct-blue uppercase tracking-widest mb-2">Comando & Controle</h4>
                <p class="text-[10px] text-gray-500 font-medium mb-6">Acesse o sistema de votação interna para decisões de alta cúpula.</p>
                <button class="w-full py-3 bg-slate-100 text-pct-blue text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-slate-200 transition-all">
                    Abrir Votação
                </button>
            </div>
        </div>
    </div>
</x-dashboard-layout>
