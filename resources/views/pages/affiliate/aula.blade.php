<x-dashboard-layout>
    <x-slot name="title">Módulo {{ $module['id'] }} - Escola PCT</x-slot>

    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8 text-xs font-bold uppercase tracking-widest" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('affiliate.escola') }}" class="text-gray-400 hover:text-pct-blue transition-colors">Escola PCT</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 md:ml-2 text-gray-500">Módulo {{ $module['id'] }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Lesson Card -->
        <div class="glass p-10 md:p-16 rounded-[3rem] shadow-sm bg-white border border-gray-100 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-10">
                    <div class="flex items-center gap-3">
                        <span class="px-4 py-1.5 bg-pct-blue/5 text-pct-blue text-[10px] font-black rounded-full uppercase tracking-widest">
                            Aula {{ $module['id'] }} de {{ count($modules) }}
                        </span>
                        @if(in_array($module['id'], $completedModuleIds))
                            <span class="px-4 py-1.5 bg-pct-green text-white text-[10px] font-black rounded-full uppercase tracking-widest flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                                Módulo Concluído
                            </span>
                        @endif
                    </div>
                    <div class="w-24 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-pct-green" style="width: {{ ($module['id'] / count($modules)) * 100 }}%"></div>
                    </div>
                </div>

                <h1 class="text-3xl md:text-4xl font-black text-pct-blue mb-8 leading-tight tracking-tighter">
                    {{ $module['title'] }}
                </h1>

                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="mb-10 p-6 bg-pct-green/10 border-l-4 border-pct-green text-pct-green rounded-r-2xl flex items-center gap-4">
                        <div class="w-10 h-10 bg-pct-green text-white rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="font-black uppercase tracking-widest text-xs">Módulo Concluído!</p>
                            <p class="text-sm font-bold opacity-80">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error_quiz'))
                    <div class="mb-10 p-6 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-2xl flex items-center gap-4">
                        <div class="w-10 h-10 bg-red-500 text-white rounded-full flex items-center justify-center flex-shrink-0 text-xl font-black">!</div>
                        <div>
                            <p class="font-black uppercase tracking-widest text-xs">Atenção</p>
                            <p class="text-sm font-bold opacity-80">{{ session('error_quiz') }}</p>
                        </div>
                    </div>
                @endif

                <div class="prose prose-slate prose-lg max-w-none prose-headings:text-pct-blue prose-headings:font-black prose-p:font-medium prose-p:text-gray-600 prose-li:text-gray-600 prose-strong:text-pct-blue font-medium leading-relaxed mb-16">
                    {!! nl2br(Str::markdown($module['content'])) !!}
                </div>

                <!-- Quiz Section -->
                <div class="bg-slate-50 rounded-[2.5rem] p-8 md:p-12 border border-slate-100">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="p-3 bg-pct-blue text-white rounded-2xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-black text-pct-blue tracking-tight">Questionário de Validação</h2>
                    </div>

                    <form action="{{ route('affiliate.escola.aula.check', $module['id']) }}" method="POST">
                        @csrf
                        <p class="text-lg font-bold text-slate-700 mb-8 leading-snug">{{ $module['question'] }}</p>
                        
                        <div class="space-y-4 mb-10">
                            @foreach($module['options'] as $index => $option)
                            <label class="flex items-center p-5 bg-white border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-pct-blue transition-all group has-[:checked]:border-pct-blue has-[:checked]:bg-blue-50/30">
                                <input type="radio" name="answer" value="{{ $index }}" class="w-5 h-5 text-pct-blue border-gray-300 focus:ring-pct-blue" required>
                                <span class="ml-4 text-sm font-bold text-slate-600 group-hover:text-pct-blue">{{ $option }}</span>
                            </label>
                            @endforeach
                        </div>

                        <div class="flex flex-col md:flex-row gap-4 items-center justify-between pt-6 border-t border-slate-200">
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Selecione uma resposta para concluir</p>
                            <button type="submit" class="btn-primary w-full md:w-auto px-12 py-4 shadow-xl shadow-pct-blue/20">
                                Validar Resposta
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Navigation -->
                <div class="mt-16 pt-10 border-t border-gray-100 flex flex-col md:flex-row gap-4 justify-between items-center">
                    @if($module['id'] > 1)
                    <a href="{{ route('affiliate.escola.aula', $module['id'] - 1) }}" class="btn-secondary w-full md:w-auto px-8 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Módulo Anterior
                    </a>
                    @else
                    <div class="hidden md:block"></div>
                    @endif

                    @php $isCompleted = in_array($module['id'], $completedModuleIds); @endphp

                    @if($module['id'] < count($modules))
                        @if($isCompleted)
                        <a href="{{ route('affiliate.escola.aula', $module['id'] + 1) }}" class="btn-primary w-full md:w-auto px-10 flex items-center justify-center gap-2 shadow-lg shadow-pct-blue/20">
                            Próxima Aula
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        @else
                        <button class="btn-primary w-full md:w-auto px-10 bg-gray-200 text-gray-400 border-none cursor-not-allowed flex items-center justify-center gap-2" disabled>
                            Conclua o Quiz Primeiro
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </button>
                        @endif
                    @else
                        @if($isCompleted)
                        <a href="{{ route('affiliate.escola.certificado') }}" class="btn-primary w-full md:w-auto px-10 bg-pct-green hover:bg-emerald-600 border-none flex items-center justify-center gap-2 shadow-lg shadow-pct-green/20">
                            Visualizar Certificado
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path></svg>
                        </a>
                        @else
                        <button class="btn-primary w-full md:w-auto px-10 bg-gray-200 text-gray-400 border-none cursor-not-allowed flex items-center justify-center gap-2" disabled>
                            Conclua o Quiz para o Certificado
                        </button>
                        @endif
                    @endif
                </div>
            </div>
            
            <!-- Decoration -->
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-pct-blue/5 rounded-full blur-3xl"></div>
        </div>
    </div>

    @push('styles')
    <style>
        .prose h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.25rem;
            line-height: 1.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .prose p {
            margin-bottom: 1.25rem;
        }
        .prose ul {
            margin-bottom: 1.5rem;
            list-style-type: none;
            padding-left: 0;
        }
        .prose li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .prose li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: var(--pct-green);
            font-weight: bold;
        }
    </style>
    @endpush
</x-dashboard-layout>
