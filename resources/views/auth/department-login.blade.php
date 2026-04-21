<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Portal PCT</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- PWA Meta Tags -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1e3a8a">
    <link rel="apple-touch-icon" href="/logo.png">

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Instrument Sans', sans-serif; }
    </style>
</head>
<body class="antialiased bg-gray-50 flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center p-6 relative overflow-hidden">
        <!-- Abstract Background Circles -->
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-pct-blue/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-pct-green/5 rounded-full blur-3xl"></div>

        <div class="max-w-md w-full relative z-10 transition-all duration-500 animate-in fade-in zoom-in duration-700">
            <!-- Branding Header -->
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center justify-center p-4 bg-white rounded-3xl shadow-sm mb-8 hover:scale-105 transition-transform duration-300">
                    <img class="h-16 w-auto object-contain" style="max-height: 80px;" src="{{ asset('logo.png') }}" alt="PCT Logo">
                </a>
                <h2 class="text-3xl font-black text-pct-blue tracking-tight leading-tight mb-3">
                    {{ $title }}
                </h2>
                <div class="h-1.5 w-16 bg-pct-green mx-auto rounded-full mb-4"></div>
                <p class="text-sm text-gray-400 font-medium">Autenticação oficial do Movimento PCT.</p>
            </div>

            <div class="glass p-10 rounded-[2.5rem] shadow-2xl border border-white/60">
                @if($errors->any())
                    <div class="bg-red-50 border border-red-100 text-red-700 px-5 py-4 rounded-2xl mb-8 text-xs font-bold uppercase tracking-tight">
                        @foreach($errors->all() as $error)
                            <p class="mb-1 last:mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form class="space-y-8" action="{{ ($path === 'login' || $path === 'login-diretorio') ? url($path) : url($path . '/login') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div class="group">
                            <label for="email" class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2 ml-1 opacity-70 group-focus-within:opacity-100 transition-opacity">E-mail de Acesso</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required auto-complete="email"
                                class="appearance-none block w-full px-6 py-4 bg-white/40 border-2 border-transparent rounded-[1.25rem] shadow-sm placeholder-gray-300 focus:outline-none focus:ring-4 focus:ring-pct-green/10 focus:border-pct-green transition-all sm:text-sm font-medium" 
                                placeholder="colaborador@pct.social.br">
                        </div>
                        <div class="group">
                            <div class="flex justify-between items-center mb-2 ml-1">
                                <label for="password" class="block text-[10px] font-black text-pct-blue uppercase tracking-widest opacity-70 group-focus-within:opacity-100 transition-opacity">Senha de Segurança</label>
                            </div>
                            <input id="password" name="password" type="password" required 
                                class="appearance-none block w-full px-6 py-4 bg-white/40 border-2 border-transparent rounded-[1.25rem] shadow-sm placeholder-gray-300 focus:outline-none focus:ring-4 focus:ring-pct-green/10 focus:border-pct-green transition-all sm:text-sm font-medium" 
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-1">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="h-5 w-5 text-pct-green focus:ring-pct-green border-gray-300 rounded-lg transition-all cursor-pointer">
                            <label for="remember" class="ml-3 block text-xs text-pct-blue font-bold uppercase tracking-tighter cursor-pointer">Manter Conectado</label>
                        </div>
                        <div class="text-xs">
                            <a href="{{ route('password.request') }}" class="font-bold text-pct-green hover:underline uppercase tracking-tighter">Esqueci meus dados</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                            class="w-full flex justify-center py-5 px-6 border border-transparent rounded-[1.25rem] shadow-xl text-lg font-black text-white bg-pct-blue hover:bg-blue-900 transition-all transform hover:scale-[1.02] active:scale-95 focus:outline-none focus:ring-4 focus:ring-blue-100">
                            ACESSAR PORTAL
                        </button>
                    </div>

                    <!-- Aviso de Suporte Emergencial -->
                    <div class="pt-4 mt-8 border-t border-slate-100">
                        <div class="bg-blue-50/50 rounded-2xl p-6 text-center">
                            <p class="text-[11px] font-black text-pct-blue uppercase tracking-widest mb-2">Problemas para acessar?</p>
                            <p class="text-xs text-slate-500 font-medium mb-4 leading-relaxed">
                                Se você encontrou erro ao fazer login em <span class="font-bold text-pct-blue">www.pct.social.br</span>, não desista!
                            </p>
                            <a href="https://wa.me/5551933806899" target="_blank" class="inline-flex items-center text-[10px] font-black text-pct-green uppercase tracking-widest hover:underline">
                                👉 Entre em contato conosco e faça parte do movimento!
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Back to Site Link -->
            <div class="mt-12 text-center flex flex-col items-center space-y-4">
                <a href="/" class="inline-flex items-center text-xs font-black text-pct-blue uppercase tracking-widest hover:text-pct-green transition-colors pb-1 border-b-2 border-transparent hover:border-pct-green">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Voltar para o site principal
                </a>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    Suporte: (51) 93380-6899 • (51) 3786-6302
                </p>
                <p class="text-[9px] font-bold text-gray-300 uppercase tracking-tighter">Taquara, RS / Brasil</p>
            </div>
        </div>
    </div>
    
    <footer class="py-10 text-center opacity-40">
        <p class="text-[10px] font-bold text-pct-blue uppercase tracking-[0.2em]">Movimento Político Cidadania e Trabalho &copy; {{ date('Y') }}</p>
    </footer>
</body>
</html>
