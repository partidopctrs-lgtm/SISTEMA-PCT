<x-dashboard-layout>
    <x-slot name="title">Configurações - PCT</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Configurações</h1>
            <p class="text-gray-500 font-medium">Ajuste suas preferências e gerencie a segurança de sua conta.</p>
        </div>

        <div class="space-y-8">
            <!-- Security Section -->
            <div class="card-premium">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-blue-100 text-pct-blue rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-pct-blue">Segurança e Acesso</h3>
                </div>
                
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Senha Atual</label>
                            <input type="password" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                        </div>
                        <div class="hidden md:block"></div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nova Senha</label>
                            <input type="password" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Confirmar Nova Senha</label>
                            <input type="password" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                        </div>
                    </div>
                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="btn-primary">Atualizar Senha</button>
                    </div>
                </form>
            </div>

            <!-- Notifications Section -->
            <div class="card-premium">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-12 bg-emerald-100 text-pct-green rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-pct-blue">Notificações</h3>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                        <div>
                            <p class="text-sm font-bold text-gray-900">Novas Missões</p>
                            <p class="text-xs text-gray-500 font-medium">Receba alertas quando novas tarefas forem liberadas.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pct-green"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                        <div>
                            <p class="text-sm font-bold text-gray-900">Mensagens da Comunidade</p>
                            <p class="text-xs text-gray-500 font-medium">Notificar quando alguém responder sua publicação.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pct-green"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                        <div>
                            <p class="text-sm font-bold text-gray-900">Informativos Por E-mail</p>
                            <p class="text-xs text-gray-500 font-medium">Receba o resumo semanal do PCT em sua caixa de entrada.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pct-green"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="card-premium border-red-50">
                <h3 class="text-xl font-bold text-red-600 mb-6">Zona de Perigo</h3>
                <div class="flex flex-col md:flex-row items-center justify-between p-6 bg-red-50 rounded-2xl gap-4">
                    <div>
                        <p class="text-sm font-bold text-red-900">Desativar Minha Conta</p>
                        <p class="text-xs text-red-700 font-medium">Ao desativar sua conta, seus dados serão preservados mas você não terá mais acesso ao painel.</p>
                    </div>
                    <button class="px-6 py-3 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 transition-all text-sm">Desativar Conta</button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
