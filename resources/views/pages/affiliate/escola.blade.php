<x-dashboard-layout>
    <x-slot name="title">Escola PCT - Formação Política</x-slot>

    <div class="max-w-7xl mx-auto">
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
                        <span class="text-3xl font-black text-pct-green">45%</span>
                        <span class="text-xs uppercase font-bold opacity-60 tracking-widest">Progresso Total</span>
                    </div>
                    <div class="h-10 w-px bg-white/10"></div>
                    <div class="flex flex-col">
                        <span class="text-3xl font-black text-white">12</span>
                        <span class="text-xs uppercase font-bold opacity-60 tracking-widest">Aulas Concluídas</span>
                    </div>
                </div>
            </div>
            
            <!-- Abstract background shape -->
            <div class="absolute -right-20 -top-20 w-[600px] h-[600px] bg-pct-green/5 rounded-full blur-[100px]"></div>
            <div class="absolute right-20 bottom-10 opacity-20 hidden lg:block">
                <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
        </div>

        <!-- Course Sections -->
        <div class="mb-12">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-pct-blue tracking-tight">Trilhas de Formação</h2>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-white rounded-full text-sm font-bold shadow-sm border border-gray-100">Todos</button>
                    <button class="px-4 py-2 bg-pct-blue text-white rounded-full text-sm font-bold shadow-md">Em andamento</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Course Card 1 -->
                <div class="card-premium p-0 overflow-hidden flex flex-col group">
                    <div class="h-48 bg-slate-900 relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-6">
                            <span class="bg-pct-green text-white text-[10px] font-black px-2 py-1 rounded uppercase tracking-widest">Iniciante</span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-pct-blue mb-3 group-hover:text-pct-green transition-colors">Princípios da Liberdade Econômica</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-grow">Entenda como o mercado funciona e por que a liberdade é essencial para a prosperidade.</p>
                        
                        <div class="mt-auto pt-6 border-t border-slate-100">
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-gray-400">Progresso</span>
                                <span class="text-pct-blue">80%</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-pct-green w-[80%]"></div>
                            </div>
                            <button class="w-full mt-6 py-3 bg-pct-blue text-white rounded-xl font-bold hover:bg-pct-blue-dark transition-all">Continuar Aula</button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="card-premium p-0 overflow-hidden flex flex-col group opacity-90">
                    <div class="h-48 bg-slate-800 relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-6">
                            <span class="bg-pct-blue text-white text-[10px] font-black px-2 py-1 rounded uppercase tracking-widest">Intermediário</span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-pct-blue mb-3">Gestão Pública e Eficiência</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-grow">Como otimizar a máquina pública e garantir resultados reais para a população.</p>
                        
                        <div class="mt-auto pt-6 border-t border-slate-100">
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-gray-400">Progresso</span>
                                <span class="text-pct-blue">15%</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-pct-blue w-[15%]"></div>
                            </div>
                            <button class="w-full mt-6 py-3 bg-slate-50 text-pct-blue rounded-xl font-bold hover:bg-pct-blue hover:text-white transition-all">Começar</button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 3 (Locked) -->
                <div class="card-premium p-0 overflow-hidden flex flex-col group opacity-60 grayscale relative">
                    <div class="absolute inset-0 flex items-center justify-center z-10">
                        <div class="bg-white/90 p-4 rounded-full shadow-2xl">
                            <svg class="w-8 h-8 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                    </div>
                    <div class="h-48 bg-slate-700"></div>
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-pct-blue mb-3">Liderança e Oratória Política</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-grow">Habilidades de comunicação para líderes que desejam mobilizar suas comunidades.</p>
                        
                        <div class="mt-auto pt-6 border-t border-slate-100">
                            <p class="text-xs text-center font-bold text-gray-400">Conclua a primeira trilha para desbloquear</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Certificates -->
        <div class="card-premium bg-slate-50 border-dashed border-2">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-xl">
                    <svg class="w-12 h-12 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <div class="flex-grow text-center md:text-left">
                    <h3 class="text-2xl font-black text-pct-blue mb-2">Meus Certificados</h3>
                    <p class="text-gray-500 font-medium">Você ainda não concluiu nenhuma trilha completa. Continue estudando!</p>
                </div>
                <div>
                    <button class="px-8 py-3 bg-white text-pct-blue border border-slate-200 rounded-2xl font-bold hover:bg-slate-100 transition-all opacity-50 cursor-not-allowed">Visualizar Certificados</button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
