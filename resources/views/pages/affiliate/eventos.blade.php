<x-dashboard-layout>
    <x-slot name="title">Eventos & Reuniões - PCT</x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-3xl font-bold text-pct-blue mb-2">Eventos e Reuniões</h1>
                <p class="text-gray-500 font-medium">Participe das atividades presenciais e online do movimento.</p>
            </div>
            <div class="flex gap-4">
                <button class="px-6 py-2 bg-white border border-slate-200 rounded-xl font-bold text-gray-700 hover:bg-slate-50 transition-all">Meus Eventos</button>
                <button class="px-6 py-2 bg-pct-blue text-white rounded-xl font-bold hover:bg-pct-blue-dark transition-all">Ver No Mapa</button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            <!-- Main Content: List -->
            <div class="lg:col-span-3 space-y-12">
                <!-- Highlighted Event -->
                <div class="card-premium p-0 overflow-hidden flex flex-col md:flex-row shadow-2xl shadow-pct-blue/10 border-pct-blue/10">
                    <div class="md:w-1/3 h-64 md:h-auto bg-slate-900 relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="px-3 py-1 bg-pct-green text-white text-[10px] font-black uppercase tracking-widest rounded mb-2 inline-block">Destaque</span>
                            <p class="text-white font-black text-xs uppercase tracking-widest opacity-60">Encontro Estadual</p>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-10 flex flex-col">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="px-4 py-2 bg-blue-50 text-pct-blue rounded-xl text-center">
                                <p class="text-xs font-black uppercase">ABR</p>
                                <p class="text-2xl font-black">25</p>
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-pct-blue leading-tight">I Congresso Gaúcho de Cidadania e Trabalho</h3>
                                <p class="text-sm font-bold text-gray-400">Porto Alegre – RS • 09:00 - 18:00</p>
                            </div>
                        </div>
                        <p class="text-gray-600 font-medium leading-relaxed mb-8">
                            O primeiro grande encontro de membros e lideranças do PCT no Rio Grande do Sul. Palestras sobre economia, política local e os próximos passos do movimento.
                        </p>
                        <div class="mt-auto flex items-center justify-between">
                            <div class="flex -space-x-3">
                                @for($i=0; $i<5; $i++)
                                <div class="h-10 w-10 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-[10px] font-bold text-gray-600">
                                    {{ $i+12 }}
                                </div>
                                @endfor
                                <div class="h-10 w-10 rounded-full bg-emerald-50 border-2 border-white flex items-center justify-center text-[10px] font-black text-pct-green">
                                    +120
                                </div>
                            </div>
                            <button class="btn-primary">Confirmar Presença</button>
                        </div>
                    </div>
                </div>

                <!-- Upcoming List -->
                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-pct-blue mb-8">Próximos Eventos</h3>
                    
                    @php
                        $eventos = [
                            ['Encontro Municipal - Taquara', '15 Mai', 'Câmara de Vereadores', 'Presencial'],
                            ['Webinário: Desburocratização', '18 Mai', 'Plataforma Online', 'Online'],
                            ['Reunião de Líderes Regionais', '22 Mai', 'Sede PCT', 'Híbrido']
                        ];
                    @endphp

                    @foreach($eventos as $e)
                    <div class="card-premium flex items-center p-6 group">
                        <div class="h-16 w-16 bg-slate-50 text-pct-blue rounded-2xl flex flex-col items-center justify-center border border-slate-100 group-hover:bg-pct-blue group-hover:text-white transition-all">
                            <span class="text-[10px] font-black uppercase">{{ explode(' ', $e[1])[1] }}</span>
                            <span class="text-xl font-black">{{ explode(' ', $e[1])[0] }}</span>
                        </div>
                        <div class="ml-8 flex-grow">
                            <h4 class="text-lg font-bold text-pct-blue">{{ $e[0] }}</h4>
                            <p class="text-sm text-gray-500 font-medium">{{ $e[2] }} • {{ $e[3] }}</p>
                        </div>
                        <button class="px-6 py-2 bg-slate-100 text-pct-blue text-xs font-black uppercase rounded-xl hover:bg-pct-blue hover:text-white transition-all">Ver Detalhes</button>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Mini Calendar Mockup -->
                <div class="card-premium p-6">
                    <h3 class="text-sm font-black text-gray-400 uppercase tracking-widest mb-6 text-center">Calendário ABR 26</h3>
                    <div class="grid grid-cols-7 gap-1 text-center mb-4">
                        @foreach(['D','S','T','Q','Q','S','S'] as $d)
                        <span class="text-[8px] font-black text-gray-400">{{ $d }}</span>
                        @endforeach
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center">
                        @for($i=1; $i<=30; $i++)
                        <div class="aspect-square flex items-center justify-center text-[10px] font-bold rounded-lg {{ $i == 25 ? 'bg-pct-blue text-white' : ($i == 15 ? 'bg-pct-green/20 text-pct-green' : 'text-gray-400') }}">
                            {{ $i }}
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="card-premium p-6 bg-emerald-50 border-emerald-100">
                    <h3 class="text-sm font-bold text-pct-green mb-4">Sugira um Evento</h3>
                    <p class="text-xs text-slate-600 font-medium mb-6">Deseja organizar uma reunião na sua cidade? Envie sua proposta para o comitê regional.</p>
                    <button class="w-full py-3 bg-pct-green text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all">Enviar Proposta</button>
                </div>

                <div class="p-6">
                    <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Filtros Regionais</h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-pct-blue">
                            <span class="text-sm font-medium text-gray-700">Meu Estado (RS)</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="rounded text-pct-blue">
                            <span class="text-sm font-medium text-gray-700">Nacional</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
