<x-public-layout>
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center overflow-hidden bg-white">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-[60%] h-full bg-slate-50 rounded-l-[10rem] -rotate-6 translate-x-1/4 translate-y-12"></div>
        <div class="absolute top-20 right-40 w-96 h-96 bg-pct-green/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-20 left-40 w-80 h-80 bg-pct-blue/5 rounded-full blur-[80px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-3/5 text-center lg:text-left">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-50 text-pct-green text-sm font-bold tracking-widest uppercase mb-8 animate-fade-in">
                        <span class="relative flex h-2 w-2 mr-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pct-green opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-pct-green"></span>
                        </span>
                        Iniciativa Nacional Independente
                    </div>
                    <h1 class="text-6xl md:text-8xl font-black text-pct-blue leading-[0.9] mb-8 tracking-tighter">
                        PCT <br>
                        <span class="text-gradient">Cidadania & Trabalho.</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-slate-600 mb-12 max-w-2xl leading-relaxed font-medium">
                        O PCT é um movimento formado por cidadãos comprometidos com o desenvolvimento do Brasil por meio do trabalho, da responsabilidade individual e da liberdade econômica.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start">
                        <a href="{{ route('register.index') }}" class="btn-primary flex items-center justify-center group">
                            Quero me Unir ao PCT
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="#identidade" class="px-8 py-3 rounded-full font-bold text-pct-blue border-2 border-pct-blue/20 hover:bg-pct-blue/5 transition-all text-center">
                            Nossa Identidade
                        </a>
                    </div>
                </div>
                <div class="lg:w-2/5 relative animate-float">
                    <div class="relative z-10 rounded-[4rem] overflow-hidden shadow-2xl border-[12px] border-white transform rotate-3 hover:rotate-0 transition-transform duration-700 bg-white">
                        <img src="{{ asset('Bandeira do Movimento PCT em céu claro.png') }}" alt="Bandeira do Movimento PCT" class="w-full h-auto max-h-[600px] object-contain">
                    </div>
                    <div class="absolute -z-10 -bottom-10 -right-10 w-full h-full bg-pct-green/20 rounded-[4rem] blur-2xl"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- Nossa Identidade -->
    <section id="identidade" class="py-32 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <div class="lg:w-1/2">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white p-8 rounded-[3rem] shadow-xl shadow-pct-blue/5 border border-white mt-12">
                            <h4 class="text-4xl font-black text-pct-blue mb-2">100%</h4>
                            <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">Brasileiro</p>
                        </div>
                        <div class="bg-pct-green p-8 rounded-[3rem] shadow-xl shadow-pct-green/20 text-white">
                            <h4 class="text-4xl font-black mb-2">Livre</h4>
                            <p class="opacity-80 font-bold uppercase tracking-widest text-xs">Independente</p>
                        </div>
                        <div class="bg-pct-blue p-8 rounded-[3rem] shadow-xl shadow-pct-blue/20 text-white -mt-6">
                            <h4 class="text-4xl font-black mb-2">Ético</h4>
                            <p class="opacity-80 font-bold uppercase tracking-widest text-xs">Transparente</p>
                        </div>
                        <div class="bg-white p-8 rounded-[3rem] shadow-xl shadow-pct-blue/5 border border-white">
                            <h4 class="text-4xl font-black text-pct-green mb-2">Ativo</h4>
                            <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">Engajado</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <span class="text-pct-green font-black tracking-[0.3em] uppercase mb-4 block">Nossa Identidade</span>
                    <h2 class="text-5xl font-black text-pct-blue mb-8 leading-tight">Visão Liberal e Foco na Valorização do Indivíduo.</h2>
                    <div class="prose prose-xl text-slate-600 leading-relaxed font-medium space-y-6">
                        <p>
                            Nosso movimento nasce com um propósito claro: fortalecer a cidadania ativa, incentivar a qualificação política e promover soluções reais para os desafios do país, sempre com base em princípios liberais, ética e transparência.
                        </p>
                        <div class="bg-white/50 p-6 rounded-2xl border-l-8 border-pct-blue italic text-pct-blue font-bold">
                            "O PCT não possui qualquer vínculo com partidos estrangeiros, ideologias extremistas ou movimentos de caráter comunista."
                        </div>
                        <p>
                            Defendemos um Estado eficiente, que cumpra seu papel sem sufocar a sociedade, garantindo segurança jurídica, liberdade econômica e oportunidades para todos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Campanha Água é um Direito -->
    <section class="py-24 bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden relative">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" preserveAspectRatio="none" viewBox="0 0 100 100" fill="none">
                <path d="M0 50 Q 25 25, 50 50 T 100 50" stroke="white" stroke-width="2" fill="none"/>
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="md:w-2/3 text-center md:text-left">
                    <span class="inline-block px-4 py-1 bg-white/20 text-[10px] font-black uppercase tracking-[0.3em] rounded-full mb-6">Mobilização RS</span>
                    <h2 class="text-4xl md:text-6xl font-black mb-6 tracking-tighter leading-tight uppercase">
                        A água é um direito. <br>
                        <span class="text-pct-green">E o povo precisa ser ouvido.</span>
                    </h2>
                    <p class="text-xl md:text-2xl text-blue-100 font-medium leading-relaxed mb-8">
                        Participe do movimento e registre o problema na sua cidade. Nossa união gera a pressão necessária para a solução.
                    </p>
                </div>
                <div class="md:w-1/3 flex justify-center">
                    <a href="{{ route('campaign.water.index') }}" class="px-12 py-6 bg-pct-green text-white rounded-[2rem] font-black uppercase tracking-widest hover:bg-white hover:text-pct-blue transition-all shadow-2xl shadow-black/20 text-center transform hover:scale-105 active:scale-95">
                        Quero participar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Nossos Princípios -->
    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-24">
                <span class="text-pct-green font-black tracking-[0.3em] uppercase mb-4 block">Fundamentos</span>
                <h2 class="text-6xl font-black text-pct-blue uppercase tracking-tighter">Nossos Princípios</h2>
                <div class="h-2 w-24 bg-pct-green mx-auto mt-6 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $principios = [
                        ['Liberdade individual', 'A base de uma sociedade livre e próspera.', 'M12 15l-3-3m0 0l3-3m-3 3h8M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                        ['Iniciativa Privada', 'Valorização do trabalho e do empreendedorismo.', 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                        ['Responsabilidade Fiscal', 'Gestão pública eficiente e transparente.', 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['Ética na Política', 'Integridade absoluta em cada ação e decisão.', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['Educação Política', 'Formação acessível e de alta qualidade.', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                        ['Participação Ativa', 'Sociedade engajada nas decisões públicas.', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z']
                    ];
                @endphp

                @foreach($principios as $p)
                <div class="card-premium group">
                    <div class="w-16 h-16 bg-slate-50 text-pct-blue rounded-3xl flex items-center justify-center mb-8 border border-pct-blue/5 group-hover:bg-pct-blue group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $p[2] }}"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-pct-blue mb-4 group-hover:text-pct-green transition-colors">{{ $p[0] }}</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">{{ $p[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Missão / Visão -->
    <section class="py-20 bg-pct-blue relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-pct-green rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-sky-400 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="glass-dark p-12 rounded-[4rem]">
                    <span class="text-pct-green font-black tracking-widest uppercase mb-4 block">Nossa Missão</span>
                    <h3 class="text-4xl font-black text-white mb-6">Transformar comunidades e o Brasil.</h3>
                    <p class="text-blue-100 text-xl leading-relaxed">
                        Formar cidadãos conscientes, preparados e engajados, capazes de transformar suas comunidades e contribuir para um Brasil mais justo, produtivo e livre.
                    </p>
                </div>
                <div class="glass-dark p-12 rounded-[4rem]">
                    <span class="text-pct-green font-black tracking-widest uppercase mb-4 block">Nossa Visão</span>
                    <h3 class="text-4xl font-black text-white mb-6">Ser referência nacional de liderança.</h3>
                    <p class="text-blue-100 text-xl leading-relaxed">
                        Ser um movimento nacional de referência na formação política e na construção de lideranças comprometidas com resultados reais, longe de ideologias radicais e práticas ultrapassadas.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Documentos Públicos -->
    <section class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-pct-green font-black tracking-[0.3em] uppercase mb-4 block">Transparência</span>
                <h2 class="text-5xl font-black text-pct-blue tracking-tighter">Documentos Oficiais</h2>
                <div class="h-1.5 w-20 bg-pct-green mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Cartilha -->
                <div class="p-8 bg-slate-50 rounded-[3rem] border border-slate-100 flex flex-col items-center text-center group hover:bg-white hover:shadow-2xl hover:shadow-pct-blue/10 transition-all duration-500">
                    <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-pct-blue mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-pct-blue mb-4 uppercase tracking-tight">Cartilha Oficial</h3>
                    <p class="text-slate-500 text-sm mb-8 font-medium">Entenda os pilares e a forma de atuação do nosso movimento.</p>
                    <a href="https://drive.google.com/file/d/1aGtnjECienMe3hjDoFSYeeMm8e7n6Wvo/view?usp=sharing" target="_blank" class="px-6 py-3 bg-white border-2 border-pct-blue/10 text-pct-blue font-bold rounded-2xl hover:bg-pct-blue hover:text-white transition-all text-xs uppercase tracking-widest">Download PDF</a>
                </div>

                <!-- Estatuto -->
                <div class="p-8 bg-slate-50 rounded-[3rem] border border-slate-100 flex flex-col items-center text-center group hover:bg-white hover:shadow-2xl hover:shadow-pct-blue/10 transition-all duration-500">
                    <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-pct-blue mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-pct-blue mb-4 uppercase tracking-tight">Estatuto Social</h3>
                    <p class="text-slate-500 text-sm mb-8 font-medium">As regras fundamentais que regem nossa organização nacional.</p>
                    <a href="https://drive.google.com/file/d/1i0UZreBix6cktRShr4DW2VE6GbrdmlFO/view?usp=sharing" target="_blank" class="px-6 py-3 bg-white border-2 border-pct-blue/10 text-pct-blue font-bold rounded-2xl hover:bg-pct-blue hover:text-white transition-all text-xs uppercase tracking-widest">Acessar Documento</a>
                </div>

                <!-- Ética -->
                <div class="p-8 bg-slate-50 rounded-[3rem] border border-slate-100 flex flex-col items-center text-center group hover:bg-white hover:shadow-2xl hover:shadow-pct-blue/10 transition-all duration-500">
                    <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-pct-green mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-pct-blue mb-4 uppercase tracking-tight">Código de Ética</h3>
                    <p class="text-slate-500 text-sm mb-8 font-medium">Nosso compromisso inabalável com a integridade e conduta.</p>
                    <a href="{{ route('ethics') }}" class="px-6 py-3 bg-pct-green text-white font-bold rounded-2xl hover:bg-emerald-600 transition-all text-xs uppercase tracking-widest">Ler Online</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Nossa Força Nacional (Transparência Real-time) -->
    <section class="py-32 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-pct-blue rounded-full blur-[150px] -translate-y-1/2 translate-x-1/2"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <span class="text-pct-green font-black tracking-[0.4em] uppercase mb-4 block">Nossa Força Nacional</span>
                <h2 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Transparência em Tempo Real</h2>
                <p class="text-blue-100/60 max-w-2xl mx-auto font-medium">Acompanhe a adesão oficial ao movimento em cada canto do Brasil. Dados atualizados instantaneamente conforme novos apoios são registrados.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Meta Global -->
                <div class="lg:col-span-1 flex flex-col justify-center bg-white/5 p-12 rounded-[4rem] border border-white/10 backdrop-blur-xl">
                    <p class="text-[10px] font-black text-blue-300 uppercase tracking-widest mb-4">Total de Apoios Oficiais</p>
                    <div class="text-7xl font-black text-white mb-2 counter-value">{{ number_format($stats['total_signatures'], 0, ',', '.') }}</div>
                    <p class="text-sm font-medium text-blue-100/40 mb-10 italic">Rumo ao registro oficial do Partido.</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between text-xs font-black uppercase tracking-widest">
                            <span class="text-blue-300">Meta TSE</span>
                            <span class="text-pct-green">{{ number_format($stats['goal'], 0, ',', '.') }}</span>
                        </div>
                        <div class="h-4 bg-white/10 rounded-full overflow-hidden p-1">
                            <div class="h-full bg-pct-green rounded-full shadow-[0_0_20px_rgba(34,139,47,0.5)] transition-all duration-1000" style="width: {{ max(1, $stats['progress']) }}%"></div>
                        </div>
                        <p class="text-[10px] font-bold text-blue-100/30 text-center uppercase tracking-[0.2em]">Sua assinatura faz este número crescer!</p>
                    </div>

                    <a href="{{ route('register.index') }}" class="mt-12 w-full py-5 bg-pct-green text-white text-center rounded-2xl font-black uppercase tracking-widest hover:scale-[1.02] transition-all shadow-xl shadow-pct-green/20">
                        Quero Apoiar Agora
                    </a>
                </div>

                <!-- Estados e Cidades -->
                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Estados -->
                    <div class="bg-white/5 p-10 rounded-[4rem] border border-white/10">
                        <h4 class="text-lg font-black text-blue-300 uppercase tracking-widest mb-8 flex items-center gap-3">
                            <span class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center text-blue-400">#</span>
                            Ranking por Estado
                        </h4>
                        <div class="space-y-4">
                            @forelse($stats['by_state'] as $state)
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-white/10 transition-colors">
                                <div class="flex items-center gap-4">
                                    <span class="w-8 font-black text-blue-300/40">{{ $loop->iteration }}º</span>
                                    <span class="text-sm font-black uppercase tracking-widest">{{ $state->state }}</span>
                                </div>
                                <span class="px-4 py-1 bg-pct-blue/30 text-blue-300 rounded-full text-xs font-black">{{ number_format($state->total, 0, ',', '.') }}</span>
                            </div>
                            @empty
                            <p class="text-sm text-white/20 italic font-medium">Aguardando primeiros apoios estaduais...</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Cidades -->
                    <div class="bg-white/5 p-10 rounded-[4rem] border border-white/10">
                        <h4 class="text-lg font-black text-pct-green uppercase tracking-widest mb-8 flex items-center gap-3">
                            <span class="w-8 h-8 bg-pct-green/20 rounded-lg flex items-center justify-center text-pct-green">📍</span>
                            Cidades em Destaque
                        </h4>
                        <div class="space-y-4">
                            @forelse($stats['by_city'] as $city)
                            <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:bg-white/10 transition-colors">
                                <div>
                                    <p class="text-xs font-black uppercase tracking-tight">{{ $city->city }}</p>
                                    <p class="text-[9px] font-bold text-white/30 uppercase">{{ $city->state }}</p>
                                </div>
                                <span class="text-sm font-black text-pct-green">{{ number_format($city->total, 0, ',', '.') }}</span>
                            </div>
                            @empty
                            <p class="text-sm text-white/20 italic font-medium">Aguardando mobilização municipal...</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hino do Movimento -->
    <section class="py-32 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pct-blue via-pct-green to-pct-blue"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="text-pct-blue font-black tracking-[0.4em] uppercase mb-4 block opacity-60">Símbolos Oficiais</span>
            <h2 class="text-6xl font-black text-pct-blue mb-12 tracking-tighter">Conheça o Hino do PCT</h2>
            
            <div class="max-w-2xl mx-auto bg-white p-12 rounded-[4rem] shadow-2xl border border-slate-100 flex flex-col items-center group hover:scale-[1.02] transition-transform duration-500">
                <div class="w-24 h-24 bg-pct-blue rounded-[2rem] flex items-center justify-center text-white mb-8 shadow-xl shadow-blue-600/20 group-hover:rotate-6 transition-transform">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
                </div>
                
                <h3 class="text-2xl font-black text-pct-blue mb-4 uppercase">Cidadania & Trabalho</h3>
                <p class="text-slate-500 font-medium mb-12 leading-relaxed italic">
                    "O hino que embala nossa marcha em direção a um Brasil mais livre e próspero. Ouça e sinta a força da nossa união."
                </p>

                <div class="w-full flex flex-col items-center gap-6">
                    <audio id="hino-publico" src="{{ asset('audio/hino-pct.mp3') }}" preload="metadata"></audio>
                    
                    <div class="flex items-center gap-4">
                        <button onclick="document.getElementById('hino-publico').play()" class="px-10 py-5 bg-pct-blue text-white rounded-full font-black uppercase tracking-widest text-sm flex items-center hover:bg-blue-900 transition-all shadow-xl shadow-blue-900/20">
                            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            Ouvir Agora
                        </button>
                        <a href="{{ asset('audio/hino-pct.mp3') }}" 
                           onclick="trackAudio('download')"
                           download class="p-5 border-2 border-slate-100 text-slate-400 rounded-full hover:bg-slate-50 hover:text-pct-blue transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Perguntas Frequentes (FAQ) -->
    <section id="faq" class="py-32 bg-white relative overflow-hidden">
        <div class="absolute top-40 right-0 w-96 h-96 bg-pct-blue/5 rounded-full blur-[100px]"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <span class="text-pct-green font-black tracking-[0.3em] uppercase mb-4 block">Dúvidas Comuns</span>
                <h2 class="text-5xl font-black text-pct-blue tracking-tighter">Perguntas Frequentes</h2>
                <div class="h-1.5 w-20 bg-pct-green mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $faq)
                <div class="group border border-slate-100 rounded-[2.5rem] bg-slate-50 hover:bg-white hover:shadow-2xl hover:shadow-pct-blue/5 transition-all duration-500 overflow-hidden">
                    <button onclick="toggleFaq({{ $faq->id }})" class="w-full px-10 py-8 flex items-center justify-between text-left focus:outline-none">
                        <span class="text-xl font-black text-pct-blue group-hover:text-pct-green transition-colors leading-tight pr-8">
                            {{ $faq->question }}
                        </span>
                        <div id="icon-{{ $faq->id }}" class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-pct-blue transition-transform duration-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </button>
                    <div id="answer-{{ $faq->id }}" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <div class="px-10 pb-10 text-lg text-slate-600 font-medium leading-relaxed whitespace-pre-line">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-20 text-center">
                <p class="text-slate-500 font-medium mb-6">Ainda tem alguma dúvida sobre o movimento?</p>
                <a href="{{ route('register.index') }}" class="text-pct-green font-black uppercase tracking-widest text-sm hover:underline">Entre em contato conosco</a>
            </div>
        </div>
    </section>

    <script>
        function toggleFaq(id) {
            const answer = document.getElementById(`answer-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            
            // Fecha outros FAQs (opcional, remova se quiser abrir múltiplos)
            document.querySelectorAll('[id^="answer-"]').forEach(el => {
                if(el.id !== `answer-${id}`) {
                    el.style.maxHeight = null;
                    el.style.opacity = 0;
                }
            });
            document.querySelectorAll('[id^="icon-"]').forEach(el => {
                if(el.id !== `icon-${id}`) {
                    el.style.transform = 'rotate(0deg)';
                }
            });

            if (answer.style.maxHeight) {
                answer.style.maxHeight = null;
                answer.style.opacity = 0;
                icon.style.transform = 'rotate(0deg)';
            } else {
                answer.style.maxHeight = answer.scrollHeight + "px";
                answer.style.opacity = 1;
                icon.style.transform = 'rotate(180deg)';
            }
        }
    </script>

    <!-- Junte-se -->
    <section class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[5rem] overflow-hidden shadow-2xl relative border border-slate-100">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2 p-20">
                        <h2 class="text-5xl font-black text-pct-blue mb-8 leading-tight">Junte-se ao PCT</h2>
                        <p class="text-xl text-slate-600 mb-10 leading-relaxed font-medium">
                            O Brasil precisa de pessoas dispostas a agir com responsabilidade, visão e coragem. 
                            Se você acredita no trabalho, na liberdade e na transformação através da ação, o PCT é o seu lugar.
                        </p>
                        <a href="{{ route('register.index') }}" class="btn-primary inline-flex items-center px-12 py-5 text-xl">
                            Quero me Afiliar Agora
                            <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                    <div class="lg:w-1/2 relative bg-pct-blue min-h-[400px] flex items-center justify-center">
                        <div class="absolute inset-0 bg-gradient-to-br from-pct-blue via-pct-blue to-pct-green opacity-90"></div>
                        <div class="relative z-10 text-center text-white px-10">
                            <span class="text-9xl font-black opacity-10 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 select-none uppercase">Ação</span>
                            <p class="text-3xl font-black italic mb-4">"A mudança começa com a sua coragem."</p>
                            <p class="text-pct-green font-bold tracking-[0.4em] uppercase">Movimento Nacional</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes float {
            0% { transform: translateY(0px) rotate(3deg); }
            50% { transform: translateY(-20px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(3deg); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>
    <script>
        function trackAudio(type) {
            fetch('{{ route('audio.track') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ type: type, metadata: { page: 'public_home' } })
            });
        }
        document.getElementById('hino-publico').addEventListener('play', () => trackAudio('play'));
    </script>
</x-public-layout>
