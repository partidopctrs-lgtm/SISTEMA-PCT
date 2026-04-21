<x-dashboard-layout>
    <x-slot name="title">{{ $topic->title }} - Comunidade PCT</x-slot>

    <div class="mb-8">
        <a href="{{ route('affiliate.forum.index') }}" class="flex items-center gap-2 text-xs font-black text-gray-400 uppercase tracking-widest hover:text-pct-blue transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Voltar para a Comunidade
        </a>
    </div>

    <div class="max-w-4xl mx-auto space-y-8 pb-20">
        <!-- Main Topic -->
        <div class="bg-white p-8 md:p-12 rounded-[3.5rem] border border-slate-100 shadow-xl">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-pct-blue font-black text-lg border border-blue-100">
                    {{ substr($topic->user->name, 0, 1) }}
                </div>
                <div>
                    <h4 class="text-sm font-black text-pct-blue uppercase tracking-tight">{{ $topic->user->name }}</h4>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $topic->city }} • {{ $topic->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="ml-auto">
                    <span class="px-3 py-1 bg-blue-50 text-pct-blue text-[9px] font-black uppercase rounded-full tracking-widest">{{ $topic->category->name }}</span>
                </div>
            </div>

            <h1 class="text-2xl md:text-3xl font-black text-pct-blue leading-tight mb-6 uppercase tracking-tighter">{{ $topic->title }}</h1>
            
            <div class="prose prose-slate max-w-none mb-10">
                <p class="text-gray-600 font-medium leading-relaxed whitespace-pre-line">{{ $topic->content }}</p>
            </div>

            <div class="flex items-center gap-6 pt-8 border-t border-slate-50">
                <form action="{{ route('affiliate.forum.like', $topic->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-6 py-2.5 rounded-full border {{ $topic->likes->where('user_id', auth()->id())->count() ? 'bg-red-50 border-red-100 text-red-500' : 'bg-slate-50 border-slate-100 text-slate-400' }} hover:scale-105 transition-all">
                        <svg class="w-5 h-5 {{ $topic->likes->where('user_id', auth()->id())->count() ? 'fill-current' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        <span class="text-xs font-black uppercase">{{ $topic->likes_count }} Apoios</span>
                    </button>
                </form>
                <div class="flex items-center gap-2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    <span class="text-xs font-black uppercase">{{ $topic->comments_count }} Respostas</span>
                </div>
            </div>
        </div>

        <!-- Comments Thread -->
        <div class="space-y-6">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-[0.2em] ml-8">Discussão Coletiva</h3>
            
            @foreach($topic->comments as $comment)
            <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm ml-8 relative group">
                <div class="absolute -left-12 top-8 w-8 h-0.5 bg-slate-100"></div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-xl bg-slate-50 flex items-center justify-center text-[10px] font-black text-pct-blue border border-slate-100">
                        {{ substr($comment->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-pct-blue uppercase">{{ $comment->user->name }}</p>
                        <p class="text-[8px] text-gray-400 font-bold">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600 font-medium leading-relaxed">{{ $comment->content }}</p>
            </div>
            @endforeach

            <!-- Reply Form -->
            <div class="bg-slate-50 p-8 rounded-[3rem] border border-slate-200 mt-12 ml-8">
                <form action="{{ route('affiliate.forum.comment', $topic->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 rounded-full bg-pct-blue text-white flex items-center justify-center text-[10px] font-black">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <span class="text-[10px] font-black text-pct-blue uppercase tracking-widest">Sua Resposta</span>
                    </div>
                    <textarea name="content" rows="4" required class="w-full bg-white border border-slate-200 rounded-[2rem] px-6 py-4 text-sm font-medium text-gray-700 focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Contribua com a organização popular..."></textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="px-8 py-3 bg-pct-blue text-white rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Publicar Resposta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
