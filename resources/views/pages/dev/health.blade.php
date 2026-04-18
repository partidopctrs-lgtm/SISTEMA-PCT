<x-dashboard-layout>
    <x-slot name="title">Saúde do Sistema - Portal DEV</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Monitoramento de Serviços</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Saúde dos Serviços Nacionais</h1>
        <p class="text-gray-500 font-medium">Estado detalhado de cada componente da arquitetura PCT.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($services as $service)
        <div class="card-premium">
            <div class="flex justify-between items-start mb-6">
                <div class="h-10 w-10 bg-slate-50 rounded-xl flex items-center justify-center text-pct-blue">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="px-3 py-1 {{ $service['status'] == 'online' ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }} rounded-full text-[9px] font-black uppercase tracking-widest">
                    {{ $service['status'] }}
                </span>
            </div>
            <h4 class="text-lg font-black text-pct-blue mb-1 uppercase tracking-tighter">{{ $service['name'] }}</h4>
            <div class="flex items-center gap-2">
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Latência:</span>
                <span class="text-[10px] font-black text-pct-blue">{{ $service['latency'] }}</span>
            </div>
            
            <div class="mt-8 pt-6 border-t border-slate-50 flex items-center gap-4">
                <button class="text-[9px] font-black text-pct-blue uppercase tracking-widest hover:underline">Ver Logs</button>
                <button class="text-[9px] font-black text-red-500 uppercase tracking-widest hover:underline">Reiniciar</button>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-12 card-premium">
        <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest">Teste Automático de Rotas</h3>
        <div class="space-y-4">
            @php
                $routes = [
                    '/' => 'Homepage Principal',
                    '/login' => 'Sistema de Autenticação',
                    '/admin/dashboard' => 'Painel Administrativo',
                    '/afiliado/dashboard' => 'Área do Membro',
                    '/api/v1/status' => 'Endpoints de Integração'
                ];
            @endphp
            @foreach($routes as $route => $name)
            <div class="flex items-center justify-between p-6 bg-slate-50 rounded-[2rem] border border-slate-100">
                <div class="flex items-center gap-6">
                    <div class="px-4 py-2 bg-white rounded-xl text-[10px] font-black text-pct-blue border border-slate-200 shadow-sm">
                        GET
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-pct-blue">{{ $name }}</h4>
                        <p class="text-[10px] text-gray-400 font-bold">{{ $route }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-[10px] font-black text-emerald-600 uppercase">Acessível</p>
                        <p class="text-[8px] text-gray-400 font-bold">Último teste: 2 min atrás</p>
                    </div>
                    <div class="h-10 w-10 bg-white rounded-full flex items-center justify-center text-emerald-500 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
