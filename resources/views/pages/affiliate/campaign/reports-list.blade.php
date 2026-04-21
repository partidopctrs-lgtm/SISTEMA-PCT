<x-dashboard-layout>
    <x-slot name="title">Lista de Relatos - Mobilização PCT</x-slot>

    <div class="mb-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Relatos Gerados 🧾</h2>
                <p class="text-slate-500 font-medium">Acompanhe todos os registros de problemas de água vindos da sua rede.</p>
            </div>
            <a href="{{ route('affiliate.dashboard') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs uppercase hover:bg-slate-200 transition-all">Voltar ao Painel</a>
        </div>

        <div class="bg-white rounded-[3rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Data</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Cidade / Bairro</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Problema</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($reports as $report)
                        <tr class="hover:bg-slate-50/50 transition-all">
                            <td class="px-8 py-6">
                                <p class="text-xs font-bold text-slate-700">{{ $report->created_at->format('d/m/Y') }}</p>
                                <p class="text-[10px] text-slate-400 font-medium">{{ $report->created_at->format('H:i') }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-xs font-black text-pct-blue uppercase">{{ $report->city }}</p>
                                <p class="text-[10px] text-slate-500 font-bold uppercase">{{ $report->neighborhood }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-blue-50 text-pct-blue rounded-lg text-[10px] font-black border border-blue-100">
                                    {{ $report->problem_type }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <span class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Em Análise</span>
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <button class="p-2 text-slate-400 hover:text-pct-blue transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <p class="text-slate-300 font-bold uppercase italic">Nenhum relato encontrado.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($reports->hasPages())
            <div class="px-8 py-6 bg-slate-50 border-t border-slate-100">
                {{ $reports->links() }}
            </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
