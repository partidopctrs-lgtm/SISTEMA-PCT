<x-dashboard-layout>
    <x-slot name="title">Solicitações - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Central de Solicitações</h1>
                <p class="text-gray-500 font-medium mt-1">Comunicação formal com Jurídico, Financeiro e Nacional.</p>
            </div>
            <button class="btn-primary bg-indigo-600 shadow-indigo-600/20 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Nova Solicitação
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar Filtros -->
            <div class="space-y-6">
                <div class="card-premium">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-6">Setores de Destino</h3>
                    <div class="space-y-2">
                        @foreach(['Jurídico', 'Financeiro', 'Comunicação', 'Admin Nacional', 'Suporte Técnico'] as $setor)
                        <label class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 cursor-pointer transition-all border border-transparent hover:border-slate-100">
                            <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-xs font-bold text-pct-blue">{{ $setor }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="card-premium bg-slate-900 text-white">
                    <h3 class="text-xs font-black uppercase mb-4">Prazo Médio</h3>
                    <p class="text-3xl font-black">48h</p>
                    <p class="text-[9px] text-slate-400 font-bold uppercase mt-2">Para respostas iniciais</p>
                </div>
            </div>

            <!-- Lista de Solicitações -->
            <div class="lg:col-span-3 space-y-4">
                @forelse($solicitations as $sol)
                <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100 hover:shadow-md transition-all group">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <div class="h-12 w-12 bg-slate-50 rounded-2xl flex items-center justify-center text-pct-blue group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            </div>
                            <div>
                                <div class="flex items-center gap-3 mb-1">
                                    <span class="text-[9px] font-black text-blue-600 uppercase tracking-widest">{{ $sol->destination }}</span>
                                    <span class="text-[10px] text-gray-300">•</span>
                                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Protocolo #{{ $sol->id }}</span>
                                </div>
                                <h4 class="text-lg font-black text-pct-blue group-hover:text-blue-600 transition-colors">{{ $sol->subject }}</h4>
                                <p class="text-xs text-gray-500 font-medium mt-1 line-clamp-1">{{ $sol->description }}</p>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            @php
                                $priorityColors = [
                                    'urgente' => 'text-red-600 bg-red-50',
                                    'alta' => 'text-amber-600 bg-amber-50',
                                    'media' => 'text-blue-600 bg-blue-50',
                                ];
                                $pColor = $priorityColors[$sol->priority] ?? 'text-gray-600 bg-gray-50';
                            @endphp
                            <span class="px-3 py-1 {{ $pColor }} text-[9px] font-black rounded-full uppercase">{{ $sol->priority }}</span>
                            <p class="text-[9px] text-gray-400 font-black uppercase mt-2">{{ $sol->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-slate-50 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full {{ $sol->status === 'aberto' ? 'bg-blue-500' : 'bg-emerald-500' }}"></span>
                            <span class="text-[10px] font-black text-pct-blue uppercase">{{ $sol->status }}</span>
                        </div>
                        <button class="text-[10px] font-black text-blue-600 uppercase tracking-widest hover:underline">Ver Detalhes e Mensagens</button>
                    </div>
                </div>
                @empty
                <div class="card-premium py-20 text-center">
                    <div class="h-20 w-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    </div>
                    <h4 class="text-gray-500 font-medium">Nenhuma solicitação encontrada.</h4>
                    <p class="text-xs text-gray-400 mt-2">Suas comunicações oficiais com o Nacional aparecerão aqui.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-dashboard-layout>
