<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h3 class="text-sm font-black text-pct-blue uppercase flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m4 0h1m-5 10h5m-5 4h5m2-10h1m2 0h1m-7 4h1m4 0h1m-5 10h5m-5 4h5"></path></svg>
            Diretoria Executiva (Página 4)
        </h3>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Gestão de Cargos Institucionais</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @php
            $roles = [
                'president' => 'Presidente',
                'vice_president' => 'Vice-Presidente',
                'secretary_general' => 'Secretário-Geral',
                'secretary_adjunct' => 'Secretário-Adjunto',
                'treasurer_general' => 'Tesoureiro-Geral',
                'treasurer_adjunct' => 'Tesoureiro-Adjunto',
                'communication_director' => 'Diretor de Comunicação',
                'mobilization_director' => 'Diretor de Mobilização',
                'formation_director' => 'Diretor de Formação Política',
                'vogal_1' => 'Vogal 1',
                'vogal_2' => 'Vogal 2',
            ];
        @endphp

        @foreach($roles as $code => $label)
            @php $member = $directory->members()->where('directory_role', $code)->first(); @endphp
            <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm flex items-center gap-6 group hover:border-blue-200 transition-all">
                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center overflow-hidden border border-slate-100 group-hover:bg-blue-50 transition-all">
                    @if($member && $member->photo_path)
                        <img src="{{ asset('storage/' . $member->photo_path) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-8 h-8 text-slate-200 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    @endif
                </div>
                <div class="flex-grow">
                    <p class="text-[10px] font-black text-pct-blue uppercase tracking-widest mb-1">{{ $label }}</p>
                    @if($member)
                        <h4 class="text-sm font-black text-slate-700 uppercase">{{ $member->name }}</h4>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[9px] font-bold text-slate-400 uppercase">CPF: {{ $member->cpf }}</span>
                            <span class="w-1 h-1 bg-slate-200 rounded-full"></span>
                            <button class="text-[9px] font-black text-pct-blue uppercase hover:underline">Ver Ficha</button>
                        </div>
                    @else
                        <button type="button" @click="$dispatch('open-modal', 'assign-role-{{ $code }}')" class="text-xs font-bold text-slate-300 uppercase hover:text-pct-blue transition-all">Definir Cargo +</button>
                    @endif
                </div>
                @if($member)
                    <form action="{{ route('admin.directories.members.destroy', [$directory->id, $member->id]) }}" method="POST" onsubmit="return confirm('Remover este membro do cargo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-slate-300 hover:text-red-500 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
