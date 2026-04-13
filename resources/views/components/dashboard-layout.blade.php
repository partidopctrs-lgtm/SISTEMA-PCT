<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dashboard - PCT' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased bg-gray-50 flex h-screen overflow-hidden" x-data="{ sidebarOpen: true }">
    
    <!-- Sidebar -->
    <aside class="bg-pct-blue text-white transition-all duration-300 flex-shrink-0 flex flex-col" :class="sidebarOpen ? 'w-64' : 'w-20'">
        <div class="h-20 flex items-center px-6 border-b border-blue-800 shrink-0">
            <a href="/" class="flex items-center space-x-3 overflow-hidden">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto brightness-0 invert flex-shrink-0">
                <span class="text-xl font-bold tracking-tight whitespace-nowrap" x-show="sidebarOpen" x-transition>PCT</span>
            </a>
        </div>
        
        <nav class="flex-grow overflow-y-auto py-6">
            <div class="px-4 space-y-2">
                <!-- Generic Links based on Role would go here -->
                <a href="#" class="flex items-center px-4 py-3 rounded-xl hover:bg-blue-800 transition-colors group">
                    <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Dashboard</span>
                </a>
                
                @if(auth()->user() && auth()->user()->role === 'admin')
                    <div class="pt-4 pb-2 px-4 uppercase text-xs font-bold text-blue-400 tracking-wider" x-show="sidebarOpen">Gestão Partido</div>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-blue-800 transition-colors group">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Usuários</span>
                    </a>
                @endif

                @if(auth()->user() && (auth()->user()->role === 'finance' || auth()->user()->role === 'admin'))
                    <a href="{{ route('finance.dashboard') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-blue-800 transition-colors group">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Tesouraria</span>
                    </a>
                @endif
                
                <div class="pt-4 pb-2 px-4 uppercase text-xs font-bold text-blue-400 tracking-wider" x-show="sidebarOpen">Configurações</div>
                 <a href="#" class="flex items-center px-4 py-3 rounded-xl hover:bg-blue-800 transition-colors group">
                    <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Meu Perfil</span>
                </a>
            </div>
        </nav>

        <div class="p-4 border-t border-blue-800">
            <form action="#" method="POST">
                @csrf
                <button class="flex items-center w-full px-4 py-3 rounded-xl hover:bg-red-600 hover:text-white transition-colors group">
                    <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Sair</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-w-0">
        <!-- Topbar -->
        <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8 shrink-0">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-pct-blue focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            
            <div class="flex items-center space-x-6">
                <!-- Notifications -->
                <button class="text-gray-400 hover:text-pct-blue relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-pct-green ring-2 ring-white"></span>
                </button>
                
                <div class="flex items-center space-x-3">
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name ?? 'Usuário Teste' }}</p>
                        <p class="text-xs text-gray-500 uppercase font-semibold">{{ auth()->user()->role ?? 'Afiliado' }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-pct-blue flex items-center justify-center text-white font-bold">
                        {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow overflow-y-auto p-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
