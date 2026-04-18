<x-dashboard-layout>
    <x-slot name="title">Painel Jurídico - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Compliance & Jurídico</p>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Painel Jurídico Nacional</h1>
                <p class="text-gray-500 font-medium">Gestão de conformidade, solicitações e integridade institucional.</p>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('legal.requests') }}" class="btn-primary flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Ver Todas Solicitações
                </a>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="card-premium border-l-4 border-l-blue-500">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Total de Solicitações</p>
                <p class="text-3xl font-black text-pct-blue">{{ $stats['total'] }}</p>
            </div>
            <div class="card-premium border-l-4 border-l-pct-green">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Novas / Pendentes</p>
                <p class="text-3xl font-black text-pct-blue">{{ $stats['new'] }}</p>
            </div>
            <div class="card-premium border-l-4 border-l-amber-500">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Em Análise</p>
                <p class="text-3xl font-black text-pct-blue">{{ $stats['in_progress'] }}</p>
            </div>
            <div class="card-premium border-l-4 border-l-red-500">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Críticas / Urgentes</p>
                <p class="text-3xl font-black text-red-600">{{ $stats['critical'] }}</p>
            </div>
        </div>

        <!-- Latest Requests & Manual Links -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Latest Requests -->
            <div class="lg:col-span-2 card-premium">
                <h3 class="text-xl font-bold text-pct-blue mb-8">Solicitações Recentes</h3>
                <div class="space-y-4">
                    @forelse($latestRequests as $request)
                    <a href="{{ route('legal.requests.show', $request->id) }}" class="flex items-center justify-between p-6 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-lg transition-all group">
                        <div class="flex items-center gap-6">
                            <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-pct-blue shadow-sm group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                <span class="text-xs font-black">{{ substr($request->request_code, -4) }}</span>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-pct-blue">{{ $request->title }}</h4>
                                <div class="flex items-center gap-3 mt-1">
                                    <span class="text-[10px] text-gray-400 font-bold uppercase">{{ $request->requester->full_name }}</span>
                                    <span class="h-1 w-1 bg-gray-300 rounded-full"></span>
                                    <span class="text-[10px] text-gray-400 font-bold uppercase">{{ $request->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest 
                                {{ $request->status == 'new' ? 'bg-blue-100 text-blue-600' : 
                                   ($request->status == 'in_progress' ? 'bg-amber-100 text-amber-600' : 'bg-pct-green/10 text-pct-green') }}">
                                {{ $request->status }}
                            </span>
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border border-slate-200 text-slate-400">
                                {{ $request->level }}
                            </span>
                        </div>
                    </a>
                    @empty
                    <p class="text-center py-12 text-gray-400 font-medium">Nenhuma solicitação encontrada.</p>
                    @endforelse
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Manual Jurídico Link -->
                <div class="card-premium bg-gradient-to-br from-pct-blue to-blue-900 text-white p-10">
                    <h3 class="text-xl font-black mb-4 uppercase tracking-tighter">Manual JUR-001</h3>
                    <p class="text-xs text-blue-200 font-medium leading-relaxed mb-8">Consulte as diretrizes nacionais, prazos de SLA e fluxos de atendimento oficial do PCT.</p>
                    <a href="{{ route('manual.legal') }}" class="block w-full text-center bg-pct-green text-pct-blue font-black py-4 rounded-2xl hover:bg-white transition-all">Acessar Manual</a>
                </div>

                <!-- Ethics & Integrity -->
                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Integridade</h3>
                    <div class="space-y-4">
                        <a href="{{ route('manual.ethics') }}" class="flex items-center justify-between p-4 bg-indigo-50 text-indigo-700 rounded-2xl font-bold text-xs hover:bg-indigo-100 transition-all">
                            Canais de Denúncia
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <a href="{{ route('manual.disciplinary') }}" class="flex items-center justify-between p-4 bg-slate-50 text-slate-700 rounded-2xl font-bold text-xs hover:bg-slate-100 transition-all">
                            Código Disciplinar
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
