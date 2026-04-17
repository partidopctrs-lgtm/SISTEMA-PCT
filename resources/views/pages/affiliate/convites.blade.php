<x-dashboard-layout>
    <x-slot name="title">Convites & Indicações - PCT</x-slot>

    <div class="max-w-5xl mx-auto">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Convites e Indicações</h1>
            <p class="text-gray-500">Ajude o PCT a crescer compartilhando sua visão com quem você confia.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Invite Link Section -->
            <div class="lg:col-span-2 space-y-8">
                <div class="card-premium relative overflow-hidden bg-gradient-to-br from-white to-pct-green/5">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold text-pct-blue mb-4">Seu Link de Convite Personalizado</h3>
                        <p class="text-sm text-gray-500 mb-8">Todos que se cadastrarem através deste link serão vinculados à sua rede de mobilização.</p>
                        
                        <div class="flex flex-col sm:flex-row items-stretch gap-4">
                            <input type="text" id="inviteLink" readonly value="https://pct.org.br/unir/{{ auth()->user()->id }}" class="flex-grow bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-blue-900 font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                            <button onclick="copyLink()" class="btn-primary flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 00-2 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                Copiar Link
                            </button>
                        </div>
                        
                        <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-6">
                            @php
                                $stats = [
                                    ['Cliques', '152', 'pct-blue'],
                                    ['Cadastros', '24', 'pct-green'],
                                    ['Aprovados', '18', 'pct-blue'],
                                    ['Pontos Ganhos', '1.800', 'yellow-500']
                                ];
                            @endphp
                            @foreach($stats as $s)
                                <div>
                                    <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1">{{ $s[0] }}</p>
                                    <p class="text-2xl font-black text-{{ $s[2] }}">{{ $s[1] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Cadastro Manual (Ficha de Campo) -->
                <div class="card-premium bg-gradient-to-r from-pct-blue to-blue-900 border-0 mb-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Ficha de Campo (Cadastro Manual)</h3>
                            <p class="text-xs text-blue-200">Cadastre um novo filiado agora mesmo. A senha gerada será os 6 primeiros dígitos do CPF.</p>
                        </div>
                    </div>
                    <form action="{{ route('affiliate.convites.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black text-blue-200 uppercase tracking-widest mb-2">Nome Completo</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300/50 text-sm focus:outline-none focus:ring-2 focus:ring-pct-green" placeholder="Ex: João da Silva">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-blue-200 uppercase tracking-widest mb-2">CPF</label>
                                <input type="text" name="cpf" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300/50 text-sm focus:outline-none focus:ring-2 focus:ring-pct-green" placeholder="Ex: 000.000.000-00">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-blue-200 uppercase tracking-widest mb-2">Email</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300/50 text-sm focus:outline-none focus:ring-2 focus:ring-pct-green" placeholder="Ex: joao@email.com">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-blue-200 uppercase tracking-widest mb-2">WhatsApp</label>
                                <input type="text" name="phone" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-300/50 text-sm focus:outline-none focus:ring-2 focus:ring-pct-green" placeholder="Ex: (00) 90000-0000">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-black text-blue-200 uppercase tracking-widest mb-2">Ficha de Filiação (Obrigatório)</label>
                                <input type="file" name="document" accept=".pdf,.doc,.docx" required class="w-full px-4 py-3 bg-white/5 border border-white/20 border-dashed rounded-xl text-blue-200 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-pct-green file:text-white hover:file:bg-emerald-600 focus:outline-none cursor-pointer">
                                <p class="text-[9px] text-blue-300 mt-2">* Envie a ficha escaneada ou preenchida em PDF/DOCX. Este documento ficará arquivado no comitê para controle nacional.</p>
                            </div>
                        </div>
                        <div class="pt-2 text-right">
                            <button type="submit" class="px-8 py-3 bg-pct-green text-white font-black rounded-xl text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-600/20">Cadastrar e Enviar Ficha</button>
                        </div>
                    </form>
                </div>

                <!-- Recent Referrals -->
                <div class="card-premium">
                    <h3 class="text-xl font-bold text-pct-blue mb-8">Quem entrou pelo seu convite</h3>
                    <div class="space-y-4">
                        @forelse($myReferrals as $ref)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-lg hover:shadow-pct-blue/5 transition-all group">
                            <div class="flex items-center gap-4">
                                <div class="h-10 w-10 rounded-full bg-pct-blue/10 flex items-center justify-center text-pct-blue font-bold">
                                    {{ substr($ref->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">{{ $ref->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $ref->city ?? 'Sem Cidade' }}</p>
                                </div>
                            </div>
                            <span class="text-xs font-medium text-gray-400">{{ $ref->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                        <div class="text-center py-6">
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Você ainda não possui indicações.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Gamification / Ranking -->
            <div class="space-y-8">
                <div class="card-premium bg-pct-blue text-white overflow-hidden relative">
                    <div class="relative z-10">
                        <h3 class="text-xl font-black mb-6">Próxima Recompensa</h3>
                        <div class="flex flex-col items-center mb-6">
                            <div class="w-32 h-32 rounded-full border-8 border-pct-green/20 flex items-center justify-center relative">
                                <svg class="w-16 h-16 text-pct-green" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2z"></path></svg>
                                <div class="absolute inset-0 border-8 border-pct-green rounded-full border-t-transparent -rotate-45"></div>
                            </div>
                            <p class="mt-4 font-bold">Patrono Bronze</p>
                            <p class="text-xs opacity-60">Indique mais 6 pessoas</p>
                        </div>
                        <button class="w-full py-3 bg-pct-green text-white rounded-xl font-black text-sm uppercase tracking-widest hover:bg-emerald-600 transition-all">Ver Benefícios</button>
                    </div>
                    <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>
                </div>

                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Dicas de Mobilização</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-emerald-50 text-pct-green flex items-center justify-center font-black text-xs">1</span>
                            <p class="text-xs text-gray-600 font-medium">Compartilhe no WhatsApp com seus amigos e familiares.</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-emerald-50 text-pct-green flex items-center justify-center font-black text-xs">2</span>
                            <p class="text-xs text-gray-600 font-medium">Publique nos seus stories explicando por que você apoia o PCT.</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-emerald-50 text-pct-green flex items-center justify-center font-black text-xs">3</span>
                            <p class="text-xs text-gray-600 font-medium">Fale sobre os princípios de trabalho e liberdade.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyLink() {
            const copyText = document.getElementById("inviteLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Link copiado com sucesso!");
        }
    </script>
</x-dashboard-layout>
