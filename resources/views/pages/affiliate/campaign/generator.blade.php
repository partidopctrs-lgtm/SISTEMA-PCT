<x-dashboard-layout>
    <x-slot name="title">Gerador de Divulgação - PCT</x-slot>

    <div class="mb-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Gerador de Links & QR Code 🔗</h2>
                <p class="text-slate-500 font-medium">Crie suas ferramentas de divulgação personalizadas para campo.</p>
            </div>
            <a href="{{ route('affiliate.dashboard') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs uppercase hover:bg-slate-200 transition-all">Voltar ao Painel</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- 🔗 Link Personalizado -->
            <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-xl font-black text-pct-blue mb-6 uppercase tracking-widest">Link de Mobilizador</h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Seu Link Base</label>
                            <div class="flex gap-2">
                                <input type="text" readonly value="{{ route('campaign.water.index', ['ref' => auth()->id()]) }}" id="refLink" class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent rounded-2xl focus:border-pct-blue outline-none transition-all font-bold text-slate-700">
                                <button onclick="copyToClipboard('refLink')" class="p-4 bg-pct-blue text-white rounded-2xl hover:bg-blue-900 transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-6 bg-blue-50 rounded-2xl border border-blue-100">
                            <p class="text-[10px] text-pct-blue font-black uppercase mb-2">💡 Dica Estratégica</p>
                            <p class="text-xs text-blue-800 leading-relaxed font-medium">Use este link em suas redes sociais (Instagram Bio, Facebook, Status) para que todos os relatos vindos dele sejam computados em seu ranking.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 📱 QR Code -->
            <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm text-center">
                <h3 class="text-xl font-black text-pct-blue mb-8 uppercase tracking-widest text-left">QR Code para Impressão</h3>
                
                <div class="bg-slate-50 p-12 rounded-[2rem] border-2 border-dashed border-slate-200 inline-block mb-8">
                    <!-- Gerador de QR Code Simples via API Google ou similar -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode(route('campaign.water.index', ['ref' => auth()->id()])) }}" alt="QR Code" class="w-48 h-48 mx-auto shadow-2xl rounded-xl">
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data={{ urlencode(route('campaign.water.index', ['ref' => auth()->id()])) }}" download="qrcode-pct.png" target="_blank" class="px-10 py-5 bg-pct-green text-white rounded-2xl font-black uppercase tracking-widest hover:bg-pct-blue transition-all shadow-xl">
                        Baixar em Alta Definição
                    </a>
                </div>
                <p class="mt-6 text-[10px] text-slate-400 font-bold uppercase tracking-widest">Ideal para: Panfletos, Adesivos e Cartazes.</p>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(elementId) {
            var copyText = document.getElementById(elementId);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Copiado com sucesso!");
        }
    </script>
</x-dashboard-layout>
