<x-dashboard-layout>
    <x-slot name="title">Reembolsos - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gestão de Reembolsos</h1>
                <p class="text-gray-500 font-medium mt-1">Pedidos de reembolso de membros por gastos autorizados.</p>
            </div>
            <button class="btn-primary flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Nova Solicitação
            </button>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Solicitante</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Justificativa</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Valor</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($reimbursements as $reimb)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <p class="text-sm font-black text-pct-blue">{{ $reimb->user->name }}</p>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-xs text-gray-600 font-medium">{{ $reimb->justification }}</p>
                            <p class="text-[9px] text-gray-400 font-black uppercase mt-1">{{ $reimb->category }}</p>
                        </td>
                        <td class="px-8 py-6 text-sm font-black text-pct-blue">R$ {{ number_format($reimb->value, 2, ',', '.') }}</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-[9px] font-black rounded-full border border-blue-200 uppercase">{{ $reimb->status }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <button class="p-2 text-gray-400 hover:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center text-gray-400 italic">Nenhum pedido de reembolso registrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
