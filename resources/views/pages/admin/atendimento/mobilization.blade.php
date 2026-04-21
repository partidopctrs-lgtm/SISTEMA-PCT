<x-dashboard-layout>
    <x-slot name="title">Inteligência de Mobilização - Atendimento Central</x-slot>

    <div class="mb-8">
        <h1 class="text-2xl font-black text-pct-blue uppercase tracking-tighter">Inteligência de Mobilização</h1>
        <p class="text-gray-500 text-sm font-medium">Identifique crises locais e transforme denúncias em ações coletivas.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($clusters as $cluster)
        <div class="card-premium border-t-4 {{ $cluster->total > 5 ? 'border-t-red-500' : 'border-t-pct-blue' }} flex flex-col h-full hover:shadow-2xl transition-all group">
            <div class="flex-grow">
                <div class="flex items-center justify-between mb-6">
                    <span class="px-3 py-1 bg-slate-100 text-slate-500 text-[9px] font-black uppercase rounded-full tracking-widest">{{ $cluster->city }}</span>
                    <span class="text-xs font-black {{ $cluster->total > 5 ? 'text-red-500' : 'text-pct-blue' }}">{{ $cluster->total }} casos</span>
                </div>
                
                <h3 class="text-lg font-black text-pct-blue uppercase tracking-tighter mb-4">{{ $cluster->problem_type }}</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-6">Recorrência Detectada</p>
                
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 mb-8">
                    <p class="text-[9px] text-gray-500 font-medium leading-relaxed">Detectamos um agrupamento de relatos similares nesta região. Isso sugere um problema estrutural ou crise pontual no abastecimento.</p>
                </div>
            </div>

            <div class="space-y-3 pt-6 border-t border-slate-50">
                <a href="{{ route('admin.atendimento.index', ['city' => $cluster->city, 'status' => 'recebido']) }}" class="block w-full py-3 bg-white border border-slate-100 text-pct-blue rounded-xl text-center text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition-all">Ver Casos do Grupo</a>
                <button class="w-full py-3 bg-pct-blue text-white rounded-xl text-center text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Gerar Dossiê Coletivo</button>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center card-premium">
            <p class="text-xs font-black text-slate-300 uppercase tracking-widest">Nenhum agrupamento crítico detectado até o momento.</p>
        </div>
        @endforelse
    </div>
</x-dashboard-layout>
