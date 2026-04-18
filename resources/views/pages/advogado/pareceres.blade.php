<x-lawyer-layout>
    @slot('slot_title') Pareceres @endslot

    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Meus Pareceres</h1>
            <p class="text-slate-500 font-medium mt-1">Produção jurídica individual registrada</p>
        </div>
        <button onclick="document.getElementById('modal-parecer').classList.remove('hidden')"
            class="px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-black uppercase tracking-widest rounded-xl hover:from-amber-400 hover:to-amber-500 transition-all shadow-lg shadow-amber-500/20">
            + Novo Parecer
        </button>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 rounded-2xl border border-emerald-100 text-emerald-700 text-sm font-bold">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Título</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Tipo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Data</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($pareceres as $p)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-4 text-sm font-black text-slate-800">{{ Str::limit($p->title, 50) }}</td>
                        <td class="px-8 py-4 text-xs font-medium text-slate-600 uppercase">{{ $p->type }}</td>
                        <td class="px-8 py-4">
                            <span class="px-2 py-1 text-[9px] font-black uppercase rounded-lg
                                {{ $p->status === 'publicado' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                                {{ $p->status }}
                            </span>
                        </td>
                        <td class="px-8 py-4 text-xs text-slate-500">{{ $p->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-16 text-center text-slate-400 text-sm">Nenhum parecer registrado ainda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($pareceres->hasPages())
        <div class="p-4 border-t border-slate-100">{{ $pareceres->links() }}</div>
        @endif
    </div>

    <!-- Modal Novo Parecer -->
    <div id="modal-parecer" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-black text-slate-800">Registrar Novo Parecer</h2>
                <button onclick="document.getElementById('modal-parecer').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <form method="POST" action="{{ route('advogado.pareceres.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Título do Parecer</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:ring-2 focus:ring-amber-500 outline-none">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tipo</label>
                    <select name="type" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium outline-none focus:ring-2 focus:ring-amber-500">
                        <option value="consulta">Consulta Jurídica</option>
                        <option value="denuncia">Parecer sobre Denúncia</option>
                        <option value="contrato">Análise Contratual</option>
                        <option value="disciplinar">Processo Disciplinar</option>
                        <option value="eleitoral">Orientação Eleitoral</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Conteúdo do Parecer</label>
                    <textarea name="content" rows="6" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:ring-2 focus:ring-amber-500 outline-none resize-none"></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="document.getElementById('modal-parecer').classList.add('hidden')"
                        class="px-5 py-2.5 border border-slate-200 text-slate-600 text-xs font-black uppercase rounded-xl hover:bg-slate-50">
                        Cancelar
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-amber-500 text-white text-xs font-black uppercase tracking-widest rounded-xl hover:bg-amber-600 transition-all">
                        Salvar Parecer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-lawyer-layout>
