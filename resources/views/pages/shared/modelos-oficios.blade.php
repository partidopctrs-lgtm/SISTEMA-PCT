<x-dashboard-layout>
    <x-slot name="title">Modelos de Ofícios – PCT</x-slot>

    <div class="mb-12 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-pct-blue tracking-tighter">Modelos de Ofícios Oficiais</h1>
            <p class="text-gray-500 font-medium">Documentos padronizados para sua atuação no {{ auth()->user()->role ?? 'portal' }}.</p>
        </div>
        <a href="{{ url()->previous() }}" class="btn-secondary px-6">
            Voltar
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <div class="glass p-10 rounded-[2.5rem] shadow-sm bg-white border border-gray-100 group hover:border-pct-blue/20 transition-all">
                <div class="flex items-start justify-between mb-8">
                    <div class="p-4 bg-pct-blue/5 text-pct-blue rounded-3xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <span class="px-3 py-1 bg-pct-green text-white text-[10px] font-black rounded-lg uppercase tracking-widest">Disponível</span>
                </div>
                <h3 class="text-2xl font-black text-pct-blue mb-4 tracking-tight">Ofício Geral de Comunicação</h3>
                <p class="text-slate-500 font-medium mb-8 leading-relaxed">
                    Modelo padrão para comunicações externas e institucionais. Totalmente editável via Google Docs.
                </p>
                <a href="https://docs.google.com/document/d/1L2887QLvuxrF3Ga9TYFCE4-f3tUAcqSz/edit?usp=sharing" target="_blank" class="inline-flex items-center px-10 py-5 bg-pct-blue text-white font-black rounded-2xl hover:bg-pct-green transition-all shadow-lg hover:shadow-pct-green/20 group">
                    ACESSAR MODELO EDITÁVEL
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-100/50 border border-dashed border-gray-200 rounded-[2.5rem] p-10 flex flex-col items-center justify-center text-center opacity-40">
                    <div class="w-10 h-10 bg-gray-200 rounded-xl mb-4 flex items-center justify-center text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Modelo Jurídico</p>
                </div>
                <div class="bg-gray-100/50 border border-dashed border-gray-200 rounded-[2.5rem] p-10 flex flex-col items-center justify-center text-center opacity-40">
                    <div class="w-10 h-10 bg-gray-200 rounded-xl mb-4 flex items-center justify-center text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Ofício Financeiro</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Instructions -->
        <div class="space-y-8">
            <div class="bg-pct-blue rounded-[3rem] p-10 text-white shadow-2xl relative overflow-hidden">
                <div class="relative z-10">
                    <h4 class="text-xs font-black mb-8 border-b border-white/10 pb-4 uppercase tracking-[0.2em] text-blue-200">Como Editar:</h4>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-6 h-6 rounded-lg bg-pct-green flex items-center justify-center font-black text-[10px] shrink-0">1</div>
                            <p class="text-xs font-medium leading-relaxed">Abra o modelo no Google Docs.</p>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-6 h-6 rounded-lg bg-pct-green flex items-center justify-center font-black text-[10px] shrink-0">2</div>
                            <p class="text-xs font-medium leading-relaxed">Vá em <span class="text-pct-green font-bold">Arquivo > Fazer uma cópia</span>.</p>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-6 h-6 rounded-lg bg-pct-green flex items-center justify-center font-black text-[10px] shrink-0">3</div>
                            <p class="text-xs font-medium leading-relaxed">Salve no seu Drive e edite livremente.</p>
                        </div>
                    </div>
                    <div class="mt-10 p-4 bg-white/5 rounded-xl border border-white/10 italic text-[10px] leading-relaxed text-blue-100">
                        <strong>Lembrete:</strong> Use este documento em todas as comunicações formais para manter o padrão visual do PCT.
                    </div>
                </div>
                <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-pct-green/10 rounded-full blur-3xl"></div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
