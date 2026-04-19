@extends('layouts.admin')

@section('content')
<div class="p-8 space-y-8" x-data="{ tab: 'identificacao' }">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <a href="{{ route('admin.directories') }}" class="p-2 bg-white rounded-xl border border-slate-200 text-slate-400 hover:text-pct-blue transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h1 class="text-3xl font-black text-pct-blue uppercase tracking-tight">{{ $directory->name }}</h1>
            </div>
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-blue-50 text-pct-blue text-[10px] font-black rounded-full uppercase border border-blue-100">{{ $directory->protocol_number }}</span>
                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black rounded-full uppercase border border-emerald-100">OPE: {{ $directory->operational_status }}</span>
                <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-black rounded-full uppercase border border-amber-100">VÍN: {{ $directory->affiliation_status }}</span>
            </div>
        </div>

        <div class="flex gap-3">
            @if($directory->operational_status === 'pending' || $directory->operational_status === 'submitted')
            <form action="{{ route('admin.directories.approve', $directory->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-6 py-3 bg-emerald-500 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/20">Aprovar Implantação</button>
            </form>
            @endif

            @if($directory->operational_status === 'approved')
            <form action="{{ route('admin.directories.release', $directory->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-6 py-3 bg-pct-blue text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Oficializar Vínculo</button>
            </form>
            @endif
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="flex gap-1 bg-white p-1 rounded-[2rem] border border-slate-100 shadow-sm w-fit overflow-x-auto">
        <button @click="tab = 'identificacao'" :class="tab === 'identificacao' ? 'bg-pct-blue text-white' : 'text-slate-400 hover:text-pct-blue'" class="px-6 py-3 text-[10px] font-black uppercase tracking-widest rounded-[1.8rem] transition-all whitespace-nowrap">Identificação</button>
        <button @click="tab = 'fundadores'" :class="tab === 'fundadores' ? 'bg-pct-blue text-white' : 'text-slate-400 hover:text-pct-blue'" class="px-6 py-3 text-[10px] font-black uppercase tracking-widest rounded-[1.8rem] transition-all whitespace-nowrap">Fundadores</button>
        <button @click="tab = 'diretoria'" :class="tab === 'diretoria' ? 'bg-pct-blue text-white' : 'text-slate-400 hover:text-pct-blue'" class="px-6 py-3 text-[10px] font-black uppercase tracking-widest rounded-[1.8rem] transition-all whitespace-nowrap">Diretoria</button>
        <button @click="tab = 'assembleia'" :class="tab === 'assembleia' ? 'bg-pct-blue text-white' : 'text-slate-400 hover:text-pct-blue'" class="px-6 py-3 text-[10px] font-black uppercase tracking-widest rounded-[1.8rem] transition-all whitespace-nowrap">Assembleia</button>
        <button @click="tab = 'checklist'" :class="tab === 'checklist' ? 'bg-pct-blue text-white' : 'text-slate-400 hover:text-pct-blue'" class="px-6 py-3 text-[10px] font-black uppercase tracking-widest rounded-[1.8rem] transition-all whitespace-nowrap">Checklist & Docs</button>
        <button @click="tab = 'auditoria'" :class="tab === 'auditoria' ? 'bg-pct-blue text-white' : 'text-slate-400 hover:text-pct-blue'" class="px-6 py-3 text-[10px] font-black uppercase tracking-widest rounded-[1.8rem] transition-all whitespace-nowrap">Auditoria</button>
    </div>

    <!-- Tab Contents -->
    <div class="space-y-6">
        
        <!-- Identificação -->
        <div x-show="tab === 'identificacao'" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <h3 class="text-sm font-black text-pct-blue uppercase mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m4 0h1m-5 10h5m-5 4h5m2-10h1m2 0h1m-7 4h1m4 0h1m-5 10h5m-5 4h5"></path></svg>
                        Dados Institucionais
                    </h3>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Cidade / UF</p>
                            <p class="text-sm font-bold text-slate-700">{{ $directory->city }} / {{ $directory->state }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Tipo de Unidade</p>
                            <p class="text-sm font-bold text-slate-700">{{ $directory->directory_type }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">CNPJ</p>
                            <p class="text-sm font-bold text-slate-700">{{ $directory->cnpj ?: 'Não registrado' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Data de Fundação</p>
                            <p class="text-sm font-bold text-slate-700">{{ $directory->founding_date ? date('d/m/Y', strtotime($directory->founding_date)) : 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <h3 class="text-sm font-black text-pct-blue uppercase mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Localização e Contato
                    </h3>
                    <div class="space-y-6">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Endereço Base</p>
                            <p class="text-sm font-bold text-slate-700">{{ $directory->address_base ?: 'Não informado' }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">E-mail Oficial</p>
                                <p class="text-sm font-bold text-slate-700">{{ $directory->email_official ?: 'Não informado' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Telefone/WhatsApp</p>
                                <p class="text-sm font-bold text-slate-700">{{ $directory->phone_contact ?: 'Não informado' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-gradient-to-br from-pct-blue to-blue-900 p-8 rounded-[2.5rem] text-white shadow-xl shadow-blue-900/20">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-4">Responsável Atual</h4>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-xl font-black">
                            {{ substr($directory->president->name ?? '?', 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-black uppercase">{{ $directory->president->name ?? 'Não definido' }}</p>
                            <p class="text-[10px] text-blue-300 font-bold uppercase">Presidente</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm text-center">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Total de Filiados</p>
                    <p class="text-4xl font-black text-pct-blue">{{ $directory->memberships_count }}</p>
                </div>
            </div>
        </div>

        <!-- Checklist -->
        <div x-show="tab === 'checklist'" class="space-y-6">
             <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-sm font-black text-pct-blue uppercase flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Checklist Documental (Página 6)
                    </h3>
                    <span class="text-[10px] font-black text-slate-400 uppercase">Validação Administrativa</span>
                </div>
                
                <div class="space-y-4">
                    @php
                        $items = [
                            'RG e CPF dos Fundadores', 'Título de Eleitor', 'Comprovante de Residência',
                            'Ata Assinada', 'Lista de Presença', 'Estatuto Assinado',
                            'Fotos 3x4 Diretoria', 'CNPJ ou Protocolo', 'Registro em Cartório',
                            'Declaração de Endereço', 'Formulário Completo Assinado', 'Aprovação Regional'
                        ];
                    @endphp
                    @foreach($items as $item)
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 group hover:border-blue-200 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center border border-slate-200 text-slate-300 group-hover:text-pct-blue group-hover:border-blue-200 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-slate-600">{{ $item }}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 bg-slate-200 text-slate-500 text-[8px] font-black rounded-full uppercase">Pendente</span>
                            <button class="text-[10px] font-black text-pct-blue uppercase hover:underline">Validar</button>
                        </div>
                    </div>
                    @endforeach
                </div>
             </div>
        </div>

        <!-- Auditoria -->
        <div x-show="tab === 'auditoria'" class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <h3 class="text-sm font-black text-pct-blue uppercase mb-8 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Histórico de Ações (Auditoria)
            </h3>
            <div class="relative pl-8 border-l-2 border-slate-100 space-y-12">
                @forelse($directory->actions()->latest()->get() as $action)
                <div class="relative">
                    <div class="absolute -left-[41px] top-0 w-5 h-5 bg-white border-4 border-pct-blue rounded-full"></div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-xs font-black text-pct-blue uppercase">{{ $action->action_type }}</p>
                            <span class="text-[10px] text-slate-400 font-bold">{{ $action->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <p class="text-sm text-slate-600 mb-2">{{ $action->reason }}</p>
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px] font-black text-slate-400">
                                {{ substr($action->user->name ?? '?', 0, 1) }}
                            </div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Por: {{ $action->user->name ?? 'Sistema' }} ({{ $action->level ?? 'Admin' }})</p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-xs text-slate-400 font-bold uppercase text-center py-8">Nenhuma ação registrada ainda.</p>
                @endforelse
            </div>
        </div>

        <!-- Fundadores -->
        <div x-show="tab === 'fundadores'">
            @include('pages.admin.directories.tabs.founders')
        </div>

        <!-- Diretoria -->
        <div x-show="tab === 'diretoria'">
            @include('pages.admin.directories.tabs.board')
        </div>

        <!-- Assembleia -->
        <div x-show="tab === 'assembleia'" class="bg-white p-12 rounded-[2.5rem] border border-slate-100 shadow-sm text-center">
            <div class="w-20 h-20 bg-blue-50 rounded-[2rem] flex items-center justify-center text-pct-blue mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </div>
            <h3 class="text-xl font-black text-pct-blue uppercase mb-2">Assembleia de Constituição</h3>
            <p class="text-sm text-slate-400 max-w-sm mx-auto font-bold uppercase tracking-wide">Esta área da ficha manual está sendo digitalizada para permitir a entrada da Ata e Lista de Presença.</p>
        </div>

    </div>
</div>
@endsection
