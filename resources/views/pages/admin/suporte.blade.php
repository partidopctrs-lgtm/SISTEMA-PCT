<x-dashboard-layout>
    <x-slot name="title">Central de Suporte - Administrativo PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Central de Suporte</h1>
            <p class="text-gray-500 font-medium tracking-wide">Atendimento técnico e institucional para afiliados e líderes regionais.</p>
        </div>
        <div class="flex space-x-2">
            <span class="px-6 py-3 bg-blue-50 text-pct-blue rounded-xl text-sm font-black italic">14 Tickets Abertos</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-12">
        @foreach([
            ['label' => 'Aguardando', 'count' => 8, 'color' => 'pct-blue'],
            ['label' => 'Em Análise', 'count' => 4, 'color' => 'amber-400'],
            ['label' => 'Resolvidos', 'count' => 156, 'color' => 'pct-green'],
            ['label' => 'Tempo Médio', 'count' => '4h', 'color' => 'pct-blue']
        ] as $stat)
        <div class="glass p-8 rounded-3xl text-center">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-3">{{ $stat['label'] }}</p>
            <p class="text-3xl font-black text-{{ $stat['color'] }} italic tracking-tighter">{{ $stat['count'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="glass p-8 rounded-[2.5rem] shadow-sm">
        <h3 class="font-black text-pct-blue uppercase tracking-widest mb-8 flex items-center">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            Fila de Atendimento
        </h3>
        <div class="space-y-4">
            @foreach([
                ['user' => 'Carlos Gomes', 'subject' => 'Dúvida sobre validação de carteirinha', 'prio' => 'Alta', 'date' => 'Há 10 min'],
                ['user' => 'Ana Martins', 'subject' => 'Erro ao baixar manifesto oficial', 'prio' => 'Urgente', 'date' => 'Há 25 min'],
                ['user' => 'Roberto Lima', 'subject' => 'Sugestão de novo curso na Escola PCT', 'prio' => 'Normal', 'date' => 'Há 2 horas'],
            ] as $ticket)
            <div class="p-6 bg-white/40 border border-gray-100 rounded-2xl hover:bg-white hover:scale-[1.01] transition-all group flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="text-center shrink-0">
                         <span class="px-3 py-1 bg-{{ $ticket['prio'] === 'Urgente' ? 'red-500' : ($ticket['prio'] === 'Alta' ? 'amber-500' : 'pct-blue') }} text-white text-[10px] font-black uppercase tracking-widest rounded-lg">
                            {{ $ticket['prio'] }}
                         </span>
                    </div>
                    <div>
                        <p class="font-bold text-pct-blue tracking-tight leading-none mb-1">{{ $ticket['subject'] }}</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $ticket['user'] }} • {{ $ticket['date'] }}</p>
                    </div>
                </div>
                <button class="px-6 py-2 bg-pct-blue text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-800 transition-all">ASSUMIR TICKET</button>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
