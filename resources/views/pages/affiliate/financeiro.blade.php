<x-dashboard-layout>
    <x-slot name="title">Financeiro & Transparência - PCT</x-slot>

    <div class="max-w-6xl mx-auto">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Financeiro e Transparência</h1>
            <p class="text-gray-500 font-medium">Contribua com a sustentabilidade do movimento e acompanhe a gestão dos recursos.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-12">
            <!-- Donation Summary -->
            <div class="lg:col-span-1">
                <div class="card-premium h-full bg-pct-blue text-white overflow-hidden relative">
                    <div class="relative z-10">
                        <h3 class="text-lg font-black uppercase tracking-widest text-pct-green mb-10">Minhas Contribuições</h3>
                        <div class="mb-10 text-center">
                            <span class="text-[10px] uppercase font-bold opacity-60">Total Contribuído</span>
                            <div class="text-5xl font-black mt-2">R$ 0,00</div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between text-sm py-3 border-t border-white/10">
                                <span class="opacity-60">Status de Doador</span>
                                <span class="font-bold text-pct-green">Nenhum</span>
                            </div>
                            <div class="flex justify-between text-sm py-3 border-t border-white/10">
                                <span class="opacity-60">Próximo Vencimento</span>
                                <span class="font-bold">--/--</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donate Options -->
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card-premium border-2 border-pct-green/20 relative">
                    <div class="absolute top-4 right-6 bg-pct-green text-white text-[9px] font-black px-2 py-1 rounded-full uppercase">Recomendado</div>
                    <h4 class="text-xl font-bold text-pct-blue mb-2">Contribuição Recorrente</h4>
                    <p class="text-xs text-gray-500 mb-8 font-medium">Ajude a manter a estrutura nacional de forma constante.</p>
                    <div class="space-y-3 mb-8">
                        @foreach(['R$ 20,00', 'R$ 50,00', 'R$ 100,00'] as $val)
                        <button class="w-full py-3 bg-slate-50 border border-slate-200 rounded-xl font-bold text-pct-blue hover:bg-pct-blue hover:text-white transition-all">{{ $val }} / mês</button>
                        @endforeach
                    </div>
                    <button class="w-full btn-secondary">Assinar Contribuição</button>
                </div>

                <div class="card-premium">
                    <h4 class="text-xl font-bold text-pct-blue mb-2">Doação Única</h4>
                    <p class="text-xs text-gray-500 mb-8 font-medium">Apoio pontual para projetos específicos ou campanhas.</p>
                    <div class="flex flex-col gap-4">
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 mb-4">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Outro Valor</label>
                            <input type="text" placeholder="R$ 0,00" class="w-full bg-transparent text-2xl font-black text-pct-blue outline-none">
                        </div>
                        <button class="w-full btn-primary">Doar com PIX</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transparency Report Section -->
        <div class="space-y-8">
            <h2 class="text-2xl font-bold text-pct-blue tracking-tight">Transparência PCT</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                    $reports = [
                        ['Receitas Março', 'R$ 12.450,00', 'pct-green'],
                        ['Despesas Março', 'R$ 8.920,00', 'red-500'],
                        ['Investimento Escola', 'R$ 2.500,00', 'pct-blue'],
                        ['Fundo de Reserva', 'R$ 31.200,00', 'slate-900']
                    ];
                @endphp
                @foreach($reports as $r)
                <div class="card-premium p-6">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1 text-center">{{ $r[0] }}</p>
                    <p class="text-xl font-black text-{{ $r[2] }} text-center">{{ $r[1] }}</p>
                </div>
                @endforeach
            </div>

            <div class="card-premium flex flex-col md:flex-row items-center justify-between gap-6 p-10 bg-slate-50 border-dashed border-2">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg text-pct-blue">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 2v-6m0 10v4a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2m3 3h10a2 2 0 012 2v8a2 2 0 01-2 2H10a2 2 0 01-2-2V10a2 2 0 012-2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-pct-blue">Relatórios Mensais Detalhados</h4>
                        <p class="text-sm font-medium text-gray-500">Confira a prestação de contas completa do movimento.</p>
                    </div>
                </div>
                <button class="px-8 py-4 bg-white border border-slate-200 rounded-2xl font-bold text-pct-blue hover:bg-slate-100 transition-all">Visualizar Relatórios (PDF)</button>
            </div>
        </div>
    </div>
</x-dashboard-layout>
