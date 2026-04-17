<x-dashboard-layout>
    <x-slot name="title">{{ $topic->title }} - Fórum PCT</x-slot>

    <div class="max-w-4xl mx-auto py-8 px-4">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 mb-8 text-[10px] font-black uppercase tracking-widest text-gray-400">
            <a href="{{ route('affiliate.community.index') }}" class="hover:text-pct-blue transition-colors">Fórum</a>
            <span>/</span>
            <span class="text-pct-blue">{{ $topic->category }}</span>
        </div>

        <!-- Topic Main Post -->
        <div class="card-premium mb-8">
            <h1 class="text-2xl md:text-3xl font-black text-pct-blue tracking-tight mb-6">{{ $topic->title }}</h1>
            
            <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
                <div class="h-10 w-10 bg-pct-blue rounded-xl flex items-center justify-center text-white font-black text-lg">{{ substr($topic->user->name, 0, 1) }}</div>
                <div>
                    <p class="text-sm font-bold text-gray-900">{{ $topic->user->name }}</p>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $topic->created_at->format('d/m/Y \à\s H:i') }}</p>
                </div>
            </div>

            <div class="prose prose-slate max-w-none text-gray-700 leading-relaxed font-medium">
                {!! nl2br(e($topic->content)) !!}
            </div>
        </div>

        <!-- Responses / Posts -->
        <h3 class="text-lg font-black text-pct-blue uppercase tracking-widest mb-6 border-l-4 border-pct-green pl-3">Respostas ({{ $topic->posts->count() }})</h3>
        
        <div class="space-y-6 mb-12">
            @forelse($topic->posts as $post)
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 bg-slate-100 rounded-lg flex items-center justify-center text-gray-500 font-black text-xs">{{ substr($post->user->name, 0, 1) }}</div>
                        <p class="text-xs font-bold text-gray-900">{{ $post->user->name }}</p>
                    </div>
                    <span class="text-[9px] text-gray-400 font-bold uppercase tracking-widest">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <div class="text-sm text-gray-600 leading-relaxed pl-11">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
            @empty
            <div class="text-center py-10">
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Nenhuma resposta ainda. Seja o primeiro a debater!</p>
            </div>
            @endforelse
        </div>

        <!-- Reply Form -->
        <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100">
            <form action="{{ route('affiliate.community.post.store', $topic->id) }}" method="POST">
                @csrf
                <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-4">Sua Resposta</h4>
                <textarea name="content" required rows="4" placeholder="Escreva sua contribuição para o debate..." class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm font-medium outline-none focus:ring-2 focus:ring-pct-blue mb-4"></textarea>
                <div class="flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-pct-blue text-white font-black rounded-xl text-[10px] uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Enviar Resposta</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
