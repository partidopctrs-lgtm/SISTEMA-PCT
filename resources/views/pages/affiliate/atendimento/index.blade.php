<x-dashboard-layout>
    <x-slot name="title">Atendimento PCT - Meus Casos</x-slot>

    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-pct-blue uppercase tracking-tighter">Acompanhamento de Casos</h1>
            <p class="text-gray-500 text-sm font-medium">Gerencie e acompanhe o status de todos os seus relatos oficiais.</p>
        </div>
        <a href="{{ route('affiliate.atendimento.create') }}" class="px-6 py-3 bg-pct-blue text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Novo Relato
        </a>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Total de Casos</p>
            <p class="text-2xl font-black text-pct-blue">{{ $reports->total() }}</p>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm border-l-4 border-l-blue-400">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Em Análise</p>
            <p class="text-2xl font-black text-blue-500">{{ $reports->where('status', 'em análise')->count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm border-l-4 border-l-emerald-400">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Finalizados</p>
            <p class="text-2xl font-black text-pct-green">{{ $reports->where('status', 'finalizado')->count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm border-l-4 border-l-amber-400">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Urgentes</p>
            <p class="text-2xl font-black text-amber-500">{{ $reports->where('is_urgent', true)->count() }}</p>
        </div>
    </div>

    <!-- Reports Table -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Protocolo</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Problema</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Cidade</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Data</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Ação</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($reports as $report)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="text-xs font-black text-pct-blue font-mono">{{ $report->protocol }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-bold text-gray-700 truncate w-48">{{ $report->problem_type }}</p>
                            @if($report->is_urgent)
                                <span class="px-2 py-0.5 bg-red-100 text-red-600 text-[8px] font-black uppercase rounded">Urgente</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">{{ $report->city }}</td>
                        <td class="px-6 py-4 text-xs font-medium text-gray-400">{{ $report->event_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'recebido' => 'bg-blue-100 text-blue-600',
                                    'em análise' => 'bg-amber-100 text-amber-600',
                                    'encaminhado' => 'bg-indigo-100 text-indigo-600',
                                    'finalizado' => 'bg-emerald-100 text-emerald-600',
                                ];
                            @endphp
                            <span class="px-3 py-1 {{ $statusColors[$report->status] ?? 'bg-slate-100 text-slate-600' }} text-[9px] font-black uppercase rounded-full tracking-widest">
                                {{ $report->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('affiliate.atendimento.show', $report->id) }}" class="inline-flex items-center gap-1 text-[10px] font-black text-pct-blue uppercase tracking-widest hover:text-blue-900 transition-colors">
                                Ver Detalhes
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-12 h-12 bg-slate-50 rounded-full flex items-center justify-center text-slate-200">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Nenhum relato encontrado</p>
                                <a href="{{ route('affiliate.atendimento.create') }}" class="text-xs font-black text-pct-blue uppercase hover:underline">Enviar meu primeiro relato</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($reports->hasPages())
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                {{ $reports->links() }}
            </div>
        @endif
    </div>
</x-dashboard-layout>
