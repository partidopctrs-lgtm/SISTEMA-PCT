<x-public-layout>
    <x-slot name="title">Redefinir Senha - PCT</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full glass p-8 rounded-3xl shadow-xl">
            <div class="text-center mb-8">
                <img class="mx-auto h-16 w-auto mb-4" src="{{ asset('logo.png') }}" alt="PCT Logo">
                <h2 class="text-3xl font-extrabold text-pct-blue tracking-tight">Nova Senha</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Crie uma nova senha segura para sua conta.
                </p>
            </div>

            <form class="space-y-6" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Nova Senha</label>
                    <input id="password" name="password" type="password" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="Mínimo 8 caracteres">
                    @error('password')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Nova Senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="Digite a mesma senha">
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-pct-blue hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pct-blue transition-all">
                        Atualizar Senha
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-public-layout>
