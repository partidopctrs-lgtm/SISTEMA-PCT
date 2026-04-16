<x-dashboard-layout>
    <x-slot name="title">Comunidade PCT</x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-3xl font-bold text-pct-blue mb-2">Comunidade</h1>
                <p class="text-gray-500 font-medium">Conecte-se com outros membros, compartilhe ideias e organize ações locais.</p>
            </div>
            <button class="btn-primary flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Nova Publicação
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            <!-- Sidebar: My Groups -->
            <div class="space-y-8">
                <div class="card-premium p-6">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Meus Grupos</h3>
                    <div class="space-y-4">
                        <a href="#" class="flex items-center gap-4 p-3 bg-blue-50 text-pct-blue rounded-2xl group transition-all ring-1 ring-blue-100">
                            <div class="h-10 w-10 bg-pct-blue text-white rounded-xl flex items-center justify-center font-bold">POA</div>
                            <span class="font-bold text-sm">Porto Alegre</span>
                        </a>
                        <a href="#" class="flex items-center gap-4 p-3 hover:bg-slate-50 text-gray-700 rounded-2xl group transition-all">
                            <div class="h-10 w-10 bg-slate-200 text-gray-500 rounded-xl flex items-center justify-center font-bold">RS</div>
                            <span class="font-bold text-sm">Rio Grande do Sul</span>
                        </a>
                        <a href="#" class="flex items-center gap-4 p-3 hover:bg-slate-50 text-gray-700 rounded-2xl group transition-all">
                            <div class="h-10 w-10 bg-slate-200 text-gray-500 rounded-xl flex items-center justify-center font-bold">NAC</div>
                            <span class="font-bold text-sm">Nacional</span>
                        </a>
                    </div>
                </div>

                <div class="card-premium p-6">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Tópicos em Alta</h3>
                    <div class="space-y-6">
                        <div class="group cursor-pointer">
                            <p class="text-xs font-bold text-pct-green mb-1">#LiberdadeEconômica</p>
                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-pct-blue transition-colors">Como reduzir entraves municipais...</h4>
                        </div>
                        <div class="group cursor-pointer">
                            <p class="text-xs font-bold text-pct-green mb-1">#Mobilização</p>
                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-pct-blue transition-colors">Dicas para panfletagem digital...</h4>
                        </div>
                        <div class="group cursor-pointer">
                            <p class="text-xs font-bold text-pct-green mb-1">#Eventos</p>
                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-pct-blue transition-colors">Próxima reunião em Taquara...</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Feed -->
            <div class="lg:col-span-3 space-y-8">
                @php
                    $posts = [
                        [
                            'user' => 'Marcos Vinicius',
                            'role' => 'Presidente',
                            'time' => '15 min',
                            'title' => 'Lançamento do Kit de Atividades Mensal!',
                            'content' => 'Pessoal, acabamos de liberar no painel o novo kit de atividades para o mês de Abril. Vamos focar em expandir nossa base de apoio nas cidades do interior.',
                            'likes' => 45,
                            'comments' => 12
                        ],
                        [
                            'user' => 'Ana Paula',
                            'role' => 'Líder Regional',
                            'time' => '2 horas',
                            'title' => 'Reunião do Comitê de Porto Alegre',
                            'content' => 'Excelente encontro hoje no centro da cidade. Discutimos propostas de desburocratização para pequenos negócios.',
                            'likes' => 32,
                            'comments' => 8
                        ]
                    ];
                @endphp

                @foreach($posts as $post)
                <div class="card-premium p-8">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-2xl bg-pct-blue flex items-center justify-center text-white font-black">
                                {{ substr($post['user'], 0, 1) }}
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-pct-blue">{{ $post['user'] }}</h4>
                                <p class="text-xs font-black text-pct-green uppercase tracking-widest">{{ $post['role'] }} • {{ $post['time'] }}</p>
                            </div>
                        </div>
                        <button class="text-gray-300 hover:text-pct-blue">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                        </button>
                    </div>
                    
                    <h3 class="text-2xl font-black text-gray-900 mb-4 leading-tight">{{ $post['title'] }}</h3>
                    <p class="text-gray-600 font-medium leading-relaxed mb-8">{{ $post['content'] }}</p>
                    
                    <div class="flex items-center gap-8 pt-6 border-t border-slate-50">
                        <button class="flex items-center gap-2 text-gray-400 hover:text-red-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            <span class="font-bold text-sm">{{ $post['likes'] }}</span>
                        </button>
                        <button class="flex items-center gap-2 text-gray-400 hover:text-pct-blue transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            <span class="font-bold text-sm">{{ $post['comments'] }}</span>
                        </button>
                        <button class="flex items-center gap-2 text-gray-400 hover:text-pct-green transition-colors ml-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                        </button>
                    </div>
                </div>
                @endforeach

                <div class="text-center py-10">
                    <button class="text-pct-blue font-bold hover:underline">Carregar mais publicações</button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
