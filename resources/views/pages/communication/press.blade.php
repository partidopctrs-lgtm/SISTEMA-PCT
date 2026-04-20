<x-dashboard-layout>
    <x-slot name="title">Press Kit - PCT</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Relacionamento com a Mídia</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Press Kit & Releases</h1>
        <p class="text-gray-500 font-medium">Materiais oficiais para jornalistas e veículos de comunicação.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="card-premium">
            <h3 class="text-sm font-black text-pct-blue mb-6 uppercase tracking-widest">Últimos Releases</h3>
            <div class="space-y-4">
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex items-center justify-between group hover:border-pct-blue transition-all">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase">19 ABR 2026</p>
                        <p class="text-xs font-black text-pct-blue uppercase mt-1">PCT inaugura nova sede nacional</p>
                    </div>
                    <button class="text-blue-500 hover:text-blue-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="card-premium">
            <h3 class="text-sm font-black text-pct-blue mb-6 uppercase tracking-widest">Assets Oficiais</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="p-6 bg-slate-100 rounded-2xl text-center border-2 border-dashed border-slate-200">
                    <p class="text-[10px] font-black text-slate-400 uppercase mb-2">Logo PCT (Vetorial)</p>
                    <button class="px-4 py-2 bg-white text-[9px] font-black text-pct-blue rounded-lg shadow-sm">Baixar</button>
                </div>
                <div class="p-6 bg-slate-100 rounded-2xl text-center border-2 border-dashed border-slate-200">
                    <p class="text-[10px] font-black text-slate-400 uppercase mb-2">Fotos Presidente</p>
                    <button class="px-4 py-2 bg-white text-[9px] font-black text-pct-blue rounded-lg shadow-sm">Baixar</button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
