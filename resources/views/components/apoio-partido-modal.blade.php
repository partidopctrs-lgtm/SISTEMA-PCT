{{--
    MODAL DE APOIO PARTIDÁRIO
    Exibido automaticamente quando o membro ainda não tomou decisão (apoio_partido = null).
    Nunca automático, nunca obrigatório, sempre reversível.
--}}
@if(auth()->check() && auth()->user()->apoio_partido === null && !auth()->user()->skipped_apoio_modal)
<div id="modal-apoio-partido"
     class="fixed inset-0 z-[200] flex items-center justify-center p-4"
     x-data="{ open: true, skipForever: false }"
     x-show="open"
     x-cloak>

    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100">
    </div>

    {{-- Modal --}}
    <div class="relative z-10 w-full max-w-lg bg-white rounded-[2.5rem] shadow-2xl shadow-slate-900/30 overflow-hidden"
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0">

        {{-- Faixa superior --}}
        <div class="h-1.5 w-full bg-gradient-to-r from-pct-blue via-pct-green to-pct-blue"></div>

        <div class="p-8 md:p-10">
            {{-- Ícone + Label --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Decisão Opcional</span>
            </div>

            {{-- Título --}}
            <h2 class="text-2xl font-black text-pct-blue mb-4 leading-tight">
                Apoio opcional à formação partidária
            </h2>

            {{-- Texto principal --}}
            <div class="bg-slate-50 rounded-2xl p-5 mb-6 space-y-3">
                <p class="text-slate-700 font-medium leading-relaxed text-sm">
                    Você faz parte do <strong>movimento PCT</strong>.
                </p>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Existe a possibilidade futura de formalização partidária, e você pode, de forma <strong>totalmente opcional</strong>, apoiar essa etapa.
                </p>
                <div class="flex items-start gap-2 pt-2 border-t border-slate-200">
                    <svg class="w-5 h-5 text-pct-green flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="text-xs text-slate-500 font-semibold">
                        Sua participação no movimento <strong>NÃO depende desta escolha</strong>.
                    </p>
                </div>
            </div>

            {{-- Botões --}}
            <div class="space-y-3" id="apoio-botoes">
                <button onclick="registrarApoio('sim')"
                        class="w-full flex items-center justify-between px-6 py-4 bg-pct-blue text-white rounded-2xl font-bold hover:bg-blue-900 transition-all group">
                    <span class="text-sm">Quero apoiar a formalização partidária</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <button onclick="registrarApoio('nao')"
                        class="w-full flex items-center justify-between px-6 py-4 bg-slate-100 text-slate-700 rounded-2xl font-bold hover:bg-slate-200 transition-all group">
                    <span class="text-sm">Prefiro apenas participar do movimento</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <div class="flex flex-col items-center pt-4 border-t border-slate-100 mt-4">
                    <label class="flex items-center gap-2 mb-4 cursor-pointer group">
                        <input type="checkbox" x-model="skipForever" class="w-4 h-4 rounded border-slate-300 text-pct-blue focus:ring-pct-blue">
                        <span class="text-xs text-slate-500 font-bold group-hover:text-slate-700 transition-colors">Não mostrar este aviso novamente</span>
                    </label>
                    
                    <button @click="if(skipForever) { registrarApoio('pular') } else { open = false }" 
                            class="text-xs font-bold text-slate-400 hover:text-pct-blue transition-colors uppercase tracking-widest">
                        Decidir depois
                    </button>
                </div>
            </div>

            {{-- Confirmação (hidden inicialmente) --}}
            <div id="apoio-confirmacao" class="hidden text-center py-4">
                <div class="w-14 h-14 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p id="apoio-msg" class="font-bold text-slate-700 mb-4"></p>
                <button onclick="fecharModal()" class="px-8 py-3 bg-pct-green text-white rounded-2xl font-bold hover:bg-emerald-600 transition-all">
                    Continuar
                </button>
            </div>

            {{-- Footer legal --}}
            <p class="text-center text-[10px] text-slate-400 mt-6 leading-relaxed">
                Esta escolha é opcional e pode ser alterada a qualquer momento em <strong>Minha Participação</strong>.
            </p>
        </div>
    </div>
</div>

@push('scripts')
<script>
function registrarApoio(decisao) {
    // Desabilita botões para evitar duplo-clique
    document.querySelectorAll('#apoio-botoes button').forEach(b => b.disabled = true);

    fetch('{{ route("affiliate.apoio.salvar") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: JSON.stringify({ decisao: decisao })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            if (data.skip) {
                fecharModal();
            } else {
                document.getElementById('apoio-botoes').classList.add('hidden');
                document.getElementById('apoio-msg').textContent = data.mensagem;
                document.getElementById('apoio-confirmacao').classList.remove('hidden');
            }
        }
    })
    .catch(() => {
        document.querySelectorAll('#apoio-botoes button').forEach(b => b.disabled = false);
    });
}

function fecharModal() {
    document.getElementById('modal-apoio-partido').remove();
}
</script>
@endpush
@endif
