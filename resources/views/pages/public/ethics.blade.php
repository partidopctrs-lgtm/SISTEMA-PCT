<x-public-layout>
    <x-slot name="title">Código de Ética - PCT</x-slot>

    <div class="bg-gray-50/50 py-20 lg:py-32">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-24">
                <span class="inline-block px-4 py-1.5 mb-8 text-sm font-black tracking-[0.3em] text-pct-green bg-emerald-50 rounded-full uppercase">
                    Normas e Conduta
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-pct-blue mb-8 leading-tight tracking-tighter">
                    Código de <span class="text-gradient">Ética.</span>
                </h1>
                <p class="text-xl md:text-2xl text-slate-500 max-w-3xl mx-auto font-medium leading-relaxed">
                    O alicerce moral e institucional do PCT – Movimento Cidadania e Trabalho.
                </p>
                <div class="h-2 w-24 bg-pct-green mx-auto mt-12 rounded-full"></div>
            </div>

            <div class="space-y-12">
                <!-- Capítulo I -->
                <div class="card-premium">
                    <h2 class="text-4xl font-black text-pct-blue mb-10 italic border-l-8 border-pct-green pl-6">CAPÍTULO I <br><span class="text-2xl not-italic text-slate-400 font-bold uppercase tracking-widest">Do Conselho de Ética</span></h2>
                    <div class="prose prose-xl max-w-none text-slate-600 font-medium space-y-8">
                        <div>
                            <p class="text-pct-blue font-bold tracking-tight">Art. 1º – O PCT instituirá, em nível municipal, o Conselho de Ética, composto por:</p>
                            <ul class="list-disc pl-8 space-y-2 mt-4">
                                <li>5 (cinco) membros titulares</li>
                                <li>3 (três) suplentes</li>
                                <li>Com mandato coincidente com a diretoria do movimento.</li>
                            </ul>
                        </div>
                        <div>
                            <p class="text-pct-blue font-bold tracking-tight">Art. 2º – Compete ao Conselho de Ética:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex items-start gap-3">
                                    <span class="font-black text-pct-green">I</span>
                                    <span>Eleger seu Presidente, Vice e Secretário;</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex items-start gap-3">
                                    <span class="font-black text-pct-green">II</span>
                                    <span>Analisar condutas dos membros;</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex items-start gap-3">
                                    <span class="font-black text-pct-green">III</span>
                                    <span>Julgar infrações ao Estatuto e Código de Ética;</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex items-start gap-3">
                                    <span class="font-black text-pct-green">IV</span>
                                    <span>Emitir parecer e sugerir penalidades;</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex items-start gap-3">
                                    <span class="font-black text-pct-green">V</span>
                                    <span>Garantir direito à defesa.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Capítulo II -->
                <div class="card-premium">
                    <h2 class="text-4xl font-black text-pct-blue mb-10 italic border-l-8 border-pct-blue pl-6">CAPÍTULO II <br><span class="text-2xl not-italic text-slate-400 font-bold uppercase tracking-widest">Direitos e Deveres</span></h2>
                    
                    <div class="mb-12">
                        <h3 class="text-2xl font-black text-pct-green uppercase tracking-tighter mb-6 underline decoration-4 underline-offset-8">Seção I – Direitos</h3>
                        <div class="prose prose-xl max-w-none text-slate-600 font-medium">
                            <p class="text-pct-blue font-bold tracking-tight mb-6 italic">Art. 3º – São direitos dos membros:</p>
                            <div class="space-y-4">
                                @foreach(['Participar das decisões do movimento', 'Votar e ser votado', 'Apresentar propostas', 'Solicitar esclarecimentos à direção', 'Recorrer de decisões internas'] as $i => $item)
                                    <div class="flex items-center gap-4 py-3 border-b border-slate-50">
                                        <span class="text-pct-green font-black">I{{ str_repeat('V', floor($i / 4)) . ($i % 4 == 0 ? '' : ($i % 4 == 1 ? 'I' : ($i % 4 == 2 ? 'II' : 'III'))) }}</span>
                                        <span>{{ $item }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-2xl font-black text-pct-blue uppercase tracking-tighter mb-6 underline decoration-4 underline-offset-8">Seção II – Deveres</h3>
                        <div class="prose prose-xl max-w-none text-slate-600 font-medium">
                            <p class="text-pct-blue font-bold tracking-tight mb-6 italic">Art. 4º – São deveres dos membros:</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                                @foreach(['Respeitar o Estatuto e este Código', 'Defender os princípios do PCT', 'Manter conduta ética e responsável', 'Participar das atividades do movimento', 'Tratar todos com respeito', 'Não agir contra os interesses do movimento', 'Preservar a imagem pública do PCT'] as $i => $item)
                                    <div class="flex items-start gap-4 py-2">
                                        <span class="text-pct-blue font-black">{{ $i + 1 }}.</span>
                                        <span>{{ $item }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Capítulo III & IV -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div class="card-premium">
                        <h2 class="text-3xl font-black text-pct-blue mb-8 italic border-l-4 border-pct-green pl-4">CAPÍTULO III <br><span class="text-lg not-italic text-slate-400 font-bold uppercase tracking-widest">Infrações</span></h2>
                        <div class="space-y-3 text-slate-600 font-medium">
                            @foreach(['Descumprir o Estatuto ou Código de Ética', 'Agir com desonestidade ou má-fé', 'Utilizar o movimento para benefício pessoal indevido', 'Atacar publicamente membros ou o movimento', 'Apoiar interesses contrários ao PCT', 'Divulgar informações falsas', 'Praticar discriminação de qualquer tipo', 'Prejudicar o funcionamento do movimento', 'Usar recursos do movimento de forma indevida'] as $item)
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                    <span>{{ $item }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-premium">
                        <h2 class="text-3xl font-black text-pct-blue mb-8 italic border-l-4 border-pct-blue pl-4">CAPÍTULO IV <br><span class="text-lg not-italic text-slate-400 font-bold uppercase tracking-widest">Penalidades</span></h2>
                        <div class="space-y-4">
                            @foreach([['Advertência verbal', 'bg-slate-100'], ['Advertência por escrito', 'bg-slate-50'], ['Suspensão temporária', 'bg-blue-50'], ['Perda de função', 'bg-pct-blue text-white'], ['Expulsão', 'bg-red-600 text-white']] as $i => $item)
                                <div class="p-5 rounded-2xl flex items-center justify-between font-bold {{ $item[1] }}">
                                    <span>{{ $item[0] }}</span>
                                    <span class="text-xs uppercase opacity-60">Nível {{ $i + 1 }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Final Chapters -->
                <div class="card-premium bg-gradient-to-br from-pct-blue to-pct-blue-dark text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                        <div>
                            <h2 class="text-3xl font-black mb-8 italic border-l-4 border-pct-green pl-4">CAPÍTULO V <br><span class="text-lg opacity-60 font-bold uppercase tracking-widest">Processo Disciplinar</span></h2>
                            <div class="space-y-4 text-blue-100 font-medium">
                                <p class="text-white font-bold italic">Art. 7º & 8º – Fluxo do Processo:</p>
                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3"><span class="w-8 h-8 rounded-full bg-pct-green flex items-center justify-center text-white text-xs">1</span> Denúncia formal e análise inicial</li>
                                    <li class="flex items-center gap-3"><span class="w-8 h-8 rounded-full bg-pct-green flex items-center justify-center text-white text-xs">2</span> Notificação e Direito à defesa (48h)</li>
                                    <li class="flex items-center gap-3"><span class="w-8 h-8 rounded-full bg-pct-green flex items-center justify-center text-white text-xs">3</span> Análise de provas e decisão</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-3xl font-black mb-8 italic border-l-4 border-pct-green pl-4">CAPÍTULO VI <br><span class="text-lg opacity-60 font-bold uppercase tracking-widest">Disposições Gerais</span></h2>
                            <div class="space-y-6 text-blue-100 font-medium">
                                <p>Este Código se aplica a todos os membros, dirigentes e colaboradores e entra em vigor na data de sua aprovação.</p>
                                <div class="pt-10 border-t border-blue-800">
                                    <p class="text-sm font-bold uppercase tracking-widest text-pct-green">Assinado em</p>
                                    <p class="text-2xl font-black italic">Taquara – RS, 13/04/2026</p>
                                    <div class="mt-8">
                                        <p class="font-bold underline decoration-2 underline-offset-4">Marcos Vinicius Dresbach do Amaral</p>
                                        <p class="text-xs opacity-60">Fundador – PCT Movimento Cidadania e Trabalho</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
