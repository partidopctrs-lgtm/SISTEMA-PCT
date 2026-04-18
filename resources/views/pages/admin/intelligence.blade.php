<x-dashboard-layout>
    <x-slot name="title">Admin - Inteligência e Controle</x-slot>

    <div class="mb-12">
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Inteligência e Controle</h1>
        <p class="text-gray-500 font-medium mt-1">Análise de dados em tempo real, mapas de calor e projeções eleitorais.</p>
    </div>

    <!-- Dashboards de BI -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Crescimento Mensal</h3>
            <p class="text-4xl font-black text-pct-blue">+ {{ number_format($growth, 1) }}%</p>
            <div class="mt-4 flex items-center gap-2 text-[10px] {{ $growth >= 0 ? 'text-pct-green' : 'text-red-500' }} font-bold uppercase">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $growth >= 0 ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}"></path></svg>
                {{ $growth >= 0 ? 'Acima da média' : 'Abaixo da média' }}
            </div>
        </div>
        <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Eficiência Regional</h3>
            <p class="text-4xl font-black text-pct-blue">{{ number_format($efficiency, 1) }}/10</p>
            <div class="mt-4 flex items-center gap-2 text-[10px] text-blue-500 font-bold uppercase">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Baseado em metas
            </div>
        </div>
        <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Engajamento Digital</h3>
            <p class="text-4xl font-black text-pct-blue">{{ number_format($newUsersThisMonth / 1000, 1) }}k</p>
            <div class="mt-4 flex items-center gap-2 text-[10px] text-pct-green font-bold uppercase">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                Novos Filiados
            </div>
        </div>
        <div class="bg-gradient-to-br from-pct-blue to-blue-900 p-8 rounded-[2rem] shadow-xl text-white">
            <h3 class="text-[10px] font-black text-blue-300 uppercase tracking-widest mb-4">Pontuação Geral</h3>
            <p class="text-4xl font-black text-pct-green">{{ number_format($totalPoints, 0, ',', '.') }}</p>
            <div class="mt-4 flex items-center gap-2 text-[10px] text-blue-200 font-bold uppercase">
                Gamificação Ativa
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Mapa de Calor (Simulado) -->
        <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8 overflow-hidden relative">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest">Distribuição Territorial</h2>
                <div class="flex gap-2">
                    <span class="px-3 py-1 bg-slate-100 text-pct-blue text-[9px] font-black rounded-full uppercase">Brasil</span>
                    <span class="px-3 py-1 bg-slate-50 text-gray-400 text-[9px] font-black rounded-full uppercase">Regiões</span>
                </div>
            </div>
            
            <div class="h-96 bg-slate-50 rounded-3xl flex items-center justify-center relative overflow-hidden group">
                <img src="https://img.freepik.com/free-vector/map-brazil-with-states_23-2148286944.jpg?t=st=1713444534~exp=1713448134~hmac=807e155465e9c9f807f8a7a8d5f66c8d7c9f8e7f6e5d4c3b2a1" class="opacity-10 grayscale group-hover:opacity-20 transition-opacity">
                <div class="absolute inset-0 flex items-center justify-center">
                    <p class="text-gray-400 font-black text-xs uppercase tracking-[0.3em]">Mapeamento Inteligente Ativo</p>
                </div>
                
                <!-- Pontos de Calor -->
                <div class="absolute top-1/4 left-1/3 h-4 w-4 bg-pct-green rounded-full animate-ping opacity-75"></div>
                <div class="absolute top-1/2 left-2/3 h-6 w-6 bg-pct-blue rounded-full animate-pulse opacity-50"></div>
                <div class="absolute bottom-1/4 left-1/2 h-3 w-3 bg-pct-green rounded-full animate-ping opacity-75"></div>
            </div>
        </div>

        <!-- Rankings -->
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8">
            <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-8">Top Diretórios</h2>
            <div class="space-y-8">
                @foreach($topDirectories as $idx => $dir)
                <div class="flex items-center gap-4">
                    <span class="h-8 w-8 bg-slate-50 flex items-center justify-center rounded-xl text-xs font-black text-pct-blue">{{ $idx + 1 }}</span>
                    <div class="flex-grow">
                        <p class="text-xs font-black text-pct-blue uppercase">{{ $dir->name }}</p>
                        <div class="h-1 bg-slate-100 rounded-full mt-1 overflow-hidden">
                            <div class="h-full bg-pct-blue" style="width: {{ $topDirectories->first()->memberships_count > 0 ? ($dir->memberships_count / $topDirectories->first()->memberships_count) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                    <span class="text-xs font-black text-pct-blue">{{ number_format($dir->memberships_count, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>
            <button class="w-full py-4 mt-8 bg-slate-100 text-pct-blue text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-slate-200 transition-all">
                Relatório Completo
            </button>
        </div>
    </div>
</x-dashboard-layout>
