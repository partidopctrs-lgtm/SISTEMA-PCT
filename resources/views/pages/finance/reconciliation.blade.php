<x-dashboard-layout>
    <x-slot name="title">Conciliação Bancária - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-amber-500 uppercase tracking-[0.3em] mb-2">Auditória Financeira</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Conciliação de Contas</h1>
        <p class="text-gray-500 font-medium">Conferência de extratos bancários com registros do sistema.</p>
    </div>

    <div class="card-premium mb-8 border-dashed border-2 border-slate-200 bg-slate-50/50 flex flex-col items-center justify-center p-16">
        <div class="h-16 w-16 bg-white rounded-full flex items-center justify-center shadow-sm mb-6 text-pct-blue">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0l-4-4m4 4V4"></path></svg>
        </div>
        <h3 class="text-lg font-black text-pct-blue mb-2 uppercase tracking-tighter">Importar Extrato Bancário</h3>
        <p class="text-xs text-gray-400 font-bold mb-8">Arraste seu arquivo .OFX ou .CSV aqui</p>
        <button class="px-8 py-3 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-widest text-pct-blue hover:bg-slate-50 transition-all shadow-sm">Selecionar Arquivo</button>
    </div>

    <div class="card-premium">
        <h3 class="text-sm font-black text-pct-blue mb-8 uppercase tracking-widest">Pendências de Conciliação</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-6 bg-red-50 rounded-3xl border border-red-100">
                <div class="flex items-center gap-6">
                    <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-red-500 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-red-600 uppercase">Divergência Encontrada</p>
                        <p class="text-sm font-bold text-pct-blue leading-tight">Saída de R$ 1.200,00 não identificada no extrato de 12/04.</p>
                    </div>
                </div>
                <button class="px-6 py-2 bg-white border border-red-200 text-red-600 rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-red-50 transition-all">Resolver</button>
            </div>
            
            <div class="flex items-center justify-between p-6 bg-slate-50 rounded-3xl border border-slate-100 opacity-60">
                <div class="flex items-center gap-6">
                    <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-emerald-500 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-emerald-600 uppercase">Conciliado Automaticamente</p>
                        <p class="text-sm font-bold text-pct-blue leading-tight">Doação #9982 (R$ 250,00) confirmada via PIX Gateway.</p>
                    </div>
                </div>
                <span class="text-[9px] font-black text-gray-400 uppercase">Finalizado</span>
            </div>
        </div>
    </div>
</x-dashboard-layout>
