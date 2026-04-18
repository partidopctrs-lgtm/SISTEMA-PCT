<x-lawyer-layout>
    @slot('slot_title') Detalhes da Tarefa @endslot

    <div class="mb-8">
        <a href="{{ route('advogado.tarefas') }}" class="text-xs font-black text-amber-600 uppercase tracking-widest hover:text-amber-700">← Voltar às Tarefas</a>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight mt-4">{{ $tarefa->title }}</h1>
        <div class="flex flex-wrap items-center gap-3 mt-3">
            <span class="px-3 py-1 text-[9px] font-black uppercase rounded-lg border
                {{ $tarefa->priority === 'urgent' ? 'bg-red-100 text-red-700 border-red-200' : 'bg-amber-100 text-amber-700 border-amber-200' }}">
                {{ $tarefa->priority }}
            </span>
            <span class="px-3 py-1 text-[9px] font-black uppercase rounded-lg bg-slate-100 text-slate-600 border border-slate-200">
                {{ $tarefa->status }}
            </span>
            <span class="text-xs text-slate-400 font-medium">Código: {{ $tarefa->request_code }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Detalhes da Demanda -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8">
                <h2 class="text-sm font-black text-slate-800 uppercase tracking-widest mb-4">Descrição da Demanda</h2>
                <p class="text-sm text-slate-600 font-medium leading-relaxed">{{ $tarefa->description }}</p>
            </div>

            <!-- Histórico de Mensagens -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100">
                    <h2 class="text-sm font-black text-slate-800 uppercase tracking-widest">Histórico de Atendimento</h2>
                </div>
                <div class="p-6 space-y-4 max-h-80 overflow-y-auto">
                    @forelse($tarefa->messages ?? [] as $msg)
                    <div class="flex gap-3">
                        <div class="h-8 w-8 rounded-xl bg-amber-100 flex items-center justify-center text-[10px] font-black text-amber-600 flex-shrink-0">
                            {{ substr($msg->user->name ?? 'S', 0, 1) }}
                        </div>
                        <div class="flex-1 bg-slate-50 rounded-2xl p-4">
                            <p class="text-[10px] font-black text-slate-500 uppercase mb-1">{{ $msg->user->name ?? 'Sistema' }} • {{ $msg->created_at->format('d/m/Y H:i') }}</p>
                            <p class="text-sm text-slate-700 font-medium">{{ $msg->message }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-slate-400 text-sm py-4">Nenhuma mensagem ainda.</p>
                    @endforelse
                </div>
            </div>

            <!-- Responder -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-sm font-black text-slate-800 uppercase tracking-widest mb-4">Registrar Resposta / Parecer</h2>
                <form method="POST" action="{{ route('advogado.tarefas.responder', $tarefa->id) }}">
                    @csrf
                    <textarea name="message" rows="4" required placeholder="Digite sua resposta jurídica, observação ou solicitação de documentos..."
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-700 focus:ring-2 focus:ring-amber-500 outline-none resize-none mb-4"></textarea>
                    <div class="flex items-center gap-4">
                        <select name="status" class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-bold text-slate-700 outline-none">
                            <option value="">Manter status atual</option>
                            <option value="in_progress">Marcar Em Andamento</option>
                            <option value="awaiting_docs">Aguardando Documentos</option>
                            <option value="completed">Marcar como Concluído</option>
                        </select>
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-black uppercase tracking-widest rounded-xl hover:from-amber-400 hover:to-amber-500 transition-all shadow-lg shadow-amber-500/20">
                            Enviar Resposta
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Painel Lateral -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Informações do Solicitante</h2>
                <p class="text-sm font-black text-slate-800">{{ $tarefa->requester->name ?? 'N/A' }}</p>
                <p class="text-xs text-slate-500 font-medium mt-1">{{ $tarefa->requester->email ?? '' }}</p>
                @if($tarefa->directory)
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-xs font-black text-slate-400 uppercase">Diretório</p>
                    <p class="text-sm font-bold text-slate-700 mt-1">{{ $tarefa->directory->name ?? 'Nacional' }}</p>
                </div>
                @endif
            </div>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Datas</h2>
                <div class="space-y-2">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase">Recebida em</p>
                        <p class="text-sm font-black text-slate-700">{{ $tarefa->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase">Prazo Estimado</p>
                        <p class="text-sm font-black text-amber-600">{{ $tarefa->created_at->addDays(7)->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-lawyer-layout>
