<x-dashboard-layout>
    <x-slot name="title">Painel Operacional - {{ $directory?->name ?? 'Gestão Local' }} - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="mb-12">
            <p class="text-[10px] font-black text-pct-blue uppercase tracking-[0.3em] mb-2 opacity-60">Painel do Comitê Regional</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">{{ $directory?->name ?? 'Gestão Local' }}</h1>
            <p class="text-gray-500 font-medium italic">Operação política e administrativa territorial.</p>
        </div>

        <!-- 1.1 Resumo Geral & 1.2 Indicadores Rápidos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="card-premium">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Base de Membros</p>
                    <span class="px-2 py-0.5 bg-emerald-100 text-pct-green text-[9px] font-black rounded-full border border-emerald-200">REGULAR</span>
                </div>
                <div class="flex items-baseline gap-2">
                    <p class="text-3xl font-black text-pct-blue">{{ $stats['total_members'] }}</p>
                    <p class="text-[10px] font-bold text-gray-400">/ {{ $stats['active_members'] }} ativos</p>
                </div>
            </div>
            
            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Financeiro (Mês)</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-3xl font-black text-pct-green">R$ {{ number_format($stats['month_expenses'], 2, ',', '.') }}</p>
                </div>
                <p class="text-[9px] font-bold text-gray-400 uppercase mt-2">Prestação em dia</p>
            </div>

            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Documentos</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-3xl font-black {{ $stats['pending_documents'] > 0 ? 'text-amber-500' : 'text-pct-blue' }}">{{ $stats['pending_documents'] }}</p>
                    <p class="text-[10px] font-bold text-gray-400">pendentes</p>
                </div>
            </div>

            <div class="card-premium">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Solicitações</p>
                <div class="flex items-baseline gap-2">
                    <p class="text-3xl font-black {{ $stats['pending_solicitations'] > 0 ? 'text-red-500' : 'text-pct-blue' }}">{{ $stats['pending_solicitations'] }}</p>
                    <p class="text-[10px] font-bold text-gray-400">em aberto</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Coluna Principal (Operacional) -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- 1.4 Atividades Recentes -->
                <div class="card-premium">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Atividades Recentes</h3>
                        <a href="#" class="text-[10px] font-black text-blue-600 uppercase hover:underline">Ver tudo</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-blue-600 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-xs font-black text-pct-blue uppercase">Nova Despesa Lançada</h4>
                                <p class="text-[10px] text-gray-500 font-bold">R$ 56,00 - VPS Site Institucional</p>
                            </div>
                            <span class="text-[9px] font-black text-gray-400 uppercase">Hoje</span>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-emerald-600 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-xs font-black text-pct-blue uppercase">Documento Aprovado</h4>
                                <p class="text-[10px] text-gray-500 font-bold">Ata da Reunião Extraordinária</p>
                            </div>
                            <span class="text-[9px] font-black text-gray-400 uppercase">Ontem</span>
                        </div>
                    </div>
                </div>

                <!-- 1.6 Painel Financeiro Resumido -->
                <div class="card-premium">
                    <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest mb-6">Painel Financeiro Resumido</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-6 bg-slate-900 rounded-[2rem] text-white">
                            <p class="text-[9px] font-black text-slate-400 uppercase mb-1">Saldo em Caixa</p>
                            <p class="text-2xl font-black">R$ 1.250,00</p>
                        </div>
                        <div class="p-6 bg-blue-600 rounded-[2rem] text-white">
                            <p class="text-[9px] font-black text-blue-200 uppercase mb-1">Fundo de Reserva</p>
                            <p class="text-2xl font-black">R$ 450,00</p>
                        </div>
                        <div class="p-6 bg-emerald-600 rounded-[2rem] text-white">
                            <p class="text-[9px] font-black text-emerald-200 uppercase mb-1">Investimento Escola</p>
                            <p class="text-2xl font-black">R$ 200,00</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Coluna Lateral (Alertas e Agenda) -->
            <div class="space-y-8">
                
                <!-- 1.3 Alertas do Sistema -->
                <div class="card-premium border-t-4 border-t-red-500">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6 flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        Alertas Críticos
                    </h3>
                    <div class="space-y-3">
                        <div class="p-3 bg-red-50 rounded-xl border border-red-100">
                            <p class="text-[10px] font-black text-red-700 uppercase">Documento Rejeitado</p>
                            <p class="text-[10px] text-red-600 mt-1">Ata de Fundação precisa de correção na assinatura.</p>
                        </div>
                        <div class="p-3 bg-amber-50 rounded-xl border border-amber-100">
                            <p class="text-[10px] font-black text-amber-700 uppercase">Serviço Vencendo</p>
                            <p class="text-[10px] text-amber-600 mt-1">Contrato com Contador encerra em 15 dias.</p>
                        </div>
                    </div>
                </div>

                <!-- 1.5 Agenda do Diretório -->
                <div class="card-premium">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Agenda Administrativa</h3>
                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="h-10 w-10 bg-blue-50 rounded-xl flex flex-col items-center justify-center shrink-0">
                                <span class="text-[8px] font-black text-blue-400 uppercase">ABR</span>
                                <span class="text-sm font-black text-blue-700">20</span>
                            </div>
                            <div>
                                <h5 class="text-[11px] font-black text-pct-blue uppercase">Reunião Ordinária</h5>
                                <p class="text-[10px] text-gray-400 font-bold">19:30 - Sede Local</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="h-10 w-10 bg-emerald-50 rounded-xl flex flex-col items-center justify-center shrink-0">
                                <span class="text-[8px] font-black text-emerald-400 uppercase">MAI</span>
                                <span class="text-sm font-black text-emerald-700">05</span>
                            </div>
                            <div>
                                <h5 class="text-[11px] font-black text-pct-blue uppercase">Prestação de Contas</h5>
                                <p class="text-[10px] text-gray-400 font-bold">Prazo Final Mensal</p>
                            </div>
                        </div>
                    </div>
                    <button class="w-full mt-6 py-3 bg-slate-50 text-[10px] font-black text-pct-blue uppercase rounded-xl border border-slate-100 hover:bg-white transition-all">Ver Agenda Completa</button>
                </div>

            </div>
        </div>
    </div>
</x-dashboard-layout>
