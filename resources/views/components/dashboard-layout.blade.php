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
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

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

    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
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
            <div class="px-4 space-y-1">
                @php 
                    $role = auth()->user()->role ?? 'affiliate';
                    $isAffiliate = $role === 'affiliate';
                @endphp

                <!-- Dashbaord (Geral) -->
                <a href="{{ route($role . '.dashboard') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs($role . '.dashboard') ? 'bg-blue-800' : '' }}">
                    <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Dashboard</span>
                </a>

                @if($isAffiliate)
                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Identidade</div>
                    
                    <a href="{{ route('affiliate.profile') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.profile') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Meu Perfil</span>
                    </a>

                    <a href="{{ route('affiliate.carteirinha') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.carteirinha') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Carteirinha Digital</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Formação & Missões</div>

                    <a href="{{ route('affiliate.escola') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.escola') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Escola PCT</span>
                    </a>

                    <a href="{{ route('affiliate.missoes') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.missoes') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Atividades</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Crescimento</div>

                    <a href="{{ route('affiliate.convites') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.convites') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Indicações</span>
                    </a>

                    <a href="{{ route('affiliate.community.index') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.community.*') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Comunidade</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Gestão</div>

                    <a href="{{ route('affiliate.documentos') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.documentos') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Documentos</span>
                    </a>

                    <a href="{{ route('affiliate.eventos') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.eventos') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Eventos</span>
                    </a>

                    <a href="{{ route('affiliate.financeiro') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.financeiro') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Financeiro</span>
                    </a>

                    <a href="{{ route('affiliate.suporte') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.suporte') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Suporte</span>
                    </a>

                    <a href="{{ route('affiliate.configuracoes') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('affiliate.configuracoes') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Configurações</span>
                    </a>
                @endif
                
                @if(auth()->user() && auth()->user()->role === 'admin')
                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Gestão de Membros</div>
                    
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Usuários</span>
                    </a>

                    <a href="{{ route('admin.profiles') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.profiles') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Gestão de Perfis</span>
                    </a>

                    <a href="{{ route('admin.carteirinhas') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.carteirinhas') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Validar IDs</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Conteúdo & Escola</div>

                    <a href="{{ route('admin.escola') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.escola') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Escola (Cursos)</span>
                    </a>

                    <a href="{{ route('admin.missoes') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.missoes') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Gestão de Missões</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Crescimento & Ops</div>

                    <a href="{{ route('admin.referrals') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.referrals') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Relatórios de Indicações</span>
                    </a>

                    <a href="{{ route('admin.comunidade') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.comunidade') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Moderação</span>
                    </a>

                    <a href="{{ route('admin.eventos') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.eventos') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Gestão de Eventos</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 uppercase text-[10px] font-black text-blue-400 tracking-[0.2em]" x-show="sidebarOpen">Administrativo</div>

                    <a href="{{ route('admin.documentos') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.documentos') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Repositório Oficial</span>
                    </a>

                    <a href="{{ route('admin.financeiro') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.financeiro') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Auditoria Financeira</span>
                    </a>

                    <a href="{{ route('admin.suporte') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.suporte') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Central de Suporte</span>
                    </a>

                    <a href="{{ route('admin.configuracoes') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-blue-800 transition-all group {{ request()->routeIs('admin.configuracoes') ? 'bg-blue-800' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="ml-3 font-medium whitespace-nowrap" x-show="sidebarOpen">Configurações Globais</span>
                    </a>
                @endif
            </div>
        </nav>

        <div class="p-4 border-t border-blue-800">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 rounded-xl hover:bg-red-600 hover:text-white transition-colors group">
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
                    <div class="h-10 w-10 rounded-full bg-pct-blue flex items-center justify-center text-white font-bold overflow-hidden">
                        @if(auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Avatar" class="w-full h-full object-cover">
                        @else
                            {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow overflow-y-auto p-8">
            {{ $slot }}
        </main>
    </div>
    @stack('scripts')
</body>
</html>
