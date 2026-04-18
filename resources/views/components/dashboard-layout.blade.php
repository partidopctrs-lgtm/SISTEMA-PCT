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
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.2); }
    </style>
    @stack('styles')
</head>
<body class="antialiased bg-gray-50 flex h-screen overflow-hidden" x-data="{ sidebarOpen: true }">
    
    <!-- Sidebar -->
    <aside class="bg-pct-blue text-white transition-all duration-300 flex-shrink-0 flex flex-col shadow-2xl z-50" :class="sidebarOpen ? 'w-72' : 'w-20'">
        <div class="h-20 flex items-center px-6 border-b border-white/10 shrink-0">
            <a href="/" class="flex items-center space-x-3 overflow-hidden">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto brightness-0 invert flex-shrink-0">
                <span class="text-xl font-black tracking-tighter whitespace-nowrap" x-show="sidebarOpen">MOVIMENTO <span class="text-pct-green">PCT</span></span>
            </a>
        </div>
        
        <nav class="flex-grow overflow-y-auto py-6 custom-scrollbar">
            <div class="px-4 space-y-4">
                @php 
                    $role = auth()->user()->role ?? 'affiliate';
                    $isAdmin = auth()->user()->hasRole('admin');
                    $currentRoute = request()->route() ? request()->route()->getName() : '';
                    
                    // Decidir qual menu mostrar com base na rota atual
                    $showAdminMenu = str_starts_with($currentRoute, 'admin.');
                    $showAffiliateMenu = str_starts_with($currentRoute, 'affiliate.');
                    $showCommitteeMenu = str_starts_with($currentRoute, 'committee.');
                    $showCandidateMenu = str_starts_with($currentRoute, 'candidate.');
                    $showFinanceMenu = str_starts_with($currentRoute, 'finance.');
                    $showLegalMenu = str_starts_with($currentRoute, 'legal.');
                    $showCommunicationMenu = str_starts_with($currentRoute, 'communication.');
                    $showLawyerMenu = str_starts_with($currentRoute, 'advogado.');
                    $showDevMenu = str_starts_with($currentRoute, 'dev.');
                    
                    // Fallback para o papel do usuário se não estiver em uma rota específica
                    if (!$showAdminMenu && !$showAffiliateMenu && !$showCommitteeMenu && !$showCandidateMenu && !$showFinanceMenu && !$showLegalMenu && !$showCommunicationMenu && !$showLawyerMenu && !$showDevMenu) {
                        if ($isAdmin) $showAdminMenu = true;
                        elseif ($role === 'committee') $showCommitteeMenu = true;
                        elseif ($role === 'candidate') $showCandidateMenu = true;
                        elseif ($role === 'finance') $showFinanceMenu = true;
                        elseif ($role === 'legal') $showLegalMenu = true;
                        elseif ($role === 'communication') $showCommunicationMenu = true;
                        else $showAffiliateMenu = true;
                    }
                @endphp

                @if($showAdminMenu)
                    <!-- MENU ADMINISTRATIVO (ADMIN PANEL) -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Visão Geral</span>
                    </a>
                    <a href="{{ route('admin.party') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('admin.party') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Partido em Formação</span>
                    </a>
                    <a href="{{ route('admin.directories') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('admin.directories') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Gestão de Diretórios</span>
                    </a>
                    <a href="{{ route('admin.governance') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('admin.governance') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Governança Interna</span>
                    </a>
                    <a href="{{ route('admin.intelligence') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('admin.intelligence') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Inteligência</span>
                    </a>
                    <a href="{{ route('admin.configuracoes') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('admin.configuracoes') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap truncate" x-show="sidebarOpen">Configurações</span>
                    </a>
                    <div x-data="{ docMenuOpen: false }">
                        <button @click="docMenuOpen = !docMenuOpen" class="flex items-center w-full px-4 py-2.5 rounded-xl bg-blue-500/10 hover:bg-white/10 transition-all group">
                            <svg class="w-5 h-5 text-pct-green group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span class="ml-3 text-sm font-black text-pct-green group-hover:text-white whitespace-nowrap" x-show="sidebarOpen">Central de Documentos</span>
                            <svg class="w-4 h-4 ml-auto text-pct-green transition-transform" :class="docMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="docMenuOpen" x-transition class="mt-2 ml-8 space-y-1">
                            <a href="{{ route('shared.documents', ['portal' => 'institucional']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white hover:bg-white/5 rounded-lg">Institucional</a>
                            <a href="{{ route('shared.documents', ['portal' => 'administrativo']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white hover:bg-white/5 rounded-lg">Administrativo</a>
                            <a href="{{ route('shared.documents', ['portal' => 'finance']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white hover:bg-white/5 rounded-lg">Financeiro</a>
                            <a href="{{ route('shared.documents', ['portal' => 'legal']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white hover:bg-white/5 rounded-lg">Jurídico</a>
                            <a href="{{ route('shared.documents', ['portal' => 'candidate']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white hover:bg-white/5 rounded-lg">Candidato</a>
                            <a href="{{ route('shared.documents', ['portal' => 'committee']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white hover:bg-white/5 rounded-lg">Comitê</a>
                            <a href="{{ route('shared.documents', ['portal' => 'communication']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white hover:bg-white/5 rounded-lg">Comunicação</a>
                        </div>
                    </div>

                @elseif($showAffiliateMenu)
                    <!-- MENU AFILIADO -->
                    <a href="{{ route('affiliate.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('affiliate.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Minha Área</span>
                    </a>
                    <a href="{{ route('affiliate.profile') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('affiliate.profile') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap truncate" x-show="sidebarOpen">Meu Perfil</span>
                    </a>
                    <a href="{{ route('affiliate.carteirinha') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('affiliate.carteirinha') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap truncate" x-show="sidebarOpen">Carteirinha Digital</span>
                    </a>
                    <a href="{{ route('affiliate.signatures.create') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('affiliate.signatures.*') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap truncate" x-show="sidebarOpen">Apoio ao Partido</span>
                    </a>
                    <a href="{{ route('shared.documents', ['portal' => 'institucional']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap truncate" x-show="sidebarOpen">Documentos</span>
                    </a>

                @elseif($showCommitteeMenu)
                    <!-- MENU COMITÊ -->
                    <a href="{{ route('committee.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('committee.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Gestão Local</span>
                    </a>
                    <a href="{{ route('committee.members') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('committee.members') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Membros Locais</span>
                    </a>
                    <a href="{{ route('committee.signatures') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('committee.signatures') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Assinaturas</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Sede e Eventos</span>
                    </a>
                    <a href="{{ route('shared.documents', ['portal' => 'committee']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Documentos</span>
                    </a>

                @elseif($showCandidateMenu)
                    <!-- MENU CANDIDATO -->
                    <a href="{{ route('candidate.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('candidate.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Gabinete Digital</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Mapa de Votos</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Minha Equipe</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Materiais</span>
                    </a>
                    <a href="{{ route('shared.documents', ['portal' => 'candidate']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Documentos</span>
                    </a>

                @elseif($showFinanceMenu)
                    <!-- MENU FINANCEIRO -->
                    <a href="{{ route('finance.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('finance.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Tesouraria</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Transparência</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Doadores</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Conciliação</span>
                    </a>
                    <a href="{{ route('shared.documents', ['portal' => 'finance']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Documentos</span>
                    </a>

                @elseif($showLegalMenu)
                    <!-- MENU JURÍDICO -->
                    <a href="{{ route('legal.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('legal.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Compliance</span>
                    </a>
                    <a href="{{ route('legal.denuncias') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('legal.denuncias') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Canal Ética</span>
                    </a>
                    <a href="{{ route('legal.processos') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('legal.processos') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 3a10.003 10.003 0 00-6.912 2.744L5 5l-.29 4.455C4.71 10.913 5 12 5 12z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Processos</span>
                    </a>
                    <a href="{{ route('legal.contratos') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('legal.contratos') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Contratos</span>
                    </a>
                    <a href="{{ route('shared.documents', ['portal' => 'legal']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Documentos</span>
                    </a>

                @elseif($showCommunicationMenu)
                    <!-- MENU COMUNICAÇÃO -->
                    <a href="{{ route('communication.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('communication.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Comunicação</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Broadcast</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Social Hub</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Press Kit</span>
                    </a>
                    <a href="{{ route('shared.documents', ['portal' => 'communication']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Documentos</span>
                    </a>

                @elseif($showLawyerMenu)
                    <!-- MENU ADVOGADO -->
                    <a href="{{ route('advogado.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('advogado.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Meu Painel</span>
                    </a>
                    <a href="{{ route('advogado.tarefas') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.tarefas') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Prazos</span>
                    </a>
                    <a href="{{ route('advogado.pareceres') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.pareceres') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Pareceres</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Tribunal Digital</span>
                    </a>

                @elseif($showDevMenu)
                    <!-- MENU PORTAL DEV -->
                    <a href="{{ route('dev.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('dev.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Dashboard DEV</span>
                    </a>
                    <a href="{{ route('dev.health') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('dev.health') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Saúde do Sistema</span>
                    </a>
                    <a href="{{ route('dev.logs') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('dev.logs') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Logs Técnicos</span>
                    </a>
                    <a href="{{ route('dev.backups') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('dev.backups') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Backups</span>
                    </a>
                    <a href="{{ route('dev.config') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('dev.config') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Config Técnicas</span>
                    </a>
                @endif

                @if($isAdmin)
                    <div class="pt-4 border-t border-white/10 mt-6">
                        <p class="px-4 py-2 text-[9px] font-black text-blue-400 uppercase tracking-widest" x-show="sidebarOpen">Alternar Visão Admin</p>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showAdminMenu ? 'bg-white/5 text-white' : '' }}">
                            <span class="w-2 h-2 rounded-full bg-blue-500 mr-3"></span> Presidência
                        </a>
                        <a href="{{ route('affiliate.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showAffiliateMenu ? 'bg-white/5 text-white' : '' }}">
                            <span class="w-2 h-2 rounded-full bg-pct-green mr-3"></span> Afiliado
                        </a>
                    </div>
                @endif
            </div>
        </nav>


        @if(!$showDevMenu)
        <div class="px-6 py-4 border-t border-white/10 bg-blue-900/20">
            <p class="text-[9px] font-black text-blue-400 uppercase tracking-widest mb-3">Hino do PCT</p>
            <div class="flex items-center justify-between gap-2">
                <audio id="hino-player" src="{{ asset('audio/hino-pct.mp3') }}" preload="none" onplay="trackAudio('play')"></audio>
                <button onclick="document.getElementById('hino-player').play()" class="p-2 bg-pct-green/20 text-pct-green rounded-lg hover:bg-pct-green hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <div class="flex-grow">
                    <p class="text-[10px] font-bold text-white leading-tight">Hino Oficial</p>
                    <p class="text-[8px] text-blue-300 uppercase font-black">PCT - Cidadania</p>
                </div>
                <a href="{{ asset('audio/hino-pct.mp3') }}" 
                   onclick="trackAudio('download')"
                   download class="p-2 text-blue-400 hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </a>
            </div>
        </div>
        @endif

        <script>
            function trackAudio(type) {
                fetch('{{ route('audio.track') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ type: type, metadata: { page: window.location.pathname } })
                });
            }
        </script>

        <style>
            @media print {
                aside, nav, button, .no-print, header, .topbar { display: none !important; }
                main { margin: 0 !important; padding: 0 !important; width: 100% !important; }
                .glass { border: none !important; box-shadow: none !important; background: transparent !important; }
                #doc-modal { position: absolute !important; inset: 0 !important; display: block !important; padding: 0 !important; background: white !important; z-index: 9999 !important; }
                #doc-modal .max-w-4xl { max-width: 100% !important; max-height: none !important; box-shadow: none !important; margin: 0 !important; }
                #modal-body { padding: 0 !important; overflow: visible !important; }
                #modal-title { font-size: 24pt !important; margin-bottom: 20pt !important; display: block !important; }
                .modal-header-btns { display: none !important; }
            }
        </style>

        <div class="p-4 border-t border-white/10">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-3 rounded-2xl hover:bg-red-500/20 text-blue-200 hover:text-red-400 transition-all group">
                    <svg class="w-6 h-6 group-hover:text-red-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Sair do Portal</span>
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
