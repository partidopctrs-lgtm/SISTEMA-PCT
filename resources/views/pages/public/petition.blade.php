<x-public-layout>
    <x-slot name="title">Abaixo-Assinado SNDAH 2026 - Pressione por Água de Qualidade</x-slot>

    <!-- Hero / Intro -->
    <section class="relative py-24 bg-pct-blue overflow-hidden text-white">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" preserveAspectRatio="none" viewBox="0 0 100 100" fill="none">
                <path d="M0 50 Q 25 25, 50 50 T 100 50" stroke="white" stroke-width="2" fill="none"/>
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block px-4 py-1.5 bg-pct-green text-white text-[10px] font-black rounded-full uppercase tracking-[0.3em] mb-6">Mobilização Nacional</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter uppercase leading-none">
                Abaixo-Assinado <br><span class="text-pct-green underline">SNDAH 2026</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto font-medium leading-relaxed mb-10">
                Estamos pressionando os políticos para que aprovem o Sistema Nacional Descentralizado de Abastecimento Hídrico. Sua assinatura é a voz que exige água limpa e gestão municipal forte.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto mt-16">
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/10">
                    <h3 class="text-4xl font-black text-pct-green mb-1">{{ number_format($stats['total'], 0, ',', '.') }}</h3>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-60">Cidadãos Assinaram</p>
                </div>
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/10">
                    <h3 class="text-4xl font-black text-white mb-1">500k</h3>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-60">Meta Inicial</p>
                </div>
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/10">
                    <h3 class="text-4xl font-black text-blue-300 mb-1">2026</h3>
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-60">Ano da Mudança</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-24 bg-slate-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16 items-start">
                
                <!-- Content / Pressure Text -->
                <div class="w-full lg:w-1/2 space-y-8">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-amber-50 text-amber-700 rounded-full text-[10px] font-black uppercase tracking-widest border border-amber-100">
                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                        Pressione o Poder Público
                    </div>
                    <h2 class="text-4xl font-black text-pct-blue leading-tight uppercase tracking-tighter">
                        Por que assinar este manifesto?
                    </h2>
                    <div class="prose prose-lg text-slate-600 font-medium leading-relaxed space-y-6">
                        <p>
                            Políticos só agem quando sentem a pressão popular. O SNDAH retira o poder das grandes concessionárias ineficientes e devolve aos prefeitos e cidadãos a gestão da própria água.
                        </p>
                        <ul class="space-y-4 list-none p-0">
                            <li class="flex items-start gap-4">
                                <div class="mt-1 w-6 h-6 bg-pct-green/20 text-pct-green rounded-full flex items-center justify-center shrink-0">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </div>
                                <span><strong>Fim do Monopólio:</strong> Acabar com o domínio de empresas que cobram caro e entregam lama.</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 w-6 h-6 bg-pct-green/20 text-pct-green rounded-full flex items-center justify-center shrink-0">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </div>
                                <span><strong>Qualidade Garantida:</strong> Multas pesadas para quem fornecer água fora dos padrões.</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 w-6 h-6 bg-pct-green/20 text-pct-green rounded-full flex items-center justify-center shrink-0">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </div>
                                <span><strong>Transparência:</strong> Dados de qualidade da água abertos para fiscalização em tempo real.</span>
                            </li>
                        </ul>
                        <div class="p-8 bg-white rounded-[2rem] border-l-8 border-pct-blue shadow-xl shadow-slate-200/50">
                            <p class="text-sm font-bold italic text-slate-500">
                                "Não é apenas uma assinatura. É um comando do povo brasileiro: queremos água limpa, gestão local e respeito com nosso dinheiro."
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-white p-10 md:p-16 rounded-[4rem] shadow-2xl border border-slate-100 relative">
                        <h3 class="text-3xl font-black text-pct-blue mb-2 uppercase tracking-tight">Assinar Abaixo-Assinado</h3>
                        <p class="text-slate-400 font-medium mb-10 italic">Seus dados estão seguros e serão usados apenas para validar o apoio.</p>

                        @if(session('success'))
                            <div class="mb-8 p-6 bg-emerald-50 border border-emerald-100 rounded-3xl text-pct-green font-bold text-center animate-bounce">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-8 p-6 bg-red-50 border border-red-100 rounded-3xl text-red-600 font-bold text-sm">
                                <ul class="list-disc pl-4">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('petition.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Nome Completo</label>
                                <input type="text" name="name" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold" placeholder="Digite seu nome">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">E-mail</label>
                                <input type="email" name="email" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold" placeholder="seu@email.com">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Cidade</label>
                                    <input type="text" name="city" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold" placeholder="Sua cidade">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Estado (UF)</label>
                                    <select name="state" required class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold appearance-none">
                                        <option value="RS">RS - Rio Grande do Sul</option>
                                        <option value="SC">SC - Santa Catarina</option>
                                        <option value="PR">PR - Paraná</option>
                                        <option value="SP">SP - São Paulo</option>
                                        <option value="RJ">RJ - Rio de Janeiro</option>
                                        <option value="MG">MG - Minas Gerais</option>
                                        <option value="ES">ES - Espírito Santo</option>
                                        <option value="MT">MT - Mato Grosso</option>
                                        <option value="MS">MS - Mato Grosso do Sul</option>
                                        <option value="GO">GO - Goiás</option>
                                        <option value="DF">DF - Distrito Federal</option>
                                        <option value="BA">BA - Bahia</option>
                                        <option value="PE">PE - Pernambuco</option>
                                        <option value="CE">CE - Ceará</option>
                                        <option value="RN">RN - Rio Grande do Norte</option>
                                        <option value="PB">PB - Paraíba</option>
                                        <option value="AL">AL - Alagoas</option>
                                        <option value="SE">SE - Sergipe</option>
                                        <option value="MA">MA - Maranhão</option>
                                        <option value="PI">PI - Piauí</option>
                                        <option value="PA">PA - Pará</option>
                                        <option value="AM">AM - Amazonas</option>
                                        <option value="TO">TO - Tocantins</option>
                                        <option value="RO">RO - Rondônia</option>
                                        <option value="AC">AC - Acre</option>
                                        <option value="RR">RR - Roraima</option>
                                        <option value="AP">AP - Amapá</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">WhatsApp (Opcional)</label>
                                    <input type="text" name="whatsapp" class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold" placeholder="(00) 00000-0000">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">CPF (Opcional)</label>
                                    <input type="text" name="cpf" class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold" placeholder="000.000.000-00">
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full py-6 bg-pct-blue text-white rounded-[2.5rem] font-black uppercase tracking-[0.2em] shadow-2xl shadow-pct-blue/30 hover:bg-blue-900 transition-all transform hover:scale-[1.02]">
                                Registrar Minha Assinatura
                            </button>

                            <p class="text-[9px] text-slate-400 text-center font-bold uppercase leading-relaxed pt-4">
                                Ao assinar, você autoriza o Movimento PCT a usar esta adesão para fins de pressão política e legislativa em favor do SNDAH 2026.
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Real-time Support -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-pct-green font-black uppercase tracking-widest text-xs">Cidades Engajadas</span>
                <h2 class="text-4xl font-black text-pct-blue mt-4 uppercase tracking-tighter">Quem está liderando a pressão?</h2>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @foreach($stats['by_city'] as $city)
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 text-center">
                        <p class="text-xs font-black text-pct-blue uppercase tracking-tight mb-1">{{ $city->city }}</p>
                        <p class="text-2xl font-black text-pct-green">{{ number_format($city->count, 0, ',', '.') }}</p>
                        <p class="text-[8px] font-bold text-slate-400 uppercase">Assinaturas</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-public-layout>
