<x-dashboard-layout>
    <x-slot name="title">Social Hub - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Engajamento Digital</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Social Hub</h1>
        <p class="text-gray-500 font-medium">Central de conteúdos e sugestões para redes sociais.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Post Suggestion -->
        <div class="card-premium group hover:border-pct-blue transition-all">
            <div class="aspect-square bg-slate-100 rounded-2xl mb-6 overflow-hidden relative">
                <img src="https://images.unsplash.com/photo-1540910419892-4a36d2c3266c?auto=format&fit=crop&q=80&w=400" alt="Sugestão" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute top-4 right-4 px-3 py-1 bg-pct-blue text-white text-[9px] font-black rounded-full uppercase">Novo</div>
            </div>
            <h3 class="text-sm font-black text-pct-blue mb-2 uppercase tracking-widest">Pauta do Dia: Educação</h3>
            <p class="text-xs text-gray-500 font-medium leading-relaxed mb-6">Sugestão de texto para Instagram e WhatsApp sobre as propostas de educação do PCT.</p>
            <div class="flex gap-3">
                <button class="flex-1 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-[9px] font-black text-pct-blue uppercase tracking-widest hover:bg-pct-blue hover:text-white transition-all">Copiar Texto</button>
                <button class="px-4 py-2 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .004 5.408 0 12.044c0 2.123.555 4.197 1.61 6.041L0 24l6.117-1.605a11.845 11.845 0 005.933 1.603h.005c6.636 0 12.048-5.41 12.052-12.047a11.816 11.816 0 00-3.276-8.517z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</x-dashboard-layout>
