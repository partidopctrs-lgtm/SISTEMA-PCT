<x-dashboard-layout>
    <x-slot name="title">Gestão de Eventos - Admin PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Gestão de Eventos</h1>
            <p class="text-gray-500 font-medium tracking-wide">Organize congressos, palestras e encontros regionais do movimento.</p>
        </div>
        <button class="btn-primary px-6 py-3 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>Novo Evento</span>
        </button>
    </div>

    <!-- Calendar Overview / Upcoming -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-2 glass p-8 rounded-[2rem] shadow-sm">
            <h3 class="font-black text-pct-blue uppercase tracking-widest mb-8 flex items-center">
                <span class="w-2 h-8 bg-pct-green mr-3 rounded-full"></span>
                Agenda Próxima
            </h3>
            <div class="space-y-4">
                @foreach([
                    ['date' => '25 Abr', 'title' => 'Congresso Nacional de Renovação', 'location' => 'Brasília/DF', 'type' => 'Presencial'],
                    ['date' => '02 Mai', 'title' => 'Webinar: Ética no Setor Público', 'location' => 'Online (Zoom)', 'type' => 'Digital'],
                    ['date' => '15 Mai', 'title' => 'Encontro Regional Sul', 'location' => 'Porto Alegre/RS', 'type' => 'Presencial'],
                ] as $event)
                <div class="flex items-center p-6 bg-blue-50/20 rounded-2xl border border-transparent hover:border-gray-100 transition-all group cursor-pointer">
                    <div class="w-20 flex flex-col items-center justify-center shrink-0 border-r border-gray-100 pr-6 mr-6">
                        <span class="text-lg font-black text-pct-blue leading-none">{{ explode(' ', $event['date'])[0] }}</span>
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ explode(' ', $event['date'])[1] }}</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-pct-blue tracking-tight leading-tight">{{ $event['title'] }}</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">{{ $event['location'] }} • {{ $event['type'] }}</p>
                    </div>
                    <svg class="w-5 h-5 text-gray-300 group-hover:text-pct-green transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
                @endforeach
            </div>
        </div>

        <div class="glass p-8 rounded-[2rem] shadow-sm bg-gradient-to-br from-pct-blue to-blue-900 text-white">
            <h3 class="font-black text-blue-200 uppercase tracking-widest mb-6 border-b border-white/10 pb-4">Check-in em Tempo Real</h3>
            <div class="text-center py-8">
                <div class="inline-block relative mb-6">
                    <svg class="w-32 h-32 text-pct-green" viewBox="0 0 36 36">
                        <path class="stroke-current text-white/10" stroke-width="3" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <path class="stroke-current" stroke-width="3" stroke-dasharray="75, 100" stroke-linecap="round" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-black">75%</span>
                        <span class="text-[8px] font-bold uppercase tracking-widest text-blue-300">Quórum</span>
                    </div>
                </div>
                <p class="text-[10px] font-black uppercase tracking-widest text-blue-200 mb-4">Membros Presentes (Agora)</p>
                <h4 class="text-2xl font-black tracking-tight mb-8 italic">Congresso Nacional</h4>
                <button class="w-full py-4 bg-pct-green text-pct-blue font-black rounded-xl text-xs uppercase tracking-widest hover:scale-[1.05] transition-transform">Gerar QR Code de Presença</button>
            </div>
        </div>
    </div>
</x-dashboard-layout>
