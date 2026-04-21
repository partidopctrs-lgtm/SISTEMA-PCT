<x-public-layout>
    <x-slot name="title">Água é um Direito - Movimento PCT RS</x-slot>

    <!-- 🟥 1. Cabeçalho -->
    <section class="relative py-24 bg-pct-blue overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" preserveAspectRatio="none" viewBox="0 0 100 100" fill="none">
                <path d="M0 50 Q 25 25, 50 50 T 100 50" stroke="white" stroke-width="2" fill="none"/>
                <path d="M0 60 Q 25 35, 50 60 T 100 60" stroke="white" stroke-width="1" fill="none"/>
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block px-4 py-1.5 bg-pct-green text-white text-[10px] font-black rounded-full uppercase tracking-[0.3em] mb-6 animate-bounce">Ação Emergencial RS</span>
            <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tighter uppercase leading-none">
                Movimento pela <br><span class="text-pct-green underline">Água no RS</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-2xl mx-auto font-medium leading-relaxed mb-10">
                O problema da água no RS vai além da falta. Qualidade, tratamento e abastecimento estão em risco. Sua cidade precisa ser ouvida.
            </p>
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <a href="#relatar" class="px-10 py-5 bg-white text-pct-blue rounded-2xl font-black uppercase tracking-widest hover:bg-pct-green hover:text-white transition-all shadow-2xl shadow-black/20">
                    Relatar problema na minha cidade
                </a>
            </div>
        </div>
    </section>

    <!-- 🗺️ 2. Painel público (impacto) -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass p-8 rounded-3xl text-center border-t-4 border-pct-blue">
                    <p class="text-slate-500 font-bold uppercase tracking-widest text-xs mb-2">Cidades Afetadas</p>
                    <h3 class="text-5xl font-black text-pct-blue tracking-tighter">{{ $stats['cities_affected'] }}</h3>
                </div>
                <div class="glass p-8 rounded-3xl text-center border-t-4 border-pct-green">
                    <p class="text-slate-500 font-bold uppercase tracking-widest text-xs mb-2">Relatos Recebidos</p>
                    <h3 class="text-5xl font-black text-pct-green tracking-tighter">{{ $stats['total_reports'] }}</h3>
                </div>
                <div class="glass p-8 rounded-3xl text-center border-t-4 border-blue-400">
                    <p class="text-slate-500 font-bold uppercase tracking-widest text-xs mb-2">Relatos Hoje</p>
                    <h3 class="text-5xl font-black text-blue-400 tracking-tighter">{{ \App\Models\WaterReport::whereDate('created_at', today())->count() }}</h3>
                </div>
            </div>
            
            <!-- Tipos de Problema -->
            <div class="mt-12 flex flex-wrap justify-center gap-4">
                @foreach($stats['types'] as $type)
                    <span class="px-4 py-2 bg-slate-50 text-slate-600 rounded-xl text-xs font-bold border border-slate-100 shadow-sm">
                        {{ $type->problem_type }}: <strong>{{ $type->count }}</strong>
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 📋 3. Formulário -->
    <section id="relatar" class="py-24 bg-slate-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-10 md:p-16 rounded-[3rem] shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-pct-blue/5 rounded-full -mr-16 -mt-16"></div>
                
                <div class="relative z-10">
                    <h2 class="text-4xl font-black text-pct-blue mb-2 tracking-tighter uppercase">Enviar Relato</h2>
                    <p class="text-slate-500 mb-10 font-medium italic">Sua denúncia será usada para cobrar soluções das autoridades.</p>

                    @if(session('success'))
                        <div class="mb-8 p-6 bg-emerald-50 border border-emerald-100 rounded-3xl text-pct-green font-bold text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('campaign.water.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Seu Nome</label>
                                <input type="text" name="name" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700" placeholder="Nome completo">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Cidade</label>
                                <input type="text" name="city" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700" placeholder="Ex: Porto Alegre">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Bairro</label>
                                <input type="text" name="neighborhood" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700" placeholder="Ex: Menino Deus">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Tipo de Problema</label>
                                <select name="problem_type" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700 appearance-none">
                                    <option value="">Selecione...</option>
                                    <option value="Falta de Água Total">Falta de Água Total</option>
                                    <option value="Água Suja/Turva">Água Suja/Turva</option>
                                    <option value="Baixa Pressão">Baixa Pressão</option>
                                    <option value="Vazamento na Rua">Vazamento na Rua</option>
                                    <option value="Rodízio sem Aviso">Rodízio sem Aviso</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Descrição do Problema</label>
                                <textarea name="description" rows="4" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700" placeholder="Conte o que está acontecendo..."></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Data do Ocorrido</label>
                                <input type="date" name="event_date" value="{{ date('Y-m-d') }}" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Celular/WhatsApp</label>
                                <input type="text" name="contact" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700" placeholder="(00) 00000-0000">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Foto da Situação (Opcional)</label>
                                <input type="file" name="photo" class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700">
                            </div>
                        </div>

                        <button type="submit" class="w-full py-6 bg-pct-blue text-white rounded-3xl font-black uppercase tracking-[0.2em] shadow-2xl shadow-pct-blue/30 hover:bg-blue-900 transition-all transform hover:scale-[1.02]">
                            Enviar Relato Agora
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- 📢 4. Chamada política -->
    <section class="py-24 bg-pct-green text-white text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-6xl font-black mb-8 uppercase tracking-tighter leading-none">Junte-se ao movimento e fortaleça essa luta</h2>
            <p class="text-xl text-emerald-50 mb-12 font-medium">Não aceite o descaso. Organize-se para transformar a realidade da sua cidade.</p>
            <a href="{{ route('register.index') }}" class="inline-block px-12 py-6 bg-white text-pct-green rounded-2xl font-black uppercase tracking-widest hover:bg-pct-blue hover:text-white transition-all shadow-2xl">
                Quero fazer parte do PCT
            </a>
        </div>
    </section>
</x-public-layout>
