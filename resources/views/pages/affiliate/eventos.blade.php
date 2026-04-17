<x-dashboard-layout>
    <x-slot name="title">Eventos & Reuniões - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-3xl font-bold text-pct-blue mb-2 uppercase tracking-tighter">Eventos Oficiais</h1>
                <p class="text-gray-500 font-medium">Acompanhe a agenda do movimento e participe ativamente da construção do PCT.</p>
            </div>
            <div class="flex gap-4">
                <button class="px-6 py-3 bg-white border border-slate-200 rounded-xl text-[10px] uppercase tracking-widest font-black text-gray-400 hover:text-pct-blue transition-all">Filtrar por Estado</button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            <!-- Main Content: List -->
            <div class="lg:col-span-3 space-y-6">
                
                @forelse($events as $index => $event)
                    @if($index === 0)
                        <!-- Highlighted Event (Next Event) -->
                        <div class="card-premium p-0 overflow-hidden flex flex-col md:flex-row shadow-xl shadow-pct-blue/5 border-pct-blue/20">
                            <div class="md:w-1/3 h-48 md:h-auto bg-pct-blue relative flex items-center justify-center">
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-80"></div>
                                <div class="relative z-10 text-center text-white">
                                    <p class="text-xs font-black uppercase tracking-widest mb-1">{{ $event->start_time->format('M') }}</p>
                                    <p class="text-6xl font-black">{{ $event->start_time->format('d') }}</p>
                                </div>
                                <div class="absolute bottom-4 left-4">
                                    <span class="px-3 py-1 bg-pct-green text-white text-[9px] font-black uppercase tracking-widest rounded shadow-sm">Próximo Evento</span>
                                </div>
                            </div>
                            <div class="md:w-2/3 p-8 flex flex-col">
                                <h3 class="text-2xl font-black text-pct-blue leading-tight mb-2">{{ $event->title }}</h3>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">
                                    <svg class="w-4 h-4 inline-block mr-1 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $event->location }} • {{ $event->start_time->format('H:i') }}
                                </p>
                                <p class="text-sm text-gray-600 font-medium leading-relaxed mb-8 line-clamp-3">
                                    {{ $event->description }}
                                </p>
                                <div class="mt-auto">
                                    <button class="px-8 py-3 bg-pct-blue text-white font-black rounded-xl text-[10px] uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Confirmar Presença</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Regular Event Item -->
                        <div class="card-premium flex flex-col md:flex-row md:items-center p-6 group hover:border-pct-blue transition-all">
                            <div class="h-16 w-16 bg-slate-50 text-pct-blue rounded-2xl flex flex-col items-center justify-center border border-slate-100 group-hover:bg-pct-blue group-hover:text-white transition-all shrink-0">
                                <span class="text-[9px] font-black uppercase tracking-widest">{{ $event->start_time->format('M') }}</span>
                                <span class="text-xl font-black">{{ $event->start_time->format('d') }}</span>
                            </div>
                            <div class="mt-4 md:mt-0 md:ml-6 flex-grow">
                                <h4 class="text-lg font-black text-pct-blue">{{ $event->title }}</h4>
                                <p class="text-xs text-gray-500 font-bold uppercase tracking-widest mt-1">{{ $event->location }} • {{ $event->start_time->format('H:i') }}</p>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <button class="px-6 py-3 bg-slate-50 text-pct-blue text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-pct-blue hover:text-white border border-slate-100 transition-all">Detalhes</button>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Empty State -->
                    <div class="card-premium py-24 text-center flex flex-col items-center justify-center">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-black text-pct-blue mb-2">A agenda está livre</h3>
                        <p class="text-sm font-medium text-gray-500 max-w-md mx-auto">Não há eventos ou reuniões oficiais marcadas no momento. A direção nacional e os comitês locais estão preparando as próximas agendas. Fique de olho!</p>
                    </div>
                @endforelse
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Suggestion Card -->
                <div class="card-premium p-8 bg-gradient-to-br from-emerald-50 to-emerald-100/50 border-emerald-100">
                    <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mb-6">
                        <svg class="w-5 h-5 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <h3 class="text-sm font-black text-pct-green mb-3 uppercase tracking-widest">Tem uma sugestão?</h3>
                    <p class="text-xs text-slate-600 font-medium mb-6 leading-relaxed">Os diretórios são formados pela base. Se você tem uma ideia de evento ou ação na sua cidade, sugira para a liderança.</p>
                    <button class="w-full py-3 bg-pct-green text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-600/20">Sugerir Evento</button>
                </div>

                <!-- Active Committees Info -->
                <div class="card-premium p-6">
                    <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Seu Vínculo</h4>
                    @if(auth()->user()->committee_city)
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded bg-blue-50 flex items-center justify-center text-pct-blue">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs font-black text-pct-blue uppercase">{{ auth()->user()->committee_city }}</p>
                                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Comitê Municipal</p>
                            </div>
                        </div>
                    @else
                        <p class="text-xs font-medium text-gray-500 italic">Você ainda não está vinculado a um comitê local. Seu vínculo é direto com a Nacional.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
