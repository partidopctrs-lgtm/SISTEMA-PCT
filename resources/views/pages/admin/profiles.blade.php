<x-dashboard-layout>
    <x-slot name="title">Gestão de Perfis - PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Gestão de Perfis</h1>
            <p class="text-gray-500 font-medium tracking-wide">Administre os dados e níveis de acesso de todos os membros do movimento.</p>
        </div>
        <div class="flex space-x-3">
             <button class="btn-primary px-6 py-3 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Novo Perfil</span>
            </button>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="glass p-6 rounded-3xl mb-8 flex flex-wrap gap-4 items-center justify-between">
        <div class="flex-1 min-w-[300px] relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" placeholder="Buscar por nome, email ou matrícula..." class="w-full pl-12 pr-4 py-3 bg-white/50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-pct-green outline-none">
        </div>
        <div class="flex gap-2">
            <select class="px-4 py-3 bg-white/50 border border-gray-100 rounded-2xl text-xs font-bold text-pct-blue outline-none border-b-2 border-b-pct-green">
                <option>Todos os Cargos</option>
                <option>Presidente</option>
                <option>Líder Regional</option>
                <option>Afiliado</option>
            </select>
            <select class="px-4 py-3 bg-white/50 border border-gray-100 rounded-2xl text-xs font-bold text-pct-blue outline-none">
                <option>Status: Ativo</option>
                <option>Status: Pendente</option>
                <option>Status: Inativo</option>
            </select>
        </div>
    </div>

    <!-- Member Table -->
    <div class="glass rounded-[2rem] shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-blue-50/50 text-pct-blue text-[10px] font-black uppercase tracking-[0.2em]">
                    <th class="px-8 py-5 border-b border-gray-100">Membro</th>
                    <th class="px-8 py-5 border-b border-gray-100">Matrícula</th>
                    <th class="px-8 py-5 border-b border-gray-100">Função</th>
                    <th class="px-8 py-5 border-b border-gray-100">Status</th>
                    <th class="px-8 py-5 border-b border-gray-100 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach([
                    ['name' => 'Maria Oliveira', 'email' => 'maria@pct.org.br', 'ref' => 'PCT-8892', 'role' => 'Líder Regional', 'status' => 'Ativo'],
                    ['name' => 'João Silva', 'email' => 'joao@pct.org.br', 'ref' => 'PCT-1123', 'role' => 'Afiliado Fundador', 'status' => 'Pendente'],
                    ['name' => 'Ricardo Santos', 'email' => 'ricardo@pct.org.br', 'ref' => 'PCT-0042', 'role' => 'Tesoureiro', 'status' => 'Ativo'],
                ] as $member)
                <tr class="hover:bg-pct-green/5 transition-colors group">
                    <td class="px-8 py-6 border-b border-gray-50">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-full bg-pct-blue/10 flex items-center justify-center font-black text-pct-blue uppercase">
                                {{ substr($member['name'], 0, 1) }}
                            </div>
                            <div>
                                <p class="font-bold text-pct-blue tracking-tight">{{ $member['name'] }}</p>
                                <p class="text-[10px] text-gray-400 font-medium">{{ $member['email'] }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6 border-b border-gray-50">
                        <span class="font-mono text-xs text-gray-500 font-bold bg-gray-50 px-2 py-1 rounded-md">{{ $member['ref'] }}</span>
                    </td>
                    <td class="px-8 py-6 border-b border-gray-50 font-medium text-pct-blue opacity-80">
                        {{ $member['role'] }}
                    </td>
                    <td class="px-8 py-6 border-b border-gray-50">
                        <span class="px-3 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest {{ $member['status'] === 'Ativo' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }}">
                            {{ $member['status'] }}
                        </span>
                    </td>
                    <td class="px-8 py-6 border-b border-gray-50 text-right">
                        <button class="p-2 hover:bg-white rounded-xl transition-colors text-pct-blue" title="Editar">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
