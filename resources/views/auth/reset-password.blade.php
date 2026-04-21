<x-public-layout>
    <x-slot name="title">Redefinir Senha - PCT</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full glass p-10 rounded-[2.5rem] shadow-2xl">
            <div class="text-center mb-10">
                <img class="mx-auto h-20 w-auto mb-6" src="{{ asset('logo.png') }}" alt="PCT Logo">
                <h2 class="text-3xl font-black text-pct-blue tracking-tighter uppercase">Nova Senha</h2>
                <p class="mt-2 text-sm font-medium text-gray-500">Crie uma senha forte e segura para sua conta.</p>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 px-6 py-4 rounded-2xl mb-8 text-sm font-bold">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="space-y-6" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4 mb-2">E-mail de Confirmação</label>
                        <input id="email" name="email" type="email" required value="{{ old('email', $email ?? '') }}" readonly
                            class="appearance-none block w-full px-6 py-4 bg-gray-100 border border-gray-100 rounded-2xl text-sm font-bold text-gray-500 cursor-not-allowed outline-none">
                    </div>

                    <div>
                        <label for="password" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4 mb-2">Nova Senha</label>
                        <input id="password" name="password" type="password" required autofocus
                            class="appearance-none block w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pct-blue focus:bg-white transition-all text-sm font-bold text-pct-blue" 
                            placeholder="Mínimo 8 caracteres...">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4 mb-2">Confirmar Nova Senha</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                            class="appearance-none block w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pct-blue focus:bg-white transition-all text-sm font-bold text-pct-blue" 
                            placeholder="Repita a nova senha...">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-5 px-4 border border-transparent rounded-2xl shadow-xl text-xs font-black uppercase tracking-[0.2em] text-white bg-pct-blue hover:bg-blue-900 transition-all transform hover:-translate-y-1 active:scale-95 shadow-blue-900/20">
                        Salvar Nova Senha
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-public-layout>
