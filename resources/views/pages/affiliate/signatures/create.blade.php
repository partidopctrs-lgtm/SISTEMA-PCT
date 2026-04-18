<x-dashboard-layout>
    <x-slot name="title">Apoio ao Partido - PCT</x-slot>

    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Coleta de Assinaturas</h1>
            <p class="text-gray-500 font-medium mt-1">Apoie a formação oficial do Partido e ajude a batermos a meta nacional.</p>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-start gap-4">
                <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-emerald-600 shadow-sm shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-sm font-black text-emerald-800 uppercase">{{ session('success') }}</h3>
                    <p class="text-xs text-emerald-600 mt-1">Sua assinatura foi registrada e aguarda validação do TSE. Obrigado pelo apoio!</p>
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
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-8 border-b border-slate-100 bg-slate-50">
                        <h2 class="text-lg font-black text-pct-blue uppercase tracking-widest flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Formulário de Apoio Formal
                        </h2>
                    </div>
                    <form action="{{ route('affiliate.signatures.store') }}" method="POST" class="p-8 space-y-6">
                        @csrf
                        
                        <div>
                            <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Nome Completo</label>
                            <input type="text" name="full_name" value="{{ auth()->user()->name }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium text-pct-blue">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">CPF</label>
                                <input type="text" name="cpf" value="{{ auth()->user()->cpf }}" required placeholder="000.000.000-00" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium text-pct-blue">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Título de Eleitor</label>
                                <input type="text" name="voter_title" value="{{ auth()->user()->voter_id }}" required placeholder="Somente números" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium text-pct-blue">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Zona Eleitoral</label>
                                <input type="text" name="voter_zone" value="{{ auth()->user()->voter_zone }}" required placeholder="Ex: 123" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium text-pct-blue">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Seção</label>
                                <input type="text" name="voter_section" value="{{ auth()->user()->voter_section }}" required placeholder="Ex: 456" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium text-pct-blue">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Cidade</label>
                                <input type="text" name="city" value="{{ auth()->user()->city }}" required placeholder="Sua cidade" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium text-pct-blue">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-pct-blue uppercase tracking-widest mb-2">Estado (UF)</label>
                                <input type="text" name="state" value="{{ auth()->user()->state }}" required maxlength="2" placeholder="Ex: SP" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-sm font-medium uppercase text-pct-blue">
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-8 py-4 bg-pct-blue text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">
                                Confirmar Apoio Oficial
                            </button>
                        </div>
                    </form>
                </div>
                
                @if($signatures->count() > 0)
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest mb-6">Meus Protocolos Gerados</h3>
                    <div class="space-y-4">
                        @foreach($signatures as $sig)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div>
                                <p class="text-[10px] font-black text-pct-blue uppercase">Protocolo: {{ $sig->protocol_number }}</p>
                                <p class="text-[10px] text-gray-500 font-bold">{{ $sig->created_at->format('d/m/Y H:i') }} - {{ $sig->city }}/{{ $sig->state }}</p>
                            </div>
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 text-[9px] font-black rounded-full uppercase border border-amber-200">{{ $sig->status }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Coluna Lateral Info -->
            <div class="space-y-6">
                <div class="bg-gradient-to-br from-pct-blue to-blue-900 rounded-[2rem] p-8 text-white shadow-xl shadow-blue-900/20">
                    <h3 class="text-[10px] font-black text-blue-300 uppercase tracking-[0.2em] mb-4">Meta Nacional</h3>
                    <p class="text-4xl font-black mb-1">{{ number_format($current, 0, ',', '.') }}</p>
                    <p class="text-xs font-medium text-blue-200 mb-6">de {{ number_format($goal, 0, ',', '.') }} assinaturas</p>
                    
                    <div class="h-2 bg-blue-950/50 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-pct-green rounded-full" style="width: {{ min(100, $progress) }}%"></div>
                    </div>
                    <p class="text-[10px] font-black text-right text-pct-green">{{ number_format($progress, 2) }}%</p>
                </div>

                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                    <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Instruções
                    </h3>
                    <ul class="space-y-3 text-xs text-gray-500 font-medium">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-500 mt-0.5">•</span>
                            Os dados devem ser idênticos aos do título de eleitor.
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-500 mt-0.5">•</span>
                            A assinatura será validada pelo TSE posteriormente.
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-500 mt-0.5">•</span>
                            Você receberá um e-mail com a via em PDF do seu apoio.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
