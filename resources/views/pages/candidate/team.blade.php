<x-dashboard-layout>
    <x-slot name="title">Gestão de Equipe - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Mobilização de Rua</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Equipe de Campanha</h1>
            <p class="text-gray-500 font-medium">Gestão de cabos eleitorais, fiscais e voluntários.</p>
        </div>
        <div class="flex gap-3">
            <button onclick="document.getElementById('modal-equipe').classList.remove('hidden')" class="px-6 py-2 bg-pct-blue text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Novo Integrante</button>
        </div>
    </div>

    <!-- Modal Novo Integrante -->
    <div id="modal-equipe" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-8 max-w-md w-full shadow-2xl">
            <h3 class="text-xl font-bold text-pct-blue mb-6">Adicionar Integrante</h3>
            <form action="{{ route('candidate.team.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">E-mail do Usuário (Já cadastrado no sistema)</label>
                    <input type="email" name="email" required class="w-full bg-slate-50 border-none rounded-xl p-4 text-sm" placeholder="email@exemplo.com">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Função na Campanha</label>
                    <select name="role" required class="w-full bg-slate-50 border-none rounded-xl p-4 text-sm">
                        <option value="Coordenador Geral">Coordenador Geral</option>
                        <option value="Coordenador de Base">Coordenador de Base</option>
                        <option value="Cabo Eleitoral">Cabo Eleitoral</option>
                        <option value="Fiscal">Fiscal</option>
                        <option value="Voluntário">Voluntário</option>
                    </select>
                </div>
                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="document.getElementById('modal-equipe').classList.add('hidden')" class="flex-1 py-3 text-gray-500 font-bold">Cancelar</button>
                    <button type="submit" class="flex-1 py-3 bg-pct-blue text-white rounded-xl font-bold">Adicionar à Equipe</button>
                </div>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Total Integrantes</p>
            <h3 class="text-3xl font-black text-pct-blue">{{ $team->count() }}</h3>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Coordenadores</p>
            <h3 class="text-3xl font-black text-pct-blue">{{ $team->where('role', 'Coordenador de Base')->count() }}</h3>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Voluntários</p>
            <h3 class="text-3xl font-black text-pct-blue">{{ $team->where('role', 'Voluntário')->count() }}</h3>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Ativos</p>
            <h3 class="text-3xl font-black text-emerald-500">{{ $team->where('is_active', true)->count() }}</h3>
        </div>
    </div>

    <div class="card-premium p-0 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Lista da Equipe</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Nome</th>
                        <th class="px-6 py-4">Função</th>
                        <th class="px-6 py-4">Local de Atuação</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($team as $member)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4 font-bold text-pct-blue">{{ $member->user->name }}</td>
                        <td class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase tracking-widest">{{ $member->role }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $member->user->city }}/{{ $member->user->state }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 {{ $member->is_active ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }} rounded text-[9px] font-black uppercase">
                                {{ $member->is_active ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-pct-blue hover:underline font-black text-[10px] uppercase">Detalhes</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400 text-sm font-medium">Nenhum integrante cadastrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
