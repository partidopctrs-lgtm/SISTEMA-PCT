<x-dashboard-layout>
    <x-slot name="title">Admin - Partido em Formação</x-slot>

    <div class="mb-12">
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Partido em Formação</h1>
        <p class="text-gray-500 font-medium mt-1">Gestão de assinaturas de apoio, metas e relatórios para o TSE.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-pct-blue to-blue-900 rounded-[2rem] p-8 text-white shadow-xl shadow-blue-900/20">
            <h3 class="text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] mb-4">Total Nacional</h3>
            <p class="text-4xl font-black mb-1">{{ number_format($totalSignatures, 0, ',', '.') }}</p>
            <p class="text-xs font-medium text-blue-200 mb-6">Assinaturas Registradas</p>
            
            @php $progress = ($totalSignatures / $goal) * 100; @endphp
            <div class="h-2 bg-blue-950/50 rounded-full overflow-hidden mb-2">
                <div class="h-full bg-pct-green rounded-full" style="width: {{ min(100, $progress) }}%"></div>
            </div>
            <div class="flex justify-between items-center text-[10px] font-black">
                <span class="text-pct-green">{{ number_format($progress, 2) }}%</span>
                <span class="text-blue-200">Meta: {{ number_format($goal, 0, ',', '.') }}</span>
            </div>
        </div>
        
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 flex flex-col justify-center">
            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2">Ações em Lote</h3>
            <a href="{{ route('admin.party.export-pdf') }}" class="w-full py-3 bg-slate-100 text-pct-blue font-black text-center text-[10px] uppercase tracking-widest rounded-xl hover:bg-slate-200 transition-colors mb-3">
                Gerar PDF (Todas)
            </a>
            <a href="{{ route('admin.party.export-csv') }}" class="w-full py-3 bg-emerald-50 text-emerald-600 font-black text-center text-[10px] uppercase tracking-widest rounded-xl hover:bg-emerald-100 transition-colors">
                Exportar CSV para TSE
            </a>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
            <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest">Últimas Assinaturas</h2>
            <div class="relative">
                <input type="text" placeholder="Buscar por CPF ou Protocolo..." class="pl-10 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-medium focus:ring-2 focus:ring-blue-500 w-64">
                <svg class="w-4 h-4 text-gray-400 absolute left-4 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Protocolo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Apoiador</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Localidade</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($signatures as $sig)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-4 text-xs font-black text-pct-blue uppercase">{{ $sig->protocol_number }}</td>
                        <td class="px-8 py-4">
                            <p class="text-xs font-black text-pct-blue">{{ $sig->full_name }}</p>
                            <p class="text-[10px] text-gray-500 font-bold uppercase mt-0.5">CPF: {{ $sig->cpf }} | Título: {{ $sig->voter_title }}</p>
                        </td>
                        <td class="px-8 py-4 text-xs font-medium text-gray-500 uppercase">{{ $sig->city }} / {{ $sig->state }}</td>
                        <td class="px-8 py-4">
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[9px] font-black rounded-full uppercase border border-amber-200">{{ $sig->status }}</span>
                        </td>
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.party.pdf', $sig->id) }}" class="text-[10px] font-black text-blue-600 hover:text-blue-800 uppercase tracking-widest">Ver Ficha</a>
                                
                                @if($sig->status === 'pendente')
                                <form action="{{ route('admin.party.approve', $sig->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-[10px] font-black text-pct-green hover:text-emerald-700 uppercase tracking-widest bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-100">Aceitar Apoio</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-gray-400 text-sm font-medium">Nenhuma assinatura registrada ainda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($signatures->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $signatures->links() }}
        </div>
        @endif
    </div>
</x-dashboard-layout>
