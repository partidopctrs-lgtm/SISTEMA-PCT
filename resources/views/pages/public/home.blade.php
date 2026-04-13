<x-public-layout>
    <!-- Hero Section -->
    <section class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <span class="inline-block px-4 py-1.5 mb-6 text-sm font-semibold tracking-wide text-pct-green bg-emerald-50 rounded-full">
                    MOVIMENTO NACIONAL
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-pct-blue leading-tight mb-6">
                    Por um Brasil de <span class="text-pct-green underline decoration-4 underline-offset-8">Cidadania</span> e <span class="text-pct-green underline decoration-4 underline-offset-8">Trabalho</span>.
                </h1>
                <p class="text-xl text-gray-600 mb-10 max-w-lg leading-relaxed">
                    Unidos pela dignidade de quem constrói o país. O PCT é a voz do trabalhador e a força da cidadania em cada rincão do Brasil.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register.index') }}" class="btn-primary text-center px-8 py-4">Filiar-se ao PCT</a>
                    <a href="{{ route('manifesto') }}" class="btn-secondary text-center px-8 py-4 bg-transparent border-2 border-pct-green text-pct-green hover:bg-pct-green hover:text-white">Conhecer o Manifesto</a>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1541872703-74c5e443d1f5?auto=format&fit=crop&q=80&w=1000" alt="Brazil Worker" class="object-cover w-full h-[500px]">
                </div>
                <!-- Decorative elements -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-pct-green/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-60 h-60 bg-pct-blue/10 rounded-full blur-3xl"></div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-pct-blue mb-4">Nossa Missão Territorial</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Organizados de Brasília até o seu bairro, estamos presentes em todo o território nacional para ouvir e agir.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-pct-blue rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-pct-blue mb-3">Comitês Municipais</h3>
                    <p class="text-gray-600 leading-relaxed">A base do nosso movimento está na sua cidade, focando nos problemas locais e na mobilização comunitária.</p>
                </div>
                <div class="glass p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-pct-green rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-pct-blue mb-3">Gabinete Digital</h3>
                    <p class="text-gray-600 leading-relaxed">Tecnologia a serviço da transparência e da comunicação direta entre candidatos e eleitores.</p>
                </div>
                <div class="glass p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-pct-blue rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-pct-blue mb-3">Tesouraria Transparente</h3>
                    <p class="text-gray-600 leading-relaxed">Cada centavo investido é registrado e auditado publicamente, garantindo a ética total das doações.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership CTA -->
    <section class="py-20 bg-pct-blue text-white overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl font-bold mb-6 italic">Faça parte da história.</h2>
            <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">O PCT não é apenas um movimento, é a união de pessoas que acreditam que o trabalho dignifica e a cidadania transforma.</p>
            <a href="{{ route('register.index') }}" class="btn-secondary inline-block px-12 py-4 text-lg">Cadastrar-se Agora</a>
        </div>
        <!-- Background accents -->
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-pct-green/20 rounded-full blur-3xl"></div>
        <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
    </section>
</x-public-layout>
