<x-dashboard-layout>
    <x-slot name="title">Painel do Comitê - {{ $directory->name ?? 'Gestão Local' }} - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Unit Header -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-slate-100 mb-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-10 opacity-10">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v11l10 5 10-5V7L12 2zm0 18l-8-4V8.5l8 4 8-4V16l-8 4z"></path></svg>
            </div>
            
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-4 py-1 bg-emerald-100 text-pct-green text-[10px] font-black rounded-full uppercase tracking-widest border border-emerald-200">{{ $directory->directory_type ?? 'Municipal' }}</span>
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Ativo desde {{ $directory->created_at->format('M/Y') ?? '2026' }}</span>
                    </div>
                    <h1 class="text-4xl font-black text-pct-blue tracking-tight">{{ $directory->name ?? 'Diretório Municipal PCT' }}</h1>
                    <p class="text-gray-500 font-medium mt-2 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $directory->city ?? 'Cidade' }} / {{ $directory->state ?? 'UF' }}
                    </p>
                </div>
                
                <div class="flex gap-4">
                    <a href="{{ route('committee.members') }}" class="btn-primary flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Gestão de Membros
                    </a>
                </div>
            </div>
        </div>

        <!-- Local Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Membros Locais</p>
                <p class="text-3xl font-black text-pct-blue">{{ $stats['members'] }}</p>
                <div class="h-1 w-full bg-slate-100 rounded-full mt-4">
                    <div class="h-full bg-pct-blue w-[60%] rounded-full"></div>
                </div>
            </div>
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Receita (Mês)</p>
                <p class="text-3xl font-black text-pct-green">R$ {{ number_format($stats['revenue'], 2, ',', '.') }}</p>
            </div>
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Despesas (Mês)</p>
                <p class="text-3xl font-black text-red-600">R$ {{ number_format($stats['expenses'], 2, ',', '.') }}</p>
            </div>
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Tarefas Pendentes</p>
                <p class="text-3xl font-black text-amber-600">{{ $stats['pending_tasks'] }}</p>
            </div>
        </div>

        <!-- Local Actions & Support -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Routine Actions -->
                <div class="card-premium">
                    <h3 class="text-xl font-bold text-pct-blue mb-8">Ações de Rotina</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('committee.financial') }}" class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-lg transition-all group flex items-center gap-4">
                            <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-pct-blue shadow-sm group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-pct-blue uppercase">Prestação de Contas</h4>
                                <p class="text-[10px] text-gray-400 font-bold">Enviar recibos e balancete</p>
                            </div>
                        </a>
                        <a href="{{ route('committee.modelos_oficios') }}" class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-lg transition-all group flex items-center gap-4">
                            <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-pct-blue shadow-sm group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-pct-blue uppercase">Modelos Oficiais</h4>
                                <p class="text-[10px] text-gray-400 font-bold">Ofícios, Atas e Documentos</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Manual Guidelines -->
                <div class="card-premium">
                    <h3 class="text-xl font-bold text-pct-blue mb-8">Diretrizes de Diretório (ORG-001)</h3>
                    <div class="space-y-4">
                        @foreach([
                            ['Estrutura Mínima', 'Presidente, Secretário e Tesoureiro são obrigatórios.'],
                            ['Prestação Mensal', 'Todo dia 05 deve ser enviado o balancete ao estadual.'],
                            ['Mobilização Local', 'Mínimo de 1 ação de rua ou evento por mês.']
                        ] as $rule)
                        <div class="p-6 border border-slate-100 rounded-3xl flex items-start gap-4">
                            <div class="h-6 w-6 bg-blue-50 text-pct-blue rounded-full flex items-center justify-center text-[10px] font-black flex-shrink-0">✓</div>
                            <div>
                                <h4 class="text-xs font-black text-pct-blue uppercase">{{ $rule[0] }}</h4>
                                <p class="text-xs text-gray-500 font-medium leading-relaxed">{{ $rule[1] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <!-- Internal Support -->
                <div class="card-premium bg-slate-900 text-white p-10">
                    <h3 class="text-xl font-black mb-6 uppercase tracking-tighter">Suporte à Gestão</h3>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mb-10">Precisa de apoio jurídico ou institucional para o diretório? Abra uma solicitação oficial.</p>
                    <div class="space-y-3">
                        <a href="{{ route('affiliate.suporte') }}#legal" class="block w-full text-center bg-blue-600 text-white font-black py-4 rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20">Apoio Jurídico</a>
                        <a href="{{ route('manual.directories') }}" class="block w-full text-center bg-white/10 text-white font-black py-4 rounded-2xl hover:bg-white/20 transition-all border border-white/10">Manual de Gestão</a>
                    </div>
                </div>

                <!-- KPI Tracker Teaser -->
                <div class="card-premium border-t-4 border-t-pct-green">
                    <h3 class="text-lg font-black text-pct-blue mb-4 uppercase tracking-widest">Ranking Nacional</h3>
                    <p class="text-[10px] text-gray-400 font-bold uppercase mb-6">Sua posição atual</p>
                    <div class="text-center py-6">
                        <span class="text-5xl font-black text-pct-blue">#124</span>
                        <p class="text-xs font-bold text-pct-green mt-2 uppercase tracking-widest">Top 15% Nacional</p>
                    </div>
                    <a href="{{ route('manual.governance') }}" class="block text-center text-[10px] font-black text-blue-600 uppercase tracking-widest mt-6 hover:underline">Como subir no ranking?</a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
