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

    <!-- 📊 Campanha Água no RS -->
    <div class="mb-12">
        <div class="card-premium bg-gradient-to-br from-blue-600 to-blue-800 text-white border-none overflow-hidden relative">
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
                    <div>
                        <span class="inline-block px-3 py-1 bg-white/20 text-[9px] font-black uppercase tracking-[0.2em] rounded-full mb-3">Campanha Ativa: Água no RS</span>
                        <h3 class="text-2xl font-black tracking-tighter">Mobilização pela Água</h3>
                        <p class="text-blue-100 text-xs font-medium">Ajude sua cidade a cobrar soluções registrando problemas de abastecimento.</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="bg-white/10 px-6 py-3 rounded-2xl text-center backdrop-blur-md border border-white/10">
                            <p class="text-[9px] font-black uppercase tracking-widest opacity-60">Meus Relatos Gerados</p>
                            <p class="text-2xl font-black">{{ $waterStats['total'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-end">
                    <div class="space-y-4">
                        <p class="text-[10px] font-black uppercase tracking-widest opacity-60">Seu Link de Mobilização da Campanha</p>
                        <div class="flex items-center gap-3">
                            <input type="text" readonly value="{{ route('campaign.water.index', ['ref' => auth()->id()]) }}" class="bg-white/10 border border-white/20 rounded-2xl px-6 py-4 text-xs w-full font-bold text-white outline-none">
                            <button class="bg-pct-green text-white p-4 rounded-2xl hover:scale-105 transition-all shadow-lg" onclick="navigator.clipboard.writeText('{{ route('campaign.water.index', ['ref' => auth()->id()]) }}'); alert('Link da campanha copiado!')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 text-slate-800">
                        <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-4">Últimos Relatos da sua Rede</h4>
                        <div class="space-y-3">
                            @forelse($waterStats['recent'] as $report)
                                <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-100">
                                    <div>
                                        <p class="text-[10px] font-black text-pct-blue uppercase">{{ $report->city }} / {{ $report->neighborhood }}</p>
                                        <p class="text-[9px] text-slate-500 font-bold">{{ $report->problem_type }}</p>
                                    </div>
                                    <span class="text-[9px] font-black text-pct-green">{{ $report->created_at->diffForHumans() }}</span>
                                </div>
                            @empty
                                <div class="py-4 text-center">
                                    <p class="text-[10px] text-slate-400 font-bold uppercase italic">Nenhum relato gerado ainda.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Efeito visual de água -->
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl"></div>
        </div>
    </div>
</x-dashboard-layout>
