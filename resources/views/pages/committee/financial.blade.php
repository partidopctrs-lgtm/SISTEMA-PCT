<x-dashboard-layout>
    <x-slot name="title">Gestão Financeira Local - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Financeiro do Diretório</h1>
                <p class="text-gray-500 font-medium">Gestão de receitas, despesas e transparência local.</p>
            </div>
            <button onclick="document.getElementById('modal-new-record').classList.remove('hidden')" class="btn-primary flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Novo Registro
            </button>
        </div>

        <!-- Records Table -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Data</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Tipo</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Categoria</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Descrição</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Valor</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($records as $record)
                    <tr class="hover:bg-slate-50/50 transition-all">
                        <td class="px-8 py-6 text-xs font-bold text-gray-500">{{ $record->created_at->format('d/m/Y') }}</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $record->type == 'revenue' ? 'bg-emerald-100 text-pct-green' : 'bg-red-100 text-red-600' }}">
                                {{ $record->type == 'revenue' ? 'Receita' : 'Despesa' }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-xs font-black text-pct-blue">{{ $record->category }}</td>
                        <td class="px-8 py-6 text-xs text-gray-600 font-medium">{{ $record->description }}</td>
                        <td class="px-8 py-6 text-sm font-black {{ $record->type == 'revenue' ? 'text-pct-green' : 'text-red-600' }}">
                            {{ $record->type == 'revenue' ? '+' : '-' }} R$ {{ number_format($record->amount, 2, ',', '.') }}
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[9px] font-black uppercase tracking-widest {{ $record->status == 'approved' ? 'text-pct-green' : ($record->status == 'pending' ? 'text-amber-500' : 'text-red-600') }}">
                                {{ $record->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-20 text-center text-gray-400 font-medium">Nenhum registro financeiro encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-8 py-6">
                {{ $records->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Novo Registro -->
    <div id="modal-new-record" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-[3rem] p-12 max-w-xl w-full mx-4 shadow-2xl relative">
            <button onclick="document.getElementById('modal-new-record').classList.add('hidden')" class="absolute top-8 right-8 text-gray-400 hover:text-pct-blue transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <h2 class="text-2xl font-black text-pct-blue mb-8">Novo Lançamento Local</h2>
            
            <form action="{{ route('committee.financial.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Tipo</label>
                        <select name="type" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                            <option value="revenue">Receita (+)</option>
                            <option value="expense">Despesa (-)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Valor (R$)</label>
                        <input type="number" step="0.01" name="amount" required placeholder="0,00" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Categoria</label>
                    <select name="category" required class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                        <option value="Eventos">Eventos e Mobilização</option>
                        <option value="Material">Material de Propaganda</option>
                        <option value="Aluguel">Aluguel / Sede</option>
                        <option value="Doação">Doação de Membro</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Descrição / Finalidade</label>
                    <textarea name="description" rows="3" required placeholder="Ex: Pagamento de flyers para ação de sábado" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all resize-none"></textarea>
                </div>

                <div class="p-4 bg-blue-50 rounded-2xl border border-blue-100 flex items-start gap-4">
                    <svg class="w-5 h-5 text-pct-blue mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-[9px] text-blue-900 font-bold leading-relaxed uppercase tracking-wide">Todo lançamento exige comprovação via recibo ou nota fiscal enviada posteriormente ao sistema de auditoria nacional.</p>
                </div>

                <button type="submit" class="w-full py-4 bg-pct-blue text-white font-black rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20 uppercase tracking-widest text-[11px]">Protocolar Lançamento</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
