<x-dashboard-layout>
    <x-slot name="title">Escola PCT - Formação Política</x-slot>

    <div class="max-w-7xl mx-auto">
        @php
            $completedCount = count($completedModuleIds);
            $progressPercent = round(($completedCount / 12) * 100);
        @endphp

        <!-- Hero Section -->
        <div class="relative overflow-hidden bg-pct-blue rounded-[3rem] p-10 mb-12 text-white shadow-2xl">
            <div class="relative z-10 max-w-3xl">
                <span class="inline-block px-4 py-1.5 mb-6 text-xs font-black tracking-widest text-pct-green bg-pct-green/10 rounded-full uppercase">
                    Academia de Lideranças
                </span>
                <h1 class="text-4xl md:text-5xl font-black mb-6 leading-tight">Forge o seu futuro político com a Escola PCT.</h1>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl font-medium leading-relaxed">
                    Acesso exclusivo ao conhecimento técnico e teórico necessário para transformar a realidade do Brasil através do trabalho e da liberdade.
                </p>
                <div class="flex items-center gap-6">
                    <div class="flex flex-col">
                        <span class="text-3xl font-black text-pct-green">{{ $progressPercent }}%</span>
                        <span class="text-xs uppercase font-bold opacity-60 tracking-widest">Progresso Total</span>
                    </div>
                    <div class="h-10 w-px bg-white/10"></div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-black text-white">{{ $completedCount }}</span>
                        <span class="text-xs uppercase font-bold opacity-60 tracking-widest">Aulas Concluídas</span>
                    </div>
                </div>
            </div>
            
            <!-- Abstract background shape -->
            <div class="absolute -right-20 -top-20 w-[600px] h-[600px] bg-pct-green/5 rounded-full blur-[100px]"></div>
        </div>

        @if(session('error'))
            <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 font-bold rounded-r-xl animate-pulse">
                {{ session('error') }}
            </div>
        @endif

        <!-- Course Sections -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-pct-blue tracking-tight">Formação Oficial do Afiliado</h2>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">12 Módulos</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($modules as $m)
                @php 
                    $isCompleted = in_array($m['id'], $completedModuleIds);
                    $isLocked = $m['id'] > 1 && !in_array($m['id'] - 1, $completedModuleIds);
                @endphp
                <div class="card-premium p-6 flex flex-col group transition-all {{ $isCompleted ? 'border-pct-green/30' : '' }} {{ $isLocked ? 'opacity-60 grayscale cursor-not-allowed' : 'hover:border-pct-blue' }}">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 {{ $isCompleted ? 'bg-pct-green text-white' : ($isLocked ? 'bg-gray-100 text-gray-400' : 'bg-slate-50 text-pct-blue') }} rounded-2xl flex items-center justify-center transition-all {{ !$isLocked ? 'group-hover:bg-pct-blue group-hover:text-white' : '' }}">
                            @if($isCompleted)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            @elseif($isLocked)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            @else
                                <span class="text-lg font-black">{{ $m['id'] }}</span>
                            @endif
                        </div>
                        @if($isCompleted)
                            <span class="text-[10px] font-black text-pct-green uppercase tracking-widest">Concluído</span>
                        @endif
                    </div>
                    <h3 class="text-sm font-black text-pct-blue mb-4 leading-tight min-h-[40px]">{{ $m['title'] }}</h3>
                    
                    @if($isLocked)
                        <button class="mt-auto py-3 bg-gray-100 text-gray-400 rounded-xl font-bold text-xs text-center uppercase tracking-widest cursor-not-allowed" disabled>
                            Bloqueado
                        </button>
                    @else
                        <a href="{{ route('affiliate.escola.aula', $m['id']) }}" class="mt-auto py-3 {{ $isCompleted ? 'bg-pct-green/10 text-pct-green' : 'bg-slate-100 text-pct-blue' }} rounded-xl font-bold text-xs text-center hover:bg-pct-blue hover:text-white transition-all uppercase tracking-widest">
                            {{ $isCompleted ? 'Revisar Aula' : 'Acessar Aula' }}
                        </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <!-- Certificates -->
        <div class="card-premium {{ $completedCount >= 12 ? 'bg-pct-green/5 border-pct-green/30' : 'bg-slate-50 border-dashed border-2' }}">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl">
                    <svg class="w-12 h-12 {{ $completedCount >= 12 ? 'text-pct-green' : 'text-pct-blue' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <div class="flex-grow text-center md:text-left">
                    <h3 class="text-2xl font-black text-pct-blue mb-2">Certificado de Conclusão</h3>
                    @if($completedCount >= 12)
                        <p class="text-gray-500 font-medium">Parabéns! Você concluiu todos os módulos. Seu certificado já está disponível.</p>
                    @else
                        <p class="text-gray-500 font-medium tracking-tight">Faltam <span class="text-pct-blue font-bold">{{ 12 - $completedCount }} aulas</span> para você liberar seu certificado oficial.</p>
                    @endif
                </div>
                <div>
                    @if($completedCount >= 12)
                        <a href="{{ route('affiliate.escola.certificado') }}" class="inline-block px-10 py-4 bg-pct-green text-white rounded-2xl font-black hover:bg-emerald-600 transition-all shadow-lg shadow-pct-green/20 uppercase tracking-widest text-xs">Visualizar Certificado</a>
                    @else
                        <button class="px-8 py-3 bg-gray-200 text-gray-400 rounded-2xl font-bold cursor-not-allowed uppercase tracking-widest text-xs" disabled>Bloqueado</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
