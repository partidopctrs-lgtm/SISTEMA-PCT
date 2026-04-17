<x-dashboard-layout>
    <x-slot name="title">Atividades & Missões - PCT</x-slot>

    <div class="max-w-6xl mx-auto">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Atividades e Missões</h1>
            <p class="text-gray-500">Cumpra missões semanais, ganhe pontos e ajude a fortalecer o movimento na sua região.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            <!-- Left: Missions List -->
            <div class="lg:col-span-3 space-y-10">
                <!-- Highlighted Mission -->
                <div class="bg-gradient-to-br from-pct-blue to-blue-900 rounded-[3rem] p-8 md:p-12 text-white relative overflow-hidden shadow-2xl">
                    <div class="relative z-10 max-w-2xl">
                        <span class="inline-block px-4 py-1.5 bg-pct-green text-white text-[10px] font-black uppercase tracking-[0.25em] rounded-full mb-6">Missão Especial</span>
                        <h2 class="text-3xl md:text-4xl font-black mb-6">Expansão de Comitê: Taquara</h2>
                        <p class="text-blue-100 mb-8 font-medium leading-relaxed">Estamos buscando 10 novos membros para formalizar o comitê local de Taquara. Participe e ganhe o dobro de pontos!</p>
                        <div class="flex flex-wrap items-center gap-6 mb-10">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-pct-green" fill="currentColor" viewBox="0 0 20 20"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2z"></path></svg>
                                </div>
                                <span class="font-bold">+500 Pontos</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <span class="font-bold">7 dias restantes</span>
                            </div>
                        </div>
                        <button class="btn-secondary px-12 py-4 text-lg">Aceitar Missão</button>
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-pct-green/20 rounded-full blur-[80px]"></div>
                </div>

                <!-- Secondary Missions -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-black text-pct-blue tracking-tight">Atividades Disponíveis</h3>
                    @php
                        $missoes = [
                            ['Estudar Manifesto', 'Leia o manifesto completo e responda ao quiz de avaliação.', '+100 pts', 'Educação', 'educacao'],
                            ['Divulgação Digital', 'Compartilhe o vídeo institucional em 3 redes sociais diferentes.', '+150 pts', 'Marketing', 'marketing'],
                            ['Ação Comunitária', 'Identifique um problema local e sugira uma solução liberal no fórum.', '+300 pts', 'Social', 'social'],
                            ['Indicação Diária', 'Envie seu link de convite para 5 novos contatos hoje.', '+50 pts', 'Expansão', 'expansao']
                        ];
                    @endphp

                    @foreach($missoes as $m)
                    <div class="card-premium flex flex-col md:flex-row items-center gap-6 p-6 group hover:-translate-y-1">
                        <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center text-pct-blue border border-slate-100 group-hover:bg-pct-blue group-hover:text-white transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div class="flex-grow text-center md:text-left">
                            <div class="flex items-center justify-center md:justify-start gap-2 mb-1">
                                <span class="text-[9px] font-black uppercase tracking-widest text-pct-green px-2 py-0.5 bg-emerald-50 rounded">{{ $m[3] }}</span>
                                <h4 class="text-xl font-bold text-pct-blue">{{ $m[0] }}</h4>
                            </div>
                            <p class="text-sm text-gray-500 font-medium">{{ $m[1] }}</p>
                        </div>
                        <div class="flex flex-col items-center md:items-end gap-3 min-w-[120px]">
                            <span class="text-lg font-black text-pct-blue">{{ $m[2] }}</span>
                            <a href="{{ route('affiliate.mission.show', $m[4]) }}" class="px-6 py-2 bg-slate-100 text-pct-blue text-xs font-black uppercase tracking-widest rounded-lg hover:bg-pct-blue hover:text-white transition-all">Participar</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Stats & Inventory -->
            <div class="space-y-8">
                <div class="card-premium bg-slate-900 text-white border-0">
                    <h3 class="text-lg font-black mb-6 uppercase tracking-widest text-pct-green">Meus Pontos</h3>
                    <div class="text-center py-6">
                        <span class="text-6xl font-black text-white">2.450</span>
                        <p class="text-sm font-bold text-gray-400 mt-2 uppercase tracking-widest decoration-pct-green decoration-2 underline underline-offset-8">Pontos Totais</p>
                    </div>
                </div>

                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Conquistas</h3>
                    <div class="grid grid-cols-3 gap-4">
                        @for($i=0; $i<6; $i++)
                        <div class="aspect-square bg-slate-50 rounded-2xl flex items-center justify-center border border-slate-100 grayscale hover:grayscale-0 transition-all cursor-help" title="Conquista Bloqueada">
                            <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Loja de Itens</h3>
                    <p class="text-xs text-gray-500 font-medium mb-4 italic">Troque seus pontos por benefícios exclusivos.</p>
                    <div class="space-y-4">
                        <div class="p-3 bg-slate-50 rounded-xl flex items-center justify-between opacity-50 grayscale">
                            <span class="text-xs font-bold text-gray-700">Botton Oficial</span>
                            <span class="text-xs font-black text-pct-blue">500 pts</span>
                        </div>
                        <div class="p-3 bg-slate-50 rounded-xl flex items-center justify-between opacity-50 grayscale">
                            <span class="text-xs font-bold text-gray-700">Curso Avançado</span>
                            <span class="text-xs font-black text-pct-blue">1200 pts</span>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-3 bg-slate-100 text-gray-400 text-xs font-black uppercase rounded-xl cursor-not-allowed">Acessar Loja</button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
