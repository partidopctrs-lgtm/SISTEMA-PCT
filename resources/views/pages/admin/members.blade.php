<x-dashboard-layout>
    <x-slot name="title">Gestão Nacional de Membros - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Base Nacional de Membros</h1>
                <p class="text-gray-500 font-medium">Auditoria, filtragem e gestão de todos os afiliados do movimento.</p>
            </div>
            
            <div class="flex gap-4">
                <form action="{{ route('admin.members') }}" method="GET" class="flex gap-2 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nome, CPF ou E-mail..." class="px-4 py-2 bg-slate-50 border-none rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue min-w-[250px]">
                    <select name="state" class="px-4 py-2 bg-slate-50 border-none rounded-xl text-xs font-bold outline-none">
                        <option value="">Todos Estados</option>
                        @foreach($states as $state)
                        <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>{{ $state }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-pct-blue text-white p-2 rounded-xl hover:bg-blue-900 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Members Table -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Filiado</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Identidade</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Vínculo Local</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Cadastro</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($members as $user)
                    <tr class="hover:bg-slate-50/50 transition-all">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="h-10 w-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 font-black text-xs">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-pct-blue">{{ $user->name }}</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-[10px] font-black text-pct-blue uppercase tracking-widest">Reg: {{ $user->registration_number }}</p>
                            <p class="text-[10px] text-gray-400 font-bold mt-1">CPF: {{ $user->cpf }}</p>
                        </td>
                        <td class="px-8 py-6">
                            @php $membership = $user->memberships->first(); @endphp
                            @if($membership)
                            <p class="text-xs font-bold text-pct-blue">{{ $membership->directory->name ?? 'N/A' }}</p>
                            <p class="text-[9px] text-gray-400 font-black uppercase tracking-widest mt-1">{{ $user->city }} / {{ $user->state }}</p>
                            @else
                            <span class="text-[10px] text-gray-300 font-black uppercase italic">Sem Vínculo Ativo</span>
                            @endif
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $user->status == 'active' ? 'bg-pct-green/10 text-pct-green' : 'bg-red-100 text-red-600' }}">
                                {{ $user->status }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-xs font-bold text-gray-500">{{ $user->created_at->format('d/m/Y') }}</p>
                            <p class="text-[9px] text-gray-400 font-medium">{{ $user->created_at->diffForHumans() }}</p>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex gap-2">
                                <button class="p-2 bg-white border border-slate-200 rounded-xl text-gray-400 hover:text-pct-blue hover:border-pct-blue transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </button>
                                <button class="p-2 bg-white border border-slate-200 rounded-xl text-gray-400 hover:text-red-600 hover:border-red-600 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-20 text-center text-gray-400 font-medium">Nenhum membro encontrado com os filtros aplicados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="px-8 py-6 bg-slate-50/50">
                {{ $members->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-dashboard-layout>
