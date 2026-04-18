<x-dashboard-layout>
    <x-slot name="title">Logs Técnicos - Portal DEV</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Auditoria & Erros</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Logs de Aplicação</h1>
            <p class="text-gray-500 font-medium">Histórico de eventos e exceções do Laravel.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-6 py-2 bg-white border border-slate-200 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition-all">Limpar Logs</button>
            <button class="px-6 py-2 bg-pct-blue text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Baixar .log</button>
        </div>
    </div>

    <div class="card-premium bg-slate-900 border-none p-0 overflow-hidden">
        <div class="p-4 border-b border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="flex gap-1.5">
                    <div class="h-3 w-3 rounded-full bg-red-500"></div>
                    <div class="h-3 w-3 rounded-full bg-amber-500"></div>
                    <div class="h-3 w-3 rounded-full bg-emerald-500"></div>
                </div>
                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">storage/logs/laravel.log</span>
            </div>
            <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Últimas 100 linhas</span>
        </div>
        <div class="p-6 overflow-x-auto">
            <pre class="text-xs font-mono text-slate-300 leading-relaxed">
{{ $logs ?: 'Nenhum log disponível ou arquivo vazio.' }}
            </pre>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="card-premium border-l-4 border-l-red-500">
            <h4 class="text-sm font-black text-pct-blue uppercase mb-4">Erros Críticos (Hoje)</h4>
            <p class="text-3xl font-black text-pct-blue">0</p>
            <p class="text-[10px] text-gray-400 font-bold mt-2 uppercase">Nenhuma exceção fatal detectada</p>
        </div>
        <div class="card-premium border-l-4 border-l-blue-500">
            <h4 class="text-sm font-black text-pct-blue uppercase mb-4">Requisições (24h)</h4>
            <p class="text-3xl font-black text-pct-blue">1.240</p>
            <p class="text-[10px] text-gray-400 font-bold mt-2 uppercase">Volume normal de tráfego</p>
        </div>
    </div>
</x-dashboard-layout>
