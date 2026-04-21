<x-dashboard-layout>
    <x-slot name="title">Novo Tópico - Comunidade PCT</x-slot>

    <div class="max-w-3xl mx-auto pb-20">
        <div class="mb-10">
            <h1 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Iniciar Conversa</h1>
            <p class="text-gray-500 font-medium">Sua voz é o motor da nossa mobilização. Compartilhe o que está acontecendo na sua região.</p>
        </div>

        <form action="{{ route('affiliate.forum.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="bg-white p-8 md:p-12 rounded-[3.5rem] border border-slate-100 shadow-xl space-y-8">
                <!-- Category and City -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Categoria</label>
                        <select name="forum_category_id" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all appearance-none">
                            <option value="">Selecione...</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Sua Cidade</label>
                        <input type="text" name="city" required value="{{ auth()->user()->city }}" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Ex: Porto Alegre">
                    </div>
                </div>

                <!-- Title -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Título do Tópico</label>
                    <input type="text" name="title" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-black text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Resuma o assunto em poucas palavras...">
                </div>

                <!-- Content -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Conteúdo da Postagem</label>
                    <textarea name="content" rows="8" required class="w-full bg-slate-50 border border-slate-100 rounded-[2.5rem] px-8 py-6 text-sm font-medium text-gray-700 focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Descreva sua dúvida, denúncia ou proposta de ação..."></textarea>
                </div>
            </div>

            <div class="flex items-center justify-between px-8">
                <a href="{{ route('affiliate.forum.index') }}" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-pct-blue transition-all">Cancelar</a>
                <button type="submit" class="px-12 py-5 bg-pct-blue text-white rounded-[2rem] font-black uppercase text-xs tracking-[0.2em] hover:bg-blue-900 transition-all shadow-2xl shadow-blue-900/40 transform hover:-translate-y-1 active:scale-95">
                    🚀 Publicar na Comunidade
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
