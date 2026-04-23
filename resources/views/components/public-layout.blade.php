<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'PCT - Movimento Cidadania e Trabalho' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


    <!-- PWA Meta Tags -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1e3a8a">
    <link rel="apple-touch-icon" href="/logo.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>

    
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false }">
        <!-- Navbar -->
        <nav class="glass sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3">
                            <img src="{{ asset('logo.png') }}" alt="PCT Logo" class="h-10 md:h-12 w-auto">
                            <span class="text-xl md:text-2xl font-bold text-pct-blue tracking-tight">PCT</span>
                        </a>
                        <div class="hidden md:ml-10 md:flex md:space-x-8">
                            <a href="{{ route('home') }}" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Home</a>
                            <a href="https://drive.google.com/file/d/1aGtnjECienMe3hjDoFSYeeMm8e7n6Wvo/view?usp=sharing" target="_blank" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Cartilha</a>
                            <a href="https://drive.google.com/file/d/1i0UZreBix6cktRShr4DW2VE6GbrdmlFO/view?usp=sharing" target="_blank" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Estatuto</a>
                            <a href="{{ route('proposta.sndah') }}" class="px-3 py-1 bg-emerald-50 text-pct-green font-bold rounded-lg border border-emerald-100 hover:bg-pct-green hover:text-white transition-all flex items-center gap-2">
                                <span class="w-2 h-2 bg-pct-green rounded-full"></span>
                                SNDAH 2026
                            </a>
                            <a href="{{ route('petition.show') }}" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Abaixo-Assinado</a>
                            <a href="{{ route('campaign.water.index') }}" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Relatar Problema</a>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-pct-blue font-semibold hover:underline">Entrar</a>
                        <a href="{{ route('register.index') }}" class="btn-primary">Quero Me Afiliar</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex md:hidden items-center">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-pct-blue p-2">
                            <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            <svg x-show="mobileMenuOpen" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Drawer -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-cloak
                 class="md:hidden bg-white border-b border-slate-100 shadow-xl">
                <div class="px-4 pt-2 pb-6 space-y-4">
                    <a href="{{ route('home') }}" class="block px-4 py-3 text-lg font-bold text-gray-700 hover:bg-slate-50 rounded-xl transition-all">Home</a>
                    <a href="https://drive.google.com/file/d/1aGtnjECienMe3hjDoFSYeeMm8e7n6Wvo/view?usp=sharing" target="_blank" class="block px-4 py-3 text-lg font-bold text-gray-700 hover:bg-slate-50 rounded-xl transition-all">Cartilha</a>
                    <a href="https://drive.google.com/file/d/1i0UZreBix6cktRShr4DW2VE6GbrdmlFO/view?usp=sharing" target="_blank" class="block px-4 py-3 text-lg font-bold text-gray-700 hover:bg-slate-50 rounded-xl transition-all">Estatuto</a>
                    <a href="{{ route('proposta.sndah') }}" class="block px-4 py-3 text-lg font-black text-emerald-600 bg-emerald-50 rounded-xl transition-all flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-600 rounded-full animate-pulse"></span>
                        SNDAH 2026 (Projeto de Lei)
                    </a>
                    <a href="{{ route('petition.show') }}" class="block px-4 py-3 text-lg font-bold text-gray-700 hover:bg-slate-50 rounded-xl transition-all">Abaixo-Assinado</a>
                    <a href="{{ route('campaign.water.index') }}" class="block px-4 py-3 text-lg font-bold text-gray-700 hover:bg-slate-50 rounded-xl transition-all">Relatar Problema Hídrico</a>
                    <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-4">
                        <a href="{{ route('login') }}" class="flex items-center justify-center py-4 text-pct-blue font-black uppercase tracking-widest text-xs border border-pct-blue/20 rounded-xl">Entrar</a>
                        <a href="{{ route('register.index') }}" class="flex items-center justify-center py-4 bg-pct-blue text-white font-black uppercase tracking-widest text-xs rounded-xl shadow-lg shadow-blue-900/20">Afiliar-se</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-pct-blue text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center space-x-3 mb-4">
                            <img src="{{ asset('logo.png') }}" alt="PCT Logo" class="h-10 w-auto brightness-0 invert">
                            <span class="text-2xl font-bold tracking-tight text-white">PCT</span>
                        </div>
                        <p class="text-blue-100 max-w-sm">
                            O PCT – Movimento Cidadania e Trabalho é uma iniciativa nacional independente focada no desenvolvimento do Brasil por meio do trabalho e da liberdade econômica.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Links Úteis</h4>
                        <ul class="space-y-2 text-blue-100">
                            <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Página Inicial</a></li>
                            <li><a href="https://drive.google.com/file/d/1aGtnjECienMe3hjDoFSYeeMm8e7n6Wvo/view?usp=sharing" target="_blank" class="hover:text-white transition-colors">Cartilha Oficial</a></li>
                            <li><a href="https://drive.google.com/file/d/1i0UZreBix6cktRShr4DW2VE6GbrdmlFO/view?usp=sharing" target="_blank" class="hover:text-white transition-colors">Estatuto Social</a></li>
                            <li><a href="{{ route('proposta.sndah') }}" class="text-pct-green font-bold hover:text-white transition-colors uppercase text-xs tracking-widest">📋 SNDAH 2026 (Projeto de Lei)</a></li>
                            <li><a href="{{ route('petition.show') }}" class="hover:text-white transition-colors">✍️ Abaixo-Assinado</a></li>
                            <li><a href="{{ route('campaign.water.index') }}" class="hover:text-white transition-colors">🚨 Relatar Problema Hídrico</a></li>
                            <li><a href="{{ route('register.index') }}" class="hover:text-white transition-colors">Filie-se ao PCT</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Canais Oficiais</h4>
                        <ul class="space-y-2 text-blue-100">
                            <li><a href="mailto:contato@pct.social.br" class="hover:text-white transition-all">contato@pct.social.br</a></li>
                            <li><a href="https://wa.me/5551933806899" target="_blank" class="hover:text-white transition-all">(51) 93380-6899 (WhatsApp)</a></li>
                            <li>(51) 3786-6302 (Fixo)</li>
                            <li class="pt-2"><a href="https://www.facebook.com/MovimentoPCT/" target="_blank" class="px-4 py-2 bg-blue-700/50 rounded-lg text-xs font-bold hover:bg-blue-600 transition-all inline-block mt-2">Página no Facebook</a></li>
                            <li class="text-xs opacity-60 pt-4">Taquara, RS / Brasil</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-blue-800 flex flex-col md:flex-row justify-between items-center text-blue-200 text-sm gap-4">
                    <p>&copy; {{ date('Y') }} PCT - Movimento Político. Todos os direitos reservados.</p>
                    <div class="flex space-x-6">
                        <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Termos de Uso</a>
                        <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacidade (LGPD)</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Aviso de Cookies -->
        <div x-data="{ open: !localStorage.getItem('cookies_accepted') }" x-show="open" x-cloak 
             class="fixed bottom-0 left-0 right-0 z-[100] p-4 animate-in slide-in-from-bottom duration-700">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white rounded-3xl shadow-2xl border border-slate-100 p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-6">
                        <div class="w-16 h-16 bg-pct-blue/5 rounded-2xl flex items-center justify-center text-pct-blue shrink-0">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-black text-pct-blue mb-1 uppercase tracking-tight">Privacidade e Cookies</h4>
                            <p class="text-sm text-slate-500 font-medium leading-relaxed">
                                Utilizamos cookies para melhorar sua experiência e garantir a segurança do portal, em conformidade com a LGPD. 
                                Ao continuar navegando, você concorda com nossa <a href="{{ route('privacy') }}" class="text-pct-blue font-bold hover:underline">Política de Privacidade</a>.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 shrink-0">
                        <button @click="localStorage.setItem('cookies_accepted', 'true'); open = false" 
                                class="px-8 py-4 bg-pct-blue text-white rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-900 transition-all shadow-xl shadow-blue-900/20">
                            Aceitar e Continuar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
