<x-dashboard-layout>
    <x-slot name="title">Fila de Triagem - Atendimento Central</x-slot>

    <div class="mb-8">
        <h1 class="text-2xl font-black text-pct-blue uppercase tracking-tighter">Fila de Triagem</h1>
        <p class="text-gray-500 text-sm font-medium">Analise novos relatos e defina a gravidade e o trâmite inicial.</p>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Protocolo</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Localização</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tipo / Descrição</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Provas</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Ação</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($reports as $report)
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="text-xs font-black text-pct-blue font-mono">{{ $report->protocol }}</span>
                            <p class="text-[9px] text-gray-400 font-bold mt-1">{{ $report->created_at->diffForHumans() }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-black text-gray-700 uppercase">{{ $report->city }}</p>
                            <p class="text-[9px] text-gray-400 font-bold uppercase">{{ $report->neighborhood }}</p>
                        </td>
                        <td class="px-6 py-4 max-w-md">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="px-2 py-0.5 bg-blue-50 text-pct-blue text-[8px] font-black uppercase rounded">{{ $report->problem_type }}</span>
                                @if($report->is_urgent)
                                    <span class="px-2 py-0.5 bg-red-100 text-red-600 text-[8px] font-black uppercase rounded animate-pulse">Urgente</span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500 font-medium truncate italic">"{{ $report->description }}"</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-xs font-black text-pct-blue bg-blue-50 w-8 h-8 rounded-full inline-flex items-center justify-center">
                                {{ $report->evidences->count() }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.atendimento.show', $report->id) }}" class="px-6 py-2 bg-pct-blue text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                                Analisar
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-16 h-16 bg-pct-green/10 text-pct-green rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <p class="text-sm font-black text-pct-blue uppercase tracking-widest">Fila Limpa! Todos os casos triados.</p>
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
