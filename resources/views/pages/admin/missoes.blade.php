<x-dashboard-layout>
    <x-slot name="title">Gestão de Missões - Admin PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Gestão de Missões</h1>
            <p class="text-gray-500 font-medium tracking-wide">Crie e monitore tarefas estratégicas para engajar a base de afiliados.</p>
        </div>
        <button class="btn-primary px-6 py-3 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Nova Missão</span>
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <!-- Active Missions -->
        <div class="glass p-8 rounded-[2rem] shadow-sm">
            <h3 class="font-black text-pct-blue uppercase tracking-widest mb-6 flex items-center">
                <span class="w-3 h-3 bg-pct-green rounded-full mr-2 animate-pulse"></span>
                Missões Ativas
            </h3>
            <div class="space-y-4">
                @foreach([
                    ['title' => 'Divulgação do Manifesto', 'points' => 50, 'completion' => 64],
                    ['title' => 'Cadastro de 5 Novos Membros', 'points' => 200, 'completion' => 45],
                    ['title' => 'Participação em Live Nacional', 'points' => 30, 'completion' => 88],
                ] as $active)
                <div class="p-6 bg-white/40 border border-gray-100 rounded-2xl hover:bg-white transition-all group">
                    <div class="flex justify-between items-start mb-4">
                        <h4 class="font-bold text-pct-blue tracking-tight">{{ $active['title'] }}</h4>
                        <span class="text-[10px] font-black text-pct-green bg-emerald-50 px-2 py-1 rounded-lg">+{{ $active['points'] }} PTS</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-pct-blue rounded-full" style="width: {{ $active['completion'] }}%"></div>
                        </div>
                        <span class="text-xs font-black text-pct-blue">{{ $active['completion'] }}%</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Mission Logic / Automation -->
        <div class="glass p-8 rounded-[2rem] shadow-sm bg-pct-blue">
            <h3 class="font-black text-blue-200 uppercase tracking-widest mb-6">Regras de Gamificação</h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] mb-3">Multiplicador de Eventos</label>
                    <div class="flex items-center space-x-4">
                        <input type="range" class="flex-1 accent-pct-green" min="1" max="5" value="2">
                        <span class="text-2xl font-black text-white">2x</span>
                    </div>
                </div>
                <div class="p-5 bg-white/10 rounded-2xl border border-white/5">
                    <p class="text-sm font-medium text-blue-100 mb-2">Automação de Recompensas</p>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black text-blue-200 uppercase tracking-widest">Emissão de Certificado</span>
                        <div class="w-12 h-6 bg-pct-green rounded-full p-1 cursor-pointer">
                            <div class="w-4 h-4 bg-white rounded-full ml-auto"></div>
                        </div>
                    </div>
                </div>
                <button class="w-full py-4 bg-white text-pct-blue font-black rounded-2xl text-xs uppercase tracking-widest hover:scale-[1.02] transition-transform">Sincronizar Pontuação</button>
            </div>
        </div>
    </div>
</x-dashboard-layout>
