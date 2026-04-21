<x-dashboard-layout>
    <x-slot name="title">Acompanhamento: {{ $report->protocol }}</x-slot>

    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('affiliate.atendimento.index') }}" class="flex items-center gap-2 text-xs font-black text-gray-400 uppercase tracking-widest hover:text-pct-blue transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Voltar para Meus Casos
        </a>
        <div class="flex gap-2">
            <button onclick="window.print()" class="p-3 bg-slate-50 text-slate-500 rounded-2xl hover:bg-slate-100 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Timeline Status -->
            <div class="bg-white p-8 md:p-12 rounded-[3rem] border border-slate-100 shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-10 text-center">Linha do Tempo do Caso</h3>
                    
                    @php
                        $steps = ['recebido', 'em análise', 'encaminhado', 'finalizado'];
                        $currentIndex = array_search($report->status, $steps);
                    @endphp

                    <div class="flex items-center justify-between relative">
                        <!-- Progress Bar Background -->
                        <div class="absolute h-0.5 bg-slate-100 w-full top-5 left-0"></div>
                        <!-- Active Progress Bar -->
                        <div class="absolute h-0.5 bg-pct-blue transition-all duration-1000 top-5 left-0" style="width: {{ ($currentIndex / (count($steps)-1)) * 100 }}%"></div>

                        @foreach($steps as $index => $step)
                        <div class="relative z-20 flex flex-col items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-500 {{ $index <= $currentIndex ? 'bg-pct-blue text-white shadow-lg shadow-blue-900/20' : 'bg-white border-2 border-slate-100 text-slate-300' }}">
                                @if($index < $currentIndex)
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                @else
                                    <span class="text-xs font-black">{{ $index + 1 }}</span>
                                @endif
                            </div>
                            <span class="text-[9px] font-black uppercase tracking-widest {{ $index <= $currentIndex ? 'text-pct-blue' : 'text-slate-300' }}">{{ $step }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Details -->
            <div class="bg-white p-8 md:p-12 rounded-[3rem] border border-slate-100 shadow-sm space-y-8">
                <div>
                    <h2 class="text-2xl font-black text-pct-blue uppercase tracking-tighter mb-4">{{ $report->problem_type }}</h2>
                    <p class="text-gray-600 font-medium leading-relaxed">{{ $report->description }}</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 pt-6 border-t border-slate-50">
                    <div>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Localização</p>
                        <p class="text-xs font-bold text-pct-blue uppercase">{{ $report->city }} - {{ $report->neighborhood }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Data do Evento</p>
                        <p class="text-xs font-bold text-pct-blue">{{ $report->event_date->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Gravidade</p>
                        <span class="px-3 py-1 {{ $report->gravity == 'crítica' || $report->gravity == 'alta' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }} text-[9px] font-black uppercase rounded-full">{{ $report->gravity }}</span>
                    </div>
                </div>

                @if($report->evidences->count() > 0)
                <div class="pt-8 border-t border-slate-50">
                    <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Provas Anexadas</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($report->evidences as $evidence)
                        <div class="group relative bg-slate-50 rounded-2xl p-4 border border-slate-100 text-center hover:border-pct-blue transition-all overflow-hidden">
                            <div class="h-12 w-12 bg-white rounded-xl flex items-center justify-center mx-auto mb-3 shadow-sm">
                                @if($evidence->file_type == 'photo')
                                    <svg class="w-6 h-6 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                @elseif($evidence->file_type == 'video')
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                @else
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                @endif
                            </div>
                            <p class="text-[8px] font-black text-slate-400 uppercase truncate px-2">{{ basename($evidence->file_path) }}</p>
                            <a href="{{ asset('storage/'.$evidence->file_path) }}" target="_blank" class="absolute inset-0 z-10"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="space-y-8">
            <div class="bg-pct-blue p-8 rounded-[3rem] text-white shadow-2xl shadow-blue-900/30">
                <h4 class="text-xs font-black uppercase tracking-[0.2em] mb-6 opacity-60">Protocolo Oficial</h4>
                <div class="flex items-center justify-between gap-4 bg-white/10 p-4 rounded-2xl border border-white/20">
                    <span class="text-sm font-black font-mono tracking-wider">{{ $report->protocol }}</span>
                    <button class="text-white hover:text-pct-green transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </button>
                </div>
                
                <p class="text-[10px] text-blue-200 font-medium mt-8 leading-relaxed">Este protocolo é a sua garantia de que o PCT registrou formalmente o seu caso para pressão política e institucional.</p>
                
                <a href="https://wa.me/5551984242621?text=Olá,%20gostaria%20de%20falar%20sobre%20o%20protocolo%20{{ $report->protocol }}" target="_blank" class="w-full mt-8 py-4 bg-pct-green text-white rounded-2xl font-black uppercase text-[10px] tracking-widest flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all shadow-lg">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-2.277 0-4.131 1.851-4.131 4.128 0 2.276 1.854 4.128 4.131 4.128 2.277 0 4.131-1.852 4.131-4.128 0-2.277-1.854-4.128-4.131-4.128zm0 6.757c-1.448 0-2.628-1.181-2.628-2.629 0-1.449 1.18-2.63 2.628-2.63 1.448 0 2.628 1.181 2.628 2.63 0 1.448-1.18 2.629-2.628-2.629zM12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 20c-4.963 0-9-4.037-9-9s4.037-9 9-9 9 4.037 9 9-4.037 9-9 9z"/></svg>
                    Falar com Suporte
                </a>
            </div>

            <div class="bg-white p-8 rounded-[3rem] border border-slate-100 shadow-sm">
                <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Orientações Legais</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('affiliate.atendimento.rights') }}" class="flex items-center justify-between group">
                            <span class="text-[10px] font-black text-gray-400 uppercase group-hover:text-pct-blue transition-all">Seus Direitos</span>
                            <svg class="w-4 h-4 text-slate-200 group-hover:text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-between group">
                            <span class="text-[10px] font-black text-gray-400 uppercase group-hover:text-pct-blue transition-all">Como Reclamar na Agência</span>
                            <svg class="w-4 h-4 text-slate-200 group-hover:text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-dashboard-layout>
