<x-lawyer-layout>
    @slot('slot_title') Meu Perfil @endslot

    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Meu Perfil</h1>
        <p class="text-slate-500 font-medium mt-1">Dados cadastrais e OAB</p>
    </div>

    <div class="max-w-2xl bg-white rounded-3xl shadow-sm border border-slate-100 p-8">
        <div class="flex items-center gap-6 mb-8 pb-8 border-b border-slate-100">
            <div class="h-20 w-20 bg-gradient-to-br from-amber-400 to-amber-600 rounded-3xl flex items-center justify-center text-3xl font-black text-white shadow-lg shadow-amber-500/20">
                {{ substr($user->name, 0, 1) }}
            </div>
            <div>
                <h2 class="text-xl font-black text-slate-800">{{ $user->name }}</h2>
                <p class="text-amber-600 text-sm font-bold">Advogado — Corpo Jurídico PCT</p>
                <p class="text-slate-500 text-xs font-medium mt-1">{{ $user->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">CPF</p>
                <p class="text-sm font-bold text-slate-700">{{ $user->cpf ?? '—' }}</p>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Telefone</p>
                <p class="text-sm font-bold text-slate-700">{{ $user->phone ?? '—' }}</p>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Estado (OAB)</p>
                <p class="text-sm font-bold text-slate-700">{{ strtoupper($user->state ?? '—') }}</p>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Cadastrado em</p>
                <p class="text-sm font-bold text-slate-700">{{ $user->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
</x-lawyer-layout>
