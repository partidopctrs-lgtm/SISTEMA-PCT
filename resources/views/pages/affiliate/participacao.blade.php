<x-dashboard-layout>
    <x-slot name="title">Minha Participação — PCT</x-slot>

    {{-- ====== HEADER ====== --}}
    <div class="mb-10">
        <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Área do Afiliado</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Minha Participação</h1>
        <p class="text-gray-500 font-medium">Entenda a diferença entre fazer parte do movimento e o apoio partidário opcional.</p>
    </div>

    {{-- ====== REGRA DE OURO (DESTAQUE MÁXIMO) ====== --}}
    <div class="mb-10 relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-pct-blue to-blue-900 p-8 md:p-10 shadow-2xl shadow-pct-blue/30">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute -left-10 -bottom-10 w-48 h-48 bg-pct-green/10 rounded-full blur-2xl"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center gap-6">
            <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center flex-shrink-0 border border-white/20">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-white/60 uppercase tracking-[0.3em] mb-2">Regra de Ouro do PCT</p>
                <p class="text-xl md:text-2xl font-black text-white leading-tight">
                    "Participar do movimento <span class="text-pct-green">não significa</span> apoiar partido.<br class="hidden md:block">
                    O apoio é <span class="text-pct-green">opcional</span>, individual e reversível."
                </p>
            </div>
        </div>
    </div>

    {{-- ====== STATUS PANEL ====== --}}
    @php $user = auth()->user(); @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

        {{-- Status: Movimento --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Membro do Movimento</p>
            </div>
            <div class="flex items-center gap-3 p-4 bg-emerald-50 rounded-2xl border border-emerald-100">
                <span class="w-3 h-3 bg-pct-green rounded-full animate-pulse flex-shrink-0"></span>
                <div>
                    <p class="font-black text-pct-green text-sm">✔ Membro Ativo do PCT</p>
                    <p class="text-xs text-emerald-600 mt-0.5">Participação no movimento confirmada</p>
                </div>
            </div>
            <p class="text-xs text-slate-500 font-medium mt-4 leading-relaxed">
                Você faz parte do movimento PCT. Isso significa acesso à área do membro, missões, materiais e comunidade.
            </p>
        </div>

        {{-- Status: Apoio Partidário --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Apoio à Formalização Partidária</p>
            </div>

            @if($user->apoio_partido === null)
                <div class="flex items-center gap-3 p-4 bg-amber-50 rounded-2xl border border-amber-100 mb-4">
                    <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.962-.833-2.732 0L4.07 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-black text-amber-700">❌ Não respondido</p>
                        <p class="text-xs text-amber-600 mt-0.5">Você ainda não registrou sua decisão</p>
                    </div>
                </div>
                <a href="#decidir" class="block w-full text-center py-3 bg-pct-blue text-white rounded-2xl font-bold text-sm hover:bg-blue-900 transition-all">
                    Registrar minha decisão (opcional)
                </a>
            @elseif($user->apoio_partido)
                <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-2xl border border-blue-100 mb-4">
                    <svg class="w-5 h-5 text-pct-blue flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    <div>
                        <p class="text-sm font-black text-pct-blue">✔ Sim — Apoia a formalização</p>
                        @if($user->data_apoio)
                        <p class="text-xs text-blue-400 mt-0.5">Registrado em {{ $user->data_apoio->format('d/m/Y') }}</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-200 mb-4">
                    <svg class="w-5 h-5 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <div>
                        <p class="text-sm font-black text-slate-600">❌ Não — Apenas no movimento</p>
                        @if($user->data_apoio)
                        <p class="text-xs text-slate-400 mt-0.5">Registrado em {{ $user->data_apoio->format('d/m/Y') }}</p>
                        @endif
                    </div>
                </div>
            @endif

            <p class="text-xs text-slate-500 font-medium mt-3 leading-relaxed">
                Esta decisão é <strong>opcional</strong> e pode ser alterada a qualquer momento abaixo.
            </p>
        </div>
    </div>

    {{-- ====== ALTERAR DECISÃO ====== --}}
    <div id="decidir" class="mb-10 bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="border-b border-slate-50 px-8 py-5 flex items-center gap-3">
            <div class="w-8 h-8 bg-pct-blue/5 rounded-xl flex items-center justify-center">
                <svg class="w-4 h-4 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <h2 class="font-black text-pct-blue text-base">Minha decisão sobre apoio partidário</h2>
        </div>
        <div class="px-8 py-6">
            <p class="text-sm text-slate-600 font-medium mb-6 leading-relaxed">
                Selecione abaixo sua opção. Esta escolha <strong>não afeta</strong> sua participação no movimento e <strong>pode ser alterada</strong> quando quiser.
            </p>
            <form method="POST" action="{{ route('affiliate.apoio.alterar') }}">
                @csrf
                <div class="space-y-3 mb-6">
                    <label class="flex items-center gap-4 p-5 bg-slate-50 rounded-2xl border-2 {{ $user->apoio_partido === true ? 'border-pct-blue bg-blue-50' : 'border-slate-100' }} cursor-pointer hover:border-pct-blue transition-colors">
                        <input type="radio" name="decisao" value="sim" class="accent-pct-blue w-4 h-4 flex-shrink-0"
                            {{ $user->apoio_partido === true ? 'checked' : '' }}>
                        <div>
                            <p class="font-black text-pct-blue text-sm">Quero apoiar a formalização partidária</p>
                            <p class="text-xs text-slate-500 font-medium mt-0.5">Registro seu apoio de forma opcional e consciente</p>
                        </div>
                    </label>
                    <label class="flex items-center gap-4 p-5 bg-slate-50 rounded-2xl border-2 {{ $user->apoio_partido === false ? 'border-slate-400' : 'border-slate-100' }} cursor-pointer hover:border-slate-400 transition-colors">
                        <input type="radio" name="decisao" value="nao" class="accent-slate-600 w-4 h-4 flex-shrink-0"
                            {{ $user->apoio_partido === false ? 'checked' : '' }}>
                        <div>
                            <p class="font-black text-slate-700 text-sm">Prefiro apenas participar do movimento</p>
                            <p class="text-xs text-slate-500 font-medium mt-0.5">Sua participação no PCT continua normalmente</p>
                        </div>
                    </label>
                </div>
                <button type="submit" class="w-full md:w-auto px-8 py-3 bg-pct-blue text-white rounded-2xl font-black text-sm hover:bg-blue-900 transition-all shadow-lg shadow-pct-blue/20">
                    Salvar minha decisão
                </button>
            </form>

            @if(session('success'))
            <div class="mt-4 flex items-center gap-3 p-4 bg-emerald-50 rounded-2xl border border-emerald-100">
                <svg class="w-5 h-5 text-pct-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
                <p class="text-sm font-bold text-emerald-700">{{ session('success') }}</p>
            </div>
            @endif
        </div>
    </div>

    {{-- ====== FAQ INTERNO — APENAS VISÍVEL PARA AFILIADOS ====== --}}
    <div class="mb-6">
        <span class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] opacity-60">Somente para membros</span>
        <h2 class="text-2xl font-black text-pct-blue tracking-tight mt-1 mb-8">Dúvidas Frequentes sobre Participação</h2>

        <div class="space-y-3" x-data="{ aberto: null }">

            @php
            $faqs_internos = [
                [
                    'pergunta' => 'Ao me cadastrar no PCT, estou apoiando um partido?',
                    'resposta' => "Não.\n\nO cadastro no PCT significa apenas que você faz parte do movimento.\n\nO apoio à formação partidária é uma decisão separada, opcional e feita apenas se você quiser.",
                    'icone'    => 'shield-check',
                    'cor'      => 'emerald',
                ],
                [
                    'pergunta' => 'O apoio ao partido é obrigatório?',
                    'resposta' => "Não.\n\nVocê pode participar do movimento normalmente sem apoiar qualquer projeto partidário. Sua participação e acesso à área do membro não dependem dessa decisão.",
                    'icone'    => 'x-circle',
                    'cor'      => 'slate',
                ],
                [
                    'pergunta' => 'Como funciona o apoio ao partido?',
                    'resposta' => "O apoio é uma escolha individual dentro da área do membro.\n\nVocê pode:\n• Optar por apoiar\n• Ou apenas participar do movimento\n\nE pode alterar sua decisão a qualquer momento nesta mesma página.",
                    'icone'    => 'information-circle',
                    'cor'      => 'blue',
                ],
                [
                    'pergunta' => 'Posso participar do movimento sem me envolver com política?',
                    'resposta' => "Sim.\n\nO movimento permite participação em ações sociais, organização comunitária e formação cívica, sem qualquer obrigatoriedade política.\n\nVocê define seu nível de envolvimento.",
                    'icone'    => 'users',
                    'cor'      => 'indigo',
                ],
                [
                    'pergunta' => 'Posso mudar minha decisão depois?',
                    'resposta' => "Sim, sempre.\n\nO sistema permite alterar sua escolha a qualquer momento, com total transparência. Toda alteração é registrada com data e hora para sua segurança.",
                    'icone'    => 'refresh',
                    'cor'      => 'amber',
                ],
            ];
            @endphp

            @foreach($faqs_internos as $i => $item)
            <div class="bg-white border border-slate-100 rounded-[2rem] overflow-hidden hover:shadow-lg hover:shadow-pct-blue/5 transition-all duration-300">
                <button @click="aberto = aberto === {{ $i }} ? null : {{ $i }}"
                        class="w-full px-8 py-6 flex items-center gap-5 text-left focus:outline-none group">
                    {{-- Ícone colorido --}}
                    <div class="w-10 h-10 rounded-xl flex-shrink-0 flex items-center justify-center
                        @if($item['cor'] === 'emerald') bg-emerald-50 text-pct-green
                        @elseif($item['cor'] === 'slate') bg-slate-100 text-slate-500
                        @elseif($item['cor'] === 'blue') bg-blue-50 text-pct-blue
                        @elseif($item['cor'] === 'indigo') bg-indigo-50 text-indigo-600
                        @else bg-amber-50 text-amber-600 @endif">
                        @if($item['icone'] === 'shield-check')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        @elseif($item['icone'] === 'x-circle')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @elseif($item['icone'] === 'information-circle')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @elseif($item['icone'] === 'users')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        @endif
                    </div>

                    <span class="flex-grow font-black text-pct-blue text-base group-hover:text-pct-green transition-colors pr-4">
                        ❓ {{ $item['pergunta'] }}
                    </span>
                    <svg class="w-5 h-5 text-slate-400 flex-shrink-0 transition-transform duration-300"
                         :class="aberto === {{ $i }} ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="aberto === {{ $i }}"
                     x-cloak
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="px-8 pb-7 pl-24 text-slate-600 font-medium leading-relaxed whitespace-pre-line text-sm border-t border-slate-50 pt-4">
                        {{ $item['resposta'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ====== AVISO FINAL ====== --}}
    <div class="bg-slate-50 border border-slate-100 rounded-[2rem] p-8 flex items-start gap-5">
        <div class="w-10 h-10 bg-pct-blue/10 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>
        <div>
            <p class="font-black text-pct-blue text-sm mb-1">Esta informação é exclusiva para membros</p>
            <p class="text-sm text-slate-500 font-medium leading-relaxed">
                Esta página está disponível apenas na área do afiliado e não é acessível ao público. Todo o sistema de apoio partidário opera de forma separada do site institucional.
            </p>
        </div>
    </div>

</x-dashboard-layout>
