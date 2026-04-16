<x-public-layout>
    <x-slot name="title">Cartilha do PCT - Formação Cidadã</x-slot>

    <div class="bg-gray-50/50 py-20 lg:py-32">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Header -->
            <div class="mb-16">
                <span class="inline-block px-4 py-1.5 mb-8 text-sm font-black tracking-[0.3em] text-pct-green bg-emerald-50 rounded-full uppercase">
                    Material de Formação
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-pct-blue mb-8 leading-tight tracking-tighter">
                    Cartilha <br><span class="text-gradient">Cidadania & Trabalho.</span>
                </h1>
                <p class="text-xl text-slate-500 font-medium leading-relaxed max-w-2xl mx-auto">
                    Um guia prático para entender os valores, a história e as propostas do Movimento PCT para o futuro do Brasil.
                </p>
            </div>

            <div class="bg-white rounded-[4rem] p-10 md:p-16 shadow-2xl shadow-pct-blue/5 border border-white text-left">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                    <div class="space-y-6">
                        <h3 class="text-2xl font-black text-pct-blue border-l-4 border-pct-green pl-4">O que você vai encontrar:</h3>
                        <ul class="space-y-4 text-slate-600 font-medium">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-pct-green" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Introdução aos valores do PCT
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-pct-green" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Guia de mobilização cidadã
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-pct-green" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Exemplos práticos de atuação local
                            </li>
                        </ul>
                    </div>
                    <div class="bg-slate-50 rounded-[3rem] p-8 flex items-center justify-center border border-slate-100">
                        <div class="text-center group">
                            <div class="w-20 h-20 bg-pct-blue text-white rounded-[2rem] flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform shadow-xl shadow-pct-blue/20">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <p class="text-sm font-black text-pct-blue uppercase tracking-widest italic">Apostila Completa</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center pt-8 border-t border-slate-100 italic">
                    <p class="text-sm text-gray-400 font-bold uppercase tracking-widest mb-10 text-center">Para baixar a versão digital oficial para estudo offline:</p>
                    <a href="https://drive.google.com/file/d/17t7SNKC3Bshy7fMJV-ogvu1iQVCCkWES/view?usp=sharing" target="_blank" class="inline-flex items-center px-12 py-5 bg-pct-green text-white font-black rounded-3xl hover:bg-pct-blue transition-all shadow-2xl hover:shadow-pct-green/40 group">
                        <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        BAIXAR CARTILHA (PDF)
                    </a>
                </div>
            </div>

            <!-- Back CTA -->
            <div class="mt-20">
                <a href="{{ route('home') }}" class="text-sm font-black text-pct-blue uppercase tracking-widest border-b-2 border-pct-blue/20 hover:border-pct-blue transition-all">Página Inicial</a>
            </div>
        </div>
    </div>
</x-public-layout>
