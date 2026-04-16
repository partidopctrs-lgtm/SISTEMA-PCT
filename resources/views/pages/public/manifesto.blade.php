<x-public-layout>
    <x-slot name="title">Manifesto de Identidade - PCT</x-slot>

    <div class="bg-gray-50/50 py-20 lg:py-32">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-24">
                <span class="inline-block px-4 py-1.5 mb-8 text-sm font-black tracking-[0.3em] text-pct-green bg-emerald-50 rounded-full uppercase">
                    Documento de Identidade
                </span>
                <h1 class="text-5xl md:text-7xl font-black text-pct-blue mb-8 leading-tight tracking-tighter">
                    O Brasil que <br><span class="text-gradient">Construímos Juntos.</span>
                </h1>
                <p class="text-xl md:text-2xl text-slate-500 italic font-medium leading-relaxed mb-10">
                    "O PCT nasce com o propósito claro de fortalecer a cidadania ativa e promover soluções reais com base na liberdade e na transparência."
                </p>
                <div class="flex justify-center">
                    <a href="https://docs.google.com/document/d/1ViPiyoq-IniGtDfZpdOjckftzqL29i1NKpoLLq4vEq8/export?format=pdf" target="_blank" class="inline-flex items-center px-8 py-3 bg-white border-2 border-pct-blue text-pct-blue font-bold rounded-full hover:bg-pct-blue hover:text-white transition-all shadow-lg hover:shadow-pct-blue/20">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Baixar Manifesto em PDF
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-[4rem] p-10 md:p-20 shadow-2xl shadow-pct-blue/5 border border-white space-y-12">
                <div class="prose prose-2xl max-w-none text-slate-600 leading-relaxed font-medium">
                    <p class="text-2xl text-pct-blue font-bold">
                        O PCT – Movimento Cidadania e Trabalho é uma iniciativa nacional independente, formada por cidadãos comprometidos com o desenvolvimento do Brasil.
                    </p>

                    <h2 class="text-3xl font-black text-pct-blue flex items-center gap-4 mt-16 pt-16 border-t border-slate-100 italic">
                        <span class="w-12 h-12 bg-pct-blue text-white rounded-2xl flex items-center justify-center not-italic text-lg">01</span>
                        Nossa Identidade
                    </h2>
                    <p>
                        O PCT não possui qualquer vínculo com partidos estrangeiros, ideologias extremistas ou movimentos de caráter comunista. Somos um movimento brasileiro focado na valorização do indivíduo, do empreendedorismo e da meritocracia.
                    </p>

                    <h2 class="text-3xl font-black text-pct-blue flex items-center gap-4 mt-16 italic">
                        <span class="w-12 h-12 bg-pct-green text-white rounded-2xl flex items-center justify-center not-italic text-lg">02</span>
                        Liberdade e Eficiência
                    </h2>
                    <p>
                        Defendemos um Estado eficiente, que cumpra seu papel sem sufocar a sociedade, garantindo segurança jurídica, liberdade econômica e oportunidades para todos. Acreditamos que o trabalho e a iniciativa privada são os únicos caminhos reais para a prosperidade.
                    </p>

                    <div class="my-20 p-12 bg-slate-50 rounded-[3rem] border border-slate-100 flex items-center gap-10">
                        <img src="{{ asset('logo.png') }}" alt="PCT Logo" class="h-24 w-auto grayscale opacity-30 hidden md:block">
                        <p class="text-xl font-black text-pct-blue italic leading-snug">
                            "Acreditamos no trabalho, na liberdade e na transformação através da ação consciente de cada cidadão."
                        </p>
                    </div>

                    <h2 class="text-3xl font-black text-pct-blue flex items-center gap-4 mt-16 italic">
                        <span class="w-12 h-12 bg-pct-blue text-white rounded-2xl flex items-center justify-center not-italic text-lg">03</span>
                        Nossa Missão
                    </h2>
                    <p>
                        Formar cidadãos conscientes, preparados e engajados, capazes de transformar suas comunidades e contribuir para um Brasil mais justo, produtivo e livre. Nossa visão é ser referência nacional na formação de lideranças comprometidas com resultados reais.
                    </p>
                </div>
            </div>

            <!-- Final CTA -->
            <div class="mt-32 p-16 bg-pct-blue rounded-[5rem] text-white text-center shadow-2xl relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-br from-pct-blue to-pct-green opacity-0 group-hover:opacity-20 transition-opacity duration-700"></div>
                <h3 class="text-4xl font-black mb-6">Assine este compromisso.</h3>
                <p class="text-blue-100 text-xl mb-10 max-w-md mx-auto font-medium">Sua vontade de agir é o que move este país. Junte-se a nós hoje mesmo.</p>
                <a href="{{ route('register.index') }}" class="btn-secondary inline-block px-12 py-5 text-xl">Filiar-se ao PCT agora</a>
            </div>
        </div>
    </div>
</x-public-layout>
