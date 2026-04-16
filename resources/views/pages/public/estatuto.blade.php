<x-public-layout>
    <x-slot name="title">Estatuto Oficial - PCT</x-slot>

    <div class="bg-gray-50/50 py-20 lg:py-32">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-24">
                <span class="inline-block px-4 py-1.5 mb-8 text-sm font-black tracking-[0.3em] text-pct-blue bg-blue-50 rounded-full uppercase">
                    Documento Institucional
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-pct-blue mb-8 leading-tight tracking-tighter">
                    Estatuto <br><span class="text-gradient">PCT Brasil.</span>
                </h1>
                <p class="text-xl text-slate-500 font-medium leading-relaxed max-w-2xl mx-auto italic">
                    "A base jurídica que norteia as ações, responsabilidades e objetivos fundamentais do Movimento Cidadania e Trabalho."
                </p>
            </div>

            <div class="bg-white rounded-[4rem] p-10 md:p-20 shadow-2xl shadow-pct-blue/5 border border-white space-y-16">
                <!-- Summary Section -->
                <div class="prose prose-xl max-w-none text-slate-600 leading-relaxed">
                    <h2 class="text-3xl font-black text-pct-blue mb-8 leading-tight italic">Capítulo I: Do Nome e Sede</h2>
                    <p>O Movimento Cidadania e Trabalho – PCT possui sede nacional no Estado do Rio Grande do Sul e representatividade em todo o território nacional, atuando de forma independente e propositiva.</p>
                    
                    <h2 class="text-3xl font-black text-pct-blue mt-16 mb-8 italic border-t border-slate-100 pt-16">Capítulo II: Dos Objetivos</h2>
                    <p>Nosso objetivo primordial é a formação política e técnica do cidadão brasileiro, visando a consolidação de uma sociedade baseada na liberdade, no trabalho e na meritocracia.</p>
                    
                    <div class="my-20 p-12 bg-blue-50/50 rounded-[3rem] border border-blue-100">
                        <h4 class="text-sm font-black text-pct-blue uppercase tracking-widest mb-4 opacity-60">Principais Pilares:</h4>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4 text-pct-blue font-bold">
                                <span class="w-6 h-6 bg-pct-blue text-white rounded-full flex items-center justify-center text-[10px]">•</span>
                                Independência partidária e ideológica nacional.
                            </li>
                            <li class="flex items-start gap-4 text-pct-blue font-bold">
                                <span class="w-6 h-6 bg-pct-blue text-white rounded-full flex items-center justify-center text-[10px]">•</span>
                                Fomento à economia livre e transparente.
                            </li>
                            <li class="flex items-start gap-4 text-pct-blue font-bold">
                                <span class="w-6 h-6 bg-pct-blue text-white rounded-full flex items-center justify-center text-[10px]">•</span>
                                Transformação social através da qualificação profissional.
                            </li>
                        </ul>
                    </div>

                    <h2 class="text-3xl font-black text-pct-blue mt-16 mb-8 italic border-t border-slate-100 pt-16">Capítulo III: Dos Filiados</h2>
                    <p>Poderá filiar-se ao PCT qualquer cidadão brasileiro nato ou naturalizado que compartilhe dos valores de transparência, responsabilidade e compromisso com o desenvolvimento do país.</p>
                </div>

                <!-- Download Link -->
                <div class="pt-20 border-t border-slate-100 flex flex-col items-center">
                    <p class="text-sm text-gray-400 font-bold uppercase tracking-[0.2em] mb-10 text-center italic">Para ler a íntegra jurídica do documento registrado:</p>
                    <a href="https://drive.google.com/file/d/1i0UZreBix6cktRShr4DW2VE6GbrdmlFO/view?usp=sharing" target="_blank" class="inline-flex items-center px-12 py-5 bg-pct-blue text-white font-black rounded-3xl hover:bg-pct-green transition-all shadow-2xl hover:shadow-pct-green/40 group">
                        <svg class="w-6 h-6 mr-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        BAIXAR ESTATUTO COMPLETO (PDF)
                    </a>
                </div>
            </div>

            <!-- Back CTA -->
            <div class="mt-20 text-center">
                <a href="{{ route('home') }}" class="text-sm font-black text-pct-blue uppercase tracking-widest border-b-2 border-pct-blue/20 hover:border-pct-blue transition-all">Voltar para a Página Inicial</a>
            </div>
        </div>
    </div>
</x-public-layout>
