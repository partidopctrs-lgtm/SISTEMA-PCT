<x-dashboard-layout>
    <x-slot name="title">Área do Afiliado - PCT</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Olá, {{ $user->name }}!</h1>
                @if($isFounder)
                    <span class="px-4 py-1 bg-gradient-to-r from-amber-400 to-amber-600 text-white text-[10px] font-black rounded-full uppercase tracking-[0.2em] shadow-lg shadow-amber-500/20 border border-amber-300">Presidente Fundador</span>
                @endif
            </div>
            <p class="text-gray-500 font-medium italic">Bem-vindo à sua área de liderança e mobilização nacional.</p>
        </div>

        @if(auth()->user()->role === 'admin' || auth()->user()->hasRole('admin'))
        <div class="bg-slate-50 p-2 rounded-2xl border border-slate-100 flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-pct-blue text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all">Painel Admin</a>
            <a href="{{ route('legal.dashboard') }}" class="px-4 py-2 bg-white text-gray-500 rounded-xl text-[10px] font-black uppercase tracking-widest border border-slate-100 hover:bg-slate-50 transition-all">Painel Jurídico</a>
            <a href="{{ route('committee.dashboard') }}" class="px-4 py-2 bg-white text-gray-500 rounded-xl text-[10px] font-black uppercase tracking-widest border border-slate-100 hover:bg-slate-50 transition-all">Painel Comitê</a>
        </div>
        @endif
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
                        <input type="text" readonly value="https://pct.org.br/indicar/{{ auth()->user()->registration_number }}" class="bg-white border border-blue-100 rounded-2xl px-6 py-4 text-xs w-full font-bold text-pct-blue outline-none shadow-sm">
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
                    <div class="h-8 w-8 bg-white rounded-lg flex items-center justify-center text-[10px] font-black text-pct-blue">
                        {{ substr($referral->name, 0, 1) }}
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
</x-dashboard-layout>
