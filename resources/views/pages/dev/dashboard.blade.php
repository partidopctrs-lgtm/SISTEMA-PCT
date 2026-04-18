<x-dashboard-layout>
    <x-slot name="title">Portal DEV - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Infraestrutura & DevOps</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Centro de Comando Técnico</h1>
            <p class="text-gray-500 font-medium">Monitoramento em tempo real da infraestrutura nacional do PCT.</p>
        </div>
        <div class="flex items-center gap-4">
            <span class="flex items-center gap-2 px-4 py-2 bg-emerald-500/10 text-emerald-600 rounded-2xl text-[10px] font-black uppercase tracking-widest border border-emerald-500/20">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Servidor Estável
            </span>
            <button class="px-6 py-2 bg-red-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-red-700 transition-all shadow-lg shadow-red-600/20">
                Reiniciar Serviços
            </button>
        </div>
    </div>

    <!-- Bloco 1: Infraestrutura de Hardware -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border-none">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-4">Carga da CPU</p>
            <div class="flex items-end justify-between">
                <div>
                    <h3 class="text-4xl font-black text-white">{{ $stats['server']['cpu_usage'] }}%</h3>
                    <p class="text-[10px] text-slate-500 font-bold mt-2">{{ $stats['server']['os'] }} Load Average</p>
                </div>
                <div class="w-16 h-1 bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-red-500" style="width: {{ $stats['server']['cpu_usage'] }}%"></div>
                </div>
            </div>
        </div>

        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border-none">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-4">Uso de Memória RAM</p>
            <div class="flex items-end justify-between">
                <div>
                    <h3 class="text-4xl font-black text-white">{{ $stats['server']['ram_usage'] }}%</h3>
                    <p class="text-[10px] text-slate-500 font-bold mt-2">PHP Memory Limit: {{ ini_get('memory_limit') }}</p>
                </div>
                <div class="w-16 h-1 bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-500" style="width: {{ $stats['server']['ram_usage'] }}%"></div>
                </div>
            </div>
        </div>

        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border-none">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-4">Espaço em Disco</p>
            <div class="flex items-end justify-between">
                <div>
                    <h3 class="text-4xl font-black text-white">{{ $stats['server']['disk_usage'] }}%</h3>
                    <p class="text-[10px] text-slate-500 font-bold mt-2">Partição Root (/)</p>
                </div>
                <div class="w-16 h-1 bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-amber-500" style="width: {{ $stats['server']['disk_usage'] }}%"></div>
                </div>
            </div>
        </div>

        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 border-none">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-4">Tempo de Atividade</p>
            <div class="flex items-end justify-between">
                <div>
                    <h3 class="text-2xl font-black text-white uppercase">{{ $stats['server']['uptime'] }}</h3>
                    <p class="text-[10px] text-slate-500 font-bold mt-2">Desde o último reboot</p>
                </div>
                <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Bloco 2: Aplicação & Serviços -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-2 card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest">Estado dos Subdomínios</h3>
            <div class="space-y-4">
                @php
                    $domains = [
                        'pct.social.br' => 'Principal',
                        'administrativo.pct.social.br' => 'Admin',
                        'afiliado.pct.social.br' => 'Portal Afiliado',
                        'juridico.pct.social.br' => 'Compliance',
                        'tesouraria.pct.social.br' => 'Financeiro',
                        'dev.pct.social.br' => 'Infraestrutura'
                    ];
                @endphp
                @foreach($domains as $url => $label)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="flex items-center gap-4">
                        <div class="h-2 w-2 rounded-full bg-emerald-500"></div>
                        <div>
                            <p class="text-[10px] font-black text-pct-blue uppercase">{{ $label }}</p>
                            <p class="text-[8px] text-gray-400 font-bold">{{ $url }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-[9px] font-black text-emerald-600 uppercase">SSL Ativo</span>
                        <div class="px-3 py-1 bg-white border border-slate-200 rounded-lg text-[9px] font-black text-slate-400">200 OK</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="space-y-8">
            <div class="card-premium">
                <h3 class="text-lg font-black text-pct-blue mb-6 uppercase tracking-widest">Ambiente Laravel</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-bold uppercase">Versão Laravel</span>
                        <span class="text-xs font-black text-pct-blue">{{ $stats['application']['laravel_version'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-bold uppercase">Versão PHP</span>
                        <span class="text-xs font-black text-pct-blue">{{ $stats['application']['php_version'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-bold uppercase">Ambiente</span>
                        <span class="text-xs font-black text-amber-600 uppercase">{{ $stats['application']['environment'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 font-bold uppercase">Modo Debug</span>
                        <span class="px-2 py-0.5 {{ $stats['application']['debug_mode'] ? 'bg-red-100 text-red-600' : 'bg-emerald-100 text-emerald-600' }} rounded text-[9px] font-black uppercase">
                            {{ $stats['application']['debug_mode'] ? 'ON' : 'OFF' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-red-600 rounded-[2.5rem] p-8 shadow-xl shadow-red-600/20 text-white border-none">
                <h3 class="text-lg font-black mb-4 uppercase tracking-tighter">Ações Críticas</h3>
                <p class="text-xs text-red-100 font-medium leading-relaxed mb-8">O Portal DEV possui autoridade para resetar credenciais, limpar caches globais e restaurar backups.</p>
                <div class="grid grid-cols-2 gap-3">
                    <button class="bg-white/10 hover:bg-white/20 text-white font-black py-3 rounded-xl text-[9px] uppercase tracking-widest transition-all">Limpar Cache</button>
                    <button class="bg-white/10 hover:bg-white/20 text-white font-black py-3 rounded-xl text-[9px] uppercase tracking-widest transition-all">Otimizar DB</button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
