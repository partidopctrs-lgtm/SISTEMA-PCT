<x-dashboard-layout>
    <x-slot name="title">Validação de Carteirinhas - Admin PCT</x-slot>

    <div class="mb-12">
        <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Validação de IDs</h1>
        <p class="text-gray-500 font-medium tracking-wide">Fila de aprovação de identidades digitais e emissão de carteirinhas físicas.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="glass p-8 rounded-3xl border-l-[12px] border-l-pct-blue shadow-sm">
            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Pendentes</h4>
            <div class="text-4xl font-black text-pct-blue">24</div>
            <p class="text-xs text-gray-400 mt-2 font-medium">Aguardando auditoria de foto</p>
        </div>
        <div class="glass p-8 rounded-3xl border-l-[12px] border-l-pct-green shadow-sm">
            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Emitidas (Total)</h4>
            <div class="text-4xl font-black text-pct-blue">1.450</div>
            <p class="text-xs text-gray-400 mt-2 font-medium">Desde o início do ciclo</p>
        </div>
        <div class="glass p-8 rounded-3xl border-l-[12px] border-l-amber-400 shadow-sm">
            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Rejeitadas</h4>
            <div class="text-4xl font-black text-pct-blue">12</div>
            <p class="text-xs text-gray-400 mt-2 font-medium">Principalmente fotos inválidas</p>
        </div>
    </div>

    <!-- Approval List -->
    <div class="glass rounded-[2rem] shadow-sm bg-white overflow-hidden border border-gray-100">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center">
            <h3 class="font-black text-pct-blue uppercase tracking-widest">Fila de Auditoria</h3>
            <button class="text-xs font-black text-pct-blue hover:text-pct-green transition-colors uppercase">Processar em Lote (Bulk Approval)</button>
        </div>
        <div class="divide-y divide-gray-50">
            @foreach([
                ['name' => 'Carlos Ferreira', 'photo' => 'https://i.pravatar.cc/150?u=carlos', 'date' => 'Há 2 horas', 'type' => 'Digital'],
                ['name' => 'Beatriz Souza', 'photo' => 'https://i.pravatar.cc/150?u=beatriz', 'date' => 'Há 5 horas', 'type' => 'Física Request'],
                ['name' => 'Marcos Lima', 'photo' => 'https://i.pravatar.cc/150?u=marcos', 'date' => 'Ontem', 'type' => 'Digital']
            ] as $request)
            <div class="flex items-center justify-between p-8 hover:bg-gray-50 transition-all">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ $request['photo'] }}" class="w-16 h-16 rounded-2xl object-cover ring-2 ring-pct-green/20">
                        <div class="absolute -top-2 -right-2 bg-pct-green text-white p-1 rounded-full">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-lg font-black text-pct-blue tracking-tight leading-none mb-1">{{ $request['name'] }}</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $request['type'] }} • Solicitada {{ $request['date'] }}</p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <button class="px-5 py-2.5 bg-red-50 text-red-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-100 transition-colors">Rejeitar</button>
                    <button class="px-5 py-2.5 bg-emerald-50 text-emerald-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-emerald-100 transition-colors">Aprovar & Emitir</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-8 bg-gray-50 text-center">
            <button class="text-xs font-black text-pct-blue opacity-40 hover:opacity-100 transition-opacity">VER TODOS OS PEDIDOS</button>
        </div>
    </div>
</x-dashboard-layout>
