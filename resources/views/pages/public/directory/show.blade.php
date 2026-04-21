<x-public-layout>
    <x-slot name="title">PCT {{ $directory->city }} - Diretório Oficial</x-slot>

    <!-- Hero Section do Diretório -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden bg-pct-blue text-white">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-pct-green rounded-full blur-[150px] -translate-y-1/2 translate-x-1/2"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20 text-center">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 text-pct-green text-sm font-bold tracking-widest uppercase mb-8">
                Diretório Oficial de {{ $directory->city }} / {{ $directory->state }}
            </div>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">
                Movimento PCT em <span class="text-pct-green">{{ $directory->city }}</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed mb-10">
                Liderando a transformação política local através da cidadania ativa e valorização do trabalho.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('directory.register', ['subdomain' => $directory->subdomain]) }}" class="px-8 py-4 bg-pct-green text-white font-black rounded-2xl hover:scale-105 transition-transform shadow-xl shadow-pct-green/20">
                    Filie-se a este Diretório
                </a>
                <a href="{{ route('directory.login', ['subdomain' => $directory->subdomain]) }}" class="px-8 py-4 bg-white/10 text-white border border-white/20 font-bold rounded-2xl hover:bg-white/20 transition-all">
                    Área do Afiliado
                </a>
            </div>
        </div>
    </section>

    <!-- Estatísticas Locais -->
    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 bg-slate-50 rounded-[2rem] text-center">
                    <div class="text-4xl font-black text-pct-blue mb-2">{{ number_format($directory->memberships_count ?? 0, 0, ',', '.') }}</div>
                    <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">Membros Filiados</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-[2rem] text-center border-l-4 border-pct-green">
                    <div class="text-4xl font-black text-pct-blue mb-2">{{ $directory->operational_status == 'active' ? 'Ativo' : 'Em Formação' }}</div>
                    <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">Status do Diretório</p>
                </div>
                <div class="p-8 bg-slate-50 rounded-[2rem] text-center">
                    <div class="text-4xl font-black text-pct-blue mb-2">{{ $directory->founding_date ? $directory->founding_date->format('d/m/Y') : 'Fundando...' }}</div>
                    <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">Data de Fundação</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sobre o Diretório -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2">
                    <span class="text-pct-green font-black tracking-widest uppercase mb-4 block">Sobre Nós</span>
                    <h2 class="text-4xl font-black text-pct-blue mb-6">Compromisso com o Futuro de {{ $directory->city }}.</h2>
                    <div class="prose prose-lg text-slate-600 font-medium leading-relaxed mb-8">
                        <p>
                            O Diretório do PCT em {{ $directory->city }} atua como o braço oficial do movimento em nossa cidade. 
                            Nosso objetivo é organizar os cidadãos que acreditam na liberdade, no trabalho duro e na ética política para construir uma cidade mais próspera.
                        </p>
                        <p>
                            Aqui, focamos em demandas locais, fiscalização do poder público e na formação de novas lideranças que entendam a realidade do nosso povo.
                        </p>
                    </div>
                    @if($directory->address_base)
                    <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 flex items-start gap-4">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-pct-blue shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-pct-blue uppercase tracking-tight text-sm">Nossa Sede</h4>
                            <p class="text-slate-600 text-sm">{{ $directory->address_base }}, {{ $directory->address_number }} - {{ $directory->neighborhood }}</p>
                            <p class="text-slate-400 text-xs mt-1">{{ $directory->zip_code }} - {{ $directory->city }}/{{ $directory->state }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="lg:w-1/2">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-pct-blue/5 rounded-[4rem] -rotate-3"></div>
                        <div class="relative bg-white p-8 rounded-[4rem] shadow-2xl border border-slate-50">
                            <h3 class="text-2xl font-black text-pct-blue mb-8 text-center uppercase tracking-tighter">Nossa Pauta Local</h3>
                            <ul class="space-y-6">
                                <li class="flex items-center gap-4 p-4 hover:bg-slate-50 rounded-2xl transition-colors">
                                    <span class="w-10 h-10 bg-pct-green/10 text-pct-green rounded-full flex items-center justify-center font-bold">1</span>
                                    <span class="font-bold text-slate-700 uppercase text-sm tracking-tight">Liberdade para empreender em {{ $directory->city }}</span>
                                </li>
                                <li class="flex items-center gap-4 p-4 hover:bg-slate-50 rounded-2xl transition-colors">
                                    <span class="w-10 h-10 bg-pct-blue/10 text-pct-blue rounded-full flex items-center justify-center font-bold">2</span>
                                    <span class="font-bold text-slate-700 uppercase text-sm tracking-tight">Educação política para os cidadãos locais</span>
                                </li>
                                <li class="flex items-center gap-4 p-4 hover:bg-slate-50 rounded-2xl transition-colors">
                                    <span class="w-10 h-10 bg-pct-green/10 text-pct-green rounded-full flex items-center justify-center font-bold">3</span>
                                    <span class="font-bold text-slate-700 uppercase text-sm tracking-tight">Fiscalização rigorosa dos gastos públicos municipais</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Diretoria -->
    <section id="diretoria" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-pct-green font-black tracking-widest uppercase mb-4 block">Lideranças</span>
                <h2 class="text-4xl font-black text-pct-blue tracking-tighter">Diretoria Executiva</h2>
                <div class="h-1.5 w-20 bg-pct-green mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $lideres = [
                        ['Presidente', $directory->president],
                        ['Vice-Presidente', $directory->vicePresident],
                        ['Secretário', $directory->secretary],
                        ['Tesoureiro', $directory->treasurer]
                    ];
                @endphp

                @foreach($lideres as $l)
                <div class="bg-white p-8 rounded-[3rem] shadow-xl shadow-pct-blue/5 border border-white text-center group hover:-translate-y-2 transition-all">
                    <div class="w-24 h-24 bg-slate-100 rounded-full mx-auto mb-6 overflow-hidden border-4 border-white shadow-inner flex items-center justify-center text-pct-blue/20">
                        @if($l[1] && $l[1]->photo)
                            <img src="{{ asset('storage/' . $l[1]->photo) }}" alt="{{ $l[1]->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                        @endif
                    </div>
                    <h4 class="text-xs font-black text-pct-green uppercase tracking-widest mb-1">{{ $l[0] }}</h4>
                    <p class="font-bold text-pct-blue text-lg uppercase tracking-tight">{{ $l[1] ? $l[1]->name : 'A definir' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contato e Redes -->
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-black text-pct-blue mb-12 uppercase tracking-tighter">Fale com o Diretório</h2>
            <div class="flex flex-wrap justify-center gap-12">
                @if($directory->whatsapp_contact)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $directory->whatsapp_contact) }}" target="_blank" class="flex items-center gap-3 text-slate-600 hover:text-pct-green font-bold transition-colors">
                    <div class="w-12 h-12 bg-pct-green/10 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </div>
                    <span>{{ $directory->whatsapp_contact }}</span>
                </a>
                @endif
                @if($directory->email_official)
                <a href="mailto:{{ $directory->email_official }}" class="flex items-center gap-3 text-slate-600 hover:text-pct-blue font-bold transition-colors">
                    <div class="w-12 h-12 bg-pct-blue/10 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <span>{{ $directory->email_official }}</span>
                </a>
                @endif
            </div>
        </div>
    </section>

</x-public-layout>
