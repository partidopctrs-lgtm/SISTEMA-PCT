<x-dashboard-layout>
    <x-slot name="title">Painel Administrativo - PCT</x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-pct-blue">Visão Geral do Movimento</h1>
        <p class="text-gray-500">Acompanhe o crescimento e a saúde do PCT em todo o país.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="glass p-6 rounded-2xl shadow-sm border-l-4 border-pct-blue">
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total de Filiados</p>
            <div class="flex items-baseline justify-between mt-2">
                <h3 class="text-3xl font-bold text-pct-blue">12,450</h3>
                <span class="text-pct-green text-sm font-bold">+12%</span>
            </div>
        </div>
        <div class="glass p-6 rounded-2xl shadow-sm border-l-4 border-pct-green">
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Comitês Ativos</p>
            <div class="flex items-baseline justify-between mt-2">
                <h3 class="text-3xl font-bold text-pct-blue">158</h3>
                <span class="text-pct-green text-sm font-bold">+5</span>
            </div>
        </div>
        <div class="glass p-6 rounded-2xl shadow-sm border-l-4 border-yellow-500">
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Candidatos</p>
            <div class="flex items-baseline justify-between mt-2">
                <h3 class="text-3xl font-bold text-pct-blue">42</h3>
                <span class="text-gray-400 text-sm">Meta: 100</span>
            </div>
        </div>
        <div class="glass p-6 rounded-2xl shadow-sm border-l-4 border-purple-600">
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Caixa Geral</p>
            <div class="flex items-baseline justify-between mt-2">
                <h3 class="text-3xl font-bold text-pct-blue">R$ 85,2k</h3>
                <span class="text-pct-green text-sm font-bold">Saudável</span>
            </div>
        </div>
    </div>

    <!-- Analytics & Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 glass p-8 rounded-3xl shadow-sm">
            <h3 class="text-xl font-bold text-pct-blue mb-6">Crescimento Territorial</h3>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-bold text-gray-700">Distrito Federal</span>
                        <span class="text-sm font-bold text-pct-blue">85%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-pct-blue h-2.5 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-bold text-gray-700">São Paulo</span>
                        <span class="text-sm font-bold text-pct-blue">62%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-pct-blue h-2.5 rounded-full" style="width: 62%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-bold text-gray-700">Rio Grande do Sul</span>
                        <span class="text-sm font-bold text-pct-blue">48%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-pct-blue h-2.5 rounded-full" style="width: 48%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass p-8 rounded-3xl shadow-sm">
            <h3 class="text-xl font-bold text-pct-blue mb-6">Ações Recentes</h3>
            <div class="space-y-4">
                <div class="flex items-start space-x-3">
                    <div class="h-2 w-2 rounded-full bg-pct-green mt-2"></div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Novo Comitê em Curitiba</p>
                        <p class="text-xs text-gray-500">Liderado por João Silva</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="h-2 w-2 rounded-full bg-yellow-500 mt-2"></div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Aprovação de Prestação de Contas</p>
                        <p class="text-xs text-gray-500">Comitê de Porto Alegre</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="h-2 w-2 rounded-full bg-pct-blue mt-2"></div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Lançamento de Manifestação Social</p>
                        <p class="text-xs text-gray-500">Portal Nacional</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-10 py-3 text-pct-blue font-bold border-2 border-pct-blue rounded-xl hover:bg-pct-blue hover:text-white transition-all">Ver Logs Completos</button>
        </div>
    </div>
</x-dashboard-layout>
