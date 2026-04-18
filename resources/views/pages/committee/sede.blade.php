<x-dashboard-layout>
    <x-slot name="title">Gestão de Sede e Eventos - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-amber-500 uppercase tracking-[0.3em] mb-2">Base Territorial</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Sede Local e Calendário</h1>
        <p class="text-gray-500 font-medium">Controle de manutenção da sede física e agenda de mobilização.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <div class="card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest border-b border-slate-50 pb-4">Dados da Sede</h3>
            <div class="space-y-6">
                <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                    <span class="text-xs font-bold text-gray-400 uppercase">Endereço</span>
                    <span class="text-xs font-black text-pct-blue">{{ $directory->address ?? 'Não informado' }}</span>
                </div>
                <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                    <span class="text-xs font-bold text-gray-400 uppercase">Status de Manutenção</span>
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-[9px] font-black uppercase">Regular</span>
                </div>
                <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                    <span class="text-xs font-bold text-gray-400 uppercase">Contrato de Aluguel</span>
                    <button class="text-[9px] font-black text-pct-blue underline uppercase">Visualizar PDF</button>
                </div>
            </div>
        </div>

        <div class="card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest border-b border-slate-50 pb-4">Próximos Eventos</h3>
            <div class="space-y-4">
                <div class="flex items-center gap-6 p-4 border border-slate-100 rounded-3xl hover:bg-slate-50 transition-all cursor-pointer">
                    <div class="h-12 w-12 bg-pct-blue text-white rounded-2xl flex flex-col items-center justify-center">
                        <span class="text-[8px] font-bold uppercase">Abr</span>
                        <span class="text-xl font-black leading-none">25</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-pct-blue">Reunião de Alinhamento</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">19:00 - Sede Local</p>
                    </div>
                </div>
                <div class="flex items-center gap-6 p-4 border border-slate-100 rounded-3xl hover:bg-slate-50 transition-all cursor-pointer">
                    <div class="h-12 w-12 bg-emerald-500 text-white rounded-2xl flex flex-col items-center justify-center">
                        <span class="text-[8px] font-bold uppercase">Mai</span>
                        <span class="text-xl font-black leading-none">01</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-pct-blue">Panfletagem Dia do Trabalhador</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">09:00 - Praça Central</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
