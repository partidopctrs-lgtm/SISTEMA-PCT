<x-dashboard-layout>
    <x-slot name="title">{{ $mission['title'] }} - Missões PCT</x-slot>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <a href="{{ route('affiliate.dashboard') }}" class="inline-flex items-center gap-2 text-[10px] font-black text-gray-400 uppercase tracking-widest mb-8 hover:text-pct-blue transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Voltar ao Dashboard
        </a>

        <div class="card-premium relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                    <div>
                        <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2 uppercase">{{ $mission['title'] }}</h1>
                        <p class="text-gray-500 font-medium italic">{{ $mission['description'] }}</p>
                    </div>
                    <div class="bg-indigo-50 text-indigo-600 px-6 py-3 rounded-2xl font-black text-xl shadow-sm border border-indigo-100">
                        +{{ $mission['points'] }} <span class="text-[10px] uppercase opacity-60">pts</span>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-[2rem] p-8 border border-slate-100 mb-12">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-[0.2em] mb-6">Como concluir esta missão:</h3>
                    
                    @if($mission['title'] == 'Educação: Estudar Manifesto')
                        <div class="prose prose-slate max-w-none text-sm font-medium text-gray-600 leading-relaxed mb-8">
                            Para concluir esta missão, você deve ler o Manifesto Oficial do PCT e responder corretamente às perguntas do quiz. Esta etapa é fundamental para o seu crescimento como liderança no movimento.
                        </div>
                        <div class="space-y-4">
                            <a href="{{ route('manifesto') }}" target="_blank" class="block text-center py-4 bg-white border border-slate-200 text-pct-blue font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-slate-50 transition-all">1. Ler o Manifesto Oficial</a>
                            <a href="{{ route('affiliate.quiz.manifesto') }}" class="block text-center py-4 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-600/20">2. Iniciar Quiz de Avaliação (+100 pts)</a>
                        </div>
                    @elseif($mission['title'] == 'Marketing: Divulgação Digital')
                        <div class="prose prose-slate max-w-none text-sm font-medium text-gray-600 leading-relaxed mb-8">
                            A força do PCT está na nossa comunicação. Compartilhe o vídeo institucional em suas redes sociais e envie os links ou capturas de tela abaixo para validação.
                        </div>
                        
                        <form action="{{ route('affiliate.mission.evidence', $mission['title'] == 'Marketing: Divulgação Digital' ? 'marketing' : request()->route('slug')) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-4">Link da Postagem / Compartilhamento</label>
                                <input type="url" name="evidence_link" placeholder="https://instagram.com/p/..." class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue mb-6">
                                
                                <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-4">Ou Enviar Print/Captura (Opcional)</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-200 border-dashed rounded-2xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-all">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-6 h-6 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                            <p class="text-[10px] font-black text-gray-400 uppercase">Clique para enviar imagem</p>
                                        </div>
                                        <input type="file" name="evidence_file" class="hidden" />
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="w-full py-4 bg-pct-blue text-white font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Enviar para Validação</button>
                        </form>
                    @elseif($mission['title'] == 'Social: Ação Comunitária')
                        <div class="prose prose-slate max-w-none text-sm font-medium text-gray-600 leading-relaxed mb-8">
                            O PCT é ação. Vá até o fórum da comunidade, identifique um problema real na sua cidade (ex: asfalto, iluminação, burocracia) e descreva como uma abordagem liberal ajudaria a resolver.
                        </div>
                        <a href="{{ route('affiliate.community.index') }}" class="block text-center py-4 bg-pct-blue text-white font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Ir para o Fórum da Comunidade</a>
                    @elseif($mission['title'] == 'Expansão: Indicação Diária')
                        <div class="prose prose-slate max-w-none text-sm font-medium text-gray-600 leading-relaxed mb-8">
                            Sua missão hoje é trazer 5 novos contatos. Use seu link de indicação exclusivo e envie para amigos ou grupos que buscam uma alternativa política séria e organizada.
                        </div>
                        <div class="bg-white border border-blue-100 p-4 rounded-2xl flex items-center justify-between">
                            <code class="text-xs font-bold text-pct-blue">https://pct.social.br/indicar/{{ auth()->user()->registration_number }}</code>
                            <button class="text-pct-blue font-black text-[10px] uppercase">Copiar</button>
                        </div>
                    @endif
                </div>

                <form action="{{ route('affiliate.mission.participate', ['slug' => request()->route('slug')]) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-6 bg-pct-green text-white font-black rounded-[1.5rem] text-sm uppercase tracking-[0.2em] shadow-lg shadow-pct-green/20 hover:scale-[1.02] transition-all">
                        Aceitar Missão e Iniciar Agora
                    </button>
                </form>
            </div>
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-slate-50 rounded-full"></div>
        </div>
    </div>
</x-dashboard-layout>
