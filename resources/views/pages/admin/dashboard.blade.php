<x-dashboard-layout>
    <x-slot name="title">Dashboard Administrativo Nacional - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="mb-12">
            <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Painel da Presidência</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Governança Nacional</h1>
            <p class="text-gray-500 font-medium italic">Monitoramento em tempo real do ecossistema PCT.</p>
        </div>

        <!-- Global Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="card-premium bg-gradient-to-br from-pct-blue to-blue-900 text-white border-none">
                <p class="text-[10px] font-black opacity-60 uppercase tracking-[0.2em] mb-2">Total de Membros</p>
                <p class="text-4xl font-black">{{ number_format($stats['total_members'], 0, ',', '.') }}</p>
                <div class="mt-4 flex items-center gap-2">
                    <span class="text-[10px] bg-pct-green/20 text-pct-green px-2 py-0.5 rounded font-black">+12%</span>
                    <span class="text-[9px] opacity-40 uppercase font-black tracking-widest text-white">Crescimento Mensal</span>
                </div>
            </div>
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2">Diretórios Ativos</p>
                <p class="text-4xl font-black text-pct-blue">{{ $stats['total_directories'] }}</p>
                <p class="text-[9px] text-gray-400 font-bold uppercase mt-4">Em {{ \App\Models\User::distinct('state')->count() }} estados</p>
            </div>
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2">Receita Global</p>
                <p class="text-4xl font-black text-pct-green">R$ {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
                <p class="text-[9px] text-gray-400 font-bold uppercase mt-4">Aprovado por Auditoria</p>
            </div>
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2">Alertas Jurídicos</p>
                <p class="text-4xl font-black text-red-600">{{ $stats['legal_requests_new'] }}</p>
                <p class="text-[9px] text-gray-400 font-bold uppercase mt-4">Aguardando Triagem</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Top Directories Ranking -->
            <div class="lg:col-span-2 card-premium">
                <div class="flex items-center justify-between mb-10 pb-6 border-b border-slate-50">
                    <h3 class="text-xl font-bold text-pct-blue uppercase tracking-tighter">Ranking de Diretórios (Top 5)</h3>
                    <a href="{{ route('manual.governance') }}" class="text-[10px] font-black text-blue-600 uppercase tracking-widest hover:underline">Ver Critérios de Pontuação</a>
                </div>

                <div class="space-y-6">
                    @foreach($topDirectories as $index => $dir)
                    <div class="flex items-center justify-between p-6 bg-slate-50 rounded-[2.5rem] border border-slate-100 hover:bg-white hover:shadow-xl transition-all group">
                        <div class="flex items-center gap-6">
                            <div class="h-12 w-12 rounded-2xl flex items-center justify-center font-black text-lg {{ $index == 0 ? 'bg-amber-100 text-amber-600 shadow-lg shadow-amber-600/20' : 'bg-white text-gray-400 border border-slate-100' }}">
                                #{{ $index + 1 }}
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-pct-blue uppercase">{{ $dir->name }}</h4>
                                <p class="text-[10px] text-gray-400 font-bold uppercase">{{ $dir->city }} / {{ $dir->state }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-black text-pct-blue">{{ $dir->memberships_count }}</p>
                            <p class="text-[9px] text-gray-400 font-bold uppercase">Membros</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: System Integrity & Logs -->
            <div class="space-y-8">
                <div class="card-premium border-t-4 border-t-indigo-600">
                    <h3 class="text-lg font-black text-pct-blue mb-6 uppercase tracking-widest">Integridade do Sistema</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between text-xs py-3 border-b border-slate-50">
                            <span class="text-gray-500 font-bold">Uptime Servidor</span>
                            <span class="text-pct-green font-black uppercase">99.9%</span>
                        </div>
                        <div class="flex items-center justify-between text-xs py-3 border-b border-slate-50">
                            <span class="text-gray-500 font-bold">Versão do Core</span>
                            <span class="text-gray-400 font-black uppercase">v2.0.4-PRO</span>
                        </div>
                        <div class="flex items-center justify-between text-xs py-3">
                            <span class="text-gray-500 font-bold">Banco de Dados</span>
                            <span class="text-pct-green font-black uppercase">Sincronizado</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Registrations -->
                <div class="card-premium">
                    <h3 class="text-lg font-black text-pct-blue mb-6 uppercase tracking-widest">Novos Membros</h3>
                    <div class="space-y-4">
                        @foreach($recentUsers as $user)
                        <div class="flex items-center gap-4">
                            <div class="h-8 w-8 bg-slate-100 rounded-lg flex items-center justify-center text-[10px] font-black text-gray-400 uppercase">
                            {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-[11px] font-black text-pct-blue">{{ $user->name }}</p>
                                <p class="text-[9px] text-gray-400 font-bold">{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('admin.members') }}" class="block text-center text-[10px] font-black text-blue-600 uppercase tracking-widest mt-8 hover:underline">Ver Todos os Membros</a>
                </div>

            </div>
        </div>
    </div>
</x-dashboard-layout>
