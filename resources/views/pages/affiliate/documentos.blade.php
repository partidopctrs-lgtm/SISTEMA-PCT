<x-dashboard-layout>
    <x-slot name="title">Documentos Oficiais - PCT</x-slot>

    <div class="max-w-6xl mx-auto">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Documentos Oficiais</h1>
            <p class="text-gray-500">Acesso rápido aos pilares institucionais e materiais de apoio do PCT.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Estatuto -->
            <div class="card-premium flex flex-col h-full bg-gradient-to-br from-white to-blue-50/30">
                <div class="w-16 h-16 bg-blue-100 rounded-3xl flex items-center justify-center text-pct-blue mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-pct-blue mb-4">Estatuto Oficial</h3>
                <p class="text-sm text-gray-500 mb-8 flex-grow">A base jurídica e organizacional do Movimento Cidadania e Trabalho – PCT. Regras, diretrizes e objetivos.</p>
                <a href="#" class="w-full py-4 bg-pct-blue text-white rounded-2xl font-bold text-center hover:bg-pct-blue-dark transition-all shadow-lg shadow-pct-blue/20">Baixar Estatuto (PDF)</a>
            </div>

            <!-- Código de Ética -->
            <div class="card-premium flex flex-col h-full bg-gradient-to-br from-white to-emerald-50/30">
                <div class="w-16 h-16 bg-emerald-100 rounded-3xl flex items-center justify-center text-pct-green mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-pct-blue mb-4">Código de Ética</h3>
                <p class="text-sm text-gray-500 mb-8 flex-grow">Normas de conduta, ética e transparência fundamentais para todos os membros e lideranças do PCT.</p>
                <a href="{{ route('ethics') }}" target="_blank" class="w-full py-4 bg-pct-green text-white rounded-2xl font-bold text-center hover:bg-emerald-600 transition-all shadow-lg shadow-pct-green/20">Acessar Online</a>
            </div>

            <!-- Manifesto -->
            <div class="card-premium flex flex-col h-full">
                <div class="w-16 h-16 bg-slate-100 rounded-3xl flex items-center justify-center text-pct-blue mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-pct-blue mb-4">Manifesto Político</h3>
                <p class="text-sm text-gray-500 mb-8 flex-grow">Nossa visão para o Brasil. Os princípios de liberdade, trabalho e meritocracia que defendemos.</p>
                <a href="https://docs.google.com/document/d/1ViPiyoq-IniGtDfZpdOjckftzqL29i1NKpoLLq4vEq8/export?format=pdf" target="_blank" class="w-full py-4 bg-slate-100 text-pct-blue rounded-2xl font-bold text-center hover:bg-slate-200 transition-all border border-slate-200">Baixar Manifesto</a>
            </div>

            <!-- Ficha de Filiação / Apoio -->
            <div class="card-premium flex flex-col h-full border-t-8 border-pct-green">
                <div class="w-16 h-16 bg-pct-green text-white rounded-3xl flex items-center justify-center mb-8 shadow-lg shadow-pct-green/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-pct-blue mb-4">Ficha de Filiação</h3>
                <p class="text-sm text-gray-500 mb-8 flex-grow">Documento oficial para formalização de novos membros e apoio ao movimento. Essencial para mobilização local.</p>
                <a href="{{ route('affiliate.membership_form') }}" class="w-full py-4 bg-white text-pct-green border-2 border-pct-green rounded-2xl font-bold text-center hover:bg-emerald-50 transition-all">Visualizar e Imprimir</a>
            </div>

            <!-- Hino Oficial -->
            <div class="card-premium flex flex-col h-full bg-pct-blue text-white group overflow-hidden relative">
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center text-pct-green mb-8">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Hino do PCT</h3>
                    <p class="text-sm opacity-60 mb-8 flex-grow">"PCT Força Brasil" - O hino oficial de mobilização e união nacional.</p>
                    
                    <div class="space-y-4">
                        <audio controls class="w-full h-10 accent-pct-green">
                            <source src="{{ asset('PCT FORCA BRASIL.mp3') }}" type="audio/mpeg">
                            Seu navegador não suporta áudio.
                        </audio>
                        <a href="{{ asset('PCT FORCA BRASIL.mp3') }}" download class="w-full py-3 bg-pct-green text-white rounded-xl font-bold text-center flex items-center justify-center gap-2 hover:bg-emerald-600 transition-all shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Baixar MP3
                        </a>
                    </div>
                </div>
                <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-pct-green/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
            </div>

            <!-- Ofícios e Modelos -->
            <div class="card-premium flex flex-col h-full">
                <div class="w-16 h-16 bg-slate-100 rounded-3xl flex items-center justify-center text-pct-blue mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-pct-blue mb-4">Modelos de Ofícios</h3>
                <p class="text-sm text-gray-500 mb-8 flex-grow">Materiais padronizados para comunicação oficial, solicitações e propostas em nível municipal.</p>
                <div class="w-full py-4 bg-slate-100 text-gray-400 rounded-2xl font-bold text-center cursor-not-allowed">Em Breve</div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
