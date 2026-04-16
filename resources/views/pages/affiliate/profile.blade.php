<x-dashboard-layout>
    <x-slot name="title">Meu Perfil - PCT</x-slot>

    <div class="max-w-4xl">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Meu Perfil</h1>
            <p class="text-gray-500">Gerencie suas informações pessoais e sua identidade no movimento.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profile Info -->
            <div class="md:col-span-2 space-y-8">
                <div class="card-premium">
                    <h3 class="text-xl font-bold text-pct-blue mb-6">Informações Pessoais</h3>
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nome Completo</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pct-blue focus:border-transparent outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">E-mail</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pct-blue focus:border-transparent outline-none transition-all">
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="btn-primary">Salvar Alterações</button>
                        </div>
                    </form>
                </div>

                <div class="card-premium">
                    <h3 class="text-xl font-bold text-pct-blue mb-6">Vínculos Institucionais</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div>
                                <p class="text-xs font-black text-blue-400 uppercase tracking-widest">Comitê Municipal</p>
                                <p class="text-gray-900 font-bold">Porto Alegre - RS</p>
                            </div>
                            <span class="px-3 py-1 bg-emerald-100 text-pct-green text-xs font-black rounded-full">ATIVO</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div>
                                <p class="text-xs font-black text-blue-400 uppercase tracking-widest">Cargo / Status</p>
                                <p class="text-gray-900 font-bold">{{ auth()->user()->role === 'affiliate' ? 'Membro Filiado' : ucfirst(auth()->user()->role) }}</p>
                            </div>
                            <span class="px-3 py-1 bg-blue-100 text-pct-blue text-xs font-black rounded-full">FUNDADOR</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Avatar & ID card preview -->
            <div class="space-y-8">
                <div class="card-premium text-center">
                    <div class="relative inline-block mb-6">
                        <div class="h-32 w-32 rounded-full bg-pct-blue flex items-center justify-center text-white text-4xl font-black shadow-2xl ring-8 ring-white">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <button class="absolute bottom-1 right-1 h-10 w-10 bg-pct-green text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </button>
                    </div>
                    <h4 class="text-xl font-bold text-pct-blue">{{ auth()->user()->name }}</h4>
                    <p class="text-sm text-gray-500 mb-6">Membro desde {{ auth()->user()->created_at->format('M Y') }}</p>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('affiliate.carteirinha') }}" class="w-full py-3 bg-slate-100 text-pct-blue rounded-xl font-bold hover:bg-slate-200 transition-colors">Ver Carteirinha</a>
                    </div>
                </div>

                <div class="bg-pct-blue p-8 rounded-[2.5rem] text-white overflow-hidden relative group">
                    <div class="relative z-10">
                        <p class="text-pct-green font-black tracking-widest text-[10px] uppercase mb-1">Status de Filiação</p>
                        <h4 class="text-2xl font-black mb-4 tracking-tight">Registro Ativo</h4>
                        <p class="text-blue-100 text-sm mb-6">Você está devidamente registrado e apto para participar de todas as atividades do PCT.</p>
                        <div class="flex items-center gap-2 text-pct-green font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Certificado Digital Disponível
                        </div>
                    </div>
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-pct-green/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
