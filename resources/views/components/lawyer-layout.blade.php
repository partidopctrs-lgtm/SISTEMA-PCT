<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $slot_title ?? 'Painel do Advogado' }} — PCT Jurídico</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * { font-family: 'Inter', sans-serif; }
        .sidebar { background: linear-gradient(180deg, #0a0e1a 0%, #0f1729 100%); }
        .gold { color: #f59e0b; }
        .badge-urgent { animation: pulse 2s infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .5; } }
    </style>
</head>
<body class="bg-slate-50 flex min-h-screen" x-data="{ sidebarOpen: true }">

    <!-- Sidebar -->
    <aside class="sidebar flex-shrink-0 transition-all duration-300 flex flex-col"
        :class="sidebarOpen ? 'w-72' : 'w-20'"
        style="min-height: 100vh; position: sticky; top: 0; height: 100vh; overflow-y: auto;">

        <!-- Logo -->
        <div class="p-6 border-b border-white/5 flex items-center gap-4">
            <div class="h-10 w-10 bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-amber-500/20">
                <span class="text-lg">⚖️</span>
            </div>
            <div x-show="sidebarOpen" class="overflow-hidden">
                <p class="text-white font-black text-sm tracking-tight">Painel Jurídico</p>
                <p class="text-amber-400 text-[10px] font-bold uppercase tracking-widest">Advogado PCT</p>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" class="ml-auto text-slate-500 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- User Info -->
        <div class="px-4 py-5 border-b border-white/5" x-show="sidebarOpen">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-amber-500/20 rounded-xl flex items-center justify-center text-amber-400 font-black text-sm border border-amber-500/20 flex-shrink-0">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-white text-xs font-black truncate">{{ auth()->user()->name }}</p>
                    <p class="text-amber-400 text-[10px] font-bold uppercase">Advogado — PCT</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('advogado.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.dashboard') ? 'bg-amber-500/10 border border-amber-500/20' : '' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('advogado.dashboard') ? 'text-amber-400' : 'text-slate-500 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="text-sm font-bold text-white whitespace-nowrap" x-show="sidebarOpen">Meu Dashboard</span>
            </a>

            <a href="{{ route('advogado.tarefas') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.tarefas*') ? 'bg-amber-500/10 border border-amber-500/20' : '' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('advogado.tarefas*') ? 'text-amber-400' : 'text-slate-500 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                <span class="text-sm font-bold text-white whitespace-nowrap" x-show="sidebarOpen">Minhas Tarefas</span>
            </a>

            <a href="{{ route('advogado.denuncias') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.denuncias') ? 'bg-amber-500/10 border border-amber-500/20' : '' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('advogado.denuncias') ? 'text-amber-400' : 'text-slate-500 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <span class="text-sm font-bold text-white whitespace-nowrap" x-show="sidebarOpen">Denúncias</span>
            </a>

            <a href="{{ route('advogado.processos') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.processos') ? 'bg-amber-500/10 border border-amber-500/20' : '' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('advogado.processos') ? 'text-amber-400' : 'text-slate-500 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                <span class="text-sm font-bold text-white whitespace-nowrap" x-show="sidebarOpen">Processos</span>
            </a>

            <a href="{{ route('advogado.pareceres') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.pareceres') ? 'bg-amber-500/10 border border-amber-500/20' : '' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('advogado.pareceres') ? 'text-amber-400' : 'text-slate-500 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span class="text-sm font-bold text-white whitespace-nowrap" x-show="sidebarOpen">Pareceres</span>
            </a>

            <a href="{{ route('advogado.perfil') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-all group {{ request()->routeIs('advogado.perfil') ? 'bg-amber-500/10 border border-amber-500/20' : '' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('advogado.perfil') ? 'text-amber-400' : 'text-slate-500 group-hover:text-white' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span class="text-sm font-bold text-white whitespace-nowrap" x-show="sidebarOpen">Meu Perfil</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-white/5">
            <form method="POST" action="{{ route('advogado.logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 rounded-xl hover:bg-red-500/10 transition-all group text-slate-500 hover:text-red-400">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span class="text-sm font-bold whitespace-nowrap" x-show="sidebarOpen">Sair</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto">
        <div class="p-8 max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </main>

</body>
</html>
