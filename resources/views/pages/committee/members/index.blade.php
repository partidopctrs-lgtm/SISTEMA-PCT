<x-dashboard-layout>
    <x-slot name="title">Gestão de Membros - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div x-data="{ 
        showCreateMember: false,
        showMemberDetails: false,
        selectedMember: {}
    }" class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gestão de Membros</h1>
                <p class="text-gray-500 font-medium mt-1">Controle de base, funções e identificação local.</p>
            </div>

            @if(session('success'))
            <div class="flex-1 max-w-md bg-emerald-50 border border-emerald-100 p-4 rounded-2xl flex items-center gap-3">
                <div class="bg-emerald-500 text-white p-1 rounded-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="text-emerald-700 text-xs font-black uppercase tracking-widest">{{ session('success') }}</p>
            </div>
            @endif

            @if($errors->any())
            <div class="flex-1 max-w-md bg-red-50 border border-red-100 p-4 rounded-2xl">
                <ul class="text-[10px] text-red-600 font-bold list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="flex gap-3">
                <button @click="showCreateMember = true" class="btn-primary flex items-center gap-2">
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
                                <a href="{{ route('committee.members.impersonate', $member->user_id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-all font-black text-sm" title="Acessar Painel do Afiliado">
                                    @
                                </a>
                                <button 
                                    @click="selectedMember = {
                                        name: '{{ $member->user->name }}',
                                        email: '{{ $member->user->email }}',
                                        cpf: '{{ $member->user->cpf ?? 'Não Informado' }}',
                                        phone: '{{ $member->user->phone ?? 'Não Informado' }}',
                                        reg: '{{ $member->user->registration_number }}',
                                        birth: '{{ $member->user->birth_date ? \Carbon\Carbon::parse($member->user->birth_date)->format('d/m/Y') : 'Não Informada' }}'
                                    }; showMemberDetails = true"
                                    class="p-2 text-gray-400 hover:text-blue-600 transition-colors" title="Ver Detalhes">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </button>
                                <a href="{{ route('committee.member.pdf', $member->user_id) }}" class="p-2 text-gray-400 hover:text-emerald-600 transition-colors" title="Ficha de Filiação">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </a>
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

        <!-- Modal Detalhes do Membro -->
        <div x-show="showMemberDetails" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-pct-blue/20 backdrop-blur-sm" x-cloak>
            <div @click.away="showMemberDetails = false" class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
                <div class="bg-pct-blue p-8 text-white relative">
                    <button type="button" @click="showMemberDetails = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-2" x-text="'Matrícula: ' + selectedMember.reg"></h3>
                    <h2 class="text-2xl font-black uppercase tracking-tight" x-text="selectedMember.name"></h2>
                </div>

                <div class="p-8 space-y-6">
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">E-mail</p>
                            <p class="text-sm font-bold text-pct-blue" x-text="selectedMember.email"></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">CPF</p>
                            <p class="text-sm font-bold text-pct-blue" x-text="selectedMember.cpf"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Telefone</p>
                            <p class="text-sm font-bold text-pct-blue" x-text="selectedMember.phone"></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Nascimento</p>
                            <p class="text-sm font-bold text-pct-blue" x-text="selectedMember.birth"></p>
                        </div>
                    </div>
                    
                    <div class="pt-6 border-t border-slate-100 flex justify-end">
                        <button @click="showMemberDetails = false" class="px-8 py-3 bg-slate-100 text-gray-500 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-slate-200 transition-all">
                            Fechar Detalhes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Novo Membro -->
        <div x-show="showCreateMember" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-pct-blue/20 backdrop-blur-sm" x-cloak>
            <div @click.away="showCreateMember = false" class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
                <div class="bg-pct-blue p-8 text-white relative">
                    <button type="button" @click="showCreateMember = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-2">Novo Filiado Local</h3>
                    <h2 class="text-2xl font-black uppercase tracking-tight">Expansão de Base</h2>
                </div>

                <div class="p-8">
                    <form action="{{ route('committee.members.store') }}" method="POST" class="space-y-4">
                        @csrf
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
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Data de Nascimento</label>
                                <input type="date" name="birth_date" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Função</label>
                                <select name="role" required class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                                    <option value="membro">Membro</option>
                                    <option value="lider">Líder</option>
                                    <option value="tesoureiro">Tesoureiro</option>
                                    <option value="secretario">Secretário</option>
                                </select>
                            </div>
                        </div>
                        <div class="pt-4">
                            <button type="submit" class="w-full py-4 bg-pct-blue text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                                Confirmar Filiação
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
