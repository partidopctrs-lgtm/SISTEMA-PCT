<x-dashboard-layout>
    <x-slot name="title">Gestão da Escola PCT - Admin</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Escola PCT (Cursos)</h1>
            <p class="text-gray-500 font-medium tracking-wide">Gerencie a trilha de formação política, cursos e videoaulas do movimento.</p>
        </div>
        <button class="btn-primary px-6 py-3 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Novo Curso</span>
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-12">
        @foreach([
            ['title' => 'Formação de Líderes', 'students' => 840, 'progress' => '92%', 'color' => 'pct-blue'],
            ['title' => 'Introdução à Política', 'students' => 1250, 'progress' => '78%', 'color' => 'pct-green'],
            ['title' => 'Oratória & Debate', 'students' => 320, 'progress' => '45%', 'color' => 'amber-400'],
            ['title' => 'Gestão de Núcleos', 'students' => 150, 'progress' => '60%', 'color' => 'pct-blue']
        ] as $course)
        <div class="glass p-6 rounded-3xl group hover:border-{{ $course['color'] }} transition-all">
            <h4 class="font-black text-pct-blue tracking-tight leading-tight mb-4">{{ $course['title'] }}</h4>
            <div class="flex items-end justify-between">
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Alunos</p>
                    <p class="text-2xl font-black text-pct-blue">{{ $course['students'] }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Conclusão</p>
                    <p class="text-lg font-black text-{{ $course['color'] }}">{{ $course['progress'] }}</p>
                </div>
            </div>
            <div class="mt-4 h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-{{ $course['color'] }}" style="width: {{ $course['progress'] }}"></div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="glass p-8 rounded-[2rem] shadow-sm">
        <div class="flex items-center justify-between mb-8">
            <h3 class="font-black text-pct-blue uppercase tracking-widest">Currículo & Módulos</h3>
            <div class="flex space-x-2">
                <button class="text-xs font-bold text-gray-400 hover:text-pct-blue">Visualizar como Aluno</button>
            </div>
        </div>
        
        <div class="space-y-4">
            @foreach([
                ['id' => 'MOD-01', 'name' => 'História do Movimento Cidadania e Trabalho', 'lessons' => 5],
                ['id' => 'MOD-02', 'name' => 'Ética e Conduta Pessoal na Esfera Pública', 'lessons' => 3],
                ['id' => 'MOD-03', 'name' => 'Legislação Eleitoral e Partidária', 'lessons' => 10],
            ] as $module)
            <div class="flex items-center justify-between p-6 bg-blue-50/30 rounded-2xl border border-transparent hover:border-gray-100 transition-all">
                <div class="flex items-center space-x-4">
                    <span class="text-[10px] font-black text-pct-blue bg-white px-3 py-1.5 rounded-lg shadow-sm">{{ $module['id'] }}</span>
                    <p class="font-bold text-pct-blue tracking-tight">{{ $module['name'] }}</p>
                </div>
                <div class="flex items-center space-x-8">
                    <p class="text-xs font-medium text-gray-400">{{ $module['lessons'] }} Aulas</p>
                    <button class="text-pct-blue hover:text-pct-green transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
