<x-dashboard-layout>
    <x-slot name="title">Área do Afiliado - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Área do Afiliado</p>
            <div class="flex flex-wrap items-center gap-3 mb-2">
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Olá, {{ $user->name }}!</h1>
                @if($isFounder)
                    <span class="px-4 py-1 bg-gradient-to-r from-amber-400 to-amber-600 text-white text-[10px] font-black rounded-full uppercase tracking-[0.2em] shadow-lg shadow-amber-500/20 border border-amber-300">Presidente Fundador</span>
                @endif

                @php $hasSigned = \App\Models\PartySignature::where('user_id', auth()->id())->exists(); @endphp
                @if($hasSigned)
                    <span class="flex items-center gap-2 px-4 py-1.5 bg-gradient-to-br from-amber-200 via-yellow-500 to-amber-600 text-white text-[11px] font-black rounded-full uppercase tracking-[0.15em] shadow-xl shadow-amber-500/30 border border-yellow-200 ring-2 ring-amber-400/20 animate-pulse-slow">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        # EU APOIO PARTIDO PCT - SELO OURO
                    </span>
                @endif
            </div>
            <p class="text-gray-500 font-medium italic">Bem-vindo à sua área de liderança e mobilização nacional.</p>
        </div>

        <!-- SNDAH Downloads (Bio/Header Area) -->
        <div class="flex flex-wrap gap-4">
            <a href="{{ asset('docs/PL_SNDAH_PCT_2026.pdf') }}" download class="flex items-center gap-3 px-6 py-4 bg-white border border-slate-100 rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-pct-blue/10 transition-all group">
                <div class="w-10 h-10 bg-pct-blue text-white rounded-2xl flex items-center justify-center shadow-lg shadow-pct-blue/20 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Projeto de Lei</p>
                    <p class="text-[11px] font-black text-pct-blue uppercase">SNDAH 2026</p>
                </div>
            </a>
            <a href="{{ asset('docs/Estudo_Tecnico_Hidrico_RS.pdf') }}" download class="flex items-center gap-3 px-6 py-4 bg-white border border-slate-100 rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-pct-green/10 transition-all group">
                <div class="w-10 h-10 bg-pct-green text-white rounded-2xl flex items-center justify-center shadow-lg shadow-pct-green/20 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Estudo Técnico</p>
                    <p class="text-[11px] font-black text-pct-green uppercase">Hídrico RS</p>
                </div>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <!-- Stats Card -->
        <div class="lg:col-span-2 card-premium bg-gradient-to-br from-white to-blue-50 relative overflow-hidden">
            <div class="relative z-10">
                <h3 class="text-xl font-black text-pct-blue mb-8 uppercase tracking-tighter">Impacto Nacional em Tempo Real</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="space-y-1">
                        <p class="text-3xl font-black text-pct-blue">{{ number_format($stats['total_members'], 0, ',', '.') }}</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Filiados Totais</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl font-black text-pct-green">{{ $stats['my_referrals'] }}</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Meus Indicados</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl font-black text-amber-500">#{{ $stats['rank_national'] }}</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Ranking Nacional</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl font-black text-indigo-600">{{ number_format($stats['my_points'], 0, ',', '.') }}</p>
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Meus Pontos</p>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-blue-100">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Seu Link de Expansão Nacional (ID: {{ auth()->user()->registration_number }})</p>
                    <div class="flex items-center gap-3">
                        <input type="text" readonly value="https://pct.social.br/indicar/{{ auth()->user()->registration_number }}" class="bg-white border border-blue-100 rounded-2xl px-6 py-4 text-xs w-full font-bold text-pct-blue outline-none shadow-sm">
                        <button class="bg-pct-blue text-white p-4 rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Access Manuals -->
        <div class="card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest">Minha Rede de Convites</h3>
            <div class="space-y-4">
                @forelse($myReferrals as $referral)
                <div class="flex items-center gap-4 p-3 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="h-8 w-8 bg-white rounded-lg flex items-center justify-center text-[10px] font-black text-pct-blue overflow-hidden">
                        @if($referral->photo)
                            <img src="{{ asset('storage/' . $referral->photo) }}" class="w-full h-full object-cover">
                        @else
                            {{ substr($referral->name, 0, 1) }}
                        @endif
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-pct-blue uppercase">{{ $referral->name }}</p>
                        <p class="text-[8px] text-gray-400 font-bold">{{ $referral->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <div class="py-6 text-center">
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Nenhuma indicação ainda</p>
                    <p class="text-[9px] text-gray-300 mt-1">Use seu link acima para convidar!</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Missions Section -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-black text-pct-blue uppercase tracking-tighter">Missões Prioritárias</h2>
            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest bg-slate-100 px-3 py-1 rounded-full">Novas Missões Hoje</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Educação -->
            <div class="card-premium group hover:border-indigo-200 transition-all">
                <p class="text-[9px] font-black text-indigo-600 uppercase tracking-widest mb-2">Educação</p>
                <h4 class="text-sm font-black text-pct-blue mb-2">Estudar Manifesto</h4>
                <p class="text-[10px] text-gray-500 font-medium mb-6">Leia o manifesto completo e responda ao quiz.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-indigo-600">+100 pts</span>
                    <a href="{{ route('affiliate.mission.show', 'educacao') }}" class="px-4 py-2 bg-indigo-50 text-indigo-600 font-black text-[9px] uppercase tracking-widest rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-all">Participar</a>
                </div>
            </div>

            <!-- Marketing -->
            <div class="card-premium group hover:border-pink-200 transition-all">
                <p class="text-[9px] font-black text-pink-600 uppercase tracking-widest mb-2">Marketing</p>
                <h4 class="text-sm font-black text-pct-blue mb-2">Divulgação Digital</h4>
                <p class="text-[10px] text-gray-500 font-medium mb-6">Compartilhe o vídeo em 3 redes sociais.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-pink-600">+150 pts</span>
                    <a href="{{ route('affiliate.mission.show', 'marketing') }}" class="px-4 py-2 bg-pink-50 text-pink-600 font-black text-[9px] uppercase tracking-widest rounded-xl group-hover:bg-pink-600 group-hover:text-white transition-all">Participar</a>
                </div>
            </div>

            <!-- Social -->
            <div class="card-premium group hover:border-emerald-200 transition-all">
                <p class="text-[9px] font-black text-pct-green uppercase tracking-widest mb-2">Social</p>
                <h4 class="text-sm font-black text-pct-blue mb-2">Ação Comunitária</h4>
                <p class="text-[10px] text-gray-500 font-medium mb-6">Sugira uma solução liberal para sua cidade.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-pct-green">+300 pts</span>
                    <a href="{{ route('affiliate.mission.show', 'social') }}" class="px-4 py-2 bg-emerald-50 text-pct-green font-black text-[9px] uppercase tracking-widest rounded-xl group-hover:bg-pct-green group-hover:text-white transition-all">Participar</a>
                </div>
            </div>

            <!-- Expansão -->
            <div class="card-premium group hover:border-amber-200 transition-all">
                <p class="text-[9px] font-black text-amber-600 uppercase tracking-widest mb-2">Expansão</p>
                <h4 class="text-sm font-black text-pct-blue mb-2">Indicação Diária</h4>
                <p class="text-[10px] text-gray-500 font-medium mb-6">Envie seu link para 5 novos contatos hoje.</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-amber-600">+50 pts</span>
                    <a href="{{ route('affiliate.mission.show', 'expansao') }}" class="px-4 py-2 bg-amber-50 text-amber-600 font-black text-[9px] uppercase tracking-widest rounded-xl group-hover:bg-amber-600 group-hover:text-white transition-all">Participar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 🚀 CENTRAL DE COMANDO: CAMPANHA ÁGUA NO RS -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <img src="{{ asset('icons/agua.svg') }}" class="w-8 h-8" alt="Água">
                <h2 class="text-2xl font-black text-pct-blue uppercase tracking-tighter">Campanha: Água no RS</h2>
            </div>
            <div class="flex gap-2">
                <span class="px-3 py-1 bg-pct-blue text-white text-[9px] font-black uppercase rounded-lg">Mobilização Ativa</span>
                <span class="px-3 py-1 bg-pct-green text-white text-[9px] font-black uppercase rounded-lg">Impacto 2026</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- 📈 1. Resumo Geral -->
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm text-center group hover:border-pct-blue transition-all">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Relatos Gerados</p>
                    <p class="text-3xl font-black text-pct-blue">{{ $waterStats['total_reports'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm text-center group hover:border-pct-blue transition-all">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Pessoas Alcançadas</p>
                    <p class="text-3xl font-black text-indigo-600">{{ $waterStats['total_clicks'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm text-center group hover:border-pct-blue transition-all">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Taxa de Conversão</p>
                    <p class="text-3xl font-black text-pct-green">{{ $waterStats['conversion_rate'] }}%</p>
                </div>
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm text-center group hover:border-pct-blue transition-all">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Sua Posição</p>
                    <p class="text-3xl font-black text-amber-500">#{{ $waterStats['my_rank'] }}</p>
                </div>

                <!-- 🔗 2. Link de Divulgação -->
                <div class="md:col-span-4 bg-pct-blue p-8 rounded-[3rem] text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="text-xs font-black uppercase tracking-[0.3em] mb-4 opacity-60">Seu Link Exclusivo de Líder</h4>
                        <div class="flex flex-col md:flex-row gap-4">
                            <input type="text" readonly value="{{ route('campaign.water.index', ['ref' => auth()->id()]) }}" id="refLink" class="flex-grow bg-white/10 border border-white/20 rounded-2xl px-6 py-4 text-xs font-bold outline-none focus:border-white/40">
                            <div class="flex gap-2">
                                <button onclick="copyLink()" class="px-6 py-4 bg-white text-pct-blue rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-pct-green hover:text-white transition-all shadow-xl">Copiar Link</button>
                                <a href="https://wa.me/?text=O%20problema%20da%20%C3%A1gua%20no%20RS%20vai%20al%C3%A9m%20da%20falta.%20Sua%20cidade%20precisa%20ser%20ouvida.%20Relate%20aqui%3A%20{{ urlencode(route('campaign.water.index', ['ref' => auth()->id()])) }}" target="_blank" class="px-6 py-4 bg-emerald-500 text-white rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-emerald-600 transition-all shadow-xl flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-2.277 0-4.131 1.851-4.131 4.128 0 2.276 1.854 4.128 4.131 4.128 2.277 0 4.131-1.852 4.131-4.128 0-2.277-1.854-4.128-4.131-4.128zm0 6.757c-1.448 0-2.628-1.181-2.628-2.629 0-1.449 1.18-2.63 2.628-2.63 1.448 0 2.628 1.181 2.628 2.63 0 1.448-1.18 2.629-2.628-2.629zM12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 20c-4.963 0-9-4.037-9-9s4.037-9 9-9 9 4.037 9 9-4.037 9-9 9z"/></svg>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                </div>

                <!-- 🗺️ 3. Relatos por Cidade -->
                <div class="md:col-span-2 bg-white p-8 rounded-[3rem] border border-slate-100 shadow-sm">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Impacto por Cidade</h3>
                    <div class="space-y-4 max-h-[300px] overflow-y-auto pr-4 custom-scrollbar">
                        @forelse($waterStats['by_city'] as $city)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <span class="text-xs font-black text-pct-blue uppercase">{{ $city->city }}</span>
                            <span class="px-3 py-1 bg-white text-pct-blue rounded-lg text-[10px] font-black border border-slate-200">{{ $city->count }} relatos</span>
                        </div>
                        @empty
                        <div class="py-12 text-center text-slate-300 font-bold uppercase text-[10px] italic">Aguardando relatos...</div>
                        @endforelse
                    </div>
                </div>

                <!-- 📢 7. Materiais & Gerador de Posts -->
                <div class="md:col-span-2 bg-slate-50 p-8 rounded-[3rem] border border-slate-100">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Ferramentas de Divulgação</h3>
                    <div class="space-y-4">
                        <button onclick="copyPostText()" class="w-full p-6 bg-white rounded-2xl border-2 border-dashed border-slate-200 text-left group hover:border-pct-blue transition-all">
                            <p class="text-[9px] font-black text-pct-blue uppercase mb-2">Copiar Sugestão de Post</p>
                            <p class="text-[10px] text-slate-500 italic leading-relaxed">"O problema da água no RS já atinge dezenas de municípios. Na minha rede já temos {{ $waterStats['total_reports'] }} relatos. Participe também: [link]"</p>
                        </button>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-white rounded-2xl border border-slate-200 text-center opacity-50 cursor-not-allowed">
                                <p class="text-[9px] font-black uppercase">Baixar Panfletos</p>
                                <p class="text-[8px] font-bold text-slate-400 mt-1">(Em breve)</p>
                            </div>
                            <div class="p-4 bg-white rounded-2xl border border-slate-200 text-center opacity-50 cursor-not-allowed">
                                <p class="text-[9px] font-black uppercase">Gerar QR Code</p>
                                <p class="text-[8px] font-bold text-slate-400 mt-1">(Em breve)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🏆 5. Ranking de Afiliados -->
            <div class="lg:col-span-1 bg-white p-8 rounded-[3rem] border border-slate-100 shadow-sm border-t-4 border-t-amber-400">
                <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-8 flex items-center gap-2">
                    <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    TOP 10 Mobilizadores
                </h3>
                <div class="space-y-4">
                    @foreach($campaignRanking as $rank)
                    <div class="flex items-center justify-between p-3 {{ $rank->affiliate_id == auth()->id() ? 'bg-amber-50 border-amber-200' : 'bg-slate-50 border-slate-100' }} rounded-2xl border">
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-black text-slate-400 w-4">{{ $loop->iteration }}º</span>
                            <div class="w-8 h-8 rounded-lg bg-white border border-slate-200 overflow-hidden">
                                @if($rank->affiliate->photo)
                                    <img src="{{ asset('storage/'.$rank->affiliate->photo) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[10px] font-black text-pct-blue">{{ substr($rank->affiliate->name, 0, 1) }}</div>
                                @endif
                            </div>
                            <span class="text-[10px] font-black text-pct-blue uppercase truncate w-20">{{ $rank->affiliate->name }}</span>
                        </div>
                        <span class="text-[10px] font-black text-pct-green">{{ $rank->total }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyLink() {
            var copyText = document.getElementById("refLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Link de mobilização copiado!");
        }
        function copyPostText() {
            const text = "O problema da água no RS já atinge dezenas de municípios. Na minha rede já temos {{ $waterStats['total_reports'] }} relatos. Participe também: {{ route('campaign.water.index', ['ref' => auth()->id()]) }}";
            navigator.clipboard.writeText(text);
            alert("Texto para postagem copiado!");
        }
    </script>
</x-dashboard-layout>
