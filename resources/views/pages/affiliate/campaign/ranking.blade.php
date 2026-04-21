<x-dashboard-layout>
    <x-slot name="title">Ranking de Mobilização - PCT</x-slot>

    <div class="mb-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Ranking Nacional 🏆</h2>
                <p class="text-slate-500 font-medium">Os líderes que mais estão gerando impacto no Rio Grande do Sul.</p>
            </div>
            <a href="{{ route('affiliate.dashboard') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs uppercase hover:bg-slate-200 transition-all">Voltar ao Painel</a>
        </div>

        <div class="grid grid-cols-1 gap-4">
            @foreach($ranking as $rank)
            <div class="bg-white p-6 rounded-[2rem] border {{ $rank->affiliate_id == auth()->id() ? 'border-amber-300 bg-amber-50/30' : 'border-slate-100' }} shadow-sm flex items-center justify-between group hover:shadow-xl transition-all">
                <div class="flex items-center gap-6">
                    <span class="text-2xl font-black {{ $loop->iteration <= 3 ? 'text-amber-500' : 'text-slate-300' }} w-10 text-center">
                        {{ $ranking->firstItem() + $loop->index }}º
                    </span>
                    <div class="w-16 h-16 rounded-2xl bg-slate-100 border-2 {{ $rank->affiliate_id == auth()->id() ? 'border-amber-400' : 'border-slate-200' }} overflow-hidden">
                        @if($rank->affiliate->photo)
                            <img src="{{ asset('storage/'.$rank->affiliate->photo) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-xl font-black text-pct-blue">{{ substr($rank->affiliate->name, 0, 1) }}</div>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-lg font-black text-pct-blue uppercase tracking-tighter">{{ $rank->affiliate->name }}</h4>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 bg-pct-blue/10 text-pct-blue rounded-md text-[9px] font-black uppercase tracking-widest">Líder Regional</span>
                            @if($rank->affiliate_id == auth()->id())
                                <span class="px-2 py-0.5 bg-amber-400 text-white rounded-md text-[9px] font-black uppercase tracking-widest">Você</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-black text-pct-green tracking-tighter">{{ $rank->total }}</p>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Relatos Gerados</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $ranking->links() }}
        </div>
    </div>
</x-dashboard-layout>
