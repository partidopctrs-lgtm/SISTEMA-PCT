<x-dashboard-layout>
    <x-slot name="title">Gestão de Caso: {{ $report->protocol }}</x-slot>

    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.atendimento.index') }}" class="p-3 bg-white border border-slate-100 rounded-2xl text-slate-400 hover:text-pct-blue transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <h1 class="text-2xl font-black text-pct-blue uppercase tracking-tighter">{{ $report->protocol }}</h1>
                    <span class="px-3 py-1 {{ $report->is_urgent ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }} text-[9px] font-black uppercase rounded-full tracking-widest">{{ $report->gravity }}</span>
                </div>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Enviado por: {{ $report->affiliate->name ?? 'Cidadão Direto' }} • {{ $report->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <form action="{{ route('admin.atendimento.status', $report->id) }}" method="POST" class="flex items-center gap-2">
                @csrf
                <select name="status" onchange="this.form.submit()" class="bg-white border border-slate-100 rounded-2xl px-6 py-3 text-xs font-black text-pct-blue outline-none shadow-sm appearance-none">
                    <option value="recebido" {{ $report->status == 'recebido' ? 'selected' : '' }}>RECEBIDO</option>
                    <option value="em análise" {{ $report->status == 'em análise' ? 'selected' : '' }}>EM ANÁLISE</option>
                    <option value="encaminhado" {{ $report->status == 'encaminhado' ? 'selected' : '' }}>ENCAMINHADO</option>
                    <option value="finalizado" {{ $report->status == 'finalizado' ? 'selected' : '' }}>FINALIZADO</option>
                    <option value="arquivado" {{ $report->status == 'arquivado' ? 'selected' : '' }}>ARQUIVADO</option>
                </select>
            </form>
            <button class="px-6 py-3 bg-pct-blue text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Ação Coletiva</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Case Data -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Problem Description Card -->
            <div class="card-premium p-8 md:p-12">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Relato e Evidências</h3>
                    <div class="text-right">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Localização</p>
                        <p class="text-xs font-bold text-pct-blue uppercase">{{ $report->city }} ({{ $report->neighborhood }})</p>
                    </div>
                </div>

                <div class="p-8 bg-slate-50 rounded-[2rem] border border-slate-100 mb-8">
                    <p class="text-sm font-bold text-gray-500 uppercase text-[9px] tracking-widest mb-4">Tipo: {{ $report->problem_type }}</p>
                    <p class="text-gray-700 font-medium leading-relaxed italic">"{{ $report->description }}"</p>
                </div>

                @if($report->evidences->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($report->evidences as $evidence)
                    <div class="relative group aspect-square bg-slate-100 rounded-3xl border border-slate-100 overflow-hidden">
                        @if($evidence->file_type == 'photo')
                            <img src="{{ asset('storage/'.$evidence->file_path) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center gap-2">
                                <svg class="w-8 h-8 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                <span class="text-[8px] font-black uppercase text-pct-blue">{{ $evidence->file_type }}</span>
                            </div>
                        @endif
                        <a href="{{ asset('storage/'.$evidence->file_path) }}" target="_blank" class="absolute inset-0 bg-pct-blue/80 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center">
                            <span class="text-[10px] font-black text-white uppercase tracking-widest">Abrir Arquivo</span>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="p-8 text-center bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-100">
                    <p class="text-xs font-bold text-slate-300 uppercase tracking-widest">Nenhuma prova visual anexada</p>
                </div>
                @endif
            </div>

            <!-- Internal Management (Notes & Comments) -->
            <div class="card-premium p-8 md:p-12 border-t-4 border-t-amber-400">
                <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest mb-8">Espaço de Gestão (Equipe PCT)</h3>
                
                <div class="space-y-6 mb-10">
                    @foreach($report->notes as $note)
                    <div class="p-6 {{ $note->is_internal ? 'bg-amber-50/50 border-amber-100' : 'bg-blue-50/50 border-blue-100' }} border rounded-3xl relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[10px] font-black text-pct-blue border border-slate-100">
                                    {{ substr($note->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-pct-blue uppercase">{{ $note->user->name }}</p>
                                    <p class="text-[8px] text-gray-400 font-bold">{{ $note->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @if($note->is_internal)
                                <span class="px-2 py-0.5 bg-amber-400 text-white text-[8px] font-black uppercase rounded tracking-widest">Interno</span>
                            @else
                                <span class="px-2 py-0.5 bg-pct-blue text-white text-[8px] font-black uppercase rounded tracking-widest">Visível</span>
                            @endif
                        </div>
                        <p class="text-xs font-medium text-gray-600 leading-relaxed">{{ $note->content }}</p>
                    </div>
                    @endforeach
                </div>

                <form action="{{ route('admin.atendimento.note', $report->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <textarea name="content" rows="3" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Adicionar observação ou resposta interna..."></textarea>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_internal" checked class="rounded text-amber-500">
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Manter apenas interno</span>
                        </label>
                        <button type="submit" class="px-6 py-3 bg-amber-400 text-white rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-amber-500 transition-all shadow-lg shadow-amber-500/20">Adicionar Nota</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar: Intelligence & Forwarding -->
        <div class="space-y-8">
            <!-- Tracking Card -->
            <div class="card-premium">
                <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6 pb-4 border-b border-slate-50">Histórico de Trâmite</h3>
                <div class="space-y-6">
                    @forelse($report->forwardings as $fwd)
                    <div class="flex gap-4 relative">
                        <div class="flex-shrink-0 relative z-10">
                            <div class="w-2 h-2 rounded-full bg-pct-blue mt-1"></div>
                        </div>
                        <div class="pb-6 border-l border-slate-100 -ml-[1.25rem] pl-8">
                            <p class="text-[10px] font-black text-pct-blue uppercase">Encaminhado para: {{ $fwd->to_sector }}</p>
                            <p class="text-[9px] text-gray-400 font-medium mb-2">{{ $fwd->created_at->format('d/m/Y H:i') }}</p>
                            <p class="text-[9px] text-gray-500 italic bg-slate-50 p-3 rounded-xl border border-slate-100">{{ $fwd->reason }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="py-8 text-center border-2 border-dashed border-slate-50 rounded-3xl">
                        <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest">Sem trâmites registrados</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Forwarding Form -->
            <div class="card-premium bg-slate-900 text-white border-none">
                <h3 class="text-xs font-black uppercase tracking-[0.2em] mb-6 opacity-60">Encaminhar Caso</h3>
                <form action="{{ route('admin.atendimento.forward', $report->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-[9px] font-black uppercase opacity-40 ml-2">Setor de Destino</label>
                        <select name="to_sector" required class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-xs font-bold text-white outline-none focus:border-white/40 appearance-none">
                            <option value="juridico" class="text-slate-900">JURÍDICO</option>
                            <option value="comunicacao" class="text-slate-900">COMUNICAÇÃO</option>
                            <option value="mobilizacao" class="text-slate-900">MOBILIZAÇÃO NACIONAL</option>
                            <option value="regional" class="text-slate-900">COORDENAÇÃO REGIONAL</option>
                            <option value="imprensa" class="text-slate-900">ASSESSORIA DE IMPRENSA</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[9px] font-black uppercase opacity-40 ml-2">Motivo / Instruções</label>
                        <textarea name="reason" rows="3" required class="w-full bg-white/10 border border-white/20 rounded-xl px-4 py-3 text-xs font-bold text-white outline-none focus:border-white/40" placeholder="Instruções para o setor..."></textarea>
                    </div>
                    <button type="submit" class="w-full py-4 bg-white text-slate-900 rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-pct-green hover:text-white transition-all">Encaminhar Agora</button>
                </form>
            </div>

            <!-- Contact Card -->
            <div class="card-premium">
                <h3 class="text-xs font-black text-pct-blue uppercase tracking-widest mb-6">Contato do Cidadão</h3>
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <span class="text-xs font-bold text-pct-blue">{{ $report->contact }}</span>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $report->contact) }}" target="_blank" class="p-2 bg-emerald-100 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-2.277 0-4.131 1.851-4.131 4.128 0 2.276 1.854 4.128 4.131 4.128 2.277 0 4.131-1.852 4.131-4.128 0-2.277-1.854-4.128-4.131-4.128zm0 6.757c-1.448 0-2.628-1.181-2.628-2.629 0-1.449 1.18-2.63 2.628-2.63 1.448 0 2.628 1.181 2.628 2.63 0 1.448-1.18 2.629-2.628-2.629zM12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 20c-4.963 0-9-4.037-9-9s4.037-9 9-9 9 4.037 9 9-4.037 9-9 9z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
