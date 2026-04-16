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
    <div class="mt-12">
        <h3 class="font-black text-pct-blue uppercase tracking-widest mb-8">Canais de Mobilização Direta</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="https://wa.me/5551933806899" target="_blank" class="glass p-6 rounded-3xl flex items-center space-x-4 hover:shadow-lg transition-all group">
                <div class="p-3 bg-emerald-50 text-pct-green rounded-2xl">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .004 5.408.001 12.045a11.811 11.811 0 001.591 5.976L0 24l6.117-1.604a11.83 11.83 0 005.93 1.597h.005c6.634 0 12.043-5.408 12.043-12.045a11.81 11.81 0 00-3.52-8.511z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-black text-pct-blue">WhatsApp Suporte</p>
                    <p class="text-[10px] text-gray-400 font-bold uppercase">Atendimento Admin</p>
                </div>
            </a>
            <a href="https://chat.whatsapp.com/Hw91zhGHumI5gtKM6S41OX" target="_blank" class="glass p-6 rounded-3xl flex items-center space-x-4 hover:shadow-lg transition-all group">
                <div class="p-3 bg-blue-50 text-blue-600 rounded-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-black text-pct-blue">Grupo Nacional</p>
                    <p class="text-[10px] text-gray-400 font-bold uppercase">WhatsApp Interno</p>
                </div>
            </a>
            <a href="https://www.facebook.com/share/g/1AxgCCJ8Mu/" target="_blank" class="glass p-6 rounded-3xl flex items-center space-x-4 hover:shadow-lg transition-all group">
                <div class="p-3 bg-blue-600 text-white rounded-2xl">
                    <span class="font-black italic">f</span>
                </div>
                <div>
                    <p class="text-sm font-black text-pct-blue">Grupo Facebook</p>
                    <p class="text-[10px] text-gray-400 font-bold uppercase">Debates Internos</p>
                </div>
            </a>
        </div>
    </div>
</x-dashboard-layout>
