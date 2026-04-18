<x-dashboard-layout>
    <x-slot name="title">Gabinete Digital - PCT</x-slot>

    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between">
        <div>
            <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Gabinete do Candidato</p>
            <h1 class="text-3xl font-bold text-pct-blue">Gabinete Digital</h1>
            <p class="text-gray-500">Gestão e mobilização de sua base eleitoral e política.</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button class="btn-secondary flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>Nova Agenda</span>
            </button>
            <button class="btn-primary flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>Mensagem Coletiva</span>
            </button>
        </div>
    </div>

    <!-- Candidate Performance -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="glass p-6 rounded-3xl shadow-sm border-b-4 border-pct-blue">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Apoiadores</p>
            <h3 class="text-3xl font-black text-pct-blue">3.842</h3>
            <p class="text-xs text-pct-green font-bold mt-2">↑ 8% esta semana</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm border-b-4 border-pct-green">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Alcance Estimado</p>
            <h3 class="text-3xl font-black text-pct-blue">15.2k</h3>
            <p class="text-xs text-gray-500 mt-2">Redes Sociais + Base Digital</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm border-b-4 border-yellow-500">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Eventos Realizados</p>
            <h3 class="text-3xl font-black text-pct-blue">14</h3>
            <p class="text-xs text-gray-500 mt-2">No último mês</p>
        </div>
        <div class="glass p-6 rounded-3xl shadow-sm border-b-4 border-purple-600">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Saldo Campanha</p>
            <h3 class="text-3xl font-black text-pct-blue">R$ 15.4k</h3>
            <p class="text-xs text-pct-green font-bold mt-2">Previsão OK</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Followers/Supporters -->
        <div class="lg:col-span-2 glass rounded-3xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="font-bold text-pct-blue text-lg">Base de Apoiadores Recentes</h3>
                <a href="#" class="text-sm font-bold text-pct-blue hover:underline">Ver Todos</a>
            </div>
            <div class="divide-y divide-gray-50">
                <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center text-pct-blue font-bold">M</div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Marcos Oliveira</p>
                            <p class="text-xs text-gray-500">Porto Alegre, RS</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-pct-green px-2 py-1 bg-emerald-50 rounded-md">ATIVO</span>
                </div>
                <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center text-pct-blue font-bold">A</div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Ana Souza</p>
                            <p class="text-xs text-gray-500">Canoas, RS</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-pct-green px-2 py-1 bg-emerald-50 rounded-md">ATIVO</span>
                </div>
                <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 rounded-full bg-blue-50 flex items-center justify-center text-pct-blue font-bold">R</div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Ricardo Santos</p>
                            <p class="text-xs text-gray-500">Alvorada, RS</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-yellow-600 px-2 py-1 bg-yellow-50 rounded-md">PENDENTE</span>
                </div>
            </div>
        </div>

        <!-- Agenda -->
        <div class="glass p-8 rounded-3xl shadow-sm">
            <h3 class="text-xl font-bold text-pct-blue mb-6">Agenda de Campo</h3>
            <div class="space-y-6">
                <div class="border-l-4 border-pct-blue pl-4">
                    <p class="text-xs font-bold text-gray-400 uppercase">Amanhã, 09:00</p>
                    <p class="text-sm font-bold text-gray-900 mt-1">Reunião com Líderes Comunitários</p>
                    <p class="text-xs text-gray-500">Associação de Bairro Centro</p>
                </div>
                <div class="border-l-4 border-pct-green pl-4">
                    <p class="text-xs font-bold text-gray-400 uppercase">15/04, 19:30</p>
                    <p class="text-sm font-bold text-gray-900 mt-1">Live: Cidadania e Trabalho</p>
                    <p class="text-xs text-gray-500">Instagram/TikTok Nacional</p>
                </div>
                <div class="border-l-4 border-purple-500 pl-4">
                    <p class="text-xs font-bold text-gray-400 uppercase">18/04, 14:00</p>
                    <p class="text-sm font-bold text-gray-900 mt-1">Caminhada na Orla</p>
                    <p class="text-xs text-gray-500">Zona Sul do Município</p>
                </div>
            </div>
            <button class="w-full mt-10 py-3 text-gray-500 font-bold border-2 border-dashed border-gray-200 rounded-xl hover:border-pct-blue hover:text-pct-blue transition-all">Ver Agenda Completa</button>
            <div class="mt-6 pt-6 border-t border-gray-100 space-y-3">
                <a href="{{ route('shared.documents', ['portal' => 'candidate']) }}" class="flex items-center justify-between p-4 bg-blue-50/50 rounded-2xl hover:bg-blue-100/50 transition-all group">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-pct-blue text-white rounded-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <span class="text-xs font-black text-pct-blue uppercase tracking-widest">Central de Documentos</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-dashboard-layout>
