<x-dashboard-layout>
    <x-slot name="title">Ficha de Filiação – PCT</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="card-premium p-20 text-center">
            <div class="w-24 h-24 bg-pct-blue text-white rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <h1 class="text-3xl font-black text-pct-blue mb-4">Aguardando Conteúdo da Ficha</h1>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">Esta página está pronta para receber o código da Ficha de Filiação. Por favor, cole o código HTML para que possamos habilitar a impressão e download.</p>
            
            <div class="p-6 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                <p class="text-sm font-bold text-gray-400">DICA: Assim que o código for colado, este formulário terá suporte total a impressão A4 e download em PDF.</p>
            </div>

            <div class="mt-12">
                <a href="{{ route('affiliate.documentos') }}" class="text-pct-blue font-bold hover:underline flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Voltar para Documentos
                </a>
            </div>
        </div>
    </div>
</x-dashboard-layout>
