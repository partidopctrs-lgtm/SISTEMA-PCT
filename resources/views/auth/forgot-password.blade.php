<x-public-layout>
    <x-slot name="title">Esqueci minha senha - PCT</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full glass p-10 rounded-[2.5rem] shadow-2xl">
            <div class="text-center mb-10">
                <img class="mx-auto h-20 w-auto mb-6" src="{{ asset('logo.png') }}" alt="PCT Logo">
                <h2 class="text-3xl font-black text-pct-blue tracking-tighter uppercase">Recuperar Acesso</h2>
                <p class="mt-2 text-sm font-medium text-gray-500">Informe seu e-mail ou CPF para receber o link de recuperação.</p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl mb-8 text-sm font-bold flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 px-6 py-4 rounded-2xl mb-8 text-sm font-bold">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="identifier" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4 mb-2">E-mail ou CPF</label>
                        <input id="identifier" name="identifier" type="text" required value="{{ old('identifier') }}" 
                            class="appearance-none block w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pct-blue focus:bg-white transition-all text-sm font-bold text-pct-blue" 
                            placeholder="Digite seus dados...">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-5 px-4 border border-transparent rounded-2xl shadow-xl text-xs font-black uppercase tracking-[0.2em] text-white bg-pct-blue hover:bg-blue-900 transition-all transform hover:-translate-y-1 active:scale-95 shadow-blue-900/20">
                        Enviar Link de Recuperação
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center">
                <a href="{{ route('login') }}" class="text-xs font-black text-pct-blue uppercase tracking-widest hover:underline flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Voltar para o Login
                </a>
            </div>
        </div>
    </div>
</x-public-layout>
