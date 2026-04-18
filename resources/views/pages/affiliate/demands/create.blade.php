<x-dashboard-layout>
    <x-slot name="title">Demandas da População - PCT</x-slot>

    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Demandas da População</h1>
            <p class="text-gray-500 font-medium mt-1">Registre problemas estruturais da sua cidade para embasarmos ações formais.</p>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-start gap-4">
                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-emerald-600 shadow-sm shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black text-emerald-800 uppercase">Demanda Registrada!</h3>
                    <p class="text-xs text-emerald-600 mt-1">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 p-4 bg-red-50 rounded-2xl border border-red-100 flex items-start gap-4">
                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-red-600 shadow-sm shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black text-red-800 uppercase">Atenção</h3>
                    <p class="text-xs text-red-600 mt-1">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Coluna Principal Formulário -->
            <div class="md:col-span-2 space-y-8">
                
                @if($canCreate)
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-8 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
                        <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                            Nova Denúncia
                        </h2>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-[9px] font-black rounded-full uppercase border border-blue-200">
                            {{ 2 - $demands->count() }} Restantes
                        </span>
                    </div>
                    <form action="{{ route('affiliate.demands.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Cidade Afetada</label>
                                <input type="text" name="city" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Estado (UF)</label>
                                <input type="text" name="state" required maxlength="2" placeholder="Ex: SP" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium uppercase">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Categoria do Problema</label>
                            <select name="category" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium text-pct-blue">
                                <option value="">Selecione uma categoria...</option>
                                <option value="Saúde">Saúde Pública (Hospitais, UBS)</option>
                                <option value="Educação">Educação (Escolas, Creches)</option>
                                <option value="Infraestrutura">Infraestrutura (Asfalto, Saneamento)</option>
                                <option value="Segurança">Segurança Pública</option>
                                <option value="Transporte">Transporte Público</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Título da Demanda</label>
                            <input type="text" name="title" required placeholder="Ex: Falta de asfalto no Bairro X" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium">
                        </div>

                        <div>
                            <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Relato Detalhado</label>
                            <textarea name="description" required rows="4" placeholder="Descreva a situação detalhadamente..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium resize-none"></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Anexar Evidências (Opcional)</label>
                            <input type="file" name="attachment" accept=".pdf,.docx,.jpg,.png" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-xs font-medium file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                            <p class="text-[10px] text-gray-400 font-bold mt-2">Formatos aceitos: PDF, DOCX, JPG, PNG (Max: 5MB).</p>
                        </div>

                        <div class="pt-6 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-8 py-4 bg-pct-blue text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                                Enviar Demanda
                            </button>
                        </div>
                    </form>
                </div>
                @else
                <div class="bg-amber-50 p-6 rounded-2xl border border-amber-100 text-center">
                    <svg class="w-12 h-12 text-amber-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <h3 class="text-sm font-black text-amber-800 uppercase tracking-widest">Limite Atingido</h3>
                    <p class="text-xs text-amber-700 font-medium mt-2">Você possui 2 demandas ativas. Aguarde a resolução ou protocolo de uma delas para enviar novas denúncias.</p>
                </div>
                @endif
                
                @if($demands->count() > 0)
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest mb-6">Minhas Demandas Ativas</h3>
                    <div class="space-y-4">
                        @foreach($demands as $demand)
                        <div class="flex items-center justify-between p-5 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-200 transition-colors group">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <p class="text-[10px] font-black text-gray-500 uppercase">{{ $demand->protocol_number }}</p>
                                    @if($demand->is_urgent)
                                        <span class="px-2 py-0.5 bg-red-100 text-red-600 text-[8px] font-black rounded-full uppercase tracking-widest">Alerta Nacional</span>
                                    @endif
                                </div>
                                <h4 class="text-sm font-black text-pct-blue">{{ $demand->title }}</h4>
                                <p class="text-[10px] text-gray-400 font-bold uppercase mt-1">{{ $demand->city }}/{{ $demand->state }} • {{ $demand->category }}</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <span class="px-3 py-1 {{ $demand->status === 'analise' ? 'bg-amber-100 text-amber-700 border-amber-200' : 'bg-blue-100 text-blue-700 border-blue-200' }} text-[9px] font-black rounded-full uppercase border">
                                    {{ $demand->status }}
                                </span>
                                <button class="text-[9px] font-black text-blue-600 uppercase hover:underline opacity-0 group-hover:opacity-100 transition-opacity">Ver Protocolo PDF</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Coluna Lateral Info -->
            <div class="space-y-6">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Como Funciona?
                    </h3>
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="h-6 w-6 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-[10px] font-black shrink-0">1</div>
                            <p class="text-[10px] text-gray-500 font-medium">Você relata o problema detalhadamente com fotos e dados.</p>
                        </div>
                        <div class="flex gap-3">
                            <div class="h-6 w-6 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-[10px] font-black shrink-0">2</div>
                            <p class="text-[10px] text-gray-500 font-medium">O sistema gera um protocolo oficial para você acompanhar.</p>
                        </div>
                        <div class="flex gap-3">
                            <div class="h-6 w-6 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center text-[10px] font-black shrink-0">!</div>
                            <p class="text-[10px] text-gray-500 font-medium">Se houver várias queixas da mesma cidade, o sistema gera alerta de urgência para a direção atuar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
