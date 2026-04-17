<x-dashboard-layout>
    <x-slot name="title">Fórum Comunitário - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Fórum da Comunidade</h1>
                <p class="text-gray-500 font-medium italic">Debata problemas reais e proponha soluções liberais para o Brasil.</p>
            </div>
            <a href="{{ route('affiliate.community.create') }}" class="px-8 py-4 bg-pct-blue text-white font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Criar Novo Tópico</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar: Categories -->
            <div class="lg:col-span-1 space-y-4">
                <div class="card-premium">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Categorias</h3>
                    <div class="space-y-2">
                        @foreach(['Problema Local', 'Sugestão Liberal', 'Debate Político', 'Geral'] as $cat)
                        <a href="#" class="block px-4 py-3 bg-slate-50 rounded-xl text-[10px] font-black text-gray-400 uppercase tracking-widest hover:bg-pct-blue hover:text-white transition-all">{{ $cat }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main: Topics List -->
            <div class="lg:col-span-3 space-y-6">
                @forelse($topics as $topic)
                <a href="{{ route('affiliate.community.show', $topic->id) }}" class="block card-premium group hover:border-pct-blue transition-all">
                    <div class="flex items-start justify-between mb-4">
                        <span class="px-3 py-1 bg-blue-50 text-pct-blue text-[8px] font-black uppercase rounded-full border border-blue-100">{{ $topic->category }}</span>
                        <span class="text-[9px] text-gray-400 font-bold">{{ $topic->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="text-lg font-black text-pct-blue mb-4 group-hover:text-blue-600 transition-colors">{{ $topic->title }}</h2>
                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-slate-50">
                        <div class="flex items-center gap-3">
                            <div class="h-6 w-6 bg-slate-100 rounded-lg flex items-center justify-center text-[9px] font-black text-gray-400 uppercase">{{ substr($topic->user->name, 0, 1) }}</div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $topic->user->name }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span class="text-[10px] font-black">{{ $topic->posts_count ?? 0 }}</span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="card-premium py-20 text-center">
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Nenhum debate iniciado nesta categoria.</p>
                </div>
                @endforelse

                <div class="pt-6">
                    {{ $topics->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
