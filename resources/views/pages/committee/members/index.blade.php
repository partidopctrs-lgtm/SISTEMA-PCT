<x-dashboard-layout>
    <x-slot name="title">Gestão de Membros - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gestão de Membros</h1>
                <p class="text-gray-500 font-medium mt-1">Controle de base, funções e identificação local.</p>
            </div>
            <div class="flex gap-3">
                <button class="btn-primary flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Cadastrar Manualmente
                </button>
            </div>
        </div>

        <!-- Filtros e Busca -->
        <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-100 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-2 relative">
                    <input type="text" placeholder="Buscar por nome ou CPF..." class="w-full pl-12 pr-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-sm font-medium">
                    <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <select class="px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold text-pct-blue">
                    <option value="">Todas as Funções</option>
                    <option value="presidente">Presidente</option>
                    <option value="tesoureiro">Tesoureiro</option>
                    <option value="secretario">Secretário</option>
                    <option value="membro">Membro Comum</option>
                </select>
                <select class="px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold text-pct-blue">
                    <option value="">Todos os Status</option>
                    <option value="active">Ativo</option>
                    <option value="inactive">Inativo</option>
                    <option value="pending">Pendente</option>
                </select>
            </div>
        </div>

        <!-- Tabela de Membros -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Membro</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Função</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Participação</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($members as $member)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="h-12 w-12 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 font-black">
                                    {{ substr($member->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-pct-blue">{{ $member->user->name }}</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">ID: #{{ str_pad($member->id, 5, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-xs font-bold text-gray-600">
                            {{ $member->role ?? 'Membro' }}
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-emerald-100 text-pct-green text-[9px] font-black rounded-full border border-emerald-200">ATIVO</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-2">
                                <div class="h-1.5 w-24 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-500 w-[75%] rounded-full"></div>
                                </div>
                                <span class="text-[10px] font-black text-blue-600">75%</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors" title="Perfil">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-emerald-600 transition-colors" title="Carteirinha">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-gray-400 font-medium italic">Nenhum membro vinculado a este diretório ainda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            @if($members->hasPages())
            <div class="px-8 py-6 bg-slate-50 border-t border-slate-100">
                {{ $members->links() }}
            </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
