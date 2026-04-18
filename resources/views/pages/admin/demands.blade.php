<x-dashboard-layout>
    <x-slot name="title">Admin - Demandas da População</x-slot>

    <div class="mb-12">
        <div class="flex items-center gap-3">
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Demandas da População</h1>
            @if($urgentDemands > 0)
                <span class="px-3 py-1 bg-red-100 text-red-600 text-[10px] font-black rounded-full uppercase tracking-widest animate-pulse border border-red-200">{{ $urgentDemands }} Alertas Nacionais</span>
            @endif
        </div>
        <p class="text-gray-500 font-medium mt-1">Monitoramento de problemas locais relatados pela base e alertas de urgência.</p>
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
            <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest">Painel de Triagem</h2>
            <div class="flex gap-4">
                <select class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-medium text-pct-blue outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Todos os Estados</option>
                    <option value="SP">São Paulo</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="MG">Minas Gerais</option>
                </select>
                <select class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-medium text-pct-blue outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Todas as Categorias</option>
                    <option value="Saúde">Saúde</option>
                    <option value="Educação">Educação</option>
                    <option value="Infraestrutura">Infraestrutura</option>
                </select>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Protocolo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Localidade / Categoria</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Título da Demanda</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status / Nível</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($demands as $demand)
                    <tr class="hover:bg-slate-50/50 transition-colors {{ $demand->is_urgent ? 'bg-red-50/30' : '' }}">
                        <td class="px-8 py-4 text-xs font-black text-gray-500 uppercase">{{ $demand->protocol_number }}</td>
                        <td class="px-8 py-4">
                            <p class="text-xs font-black text-pct-blue uppercase">{{ $demand->city }}/{{ $demand->state }}</p>
                            <p class="text-[10px] text-gray-500 font-bold uppercase mt-0.5">{{ $demand->category }}</p>
                        </td>
                        <td class="px-8 py-4">
                            <p class="text-xs font-black text-pct-blue">{{ Str::limit($demand->title, 40) }}</p>
                        </td>
                        <td class="px-8 py-4">
                            <div class="flex flex-col gap-1 items-start">
                                <span class="px-3 py-1 {{ $demand->status === 'analise' ? 'bg-amber-100 text-amber-700 border-amber-200' : 'bg-blue-100 text-blue-700 border-blue-200' }} text-[9px] font-black rounded-full uppercase border">
                                    {{ $demand->status }}
                                </span>
                                @if($demand->is_urgent)
                                    <span class="px-2 py-0.5 bg-red-100 text-red-600 text-[8px] font-black rounded-full uppercase tracking-widest">Urgente</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <button class="text-[10px] font-black text-blue-600 hover:text-blue-800 uppercase tracking-widest bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-100 transition-colors">Detalhes</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-gray-400 text-sm font-medium">Nenhuma demanda registrada ainda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($demands->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $demands->links() }}
        </div>
        @endif
    </div>
</x-dashboard-layout>
