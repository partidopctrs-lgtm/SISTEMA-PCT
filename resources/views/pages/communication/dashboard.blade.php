<x-dashboard-layout>
    <x-slot name="title">Portal da Comunicação - PCT</x-slot>

    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-pct-blue">Comunicação & Marketing</h1>
            <p class="text-gray-500">Gerência de campanhas, redes sociais e disparos.</p>
        </div>
        <div class="flex space-x-3">
             <button class="btn-secondary flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                <span>Novo Disparo</span>
            </button>
            <button class="btn-primary flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Criar Campanha</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-blue-500">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Alcance Total</p>
            <h3 class="text-2xl font-black text-pct-blue">1.2M</h3>
            <p class="text-xs text-green-500 mt-2 font-bold">↑ 12% este mês</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-pct-green">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Engajamento Médio</p>
            <h3 class="text-2xl font-black text-pct-blue">4.8%</h3>
            <p class="text-xs text-green-500 mt-2 font-bold">↑ 5% estável</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-purple-500">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Disparos (WhatsApp)</p>
            <h3 class="text-2xl font-black text-pct-blue">45.2k</h3>
            <p class="text-xs text-gray-400 mt-2">Créditos: 12.8k</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm border-l-4 border-yellow-500">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Posts Agendados</p>
            <h3 class="text-2xl font-black text-pct-blue">12</h3>
            <p class="text-xs text-blue-500 mt-2 font-bold italic">Próximo: Hoje 18:00</p>
        </div>
    </div>

    <!-- Analytics Placeholder -->
    <div class="glass p-8 rounded-[2.5rem] shadow-sm mb-8 bg-gradient-to-br from-white to-blue-50/30">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-xl font-black text-pct-blue">Performance das Campanhas</h3>
            <select class="bg-white border border-gray-100 rounded-xl px-4 py-2 text-sm font-bold text-gray-500 outline-none focus:ring-2 focus:ring-pct-blue">
                <option>Últimos 30 dias</option>
                <option>Últimos 7 dias</option>
            </select>
        </div>
        <div class="h-64 flex items-end justify-between space-x-2">
            @foreach([40, 60, 45, 90, 65, 80, 55, 70, 85, 95, 60, 75] as $val)
                <div class="flex-1 bg-pct-blue/10 rounded-t-lg relative group transition-all hover:bg-pct-green/40" style="height: {{ $val }}%">
                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-pct-blue text-white text-[10px] py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                        {{ $val }}k
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-between mt-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest px-2">
            <span>Jan</span><span>Fev</span><span>Mar</span><span>Abr</span><span>Mai</span><span>Jun</span><span>Jul</span><span>Ago</span><span>Set</span><span>Out</span><span>Nov</span><span>Dez</span>
        </div>
    </div>
    <!-- Footer Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="glass p-8 rounded-[2rem] flex items-center justify-between group hover:border-pct-blue transition-all">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-pct-blue/5 text-pct-blue rounded-2xl group-hover:bg-pct-blue group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-pct-blue">Modelos de Ofícios</h4>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest leading-tight">Comunicação Oficial</p>
                </div>
            </div>
            <a href="{{ route('communication.modelos_oficios') }}" class="btn-primary py-2 px-4 text-xs">Acessar</a>
        </div>

        <div class="glass p-8 rounded-[2rem] flex items-center justify-between group hover:border-pct-green transition-all">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-pct-green/5 text-pct-green rounded-2xl group-hover:bg-pct-green group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-pct-blue">Ficha de Filiação</h4>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest leading-tight">Material de Base</p>
                </div>
            </div>
            <a href="{{ route('communication.ficha_filiacao') }}" class="py-2 px-4 text-xs font-bold text-pct-green border border-pct-green rounded-xl hover:bg-pct-green hover:text-white transition-all">Visualizar</a>
        </div>
    </div>
</x-dashboard-layout>
