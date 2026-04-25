<x-dashboard-layout>
    <x-slot name="title">Admin - Gestão de Diretórios</x-slot>

    <div x-data="{ 
        showView: false, 
        showEdit: false, 
        showCreate: false,
        selectedDir: {},
        openView(dir) {
            this.selectedDir = dir;
            this.showView = true;
        },
        openEdit(dir) {
            this.selectedDir = dir;
            this.showEdit = true;
        }
    }">
        <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gestão de Núcleos</h1>
                <p class="text-gray-500 font-medium mt-1">Organização da estrutura local e monitoramento de desempenho regional.</p>
            </div>
            <button @click="showCreate = true" class="px-6 py-3 bg-pct-blue text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Novo Núcleo
            </button>
        </div>
        <!-- Filtros e Busca -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="md:col-span-2 relative">
                <input type="text" placeholder="Buscar núcleo por nome ou cidade..." class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-medium focus:ring-2 focus:ring-pct-blue outline-none shadow-sm">
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

        <!-- Tabela de Núcleos -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Identificação</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Localidade</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Tipo / Nível</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Membros</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($committees as $dir)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <a href="{{ route('admin.directories.show', $dir->id) }}" class="text-sm font-black text-pct-blue uppercase hover:underline decoration-2 underline-offset-4">{{ $dir->name }}</a>
                            <p class="text-[10px] text-gray-400 font-bold mt-0.5">Protocolo: {{ $dir->protocol_number ?? 'NUC-'.$dir->id }}</p>
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
                            <div class="flex flex-col gap-1">
                                <span class="px-2 py-0.5 {{ in_array($dir->operational_status, ['active', 'approved']) ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : ($dir->operational_status === 'blocked' ? 'bg-red-50 text-red-600 border-red-100' : 'bg-amber-50 text-amber-600 border-amber-100') }} text-[8px] font-black rounded-md uppercase border w-fit">
                                    OPE: {{ $dir->operational_status }}
                                </span>
                                <span class="px-2 py-0.5 bg-blue-50 text-pct-blue border-blue-100 text-[8px] font-black rounded-md uppercase border w-fit">
                                    VÍN: {{ $dir->affiliation_status }}
                                </span>
                                <span class="px-2 py-0.5 bg-slate-50 text-slate-500 border-slate-100 text-[8px] font-black rounded-md uppercase border w-fit">
                                    JUR: {{ $dir->legal_status }}
                                </span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex gap-2">
                                @if($dir->operational_status === 'pending' || $dir->operational_status === 'submitted')
                                <form action="{{ route('admin.directories.approve', $dir->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 bg-white border border-slate-200 rounded-xl text-emerald-500 hover:text-emerald-700 hover:border-emerald-500 hover:bg-emerald-50 transition-all" title="Aprovar Implantação">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </form>
                                @endif

                                @if($dir->operational_status === 'approved')
                                <form action="{{ route('admin.directories.release', $dir->id) }}" method="POST" class="inline">
                                    @csrf
                                </form>
                                @endif

                                @if($dir->status === 'active')
                                <form action="{{ route('admin.directories.block', $dir->id) }}" method="POST" class="inline" onsubmit="return confirm('Deseja realmente BLOQUEAR este núcleo?')">
                                    @csrf
                                    <input type="hidden" name="reason" value="Bloqueio administrativo temporário.">
                                    <button type="submit" class="p-2 bg-white border border-slate-200 rounded-xl text-amber-600 hover:text-amber-800 hover:border-amber-600 hover:bg-amber-50 transition-all" title="Bloquear Operações">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    </button>
                                </form>
                                @endif

                                <button @click="openView({{ json_encode($dir) }})" class="p-2 bg-white border border-slate-200 rounded-xl text-gray-400 hover:text-pct-blue hover:border-pct-blue transition-all" title="Visualizar Detalhes">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </button>
                                <a href="{{ route('admin.directories.export', $dir->id) }}" target="_blank" class="p-2 bg-white border border-slate-200 rounded-xl text-gray-400 hover:text-pct-green hover:border-pct-green transition-all" title="Baixar Ficha (PDF)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                </a>
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

        <!-- Modal Visualizar -->
        <div x-show="showView" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-pct-blue/20 backdrop-blur-sm" x-cloak>
            <div @click.away="showView = false" class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
                <div class="bg-pct-blue p-8 text-white relative">
                    <button @click="showView = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-2">Detalhes do Núcleo</h3>
                    <h2 class="text-2xl font-black uppercase tracking-tight" x-text="selectedDir.name"></h2>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Localidade</p>
                            <p class="text-sm font-bold text-pct-blue" x-text="selectedDir.city + ' / ' + selectedDir.state"></p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Tipo de Unidade</p>
                            <span class="px-2 py-0.5 bg-blue-50 text-pct-blue text-[9px] font-black rounded-full uppercase" x-text="selectedDir.directory_type"></span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Status Atual</p>
                            <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase" 
                                  :class="selectedDir.status === 'active' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600'"
                                  x-text="selectedDir.status === 'active' ? 'Ativo' : 'Pendente'"></span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Membros Vinculados</p>
                            <p class="text-sm font-black text-pct-blue" x-text="selectedDir.memberships_count"></p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button @click="showView = false" class="w-1/3 py-4 bg-slate-100 text-gray-500 text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-slate-200 transition-all">
                            Fechar
                        </button>
                        <a :href="'/admin/diretorios/' + selectedDir.id + '/export'" target="_blank" class="w-2/3 py-4 bg-pct-blue text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-blue-900 transition-all flex items-center justify-center gap-2 shadow-lg shadow-blue-900/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Baixar Ficha Completa (PDF)
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <div x-show="showEdit" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-pct-blue/20 backdrop-blur-sm" x-cloak>
            <div @click.away="showEdit = false" class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
                <form :action="'/admin/diretorios/' + selectedDir.id + '/update'" method="POST">
                    @csrf
                    <div class="bg-pct-green p-8 text-white relative">
                        <div class="absolute top-6 right-6 flex gap-2">
                            <a :href="'/admin/diretorios/' + selectedDir.id + '/export'" target="_blank" class="p-2 bg-white text-pct-green rounded-xl hover:bg-green-50 transition-all shadow-md" title="Baixar Ficha Inteligente">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            </a>
                            <button type="button" @click="showEdit = false" class="p-2 bg-white/10 hover:bg-white/20 rounded-xl transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-green-100 mb-2">Painel de Edição</h3>
                        <h2 class="text-2xl font-black uppercase tracking-tight">Atualizar Núcleo</h2>
                    </div>
                    <div class="p-8 space-y-4">
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Nome do Núcleo</label>
                            <input type="text" name="name" x-model="selectedDir.name" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-green transition-all">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Cidade</label>
                                <input type="text" name="city" x-model="selectedDir.city" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">UF</label>
                                <input type="text" name="state" x-model="selectedDir.state" maxlength="2" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none uppercase">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Tipo</label>
                                <select name="directory_type" x-model="selectedDir.directory_type" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                                    <option value="Municipal">Municipal</option>
                                    <option value="Estadual">Estadual</option>
                                    <option value="Nacional">Nacional</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Status</label>
                                <select name="status" x-model="selectedDir.status" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                                    <option value="active">Ativo</option>
                                    <option value="pending">Pendente</option>
                                    <option value="inactive">Inativo</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="w-full py-4 mt-4 bg-pct-green text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-green-700 transition-all shadow-lg shadow-green-700/20">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Novo Diretório -->
        <div x-show="showCreate" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-pct-blue/20 backdrop-blur-sm" x-cloak>
            <div @click.away="showCreate = false" class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
                <form action="{{ route('admin.directories.store') }}" method="POST">
                    @csrf
                    <div class="bg-pct-blue p-8 text-white relative">
                        <button type="button" @click="showCreate = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                        <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-2">Novo Registro</h3>
                        <h2 class="text-2xl font-black uppercase tracking-tight">Criar Unidade Territorial</h2>
                    </div>
                    <div x-data="{ mode: 'choice' }">
                        <div x-show="mode === 'choice'" class="p-8 space-y-6">
                            <p class="text-xs font-bold text-gray-500 text-center uppercase tracking-wide">Como deseja realizar este cadastro?</p>
                            <div class="grid grid-cols-1 gap-4">
                                <button type="button" @click="mode = 'online'" class="p-6 bg-blue-50 border border-blue-100 rounded-[2rem] text-left hover:bg-blue-100 transition-all group">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-pct-blue rounded-2xl flex items-center justify-center text-white">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 21l3-1 3 1-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-pct-blue uppercase">Preencher Online</p>
                                            <p class="text-[10px] text-blue-400 font-bold uppercase">Sistema Inteligente PCT</p>
                                        </div>
                                    </div>
                                </button>
                                <a href="/CARTEIRA D EMENBRO/Cadastro_Diretorio_PCT.pdf" download class="p-6 bg-slate-50 border border-slate-100 rounded-[2rem] text-left hover:bg-slate-100 transition-all group">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gray-600 rounded-2xl flex items-center justify-center text-white">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-black text-gray-700 uppercase">Baixar Ficha Oficial</p>
                                            <p class="text-[10px] text-gray-400 font-bold uppercase">Documento PDF para Impressão</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div x-show="mode === 'online'" class="p-8 space-y-4">
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Nome da Unidade (Ex: Núcleo Regional RS)</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Cidade Sede</label>
                                    <input type="text" name="city" required class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                                </div>
                                <div>
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">UF</label>
                                    <input type="text" name="state" required maxlength="2" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none uppercase">
                                </div>
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Tipo / Nível</label>
                                <select name="directory_type" required class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                                    <option value="Municipal">Municipal</option>
                                    <option value="Estadual">Estadual</option>
                                    <option value="Nacional">Nacional</option>
                                </select>
                            </div>
                            <div class="space-y-4 pt-4 border-t border-slate-100">
                                <p class="text-[10px] font-black text-pct-blue uppercase tracking-widest">Gestores do Núcleo</p>
                                <div>
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Coordenador</label>
                                    <select name="president_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                                        <option value="">Selecione o Coordenador</option>
                                        @foreach($users ?? [] as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Secretário</label>
                                        <select name="secretary_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                                            <option value="">Selecione...</option>
                                            @foreach($users ?? [] as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Tesoureiro</label>
                                        <select name="treasurer_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                                            <option value="">Selecione...</option>
                                            @foreach($users ?? [] as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Endereço Base</label>
                                <input type="text" name="address_base" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none">
                            </div>
                            <div class="flex gap-2">
                                <button type="button" @click="mode = 'choice'" class="w-1/3 py-4 bg-slate-100 text-gray-400 text-xs font-black uppercase rounded-2xl hover:bg-slate-200">Voltar</button>
                                <button type="submit" class="w-2/3 py-4 bg-pct-blue text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                                    Confirmar Cadastro
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
