<x-dashboard-layout>
    <x-slot name="title">Solicitação {{ $legalRequest->request_code }} - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="mb-10 flex items-center gap-4">
            <a href="{{ route('legal.requests') }}" class="p-3 bg-white border border-slate-200 rounded-xl text-gray-400 hover:text-pct-blue transition-all shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h1 class="text-2xl font-black text-pct-blue tracking-tight">Solicitação {{ $legalRequest->request_code }}</h1>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Status: <span class="text-blue-600">{{ $legalRequest->status }}</span> | Nível: <span class="text-amber-600">{{ $legalRequest->level }}</span></p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Details & Messages -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Request Details -->
                <div class="card-premium">
                    <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-50">
                        <h2 class="text-xl font-bold text-pct-blue">{{ $legalRequest->title }}</h2>
                        <span class="px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-widest 
                            {{ $legalRequest->priority == 'urgent' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                            Prioridade: {{ $legalRequest->priority }}
                        </span>
                    </div>

                    <div class="prose prose-slate max-w-none text-gray-600 font-medium leading-relaxed mb-10">
                        {!! nl2br(e($legalRequest->description)) !!}
                    </div>

                    @if($legalRequest->evidence_url)
                    <div class="p-6 bg-slate-50 rounded-[2rem] border border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center text-pct-blue shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-700">Anexo Enviado</span>
                        </div>
                        <a href="{{ $legalRequest->evidence_url }}" target="_blank" class="text-[10px] font-black text-pct-blue uppercase tracking-widest hover:underline">Baixar Arquivo</a>
                    </div>
                    @endif
                </div>

                <!-- Messages / Timeline -->
                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-8">Interações e Respostas</h3>
                    <div class="space-y-8 mb-10">
                        @forelse($legalRequest->messages as $message)
                        <div class="flex gap-4 {{ $message->user_id == auth()->id() ? 'flex-row-reverse' : '' }}">
                            <div class="h-10 w-10 bg-slate-100 rounded-xl flex-shrink-0 flex items-center justify-center text-[10px] font-black text-gray-400 uppercase">
                                {{ substr($message->user->full_name, 0, 1) }}
                            </div>
                            <div class="max-w-[80%] {{ $message->user_id == auth()->id() ? 'bg-pct-blue text-white rounded-[2rem] rounded-tr-none' : 'bg-slate-50 text-gray-700 rounded-[2rem] rounded-tl-none' }} p-6 border border-slate-100/10">
                                <p class="text-xs font-medium leading-relaxed">{{ $message->message }}</p>
                                <p class="text-[8px] font-black uppercase tracking-widest mt-2 opacity-60">
                                    {{ $message->user->full_name }} • {{ $message->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        @empty
                        <p class="text-center py-8 text-gray-400 font-medium">Inicie uma interação abaixo.</p>
                        @endforelse
                    </div>

                    <form action="{{ route('legal.requests.message', $legalRequest->id) }}" method="POST" class="mt-10 pt-10 border-t border-slate-50">
                        @csrf
                        <textarea name="message" rows="4" required placeholder="Sua resposta ou comentário técnico..." class="w-full bg-slate-50 border border-slate-200 rounded-[2rem] px-6 py-4 outline-none focus:ring-2 focus:ring-pct-blue transition-all resize-none mb-4"></textarea>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-pct-blue text-white font-black px-12 py-4 rounded-2xl hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Enviar Resposta</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Info & Actions -->
            <div class="space-y-8">
                <!-- User Info -->
                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Solicitante</h3>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="h-14 w-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 text-lg font-black shadow-sm">
                            {{ substr($legalRequest->requester->full_name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-black text-pct-blue">{{ $legalRequest->requester->full_name }}</p>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">{{ $legalRequest->requester_profile_type }}</p>
                        </div>
                    </div>
                    <div class="space-y-3 pt-6 border-t border-slate-50">
                        <div class="flex justify-between text-[10px] font-bold">
                            <span class="text-gray-400 uppercase tracking-widest">Cidade/Estado</span>
                            <span class="text-gray-700">{{ $legalRequest->requester->city }}/{{ $legalRequest->requester->state }}</span>
                        </div>
                        <div class="flex justify-between text-[10px] font-bold">
                            <span class="text-gray-400 uppercase tracking-widest">Comitê</span>
                            <span class="text-gray-700">{{ $legalRequest->directory->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Control Panel -->
                <div class="card-premium">
                    <h3 class="text-lg font-bold text-pct-blue mb-6">Ações de Gestão</h3>
                    <div class="space-y-4">
                        <form action="{{ route('legal.requests.status', $legalRequest->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold outline-none focus:ring-2 focus:ring-pct-blue transition-all">
                                <option value="new" {{ $legalRequest->status == 'new' ? 'selected' : '' }}>Novo / Pendente</option>
                                <option value="in_progress" {{ $legalRequest->status == 'in_progress' ? 'selected' : '' }}>Em Análise</option>
                                <option value="waiting_info" {{ $legalRequest->status == 'waiting_info' ? 'selected' : '' }}>Aguardando Informação</option>
                                <option value="completed" {{ $legalRequest->status == 'completed' ? 'selected' : '' }}>Concluído / Resolvido</option>
                                <option value="cancelled" {{ $legalRequest->status == 'cancelled' ? 'selected' : '' }}>Cancelado / Arquivado</option>
                            </select>
                            <button type="submit" class="w-full py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black uppercase tracking-widest text-pct-blue hover:bg-slate-50 transition-all shadow-sm">Atualizar Status</button>
                        </form>

                        <div class="pt-6 border-t border-slate-50">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Escalonamento de Nível</p>
                            <div class="grid grid-cols-3 gap-2">
                                <button class="px-2 py-3 bg-blue-50 text-blue-600 rounded-xl text-[8px] font-black uppercase tracking-widest border border-blue-100 opacity-50 cursor-not-allowed">Local</button>
                                <button class="px-2 py-3 bg-amber-50 text-amber-600 rounded-xl text-[8px] font-black uppercase tracking-widest border border-amber-100 hover:bg-amber-100 transition-all">Estadual</button>
                                <button class="px-2 py-3 bg-red-50 text-red-600 rounded-xl text-[8px] font-black uppercase tracking-widest border border-red-100 hover:bg-red-100 transition-all">Nacional</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
