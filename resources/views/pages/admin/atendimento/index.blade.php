<x-dashboard-layout>
    <x-slot name="title">Central de Ocorrências - Atendimento Central</x-slot>

    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h1 class="text-2xl font-black text-pct-blue uppercase tracking-tighter">Central de Ocorrências</h1>
            <p class="text-gray-500 text-sm font-medium">Gestão integral de todos os relatos recebidos pela plataforma.</p>
        </div>
        <div class="flex gap-2">
            <button class="px-6 py-3 bg-white border border-slate-100 rounded-2xl text-xs font-black text-pct-blue uppercase tracking-widest hover:bg-slate-50 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Exportar CSV
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm mb-8">
        <form action="{{ route('admin.atendimento.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="space-y-1">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-2">Cidade</label>
                <input type="text" name="city" value="{{ request('city') }}" placeholder="Buscar cidade..." class="w-full bg-slate-50 border border-slate-50 rounded-xl px-4 py-2 text-xs font-bold text-pct-blue outline-none focus:ring-1 focus:ring-pct-blue">
            </div>
            <div class="space-y-1">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-2">Status</label>
                <select name="status" class="w-full bg-slate-50 border border-slate-50 rounded-xl px-4 py-2 text-xs font-bold text-pct-blue outline-none focus:ring-1 focus:ring-pct-blue appearance-none">
                    <option value="">Todos os Status</option>
                    <option value="recebido" {{ request('status') == 'recebido' ? 'selected' : '' }}>Recebido</option>
                    <option value="em análise" {{ request('status') == 'em análise' ? 'selected' : '' }}>Em Análise</option>
                    <option value="encaminhado" {{ request('status') == 'encaminhado' ? 'selected' : '' }}>Encaminhado</option>
                    <option value="finalizado" {{ request('status') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-2">Gravidade</label>
                <select name="gravity" class="w-full bg-slate-50 border border-slate-50 rounded-xl px-4 py-2 text-xs font-bold text-pct-blue outline-none focus:ring-1 focus:ring-pct-blue appearance-none">
                    <option value="">Todas</option>
                    <option value="baixa" {{ request('gravity') == 'baixa' ? 'selected' : '' }}>Baixa</option>
                    <option value="alta" {{ request('gravity') == 'alta' ? 'selected' : '' }}>Alta / Crítica</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full py-2 bg-pct-blue text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all">Filtrar Resultados</button>
            </div>
        </form>
    </div>

    <!-- Data Grid -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Protocolo</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Cidade / Origem</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tipo de Problema</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Ação</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($reports as $report)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="text-xs font-black text-pct-blue font-mono">{{ $report->protocol }}</span>
                            <p class="text-[8px] text-gray-400 font-bold mt-0.5">{{ $report->created_at->format('d/m/Y H:i') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-black text-pct-blue uppercase">{{ $report->city }}</p>
                            <p class="text-[9px] text-gray-400 font-bold uppercase">{{ $report->affiliate->name ?? 'Externo' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-gray-600">{{ $report->problem_type }}</span>
                                @if($report->gravity == 'alta' || $report->gravity == 'crítica')
                                    <span class="text-[8px] font-black text-red-500 uppercase tracking-widest">● Gravidade Alta</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'recebido' => 'bg-blue-100 text-blue-600',
                                    'em análise' => 'bg-amber-100 text-amber-600',
                                    'encaminhado' => 'bg-indigo-100 text-indigo-600',
                                    'finalizado' => 'bg-emerald-100 text-emerald-600',
                                    'arquivado' => 'bg-slate-100 text-slate-600',
                                ];
                            @endphp
                            <span class="px-3 py-1 {{ $statusColors[$report->status] ?? 'bg-slate-100 text-slate-600' }} text-[8px] font-black uppercase rounded-full tracking-tighter">
                                {{ $report->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.atendimento.show', $report->id) }}" class="inline-flex items-center gap-1 text-[10px] font-black text-pct-blue uppercase tracking-widest hover:text-blue-900">
                                Gerenciar
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 italic">Nenhum registro encontrado com estes filtros.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
            {{ $reports->appends(request()->query())->links() }}
        </div>
    </div>
</x-dashboard-layout>
