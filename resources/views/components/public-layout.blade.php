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
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="glass sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3">
                            <img src="{{ asset('logo.png') }}" alt="PCT Logo" class="h-12 w-auto">
                            <span class="text-2xl font-bold text-pct-blue tracking-tight">PCT</span>
                        </a>
                        <div class="hidden md:ml-10 md:flex md:space-x-8">
                            <a href="{{ route('home') }}" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Home</a>
                            <a href="{{ route('manifesto') }}" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Manifesto</a>
                            <a href="{{ route('propostas') }}" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Propostas</a>
                            <a href="#" onclick="alert('Área de Transparência em breve.'); return false;" class="text-gray-700 hover:text-pct-blue font-medium transition-colors">Transparência</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-pct-blue font-semibold hover:underline">Entrar</a>
                        <a href="{{ route('register.index') }}" class="btn-primary">Quero Me Afiliar</a>
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
                            <li><a href="{{ route('manifesto') }}" class="hover:text-white transition-colors">Manifesto</a></li>
                            <li><a href="{{ route('propostas') }}" class="hover:text-white transition-colors">Propostas</a></li>
                            <li><a href="{{ route('ethics') }}" class="hover:text-white transition-colors">Código de Ética</a></li>
                            <li><a href="{{ route('register.index') }}" class="hover:text-white transition-colors">Filie-se</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Canais Oficiais</h4>
                        <ul class="space-y-2 text-blue-100">
                            <li><a href="mailto:contato@pct.org.br" class="hover:text-white transition-all">contato@pct.org.br</a></li>
                            <li><a href="https://wa.me/5551933806899" target="_blank" class="hover:text-white transition-all">(51) 93380-6899 (WhatsApp)</a></li>
                            <li>(51) 3786-6302 (Fixo)</li>
                            <li class="pt-2"><a href="https://www.facebook.com/MovimentoPCT/" target="_blank" class="px-4 py-2 bg-blue-700/50 rounded-lg text-xs font-bold hover:bg-blue-600 transition-all inline-block mt-2">Página no Facebook</a></li>
                            <li class="text-xs opacity-60 pt-4">Taquara, RS / Brasil</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-blue-800 text-center text-blue-200 text-sm">
                    &copy; {{ date('Y') }} PCT - Movimento Político. Todos os direitos reservados.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
