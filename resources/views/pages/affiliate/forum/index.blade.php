<x-dashboard-layout>
    <x-slot name="title">Comunidade PCT - Mobilização Popular</x-slot>

    <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h1 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Comunidade PCT</h1>
            <p class="text-gray-500 font-medium">O espaço para trocar experiências, organizar ações e denunciar abusos.</p>
        </div>
        <a href="{{ route('affiliate.forum.create') }}" class="px-8 py-4 bg-pct-blue text-white rounded-[2rem] font-black uppercase text-xs tracking-widest hover:bg-blue-900 transition-all shadow-xl shadow-blue-900/20 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Criar Novo Tópico
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar: Categories & Stats -->
        <div class="lg:col-span-1 space-y-8">
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Categorias</h3>
                <nav class="space-y-2">
                    @foreach($categories as $cat)
                    <a href="{{ route('affiliate.forum.index', ['category' => $cat->id]) }}" class="flex items-center justify-between px-4 py-3 rounded-xl hover:bg-blue-50 transition-all group">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-pct-blue">{{ $cat->name }}</span>
                        <span class="bg-slate-100 text-[10px] font-black text-slate-400 px-2 py-0.5 rounded-full group-hover:bg-pct-blue group-hover:text-white">{{ $cat->topics_count }}</span>
                    </a>
                    @endforeach
                </nav>
            </div>

            <div class="bg-pct-blue p-8 rounded-[2.5rem] text-white shadow-2xl shadow-blue-900/30">
                <h3 class="text-xs font-black uppercase tracking-widest mb-6 opacity-60">Cidades Ativas</h3>
                <div class="space-y-4">
                    @php
                        $activeCities = \App\Models\ForumTopic::select('city', \DB::raw('count(*) as count'))
                            ->groupBy('city')
                            ->orderByDesc('count')
                            ->limit(5)
                            ->get();
                    @endphp
                    @foreach($activeCities as $city)
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase">{{ $city->city }}</span>
                        <span class="text-[10px] font-black opacity-40">{{ $city->count }} posts</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Feed: Topics List -->
        <div class="lg:col-span-3 space-y-6">
            @forelse($topics as $topic)
            <div class="bg-white p-6 md:p-8 rounded-[3rem] border border-slate-100 shadow-sm hover:shadow-xl hover:border-blue-100 transition-all group relative">
                <div class="flex items-start gap-6">
                    <!-- User Avatar -->
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-pct-blue font-black border border-slate-100 shadow-sm">
                            {{ substr($topic->user->name, 0, 1) }}
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-grow min-w-0">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-2 py-0.5 bg-blue-50 text-pct-blue text-[8px] font-black uppercase rounded">{{ $topic->category->name }}</span>
                            <span class="text-[9px] text-gray-400 font-bold uppercase tracking-widest">{{ $topic->city }}</span>
                            <span class="text-[9px] text-slate-300 font-medium">• {{ $topic->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="text-lg md:text-xl font-black text-pct-blue mb-3 group-hover:text-blue-600 transition-colors">
                            <a href="{{ route('affiliate.forum.show', $topic->id) }}" class="after:absolute after:inset-0">
                                {{ $topic->title }}
                            </a>
                        </h2>
                        <p class="text-sm text-gray-500 font-medium line-clamp-2 leading-relaxed mb-6">{{ $topic->content }}</p>

                        <!-- Engagement Bar -->
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                <span class="text-[10px] font-black text-slate-400">{{ $topic->likes_count }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                <span class="text-[10px] font-black text-slate-400">{{ $topic->comments_count }} respostas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white p-20 rounded-[3rem] border-2 border-dashed border-slate-100 text-center">
                <p class="text-sm font-black text-slate-300 uppercase tracking-widest">Nenhuma conversa iniciada nesta categoria ainda.</p>
                <a href="{{ route('affiliate.forum.create') }}" class="inline-block mt-4 text-xs font-black text-pct-blue uppercase hover:underline">Seja o primeiro a postar!</a>
            </div>
            @endforelse

            <div class="pt-6">
                {{ $topics->links() }}
            </div>
        </div>
    </div>
</x-dashboard-layout>
