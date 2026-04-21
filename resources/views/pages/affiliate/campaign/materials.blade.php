<x-dashboard-layout>
    <x-slot name="title">Materiais de Divulgação - PCT</x-slot>

    <div class="mb-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Materiais de Campanha 📢</h2>
                <p class="text-slate-500 font-medium">Use materiais oficiais para profissionalizar sua divulgação.</p>
            </div>
            <a href="{{ route('affiliate.dashboard') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs uppercase hover:bg-slate-200 transition-all">Voltar ao Painel</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- 🎨 Artes para Redes Sociais -->
            <div class="lg:col-span-2 bg-white p-8 rounded-[3rem] border border-slate-100 shadow-sm">
                <h3 class="text-xl font-black text-pct-blue mb-8 uppercase tracking-widest">Artes para Redes Sociais</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="group relative overflow-hidden rounded-3xl aspect-square bg-slate-100 border border-slate-200 flex flex-col items-center justify-center text-center p-8">
                        <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Modelo: Água é um Direito</p>
                        <p class="text-[10px] text-slate-400 font-bold mt-2 uppercase">(Em breve)</p>
                    </div>
                    <div class="group relative overflow-hidden rounded-3xl aspect-square bg-slate-100 border border-slate-200 flex flex-col items-center justify-center text-center p-8">
                        <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Modelo: Mobilização RS</p>
                        <p class="text-[10px] text-slate-400 font-bold mt-2 uppercase">(Em breve)</p>
                    </div>
                </div>
            </div>

            <!-- ✍️ Textos Prontos -->
            <div class="bg-slate-50 p-8 rounded-[3rem] border border-slate-100">
                <h3 class="text-xl font-black text-pct-blue mb-8 uppercase tracking-widest">Textos Prontos</h3>
                <div class="space-y-4">
                    <div class="p-6 bg-white rounded-2xl shadow-sm border border-slate-100 group">
                        <p class="text-[10px] font-black text-pct-blue uppercase mb-3">Opção 1: Urgência</p>
                        <p class="text-xs text-slate-600 font-medium italic leading-relaxed mb-4">"Não aceite o descaso. Sua cidade sem água é um crime. Registre o problema e vamos cobrar soluções: [SEU_LINK]"</p>
                        <button onclick="copyText('Não aceite o descaso. Sua cidade sem água é um crime. Registre o problema e vamos cobrar soluções: {{ route('campaign.water.index', ['ref' => auth()->id()]) }}')" class="w-full py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-[10px] uppercase hover:bg-pct-blue hover:text-white transition-all">Copiar Texto</button>
                    </div>
                    <div class="p-6 bg-white rounded-2xl shadow-sm border border-slate-100 group">
                        <p class="text-[10px] font-black text-pct-blue uppercase mb-3">Opção 2: Convite</p>
                        <p class="text-xs text-slate-600 font-medium italic leading-relaxed mb-4">"Estamos unindo forças para resolver o problema da água no RS. Participe do nosso movimento registrando a situação do seu bairro: [SEU_LINK]"</p>
                        <button onclick="copyText('Estamos unindo forças para resolver o problema da água no RS. Participe do nosso movimento registrando a situação do seu bairro: {{ route('campaign.water.index', ['ref' => auth()->id()]) }}')" class="w-full py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-[10px] uppercase hover:bg-pct-blue hover:text-white transition-all">Copiar Texto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyText(text) {
            navigator.clipboard.writeText(text);
            alert("Texto copiado!");
        }
    </script>
</x-dashboard-layout>
