<x-dashboard-layout>
    <x-slot name="title">Gestão de Comitê - PCT</x-slot>

    <div class="mb-8 overflow-hidden rounded-3xl bg-pct-blue text-white p-8 relative shadow-lg">
        <div class="relative z-10">
            <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-widest">Unidade Regional</span>
            <h1 class="text-3xl font-bold mt-4">Comitê Municipal: Porto Alegre / RS</h1>
            <p class="text-blue-100 mt-2">Gestão operacional, mobilização de base e coordenação de tarefas locais.</p>
        </div>
        <div class="absolute right-0 top-0 w-64 h-64 bg-pct-green/20 rounded-full -mr-20 -mt-20 blur-3xl"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Members List -->
        <div class="lg:col-span-1 glass p-6 rounded-3xl shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-pct-blue text-lg">Membros do Comitê</h3>
                <span class="px-2 py-0.5 bg-blue-50 text-pct-blue text-xs font-bold rounded-full">18 Total</span>
            </div>
            <div class="space-y-4">
                <div class="flex items-center space-x-3 p-2 hover:bg-white/50 rounded-xl transition-colors cursor-pointer">
                    <div class="h-10 w-10 rounded-full bg-pct-blue flex items-center justify-center text-white text-xs font-bold text-xs">JS</div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">João Silva</p>
                        <p class="text-[10px] text-gray-500 font-bold uppercase">Coordenador Geral</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 p-2 hover:bg-white/50 rounded-xl transition-colors cursor-pointer">
                    <div class="h-10 w-10 rounded-full bg-pct-green flex items-center justify-center text-white text-xs font-bold font-bold">MP</div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Maria Paula</p>
                        <p class="text-[10px] text-gray-500 font-bold uppercase">Tesoureira Local</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 p-2 hover:bg-white/50 rounded-xl transition-colors cursor-pointer">
                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-xs font-bold">AL</div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">André Lima</p>
                        <p class="text-[10px] text-gray-500 font-bold uppercase">Mobilizador</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-6 py-2 text-xs font-bold text-pct-blue border border-pct-blue rounded-lg hover:bg-pct-blue hover:text-white transition-all">Gerenciar Membros</button>
        </div>

        <!-- Task Board Preview -->
        <div class="lg:col-span-2 glass p-8 rounded-3xl shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-pct-blue text-lg">Quadro de Tarefas Operacionais</h3>
                <button class="text-xs font-bold text-pct-green flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span>Nova Tarefa</span>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-white border border-gray-100 rounded-2xl shadow-sm group hover:border-pct-blue transition-colors">
                    <div class="flex justify-between mb-2">
                        <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded uppercase">Pendente</span>
                        <span class="text-[10px] text-gray-400 font-bold">15/04</span>
                    </div>
                    <p class="text-sm font-bold text-gray-800">Organizar panfletagem no centro</p>
                    <div class="mt-4 flex -space-x-2">
                        <div class="h-6 w-6 rounded-full border-2 border-white bg-blue-500"></div>
                        <div class="h-6 w-6 rounded-full border-2 border-white bg-green-500"></div>
                    </div>
                </div>
                <div class="p-4 bg-white border border-gray-100 rounded-2xl shadow-sm group hover:border-pct-blue transition-colors">
                    <div class="flex justify-between mb-2">
                        <span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-[10px] font-bold rounded uppercase">Em execução</span>
                        <span class="text-[10px] text-gray-400 font-bold">Hoje</span>
                    </div>
                    <p class="text-sm font-bold text-gray-800">Revisão do balancete mensal local</p>
                    <div class="mt-4 flex -space-x-2">
                        <div class="h-6 w-6 rounded-full border-2 border-white bg-gray-400"></div>
                    </div>
                </div>
                <div class="p-4 bg-pct-green/5 border border-pct-green/20 rounded-2xl shadow-sm">
                    <div class="flex justify-between mb-2">
                        <span class="px-2 py-0.5 bg-pct-green text-white text-[10px] font-bold rounded uppercase">Concluído</span>
                        <span class="text-[10px] text-gray-400 font-bold">10/04</span>
                    </div>
                    <p class="text-sm font-bold text-gray-400 line-through">Protocolar ata da última reunião</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Communication & Local Reports -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 glass p-8 rounded-3xl shadow-sm">
            <h3 class="text-xl font-bold text-pct-blue mb-6">Relatório de Desempenho Local</h3>
            <div class="flex h-48 items-end space-x-4">
                <div class="flex-grow bg-pct-blue/10 rounded-t-lg relative" style="height: 40%">
                    <span class="absolute -top-6 left-0 right-0 text-center text-[10px] font-bold text-pct-blue text-xs tracking-tighter">Jan</span>
                </div>
                <div class="flex-grow bg-pct-blue/20 rounded-t-lg relative" style="height: 60%">
                    <span class="absolute -top-6 left-0 right-0 text-center text-[10px] font-bold text-pct-blue text-xs tracking-tighter">Fev</span>
                </div>
                <div class="flex-grow bg-pct-blue/40 rounded-t-lg relative" style="height: 55%">
                    <span class="absolute -top-6 left-0 right-0 text-center text-[10px] font-bold text-pct-blue text-xs tracking-tighter">Mar</span>
                </div>
                <div class="flex-grow bg-pct-blue/60 rounded-t-lg relative" style="height: 85%">
                    <span class="absolute -top-6 left-0 right-0 text-center text-[10px] font-bold text-pct-blue text-xs tracking-tighter">Abr</span>
                </div>
                <div class="flex-grow bg-pct-green rounded-t-lg relative" style="height: 100%">
                    <span class="absolute -top-6 left-0 right-0 text-center text-[10px] font-bold text-pct-green text-xs tracking-tighter">Meta</span>
                </div>
            </div>
            <p class="text-xs text-center text-gray-400 mt-6 font-bold uppercase tracking-widest">Custo de Aquisição por Filiado (CAC Político)</p>
        </div>
        <div class="glass p-8 rounded-3xl shadow-sm bg-pct-blue text-white">
            <h3 class="text-xl font-bold mb-4">Avisos Nacionais</h3>
            <div class="space-y-4">
                <div class="p-4 bg-white/10 rounded-2xl">
                    <p class="text-xs font-bold text-blue-300">Há 1 hora</p>
                    <p class="text-sm font-medium mt-1">Atualização no módulo Jurídico: novas regras para coleta de assinaturas TSE.</p>
                </div>
                <div class="p-4 bg-white/10 rounded-2xl">
                    <p class="text-xs font-bold text-blue-300">Ontem</p>
                    <p class="text-sm font-medium mt-1">Convocação para Assembleia Nacional de Comitês Regionais.</p>
                </div>
            </div>
            <button class="w-full mt-8 py-3 bg-white text-pct-blue font-bold rounded-xl hover:bg-blue-50 transition-colors">Abrir Mural de Avisos</button>
        </div>
    </div>
</x-dashboard-layout>
