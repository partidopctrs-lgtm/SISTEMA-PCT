<x-dashboard-layout>
    <x-slot name="title">Documentos - {{ auth()->user()->committee?->name ?? 'Diretório' }}</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight">Biblioteca de Documentos</h1>
                <p class="text-gray-500 font-medium mt-1">Envio, validação e histórico de atas, ofícios e contratos.</p>
            </div>
            <button class="btn-primary flex items-center gap-2" @click="$dispatch('open-modal', 'upload-doc')">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                Enviar Novo Arquivo
            </button>
        </div>

        <!-- Document Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @foreach([
                ['Ata de Fundação', 'Obrigatório', 'emerald'],
                ['Lista de Membros', 'Atualizado em Mar/26', 'blue'],
                ['Balanço Mensal', 'Pendente Abr/26', 'amber'],
                ['Ofícios Enviados', '12 arquivos', 'slate']
            ] as $cat)
            <div class="card-premium group hover:border-{{ $cat[2] }}-500 transition-all cursor-pointer">
                <div class="flex items-center justify-between mb-4">
                    <div class="h-10 w-10 bg-{{ $cat[2] }}-50 rounded-xl flex items-center justify-center text-{{ $cat[2] }}-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <svg class="w-5 h-5 text-gray-300 group-hover:text-{{ $cat[2] }}-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
                <h4 class="text-xs font-black text-pct-blue uppercase">{{ $cat[0] }}</h4>
                <p class="text-[10px] text-{{ $cat[2] }}-600 font-bold mt-1 uppercase">{{ $cat[1] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Latest Documents Table -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Histórico Recente</h3>
                <div class="flex items-center gap-2">
                    <span class="flex items-center gap-1.5 px-3 py-1 bg-white border border-slate-200 rounded-full text-[10px] font-bold text-gray-500">
                        <span class="h-2 w-2 bg-amber-500 rounded-full"></span>
                        Em Análise: 2
                    </span>
                </div>
            </div>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Arquivo</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Categoria</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Data Envio</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-slate-50/30 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9v-2h2v2zm0-4H9V7h2v5z"></path></svg>
                                <span class="text-sm font-bold text-pct-blue">{{ $doc->title }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase">{{ $doc->category }}</td>
                        <td class="px-8 py-5 text-[10px] font-bold text-gray-500">{{ $doc->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-8 py-5">
                            @php
                                $statusColors = [
                                    'enviado' => 'bg-blue-100 text-blue-700 border-blue-200',
                                    'analise' => 'bg-amber-100 text-amber-700 border-amber-200',
                                    'aprovado' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                    'rejeitado' => 'bg-red-100 text-red-700 border-red-200',
                                ];
                                $color = $statusColors[$doc->status] ?? 'bg-slate-100 text-slate-700 border-slate-200';
                            @endphp
                            <span class="px-3 py-1 {{ $color }} text-[9px] font-black rounded-full border uppercase">{{ $doc->status }}</span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <button class="text-blue-600 hover:text-blue-800 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-gray-400 italic">Nenhum documento enviado recentemente.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
