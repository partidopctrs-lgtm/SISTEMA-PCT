<x-dashboard-layout>
    <x-slot name="title">Portal da Presidência (Admin) - PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Gabinete Presidencial</h1>
            <p class="text-gray-500 font-medium tracking-wide">Bem-vindo ao centro de comando estratégico do PCT.</p>
        </div>
        <div class="flex space-x-3">
             <button class="btn-secondary px-6 py-3 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span>Relatório Executivo</span>
            </button>
        </div>
    </div>

    <!-- Quick Access Shortcuts -->
    <div class="mb-16">
        <h3 class="text-xs font-black text-pct-blue uppercase tracking-[0.2em] mb-8 border-b border-gray-100 pb-4">Acesso Direto aos Portais</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach([
                ['name' => 'Afiliado', 'route' => '/affiliate/dashboard', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                ['name' => 'Candidato', 'route' => '/candidate/dashboard', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                ['name' => 'Comitê', 'route' => '/committee/dashboard', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                ['name' => 'Financeiro', 'route' => '/finance/dashboard', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['name' => 'Jurídico', 'route' => '/legal/dashboard', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['name' => 'Comunicação', 'route' => '/communication/dashboard', 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z']
            ] as $shortcut)
                <a href="{{ $shortcut['route'] }}" class="glass p-6 rounded-3xl flex flex-col items-center justify-center hover:bg-white hover:shadow-xl transition-all group border border-transparent hover:border-pct-green/40">
                    <div class="p-3 bg-pct-blue/5 text-pct-blue rounded-2xl mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $shortcut['icon'] }}"></path></svg>
                    </div>
                    <span class="text-[10px] font-black text-pct-blue uppercase tracking-widest text-center">{{ $shortcut['name'] }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- New Member Registration -->
        <div class="glass p-10 rounded-[2.5rem] shadow-sm bg-gradient-to-br from-white to-pct-green/5">
            <h3 class="text-xl font-black text-pct-blue mb-8">Cadastrar Novo Membro</h3>
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-sm font-medium">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.storeMember') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2 opacity-60">Nome Completo</label>
                        <input type="text" name="name" required placeholder="Ex: Maria oliveira" class="w-full px-5 py-4 bg-white/50 border border-gray-100 rounded-2xl outline-none focus:ring-2 focus:ring-pct-green">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2 opacity-60">Cargo / Função</label>
                        <select name="role" required class="w-full px-5 py-4 bg-white/50 border border-gray-100 rounded-2xl outline-none focus:ring-2 focus:ring-pct-green">
                            <option value="admin">Presidente / Nacional</option>
                            <option value="committee">Líder Regional</option>
                            <option value="finance">Tesoureiro</option>
                            <option value="legal">Consultor Jurídico</option>
                            <option value="communication">Comunicação</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-pct-blue uppercase tracking-widest mb-2 opacity-60">E-mail de Acesso</label>
                    <input type="email" name="email" required placeholder="maria@pct.org.br" class="w-full px-5 py-4 bg-white/50 border border-gray-100 rounded-2xl outline-none focus:ring-2 focus:ring-pct-green">
                </div>
                <button type="submit" class="btn-primary w-full py-5 text-lg font-black rounded-2xl shadow-lg">SALVAR NOVO MEMBRO</button>
            </form>
        </div>

        <!-- System Stats / Notifications -->
        <div class="glass p-10 rounded-[2.5rem] shadow-sm">
            <h3 class="text-xl font-black text-pct-blue mb-8">Saúde do Sistema</h3>
            <div class="space-y-6">
                <div class="flex items-center justify-between p-5 bg-blue-50/50 rounded-2xl">
                    <div class="flex items-center space-x-4">
                        <div class="w-3 h-3 bg-pct-green rounded-full animate-pulse"></div>
                        <span class="font-bold text-pct-blue tracking-tight">Base de Dados</span>
                    </div>
                    <span class="text-xs font-black text-pct-green">OPERACIONAL</span>
                </div>
                <div class="flex items-center justify-between p-5 bg-blue-50/50 rounded-2xl">
                    <div class="flex items-center space-x-4">
                         <div class="w-3 h-3 bg-pct-green rounded-full"></div>
                        <span class="font-bold text-pct-blue tracking-tight">Fila de Disparos (Bulk)</span>
                    </div>
                    <span class="text-xs font-black text-pct-green">EM ESPERA</span>
                </div>
                <div class="flex items-center justify-between p-5 bg-red-50/50 rounded-2xl">
                    <div class="flex items-center space-x-4">
                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                        <span class="font-bold text-red-700 tracking-tight">Servidor de E-mail (Mercury)</span>
                    </div>
                    <span class="text-xs font-black text-red-600">OFFLINE</span>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
