<x-dashboard-layout>
    <x-slot name="title">Auditoria Financeira - Admin PCT</x-slot>

    <div class="mb-12">
        <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Auditoria Financeira</h1>
        <p class="text-gray-500 font-medium tracking-wide">Transparência total: Monitore doações, mensalidades e gastos operacionais.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="glass p-8 rounded-[2rem] shadow-sm">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Saldo Total (Consolidado)</p>
            <h3 class="text-3xl font-black text-pct-blue tracking-tighter italic">R$ 142.850,20</h3>
            <div class="mt-4 flex items-center text-xs font-bold text-pct-green">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                <span>↑ 15% em relação ao mês anterior</span>
            </div>
        </div>
        <div class="glass p-8 rounded-[2rem] shadow-sm">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Doações Recebidas (Mês)</p>
            <h3 class="text-3xl font-black text-pct-green tracking-tighter italic">R$ 42.100,00</h3>
            <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase tracking-widest">A partir de 512 doadores individuais</p>
        </div>
        <div class="glass p-8 rounded-[2rem] shadow-sm bg-red-50/30 border border-red-100">
            <p class="text-[10px] font-black text-red-400 uppercase tracking-widest mb-2">Despesas / Saídas</p>
            <h3 class="text-3xl font-black text-red-600 tracking-tighter italic">R$ 18.420,50</h3>
            <p class="text-[10px] text-red-400 mt-2 font-bold uppercase tracking-widest text-right italic font-black">Auditado pela Tesouraria</p>
        </div>
    </div>

    <!-- Charts / Tables Placeholder -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="glass p-8 rounded-[2rem] shadow-sm">
            <div class="flex items-center justify-between mb-8">
                <h3 class="font-black text-pct-blue uppercase tracking-widest">Fluxo Recente</h3>
                <button class="text-xs font-black text-pct-blue hover:text-pct-green transition-all">Exportar Planilha (XLSX)</button>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['desc' => 'Doação por Pix #991', 'val' => '+ 250,00', 'type' => 'in'],
                    ['desc' => 'Campanha Facebook ADS', 'val' => '- 1.250,00', 'type' => 'out'],
                    ['desc' => 'Contribuição Mensal (Líderes)', 'val' => '+ 5.400,00', 'type' => 'in'],
                    ['desc' => 'Aluguel Sede Regional RS', 'val' => '- 2.100,00', 'type' => 'out'],
                ] as $entry)
                <div class="flex items-center justify-between p-5 bg-white/40 border border-gray-100 rounded-2xl group cursor-pointer hover:bg-white transition-all">
                    <p class="text-sm font-bold text-pct-blue tracking-tight">{{ $entry['desc'] }}</p>
                    <span class="font-black italic {{ $entry['type'] === 'in' ? 'text-pct-green' : 'text-red-500' }}">
                        {{ $entry['val'] }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="glass p-8 rounded-[2rem] shadow-sm flex flex-col items-center justify-center text-center">
             <div class="w-48 h-48 rounded-full border-[1.5rem] border-pct-blue border-r-pct-green border-b-amber-400 relative mb-8 flex flex-col items-center justify-center">
                <span class="text-3xl font-black text-pct-blue italic">Meta</span>
                <span class="text-sm font-bold text-gray-400 uppercase tracking-widest">Alcançada</span>
             </div>
             <div class="space-y-2">
                <p class="text-2xl font-black text-pct-blue tracking-tighter leading-none mb-1 italic">R$ 200.000,00</p>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Objetivo de Arrecadação 2026</p>
             </div>
        </div>
    </div>
</x-dashboard-layout>
