<x-dashboard-layout>
    <x-slot name="title">Moderação da Comunidade - Admin PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Moderação da Comunidade</h1>
            <p class="text-gray-500 font-medium tracking-wide">Monitore discussões, posts e garanta o cumprimento do código de ética no feed.</p>
        </div>
        <div class="flex space-x-2">
            <span class="px-4 py-2 bg-red-50 text-red-600 rounded-xl text-xs font-black uppercase tracking-widest border border-red-100">8 Denúncias Pendentes</span>
        </div>
    </div>

    <!-- Stats & Filters -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="glass p-6 rounded-3xl flex items-center space-x-4">
            <div class="p-3 bg-pct-blue/10 text-pct-blue rounded-2xl leading-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Posts Hoje</p>
                <p class="text-2xl font-black text-pct-blue">142</p>
            </div>
        </div>
        <div class="glass p-6 rounded-3xl flex items-center space-x-4">
            <div class="p-3 bg-pct-green/10 text-pct-green rounded-2xl leading-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Membros Ativos</p>
                <p class="text-2xl font-black text-pct-blue">2.840</p>
            </div>
        </div>
        <div class="glass p-6 rounded-3xl flex items-center space-x-4">
            <div class="p-3 bg-amber-100 text-amber-600 rounded-2xl leading-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Sinalizações</p>
                <p class="text-2xl font-black text-pct-blue">15</p>
            </div>
        </div>
    </div>

    <!-- Management Feed -->
    <div class="glass p-8 rounded-[2rem] shadow-sm">
        <h3 class="font-black text-pct-blue uppercase tracking-widest mb-8">Auditoria de Feed</h3>
        <div class="space-y-6">
            @foreach([
                ['user' => 'Carlos Ferreira', 'content' => 'Alguém tem o PDF do manifesto atualizado?', 'reports' => 0, 'status' => 'Regular'],
                ['user' => 'Anônimo (Sinalizado)', 'content' => 'Mensagem contendo palavras ofensivas ou spam detectado pelo filtro automático.', 'reports' => 3, 'status' => 'Risco'],
                ['user' => 'Beatriz Souza', 'content' => 'Live de hoje foi incrível, precisamos focar no núcleo de PoA!', 'reports' => 0, 'status' => 'Regular'],
            ] as $post)
            <div class="p-6 {{ $post['status'] === 'Risco' ? 'bg-red-50/50 border-red-100' : 'bg-white/40 border-gray-100' }} border rounded-3xl hover:shadow-lg transition-all group">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-pct-blue/10 flex items-center justify-center font-bold text-xs text-pct-blue uppercase">
                            {{ substr($post['user'], 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-black text-pct-blue">{{ $post['user'] }}</p>
                            <p class="text-[10px] text-gray-400 font-medium">Postado há 15 min</p>
                        </div>
                    </div>
                    @if($post['status'] === 'Risco')
                        <span class="px-3 py-1 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-lg">Suspender Post</span>
                    @endif
                </div>
                <p class="text-sm font-medium text-pct-blue/80 mb-6 leading-relaxed">{{ $post['content'] }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex space-x-4">
                         <button class="text-[10px] font-black text-gray-400 hover:text-pct-blue uppercase flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            <span>Deletar</span>
                         </button>
                         @if($post['reports'] > 0)
                            <span class="text-[10px] font-black text-red-500 uppercase flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                <span>{{ $post['reports'] }} Denúncias</span>
                            </span>
                         @endif
                    </div>
                    <button class="text-xs font-black text-pct-blue hover:underline">Ver Tópico Completo</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
