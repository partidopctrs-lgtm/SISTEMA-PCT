<x-dashboard-layout>
    <x-slot name="title">Serviços e Prestadores - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Serviços & Prestadores</h1>
                <p class="text-gray-500 font-medium mt-1">Gestão de contratos locais, profissionais e fornecedores recorrentes.</p>
            </div>
            <div class="flex gap-3">
                <button class="btn-primary flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Novo Prestador
                </button>
                <button class="btn-primary bg-indigo-600 shadow-indigo-600/20 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Cadastrar Serviço
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Lista de Serviços Ativos -->
            <div class="lg:col-span-2 space-y-6">
                <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest px-4">Serviços em Vigor</h3>
                @forelse($services as $service)
                <div class="card-premium group hover:border-blue-500 transition-all">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start gap-4">
                            <div class="h-12 w-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-black text-pct-blue">{{ $service->provider->name }}</h4>
                                <p class="text-[10px] font-black text-blue-600 uppercase tracking-widest">{{ $service->type }}</p>
                                <p class="text-xs text-gray-500 font-medium mt-2">{{ $service->scope }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-black text-pct-blue">R$ {{ number_format($service->value, 2, ',', '.') }}</p>
                            <span class="px-2 py-0.5 bg-emerald-100 text-pct-green text-[9px] font-black rounded-full uppercase tracking-tighter">ATIVO</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-slate-50 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <span class="text-[10px] font-bold text-gray-400">Início: {{ $service->start_date->format('d/m/Y') }}</span>
                            <span class="text-[10px] font-bold text-gray-400">Término: {{ $service->end_date ? $service->end_date->format('d/m/Y') : 'Indeterminado' }}</span>
                        </div>
                        <button class="text-[10px] font-black text-blue-600 uppercase tracking-widest hover:underline">Ver Contrato</button>
                    </div>
                </div>
                @empty
                <div class="card-premium py-12 text-center text-gray-400 italic">Nenhum serviço contratado registrado.</div>
                @endforelse
            </div>

            <!-- Lista de Prestadores -->
            <div class="space-y-6">
                <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest px-4">Base de Prestadores</h3>
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden divide-y divide-slate-50">
                    @forelse($providers as $provider)
                    <div class="p-6 hover:bg-slate-50 transition-all cursor-pointer group">
                        <div class="flex items-center gap-4">
                            <div class="h-10 w-10 bg-slate-100 rounded-xl flex items-center justify-center text-gray-500 group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <span class="text-xs font-black uppercase">{{ substr($provider->name, 0, 2) }}</span>
                            </div>
                            <div>
                                <h5 class="text-sm font-black text-pct-blue">{{ $provider->name }}</h5>
                                <p class="text-[10px] text-gray-400 font-bold">{{ $provider->document_number }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-gray-400 italic text-sm">Nenhum prestador cadastrado.</div>
                    @endforelse
                </div>
                <button class="w-full py-4 bg-slate-50 text-[10px] font-black text-blue-600 uppercase rounded-2xl border border-slate-100 hover:bg-white transition-all">Ver Todos os Prestadores</button>
            </div>
        </div>
    </div>
</x-dashboard-layout>
