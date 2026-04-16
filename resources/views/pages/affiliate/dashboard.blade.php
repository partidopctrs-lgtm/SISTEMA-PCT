<x-dashboard-layout>
    <x-slot name="title">Área do Afiliado - PCT</x-slot>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-pct-blue">Olá, {{ auth()->user()->name ?? 'Afiliado' }}!</h1>
        <p class="text-gray-500">Bem-vindo à sua área de mobilização. Vamos construir o PCT juntos.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Referral Card -->
        <div class="lg:col-span-2 glass p-8 rounded-3xl shadow-sm bg-gradient-to-br from-white to-emerald-50 relative overflow-hidden">
            <div class="relative z-10">
                <h3 class="text-xl font-bold text-pct-blue mb-2">Expanda o Movimento</h3>
                <p class="text-gray-600 mb-6 max-w-md">Compartilhe seu link de indicação para trazer novos membros para o PCT e fortalecer nossa base.</p>
                
                <div class="flex items-center space-x-2">
                    <input type="text" readonly value="https://pct.org.br/indicar/{{ auth()->user()->registration_number ?? '12345' }}" class="bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm w-full font-mono text-gray-500">
                    <button class="btn-primary whitespace-nowrap px-4 hover:scale-105 transition-transform">Copiar Link</button>
                </div>
                
                <div class="mt-8 grid grid-cols-3 gap-4">
                    <div class="text-center">
                        <p class="text-2xl font-black text-pct-blue">12</p>
                        <p class="text-xs font-bold text-gray-400 uppercase">Indicados</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-black text-pct-green">5</p>
                        <p class="text-xs font-bold text-gray-400 uppercase">Filiados</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-black text-yellow-500">450</p>
                        <p class="text-xs font-bold text-gray-400 uppercase">Pontos</p>
                    </div>
                </div>
            </div>
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-pct-green/10 rounded-full"></div>
        </div>

        <!-- Materials Card -->
        <div class="glass p-8 rounded-3xl shadow-sm border-t-4 border-pct-blue">
            <h3 class="text-xl font-bold text-pct-blue mb-4">Materiais</h3>
            <div class="space-y-4">
                <a href="https://docs.google.com/document/d/1ViPiyoq-IniGtDfZpdOjckftzqL29i1NKpoLLq4vEq8/export?format=pdf" target="_blank" class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path d="M4 18a2 2 0 01-2-2V4a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H4zm0-2h12V4H4v12zm3-10h6v2H7V6zm0 4h6v2H7v-2zm0 4h3v2H7v-2z"></path></svg>
                        <span class="text-sm font-semibold text-gray-800">Manifesto Oficial (PDF)</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-pct-blue transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </a>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path></svg>
                        <span class="text-sm font-semibold text-gray-800">Kit Redes Sociais</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-pct-blue transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </div>
                <a href="{{ route('affiliate.membership_form') }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-pct-green" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                        <span class="text-sm font-semibold text-gray-800">Ficha de Apoio</span>
                    </div>
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-pct-blue transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Activity Stream -->
    <div class="glass p-8 rounded-3xl shadow-sm">
        <h3 class="text-xl font-bold text-pct-blue mb-6">Minha Participação</h3>
        <div class="space-y-6">
            <div class="flex space-x-4">
                <div class="relative">
                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div class="absolute h-full w-0.5 bg-gray-200 left-1/2 -ml-px top-10"></div>
                </div>
                <div class="pb-6">
                    <p class="text-sm font-bold text-gray-900">Vinculado ao Comitê de Porto Alegre</p>
                    <p class="text-xs text-gray-500 mt-1">Há 2 dias • Status: Ativo</p>
                </div>
            </div>
            <div class="flex space-x-4">
                <div class="h-10 w-10 rounded-full bg-pct-green flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="pb-0">
                    <p class="text-sm font-bold text-gray-900">Cadastro Aprovado</p>
                    <p class="text-xs text-gray-500 mt-1">Há 1 semana • Membro #45902</p>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
