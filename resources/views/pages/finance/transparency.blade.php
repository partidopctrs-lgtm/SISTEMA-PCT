<x-dashboard-layout>
    <x-slot name="title">Portal da Transparência - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-emerald-600 uppercase tracking-[0.3em] mb-2">Transparência Real</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Prestação de Contas Pública</h1>
        <p class="text-gray-500 font-medium">Geração de relatórios auditáveis para o portal público do partido.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-2 card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest">Relatório Consolidado</h3>
            <div class="space-y-6">
                <div class="flex items-center justify-between p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <div>
                        <h4 class="text-sm font-black text-pct-blue uppercase">Fundo Partidário</h4>
                        <p class="text-xs text-gray-400 font-bold">Repasses oficiais recebidos</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-black text-pct-blue">R$ 0,00</p>
                        <span class="text-[9px] font-black text-gray-400 uppercase">Aguardando registro</span>
                    </div>
                </div>
                <div class="flex items-center justify-between p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <div>
                        <h4 class="text-sm font-black text-pct-blue uppercase">Doações Privadas</h4>
                        <p class="text-xs text-gray-400 font-bold">Total arrecadado via CPF</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-black text-pct-green">R$ 45.230,00</p>
                        <span class="text-[9px] font-black text-pct-green uppercase">100% Verificado</span>
                    </div>
                </div>
                <div class="flex items-center justify-between p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <div>
                        <h4 class="text-sm font-black text-pct-blue uppercase">Despesas Operacionais</h4>
                        <p class="text-xs text-gray-400 font-bold">Manutenção de sedes e sistemas</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-black text-red-500">- R$ 4.120,50</p>
                        <span class="text-[9px] font-black text-red-400 uppercase">Comprovantes anexados</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-premium bg-pct-blue text-white">
            <h3 class="text-lg font-black mb-6 uppercase tracking-widest text-blue-200">Ações de Transparência</h3>
            <div class="space-y-4">
                <button class="w-full py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all text-left px-6 flex items-center justify-between">
                    Gerar PDF Público
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </button>
                <button class="w-full py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all text-left px-6 flex items-center justify-between">
                    Exportar para TSE
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </button>
                <div class="pt-8">
                    <p class="text-[10px] font-black text-blue-300 uppercase mb-4">Integridade de Dados</p>
                    <div class="p-4 bg-white/5 rounded-2xl border border-white/10">
                        <p class="text-[10px] leading-relaxed italic text-blue-100">"A transparência é o pilar fundamental do PCT. Cada centavo deve ser rastreável pela militância."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
