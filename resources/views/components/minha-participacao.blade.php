{{--
    COMPONENTE: MINHA PARTICIPAÇÃO
    Exibido no painel do afiliado — mostra status e permite alterar decisão.
--}}
<div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
    {{-- Header --}}
    <div class="flex items-center gap-4 px-8 py-6 border-b border-slate-50">
        <div class="w-10 h-10 bg-pct-blue/5 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <h3 class="text-lg font-black text-pct-blue">Minha Participação</h3>
    </div>

    <div class="px-8 py-6 space-y-5">
        {{-- Status no Movimento --}}
        <div class="flex items-center justify-between py-4 border-b border-slate-50">
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Status no Movimento</p>
                <p class="font-bold text-slate-800">Membro Ativo do PCT</p>
            </div>
            <span class="flex items-center gap-2 px-3 py-1.5 bg-emerald-50 text-pct-green text-xs font-black rounded-full">
                <span class="w-1.5 h-1.5 bg-pct-green rounded-full animate-pulse"></span>
                Ativo
            </span>
        </div>

        {{-- Status Apoio Partidário --}}
        <div class="py-4 border-b border-slate-50">
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Apoio à Formalização Partidária</p>

            @if(auth()->user()->apoio_partido === null)
                <div class="flex items-center gap-3 p-4 bg-amber-50 rounded-2xl border border-amber-100">
                    <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.962-.833-2.732 0L4.07 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <p class="text-sm font-semibold text-amber-700">Decisão ainda não registrada. Aguardando sua escolha.</p>
                </div>
            @elseif(auth()->user()->apoio_partido)
                <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-2xl border border-blue-100">
                    <svg class="w-5 h-5 text-pct-blue flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <div>
                        <p class="text-sm font-black text-pct-blue">Sim — Você apoia a formalização partidária</p>
                        @if(auth()->user()->data_apoio)
                        <p class="text-xs text-blue-400 mt-0.5">Registrado em {{ auth()->user()->data_apoio->format('d/m/Y \à\s H:i') }}</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <div>
                        <p class="text-sm font-black text-slate-600">Apenas participação no movimento</p>
                        @if(auth()->user()->data_apoio)
                        <p class="text-xs text-slate-400 mt-0.5">Registrado em {{ auth()->user()->data_apoio->format('d/m/Y \à\s H:i') }}</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        {{-- Alterar Decisão --}}
        <div x-data="{ alterando: false }">
            <button @click="alterando = !alterando"
                    class="text-sm font-bold text-pct-blue hover:underline flex items-center gap-1 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Alterar minha decisão
            </button>

            <div x-show="alterando" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="mt-4 p-5 bg-slate-50 rounded-2xl border border-slate-100 space-y-4">

                <p class="text-sm text-slate-600 font-medium leading-relaxed">
                    Esta decisão é <strong>reversível</strong> e não afeta sua participação no movimento.
                </p>

                <form method="POST" action="{{ route('affiliate.apoio.alterar') }}">
                    @csrf
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 p-3 bg-white rounded-xl border border-slate-200 cursor-pointer hover:border-pct-blue transition-colors">
                            <input type="radio" name="decisao" value="sim" class="accent-pct-blue"
                                {{ auth()->user()->apoio_partido === true ? 'checked' : '' }}>
                            <span class="text-sm font-semibold text-slate-700">Quero apoiar a formalização partidária</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-white rounded-xl border border-slate-200 cursor-pointer hover:border-pct-blue transition-colors">
                            <input type="radio" name="decisao" value="nao" class="accent-pct-blue"
                                {{ auth()->user()->apoio_partido === false ? 'checked' : '' }}>
                            <span class="text-sm font-semibold text-slate-700">Prefiro apenas participar do movimento</span>
                        </label>
                    </div>
                    <button type="submit" class="mt-3 w-full py-3 bg-pct-blue text-white rounded-xl font-bold text-sm hover:bg-blue-900 transition-all">
                        Salvar decisão
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
