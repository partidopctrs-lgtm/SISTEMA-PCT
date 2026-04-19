<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-pct-blue uppercase flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Quadro de Fundadores (Página 3)
        </h3>
        <button type="button" @click="$dispatch('open-modal', 'add-founder')" class="px-4 py-2 bg-pct-blue text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-blue-900 transition-all">Adicionar Fundador</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($directory->members()->where('member_type', 'founder')->get() as $member)
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:border-blue-200 transition-all group">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-xl font-black text-slate-400 group-hover:bg-blue-50 group-hover:text-pct-blue transition-all">
                    {{ substr($member->name, 0, 1) }}
                </div>
                <div class="flex flex-col items-end gap-2">
                    <span class="px-2 py-0.5 bg-blue-50 text-pct-blue text-[8px] font-black rounded-md uppercase border border-blue-100">Fundador #{{ $loop->iteration }}</span>
                    <form action="{{ route('admin.directories.members.destroy', [$directory->id, $member->id]) }}" method="POST" onsubmit="return confirm('Remover este fundador?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1 text-slate-300 hover:text-red-500 transition-all">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            <h4 class="text-sm font-black text-slate-700 uppercase mb-1">{{ $member->name }}</h4>
            <p class="text-[10px] font-bold text-slate-400 uppercase mb-4">CPF: {{ $member->cpf }}</p>
            
            <div class="grid grid-cols-2 gap-4 pt-4 border-t border-slate-50">
                <div>
                    <p class="text-[8px] font-black text-slate-300 uppercase tracking-widest mb-1">Título</p>
                    <p class="text-[10px] font-bold text-slate-600">{{ $member->voter_title ?: 'N/A' }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[8px] font-black text-slate-300 uppercase tracking-widest mb-1">Status</p>
                    <span class="text-[10px] font-bold {{ $member->verification_status === 'verified' ? 'text-emerald-500' : 'text-amber-500' }} uppercase">{{ $member->verification_status }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-12 text-center bg-slate-50 rounded-[2.5rem] border-2 border-dashed border-slate-200">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Nenhum fundador cadastrado ainda.</p>
        </div>
        @endforelse
    </div>
</div>
