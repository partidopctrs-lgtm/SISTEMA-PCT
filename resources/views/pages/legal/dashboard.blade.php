<x-dashboard-layout>
    <x-slot name="title">Módulo Jurídico - PCT</x-slot>

    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-pct-blue">Jurídico & Compliance</h1>
            <p class="text-gray-500">Gestão de estatutos, atas e conformidade com o TSE.</p>
        </div>
        <div class="flex space-x-3">
             <button class="btn-secondary flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>
                <span>Exportar Dados TSE</span>
            </button>
            <button class="btn-primary flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span>Novo Documento</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Signature Progress -->
        <div class="lg:col-span-1 glass p-8 rounded-3xl shadow-sm border-t-4 border-pct-green">
            <h3 class="text-xl font-bold text-pct-blue mb-6">Coleta de Assinaturas</h3>
            <div class="flex flex-col items-center">
                <div class="relative w-40 h-40 flex items-center justify-center mb-6">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="80" cy="80" r="70" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-100" />
                        <circle cx="80" cy="80" r="70" stroke="currentColor" stroke-width="8" fill="transparent" class="text-pct-green" stroke-dasharray="440" stroke-dashoffset="110" />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-2xl font-black text-pct-blue">75%</span>
                        <span class="text-[10px] text-gray-400 font-bold uppercase">Concluído</span>
                    </div>
                </div>
                <div class="text-center">
                    <p class="text-sm font-bold text-gray-700">368.502 / 492.000</p>
                    <p class="text-xs text-gray-400 mt-1 italic">Meta para protocolo no TSE</p>
                </div>
                <div class="mt-8 w-full p-4 bg-emerald-50 rounded-2xl border border-emerald-100">
                    <div class="flex items-center space-x-3">
                        <div class="h-8 w-8 rounded-lg bg-pct-green flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-pct-green uppercase">Validação Gov.br</p>
                            <p class="text-xs text-emerald-800">Ativa e operando normal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Document List -->
        <div class="lg:col-span-2 glass rounded-3xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="font-bold text-pct-blue text-lg">Acervo Documental</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-[10px] uppercase tracking-wider">
                            <th class="px-6 py-4 font-bold border-b border-gray-100">Documento</th>
                            <th class="px-6 py-4 font-bold border-b border-gray-100">Tipo</th>
                            <th class="px-6 py-4 font-bold border-b border-gray-100">Última Modificação</th>
                            <th class="px-6 py-4 font-bold border-b border-gray-100 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 border-b border-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span class="font-bold text-gray-800">Estatuto do PCT - Final</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-50 font-medium text-gray-500 italic">Estatutário</td>
                            <td class="px-6 py-4 border-b border-gray-50">12/04/2026</td>
                            <td class="px-6 py-4 border-b border-gray-50 text-center">
                                <span class="px-2 py-1 bg-pct-green text-white text-[10px] font-bold rounded-md uppercase">Registrado</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 border-b border-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span class="font-bold text-gray-800">Ata de Fundação Nacional</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-50 font-medium text-gray-500 italic">Atas</td>
                            <td class="px-6 py-4 border-b border-gray-50">10/04/2026</td>
                            <td class="px-6 py-4 border-b border-gray-50 text-center">
                                <span class="px-2 py-1 bg-pct-green text-white text-[10px] font-bold rounded-md uppercase">Registrado</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 border-b border-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span class="font-bold text-gray-800">Regimento de Candidaturas</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-50 font-medium text-gray-500 italic">Normativo</td>
                            <td class="px-6 py-4 border-b border-gray-50">05/04/2026</td>
                            <td class="px-6 py-4 border-b border-gray-50 text-center">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded-md uppercase">Revisão</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-6 bg-gray-50 flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:items-center lg:justify-between">
                <p class="text-xs text-gray-400 font-medium italic">Todos os documentos possuem validade jurídica via assinatura digital certificado padrão ICP-Brasil.</p>
                <div class="flex space-x-6">
                    <a href="{{ route('legal.modelos_oficios') }}" class="flex items-center space-x-2 text-pct-blue hover:text-pct-green transition-colors group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="text-xs font-black uppercase tracking-widest">Modelos de Ofícios</span>
                    </a>
                    <a href="{{ route('legal.ficha_filiacao') }}" class="flex items-center space-x-2 text-pct-green hover:text-pct-blue transition-colors group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="text-xs font-black uppercase tracking-widest">Ficha de Filiação</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
