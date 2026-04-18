<x-dashboard-layout>
    <x-slot name="title">Gestão Nacional de Membros - PCT</x-slot>

    <div x-data="{ showCreateMember: false, mode: 'choice' }" class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Base Nacional de Membros</h1>
                <p class="text-gray-500 font-medium">Auditoria, filtragem e gestão de todos os afiliados do movimento.</p>
            </div>
            
            <div class="flex gap-4">
                <button @click="showCreateMember = true" class="px-6 py-3 bg-pct-blue text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    Novo Membro
                </button>
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
            <!-- ... (tabela existente) ... -->
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
                                <div class="h-10 w-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 font-black text-xs overflow-hidden">
                                    @if($user->photo)
                                        <img src="{{ asset('storage/' . $user->photo) }}" class="w-full h-full object-cover">
                                    @else
                                        {{ substr($user->name, 0, 1) }}
                                    @endif
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

        <!-- Modal Novo Membro -->
        <div x-show="showCreateMember" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-pct-blue/20 backdrop-blur-sm" x-cloak>
            <div @click.away="showCreateMember = false" class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
                <div class="bg-pct-blue p-8 text-white relative">
                    <button type="button" @click="showCreateMember = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-2">Novo Filiado</h3>
                    <h2 class="text-2xl font-black uppercase tracking-tight">Expansão de Base</h2>
                </div>

                <div x-show="mode === 'choice'" class="p-8 space-y-6">
                    <p class="text-xs font-bold text-gray-500 text-center uppercase tracking-wide">Como deseja realizar este cadastro?</p>
                    <div class="grid grid-cols-1 gap-4">
                        <button type="button" @click="mode = 'online'" class="p-6 bg-blue-50 border border-blue-100 rounded-[2rem] text-left hover:bg-blue-100 transition-all group">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-pct-blue rounded-2xl flex items-center justify-center text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-black text-pct-blue uppercase">Filiar Online</p>
                                    <p class="text-[10px] text-blue-400 font-bold uppercase">Cadastro Direto no Sistema</p>
                                </div>
                            </div>
                        </button>
                        <a href="/CARTEIRA D EMENBRO/Ficha_Filiacao_PCT_Oficial.pdf" download class="p-6 bg-slate-50 border border-slate-100 rounded-[2rem] text-left hover:bg-slate-100 transition-all group">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gray-600 rounded-2xl flex items-center justify-center text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-black text-gray-700 uppercase">Baixar Ficha de Filiação</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase">Documento Oficial para Assinatura</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div x-show="mode === 'online'" class="p-8">
                    <form action="{{ route('admin.member.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="role" value="member">
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Nome Completo</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">E-mail de Contato</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">CPF</label>
                                <input type="text" name="cpf" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Telefone</label>
                                <input type="text" name="phone" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Data de Nascimento</label>
                            <input type="date" name="birth_date" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                        </div>
                        <div class="flex gap-2">
                            <button type="button" @click="mode = 'choice'" class="w-1/3 py-4 bg-slate-100 text-gray-400 text-xs font-black uppercase rounded-2xl hover:bg-slate-200">Voltar</button>
                            <button type="submit" class="w-2/3 py-4 bg-pct-blue text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                                Confirmar Filiação
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
