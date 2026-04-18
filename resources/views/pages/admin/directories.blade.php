<x-dashboard-layout>
    <x-slot name="title">Admin - Gestão de Diretórios</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gestão de Diretórios</h1>
            <p class="text-gray-500 font-medium mt-1">Organização da estrutura local e monitoramento de desempenho regional.</p>
        </div>
        <button class="px-6 py-3 bg-pct-blue text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Novo Diretório
        </button>
    </div>

    <!-- Filtros e Busca -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="md:col-span-2 relative">
            <input type="text" placeholder="Buscar diretório por nome ou cidade..." class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-medium focus:ring-2 focus:ring-pct-blue outline-none shadow-sm">
            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="px-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-black text-pct-blue uppercase tracking-widest outline-none shadow-sm">
            <option value="">Tipo: Todos</option>
            <option value="municipal">Municipal</option>
            <option value="estadual">Estadual</option>
            <option value="nacional">Nacional</option>
        </select>
        <select class="px-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-black text-pct-blue uppercase tracking-widest outline-none shadow-sm">
            <option value="">Status: Todos</option>
            <option value="active">Ativo</option>
            <option value="pending">Pendente</option>
            <option value="inactive">Inativo</option>
        </select>
    </div>

    <!-- Tabela de Diretórios -->
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50/50">
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Identificação</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Localidade</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Tipo / Nível</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Filiados</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($committees as $dir)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-8 py-6">
                        <p class="text-sm font-black text-pct-blue uppercase">{{ $dir->name }}</p>
                        <p class="text-[10px] text-gray-400 font-bold mt-0.5">ID: #DIR-{{ str_pad($dir->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-xs font-bold text-gray-600">{{ $dir->city }}</p>
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">{{ $dir->state }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 bg-blue-50 text-pct-blue text-[9px] font-black rounded-full uppercase border border-blue-100">
                            {{ $dir->directory_type ?? 'Municipal' }}
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-black text-pct-blue">{{ $dir->memberships_count ?? 0 }}</span>
                            <div class="h-1.5 w-16 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-pct-green" style="width: {{ min(100, ($dir->memberships_count ?? 0) / 10) }}%"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 {{ $dir->status === 'active' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-amber-50 text-amber-600 border-amber-100' }} text-[9px] font-black rounded-full uppercase border">
                            {{ $dir->status === 'active' ? 'Ativo' : 'Pendente' }}
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            <button class="p-2 bg-white border border-slate-200 rounded-xl text-gray-400 hover:text-pct-blue hover:border-pct-blue transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                            <button class="p-2 bg-white border border-slate-200 rounded-xl text-gray-400 hover:text-pct-blue hover:border-pct-blue transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-8 py-20 text-center text-gray-400 font-medium">Nenhum diretório registrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($committees->hasPages())
        <div class="px-8 py-6 bg-slate-50/50">
            {{ $committees->links() }}
        </div>
        @endif
    </div>
</x-dashboard-layout>
