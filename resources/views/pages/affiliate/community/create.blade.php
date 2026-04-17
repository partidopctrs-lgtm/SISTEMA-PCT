<x-dashboard-layout>
    <x-slot name="title">Novo Tópico - PCT</x-slot>

    <div class="max-w-4xl mx-auto py-12 px-4">
        <div class="mb-12">
            <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2 uppercase">Propor Novo Debate</h1>
            <p class="text-gray-500 font-medium">Contribua com soluções reais para os problemas da sua região.</p>
        </div>

        <form action="{{ route('affiliate.community.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="card-premium">
                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-3">Título do Tópico</label>
                        <input type="text" name="title" required placeholder="Ex: Problema com Iluminação Pública no Bairro X" class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold outline-none focus:ring-2 focus:ring-pct-blue">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-3">Categoria</label>
                        <select name="category" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold outline-none focus:ring-2 focus:ring-pct-blue">
                            <option value="Problema Local">Problema Local</option>
                            <option value="Sugestão Liberal">Sugestão Liberal</option>
                            <option value="Debate Político">Debate Político</option>
                            <option value="Geral">Geral</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-3">Descrição / Solução Sugerida</label>
                        <textarea name="content" required rows="10" placeholder="Descreva o problema e como você acredita que os princípios do PCT poderiam resolvê-lo..." class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold outline-none focus:ring-2 focus:ring-pct-blue"></textarea>
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <a href="{{ route('affiliate.community.index') }}" class="flex-1 py-6 bg-white border border-slate-200 text-gray-500 font-black rounded-[1.5rem] text-xs uppercase tracking-widest text-center hover:bg-slate-50 transition-all">Cancelar</a>
                <button type="submit" class="flex-[2] py-6 bg-pct-blue text-white font-black rounded-[1.5rem] text-sm uppercase tracking-[0.2em] shadow-lg shadow-blue-900/20 hover:bg-blue-900 transition-all">Publicar no Fórum (+300 pts)</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
