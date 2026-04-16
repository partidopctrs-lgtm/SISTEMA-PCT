<x-dashboard-layout>
    <x-slot name="title">Relatório de Indicações - Admin PCT</x-slot>

    <div class="mb-12">
        <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Relatório de Indicações</h1>
        <p class="text-gray-500 font-medium tracking-wide">Monitore o crescimento orgânico e a performance de expansão dos seus líderes.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="glass p-8 rounded-3xl shadow-sm text-center">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Total de Convites</p>
            <h3 class="text-4xl font-black text-pct-blue">5.842</h3>
            <span class="text-[10px] font-bold text-pct-green">+12% este mês</span>
        </div>
        <div class="glass p-8 rounded-3xl shadow-sm text-center">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Cadastros Convertidos</p>
            <h3 class="text-4xl font-black text-pct-blue">3.120</h3>
            <span class="text-[10px] font-bold text-pct-blue">Taxa de 53%</span>
        </div>
        <div class="glass p-8 rounded-3xl shadow-sm text-center">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Líderes Ativos</p>
            <h3 class="text-4xl font-black text-pct-blue">245</h3>
            <span class="text-[10px] font-bold text-gray-400">Com > 1 indicação</span>
        </div>
        <div class="glass p-8 rounded-3xl shadow-sm text-center bg-pct-blue">
            <p class="text-[10px] font-black text-blue-200 uppercase tracking-widest mb-2">Maior Expansor (Mês)</p>
            <h3 class="text-2xl font-black text-white">Ricardo S.</h3>
            <span class="text-[10px] font-bold text-pct-green">+24 indicações</span>
        </div>
    </div>

    <div class="glass p-8 rounded-[2rem] shadow-sm overflow-hidden">
        <h3 class="font-black text-pct-blue uppercase tracking-widest mb-8">Ranking de Expansão</h3>
        <table class="w-full text-left">
            <thead>
                <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest">
                    <th class="pb-6">Posição</th>
                    <th class="pb-6">Líder / Membro</th>
                    <th class="pb-6">Indicações Totais</th>
                    <th class="pb-6">Taxa de Retenção</th>
                    <th class="pb-6 text-right">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach([
                    ['rank' => '01', 'name' => 'Ricardo Santos', 'count' => 542, 'retention' => '88%', 'trend' => 'up'],
                    ['rank' => '02', 'name' => 'Maria Oliveira', 'count' => 412, 'retention' => '92%', 'trend' => 'up'],
                    ['rank' => '03', 'name' => 'João Silva', 'count' => 389, 'retention' => '75%', 'trend' => 'down'],
                    ['rank' => '04', 'name' => 'Ana Paula', 'count' => 210, 'retention' => '82%', 'trend' => 'stable'],
                ] as $top)
                <tr class="group hover:bg-pct-green/5 transition-all">
                    <td class="py-6 font-black text-pct-blue text-lg italic opacity-40">#{{ $top['rank'] }}</td>
                    <td class="py-6">
                        <p class="font-bold text-pct-blue tracking-tight leading-none mb-1">{{ $top['name'] }}</p>
                        <p class="text-[10px] text-gray-400 font-medium">Núcleo Central</p>
                    </td>
                    <td class="py-6 font-black text-pct-blue">{{ $top['count'] }}</td>
                    <td class="py-6">
                        <div class="flex items-center space-x-2">
                            <div class="flex-1 max-w-[100px] h-1.5 bg-gray-100 rounded-full">
                                <div class="h-full bg-pct-green rounded-full" style="width: {{ $top['retention'] }}"></div>
                            </div>
                            <span class="text-xs font-bold text-gray-500">{{ $top['retention'] }}</span>
                        </div>
                    </td>
                    <td class="py-6 text-right">
                        @if($top['trend'] === 'up')
                            <span class="text-pct-green bg-emerald-50 px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest">Crescente</span>
                        @elseif($top['trend'] === 'down')
                            <span class="text-red-500 bg-red-50 px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest">Queda</span>
                        @else
                            <span class="text-gray-500 bg-gray-100 px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest">Estável</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
