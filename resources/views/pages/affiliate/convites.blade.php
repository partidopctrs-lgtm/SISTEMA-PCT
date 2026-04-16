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

                <!-- Recent Referrals -->
                <div class="card-premium">
                    <h3 class="text-xl font-bold text-pct-blue mb-8">Quem entrou pelo seu convite</h3>
                    <div class="space-y-4">
                        @foreach([['Ricardo Santos', 'Porto Alegre', 'Há 2 horas'], ['Maria Oliveira', 'Canoas', 'Há 1 dia'], ['José Almeida', 'Novo Hamburgo', 'Há 3 dias']] as $ref)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:bg-white hover:shadow-lg hover:shadow-pct-blue/5 transition-all group">
                            <div class="flex items-center gap-4">
                                <div class="h-10 w-10 rounded-full bg-pct-blue/10 flex items-center justify-center text-pct-blue font-bold">
                                    {{ substr($ref[0], 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">{{ $ref[0] }}</p>
                                    <p class="text-xs text-gray-500">{{ $ref[1] }}</p>
                                </div>
                            </div>
                            <span class="text-xs font-medium text-gray-400">{{ $ref[2] }}</span>
                        </div>
                        @endforeach
                    </div>
                    <button class="w-full mt-8 text-sm font-bold text-pct-blue hover:underline">Ver todos os indicados</button>
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
