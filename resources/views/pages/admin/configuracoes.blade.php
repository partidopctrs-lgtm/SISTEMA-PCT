<x-dashboard-layout>
    <x-slot name="title">Configurações Globais - Admin PCT</x-slot>

    <div class="mb-12">
        <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Configurações Globais</h1>
        <p class="text-gray-500 font-medium tracking-wide">Ajustes estruturais, segurança do portal e parâmetros de rede do movimento.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Site Settings -->
        <div class="lg:col-span-2 space-y-8">
            <div class="glass p-10 rounded-[2.5rem] shadow-sm">
                <h3 class="font-black text-pct-blue uppercase tracking-widest mb-8 border-b border-gray-100 pb-4">Parâmetros do Sistema</h3>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Nome da Instância</label>
                            <input type="text" value="PCT FORÇA BRASIL" class="w-full px-5 py-3 bg-blue-50/50 border border-gray-100 rounded-2xl font-bold text-pct-blue">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">URL Base (HTTPS)</label>
                            <input type="text" value="https://portal.pct.social.br" class="w-full px-5 py-3 bg-blue-50/50 border border-gray-100 rounded-2xl font-medium text-pct-blue opacity-60" readonly>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-6 bg-blue-50/30 rounded-3xl">
                        <div>
                            <p class="font-bold text-pct-blue">Inscrições Públicas</p>
                            <p class="text-xs text-gray-400 font-medium">Permite que novos afiliados se cadastrem livremente pelo site.</p>
                        </div>
                        <div class="w-14 h-8 bg-pct-green rounded-full p-1 cursor-pointer">
                            <div class="w-6 h-6 bg-white rounded-full ml-auto shadow-sm"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-6 bg-blue-50/30 rounded-3xl">
                        <div>
                            <p class="font-bold text-pct-blue">Modo de Manutenção</p>
                            <p class="text-xs text-gray-400 font-medium">Bloqueia o acesso ao portal para todos, exceto administradores.</p>
                        </div>
                        <div class="w-14 h-8 bg-gray-200 rounded-full p-1 cursor-pointer">
                            <div class="w-6 h-6 bg-white rounded-full shadow-sm"></div>
                        </div>
                    </div>
                    <button class="btn-primary w-full py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl">Salvar Alterações</button>
                </div>
            </div>

            <div class="glass p-10 rounded-[2.5rem] shadow-sm border-l-[12px] border-l-red-500">
                <h3 class="font-black text-red-600 uppercase tracking-widest mb-4">Zona de Perigo</h3>
                <p class="text-sm text-gray-400 mb-8 leading-relaxed">Ações irreversíveis que impactam toda a rede e infraestrutura de dados.</p>
                <div class="flex space-x-4">
                    <button class="px-6 py-3 border-2 border-red-500 text-red-500 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all">Limpar Logs do Servidor</button>
                    <button class="px-6 py-3 bg-red-600 text-white rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg hover:bg-red-800 transition-all">Resetar Banco de Dados</button>
                </div>
            </div>
        </div>

        <!-- Meta Info / About -->
        <div class="space-y-8">
            <div class="glass p-8 rounded-[2rem] shadow-sm bg-gradient-to-br from-pct-blue to-blue-900 text-white">
                <h4 class="font-black uppercase tracking-widest text-blue-300 text-xs mb-8">Informações de Build</h4>
                <div class="space-y-4">
                    <div class="flex justify-between border-b border-white/10 pb-2">
                        <span class="text-xs font-medium text-blue-200">Versão do Portal</span>
                        <span class="text-xs font-black italic">v2.4.0-premium</span>
                    </div>
                    <div class="flex justify-between border-b border-white/10 pb-2">
                        <span class="text-xs font-medium text-blue-200">Última Atualização</span>
                        <span class="text-xs font-black italic">{{ date('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between border-b border-white/10 pb-2">
                        <span class="text-xs font-medium text-blue-200">Framework</span>
                        <span class="text-xs font-black italic">Laravel 12.x</span>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-white/10">
                    <div class="flex items-center space-x-3 text-pct-green group cursor-pointer">
                        <svg class="w-5 h-5 animate-spin group-hover:animate-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em]">Verificar Atualizações</span>
                    </div>
                </div>
            </div>

            <div class="glass p-8 rounded-[2rem] shadow-sm text-center">
                 <img src="{{ asset('logo.png') }}" class="w-16 h-16 mx-auto mb-6 opacity-30 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-700">
                 <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest italic">PCT - Movimento Político<br>Cidadania e Trabalho</p>
            </div>
        </div>
    </div>
</x-dashboard-layout>
