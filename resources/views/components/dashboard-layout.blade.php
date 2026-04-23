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
<body class="antialiased bg-gray-50 flex h-screen overflow-hidden" 
      x-data="{ sidebarOpen: window.innerWidth > 1024, isMobile: window.innerWidth < 1024 }"
      @resize.window="isMobile = window.innerWidth < 1024; if (!isMobile) sidebarOpen = true">
    
    <!-- Backdrop for mobile -->
    <div x-show="sidebarOpen && isMobile" 
         x-transition:opacity
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-pct-blue/60 backdrop-blur-sm z-40 lg:hidden"
         x-cloak>
    </div>

    <!-- Sidebar -->
    <aside class="bg-pct-blue text-white transition-all duration-300 flex-shrink-0 flex flex-col shadow-2xl z-50 fixed inset-y-0 left-0 lg:static lg:translate-x-0" 
           :class="{
               'w-72': sidebarOpen,
               'w-20': !sidebarOpen && !isMobile,
               '-translate-x-full': !sidebarOpen && isMobile,
               'w-72 translate-x-0': sidebarOpen && isMobile
           }">
        <div class="h-20 flex items-center px-6 border-b border-white/10 shrink-0">
            <a href="/" class="flex items-center space-x-3 overflow-hidden">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto brightness-0 invert flex-shrink-0">
                <span class="text-xl font-black tracking-tighter whitespace-nowrap" x-show="sidebarOpen || isMobile">MOVIMENTO <span class="text-pct-green">PCT</span></span>
            </a>
        </div>
        
        <nav class="flex-grow overflow-y-auto py-6 custom-scrollbar">
            <div class="px-4 space-y-4">
                @php 
                    $user = auth()->user();
                    $role = $user?->role ?? 'affiliate';
                    $isAdmin = $user?->hasRole('admin') ?? false;
                    $committee = $user?->committee;
                    $isApplicant = $committee && $committee->affiliation_status === 'applicant';

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

                    <!-- 🏛️ Central de Atendimento -->
                    <div x-data="{ open: {{ request()->routeIs('admin.atendimento.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group text-blue-200 hover:text-white {{ request()->routeIs('admin.atendimento.*') ? 'bg-white/10 text-white' : '' }}">
                            <img src="{{ asset('icons/agua.svg') }}" class="w-5 h-5 brightness-0 invert opacity-70 group-hover:opacity-100" alt="Água">
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Atendimento Central</span>
                            <svg class="w-4 h-4 ml-auto transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="{{ route('admin.atendimento.dashboard') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('admin.atendimento.dashboard') ? 'text-white' : 'text-blue-200' }} hover:text-white">Dashboard</a>
                            <a href="{{ route('admin.atendimento.triage') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('admin.atendimento.triage') ? 'text-white' : 'text-blue-200' }} hover:text-white text-amber-400">Fila de Triagem</a>
                            <a href="{{ route('admin.atendimento.index') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('admin.atendimento.index') ? 'text-white' : 'text-blue-200' }} hover:text-white">Ocorrências</a>
                            <a href="{{ route('admin.atendimento.mobilization') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('admin.atendimento.mobilization') ? 'text-white' : 'text-blue-200' }} hover:text-white">Mobilização</a>
                        </div>
                    </div>
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
                    <!-- MENU AFILIADO: ERP DE MOBILIZAÇÃO -->
                    
                    <!-- 🏠 Dashboard -->
                    <a href="{{ route('affiliate.dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('affiliate.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Dashboard</span>
                    </a>

                    <!-- 👤 Minha Área (Destaque Visual) -->
                    <div x-data="{ open: {{ request()->routeIs('affiliate.profile', 'affiliate.carteirinha', 'affiliate.signatures.*') ? 'true' : 'false' }} }" class="pt-2">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition-all group">
                            <div class="h-6 w-6 rounded-lg bg-pct-green/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="ml-3 font-black text-sm text-pct-green whitespace-nowrap" x-show="sidebarOpen">Minha Área</span>
                            <svg class="w-4 h-4 ml-auto text-pct-green transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="{{ route('affiliate.profile') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.profile') ? 'text-white' : 'text-blue-200' }} hover:text-white">Meu Perfil</a>
                            <a href="{{ route('affiliate.carteirinha') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.carteirinha') ? 'text-white' : 'text-blue-200' }} hover:text-white">Carteirinha Digital</a>
                            <a href="{{ route('affiliate.signatures.create') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.signatures.*') ? 'text-white' : 'text-blue-200' }} hover:text-white">Apoio ao Partido</a>
                            <a href="{{ route('shared.documents', ['portal' => 'institucional']) }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white">Documentos</a>
                        </div>
                    </div>

                    <!-- 📈 Desempenho -->
                    <div x-data="{ open: {{ request()->routeIs('affiliate.desempenho.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group text-blue-200 hover:text-white {{ request()->routeIs('affiliate.desempenho.*') ? 'bg-white/10 text-white' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Desempenho</span>
                            <svg class="w-4 h-4 ml-auto transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="{{ route('affiliate.dashboard') }}" class="block px-4 py-2 text-xs font-bold text-blue-200 hover:text-white">Meus Resultados</a>
                            <a href="{{ route('affiliate.desempenho.estatisticas') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.desempenho.estatisticas') ? 'text-white' : 'text-blue-200' }} hover:text-white">Estatísticas</a>
                        </div>
                    </div>

                    <!-- 🔗 Divulgação -->
                    <div x-data="{ open: {{ request()->routeIs('affiliate.divulgacao.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group text-blue-200 hover:text-white {{ request()->routeIs('affiliate.divulgacao.*') ? 'bg-white/10 text-white' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Divulgação</span>
                            <svg class="w-4 h-4 ml-auto transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="{{ route('affiliate.divulgacao.gerador') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.divulgacao.gerador') ? 'text-white' : 'text-blue-200' }} hover:text-white">Meu Link de Divulgação</a>
                            <a href="{{ route('affiliate.divulgacao.qrcode') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.divulgacao.qrcode') ? 'text-white' : 'text-blue-200' }} hover:text-white">Gerador de QR Code</a>
                        </div>
                    </div>

                    <!-- 🧩 Atendimento PCT -->
                    <div x-data="{ open: {{ request()->routeIs('affiliate.atendimento.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group text-blue-200 hover:text-white {{ request()->routeIs('affiliate.atendimento.*') ? 'bg-white/10 text-white' : '' }}">
                            <img src="{{ asset('icons/agua.svg') }}" class="w-5 h-5 brightness-0 invert opacity-70 group-hover:opacity-100" alt="Água">
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Atendimento PCT</span>
                            <svg class="w-4 h-4 ml-auto transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="{{ route('affiliate.atendimento.create') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.atendimento.create') ? 'text-white' : 'text-blue-200' }} hover:text-white">Enviar Relato</a>
                            <a href="{{ route('affiliate.atendimento.index') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.atendimento.index') ? 'text-white' : 'text-blue-200' }} hover:text-white">Acompanhar Caso</a>
                            <a href="{{ route('affiliate.atendimento.rights') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.atendimento.rights') ? 'text-white' : 'text-blue-200' }} hover:text-white">Direitos do Cidadão</a>
                        </div>
                    </div>

                    <!-- 🧑🤝🧑 Comunidade PCT -->
                    <a href="{{ route('affiliate.forum.index') }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('affiliate.forum.*') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Comunidade PCT</span>
                    </a>

                    <!-- 📢 Materiais -->
                    <div x-data="{ open: {{ request()->routeIs('affiliate.materiais.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group text-blue-200 hover:text-white {{ request()->routeIs('affiliate.materiais.*') ? 'bg-white/10 text-white' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Materiais</span>
                            <svg class="w-4 h-4 ml-auto transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="{{ route('affiliate.materiais.artes') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.materiais.artes') ? 'text-white' : 'text-blue-200' }} hover:text-white">Artes para Divulgação</a>
                            <a href="{{ route('affiliate.materiais.textos') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.materiais.textos') ? 'text-white' : 'text-blue-200' }} hover:text-white">Textos Prontos</a>
                        </div>
                    </div>

                    <!-- 🏆 Engajamento -->
                    <div x-data="{ open: {{ request()->routeIs('affiliate.engajamento.*') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group text-blue-200 hover:text-white {{ request()->routeIs('affiliate.engajamento.*') ? 'bg-white/10 text-white' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Engajamento</span>
                            <svg class="w-4 h-4 ml-auto transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="{{ route('affiliate.engajamento.ranking') }}" class="block px-4 py-2 text-xs font-bold {{ request()->routeIs('affiliate.engajamento.ranking') ? 'text-white' : 'text-blue-200' }} hover:text-white">Ranking de Afiliados</a>
                        </div>
                    </div>


                    <!-- 🔔 Comunicação -->
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group text-blue-200 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Comunicação</span>
                            <svg class="w-4 h-4 ml-auto transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 ml-10 space-y-1">
                            <a href="#" class="block px-4 py-2 text-xs font-bold text-blue-200/50 cursor-not-allowed">Notificações</a>
                        </div>
                    </div>

                    <!-- ❓ Suporte -->
                    <a href="#" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group text-blue-200 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Suporte</span>
                    </a>

                @elseif($showCommitteeMenu)
                    <!-- MENU COMITÊ -->
                    <a href="{{ route('committee.dashboard', ['subdomain' => $user->committee->subdomain ?? 'diretorio']) }}" class="flex items-center px-4 py-3 rounded-2xl hover:bg-white/10 transition-all group {{ request()->routeIs('committee.dashboard') ? 'bg-white/10 shadow-lg' : '' }}">
                        <svg class="w-6 h-6 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen">Gestão Local</span>
                    </a>

                    @if($isApplicant)
                        <div class="px-4 py-4 bg-amber-500/10 border border-amber-500/20 rounded-2xl mx-2 mb-4">
                            <p class="text-[9px] font-black text-amber-400 uppercase tracking-widest leading-tight">Operação Bloqueada</p>
                            <p class="text-[8px] text-amber-100/60 uppercase mt-1 font-medium">Aguardando aprovação institucional para liberar recursos.</p>
                        </div>
                    @else
                        <a href="{{ route('committee.members', ['subdomain' => $user->committee->subdomain ?? 'diretorio']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('committee.members') ? 'bg-white/10' : '' }}">
                            <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Membros Locais</span>
                        </a>
                        <a href="{{ route('committee.signatures', ['subdomain' => $user->committee->subdomain ?? 'diretorio']) }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('committee.signatures') ? 'bg-white/10' : '' }}">
                            <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Assinaturas</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                            <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Sede e Eventos</span>
                        </a>
                    @endif

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
                    <a href="{{ route('candidate.votes') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Mapa de Votos</span>
                    </a>
                    <a href="{{ route('candidate.team') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Minha Equipe</span>
                    </a>
                    <a href="{{ route('candidate.materials') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
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
                    <a href="{{ route('finance.transparency') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Transparência</span>
                    </a>
                    <a href="{{ route('finance.donors') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('finance.donors') ? 'bg-white/10' : '' }}">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Doadores</span>
                    </a>
                    <a href="{{ route('finance.reconciliation') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('finance.reconciliation') ? 'bg-white/10' : '' }}">
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
                    <a href="{{ route('communication.broadcast') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Broadcast</span>
                    </a>
                    <a href="{{ route('communication.social') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
                        <svg class="w-5 h-5 text-blue-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="ml-3 text-sm font-medium whitespace-nowrap" x-show="sidebarOpen">Social Hub</span>
                    </a>
                    <a href="{{ route('communication.press') }}" class="flex items-center px-4 py-2.5 rounded-xl hover:bg-white/5 transition-all group">
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
                    <div class="pt-4 border-t border-white/10 mt-6" x-data="{ viewMenuOpen: true }">
                        <div class="flex items-center justify-between px-4 py-2 mb-2">
                            <p class="text-[9px] font-black text-blue-400 uppercase tracking-widest" x-show="sidebarOpen">Alternar Visão</p>
                            <button @click="viewMenuOpen = !viewMenuOpen" class="text-blue-400 hover:text-white transition-colors" x-show="sidebarOpen">
                                <svg class="w-3 h-3 transition-transform" :class="viewMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                        </div>
                        <div x-show="viewMenuOpen" x-transition class="space-y-0.5">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showAdminMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-3"></span> Admin
                            </a>
                            <a href="{{ route('candidate.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showCandidateMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-3"></span> Candidato
                            </a>
                            <a href="{{ route('committee.dashboard', ['subdomain' => $user->committee->subdomain ?? 'diretorio']) }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showCommitteeMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mr-3"></span> Comitê
                            </a>
                            <a href="{{ route('finance.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showFinanceMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-3"></span> Financeiro
                            </a>
                            <a href="{{ route('legal.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showLegalMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-3"></span> Jurídico
                            </a>
                            <a href="{{ route('communication.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showCommunicationMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-sky-500 mr-3"></span> Comunicação
                            </a>
                            <a href="{{ route('advogado.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showLawyerMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-500 mr-3"></span> Advogado
                            </a>
                            <a href="{{ route('dev.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showDevMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-3"></span> Dev
                            </a>
                            <a href="{{ route('affiliate.dashboard') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all {{ $showAffiliateMenu ? 'bg-white/5 text-white ring-1 ring-white/10' : '' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-pct-green mr-3"></span> Afiliado
                            </a>
                            <a href="{{ route('admin.configuracoes') }}" class="flex items-center px-4 py-2 rounded-xl text-xs font-bold text-blue-200 hover:bg-white/5 transition-all">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mr-3"></span> Configurações
                            </a>
                        </div>
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
                    <span class="ml-3 font-bold text-sm whitespace-nowrap" x-show="sidebarOpen || isMobile">Sair</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-w-0 h-full">
        <!-- Topbar -->
        <header class="h-20 bg-white border-b border-gray-200 flex items-center px-4 md:px-8 shrink-0 relative z-30">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-pct-blue focus:outline-none p-2 lg:hidden">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            
            <div class="flex items-center space-x-3 md:space-x-6 ml-auto">
                <!-- Notifications -->
                <button class="text-gray-400 hover:text-pct-blue relative p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-2 right-2 block h-2 w-2 rounded-full bg-pct-green ring-2 ring-white"></span>
                </button>
                
                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="flex items-center space-x-2 md:space-x-3 focus:outline-none group">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs md:sm font-bold text-gray-900 truncate group-hover:text-pct-blue transition-colors">{{ auth()->user()->name ?? 'Usuário' }}</p>
                            <p class="text-[10px] text-gray-500 uppercase font-semibold">{{ auth()->user()->role ?? 'Afiliado' }}</p>
                        </div>
                        <div class="h-10 w-10 rounded-full bg-pct-blue flex items-center justify-center text-white font-bold overflow-hidden ring-2 ring-slate-100 group-hover:ring-pct-blue transition-all shrink-0">
                            @if(auth()->user() && auth()->user()->photo)
                                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Avatar" class="w-full h-full object-cover">
                            @else
                                {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                            @endif
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-3 w-56 bg-white rounded-3xl shadow-2xl border border-slate-100 py-3 z-50 overflow-hidden"
                         x-cloak>
                        
                        <div class="px-6 py-3 border-b border-slate-50 mb-2">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Opções de Conta</p>
                        </div>

                        <a href="{{ route('affiliate.profile') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-pct-blue transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Alterar Dados
                        </a>
                        <a href="{{ route('affiliate.profile') }}#password" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-pct-blue transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Alterar Senha
                        </a>
                        <a href="{{ route('affiliate.profile') }}#contact" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-pct-blue transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.0420 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            Telefone
                        </a>
                        <a href="{{ route('affiliate.profile') }}#contact" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-pct-blue transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            E-mail
                        </a>

                        <div class="mt-2 pt-2 border-t border-slate-50">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center gap-3 w-full px-6 py-3 text-sm font-black text-red-500 hover:bg-red-50 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Sair da Conta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow overflow-y-auto p-4 md:p-8">
            {{ $slot }}
        </main>
    </div>
    @stack('scripts')
</body>
</html>
