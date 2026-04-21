<x-dashboard-layout>
    <x-slot name="title">Seus Direitos - Atendimento PCT</x-slot>

    <div class="max-w-4xl mx-auto pb-20">
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Seus Direitos como Cidadão</h1>
            <p class="text-gray-500 font-medium">O acesso à água potável é um direito fundamental. Saiba como se defender.</p>
        </div>

        <div class="space-y-6">
            <!-- Right 1 -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-pct-blue">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-pct-blue uppercase tracking-tight">Interrupção do Abastecimento</h3>
                </div>
                <p class="text-gray-600 font-medium leading-relaxed mb-4">A concessionária deve avisar com antecedência mínima de 30 dias sobre interrupções programadas. Em caso de falta de água sem aviso, o consumidor tem direito a desconto proporcional na fatura.</p>
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 italic text-[11px] text-gray-500 font-bold">
                    Dica: Sempre anote o número de protocolo de quando você ligou para reclamar.
                </div>
            </div>

            <!-- Right 2 -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-pct-blue uppercase tracking-tight">Qualidade da Água</h3>
                </div>
                <p class="text-gray-600 font-medium leading-relaxed mb-4">Água barrenta, com cheiro forte ou gosto estranho é imprópria para consumo. Você deve exigir a análise técnica imediata e o expurgo dos custos de limpeza de caixa d'água causados pela sujeira da rede.</p>
            </div>

            <!-- Right 3 -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black text-pct-blue uppercase tracking-tight">Cobrança Abusiva</h3>
                </div>
                <p class="text-gray-600 font-medium leading-relaxed mb-4">Se a sua conta subiu drasticamente sem mudança no consumo, pode haver ar na tubulação ou erro de leitura. A empresa não pode cortar a água enquanto a contestação estiver em análise.</p>
            </div>
        </div>

        <div class="mt-12 p-12 bg-pct-blue rounded-[3rem] text-white text-center shadow-2xl shadow-blue-900/40">
            <h2 class="text-2xl font-black uppercase tracking-tighter mb-4">Seus direitos foram violados?</h2>
            <p class="text-blue-200 font-medium mb-8">O PCT está aqui para organizar a pressão política necessária.</p>
            <a href="{{ route('affiliate.atendimento.create') }}" class="inline-block px-12 py-4 bg-pct-green text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-emerald-600 transition-all">Registrar Denúncia Agora</a>
        </div>
    </div>
</x-dashboard-layout>
