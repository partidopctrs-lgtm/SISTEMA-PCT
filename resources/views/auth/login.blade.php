<x-public-layout>
    <x-slot name="title">Login - PCT</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full glass p-8 rounded-3xl shadow-xl">
            <div class="text-center mb-8">
                <img class="mx-auto h-16 w-auto mb-4" src="{{ asset('logo.png') }}" alt="PCT Logo">
                <h2 class="text-3xl font-extrabold text-pct-blue tracking-tight">Portal PCT</h2>
                <p class="mt-2 text-sm text-gray-500">Acesse sua área restrita.</p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <form class="space-y-6" action="{{ route('admin.login') }}" method="GET">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                        <input id="email" name="email" type="email" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="seu@email.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                        <input id="password" name="password" type="password" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="********">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-pct-blue focus:ring-pct-blue border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700">Lembrar-me</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" onclick="alert('Funcionalidade em desenvolvimento.'); return false;" class="font-medium text-pct-blue hover:text-blue-500">Esqueceu a senha?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-pct-blue hover:bg-blue-800 transition-all transform hover:scale-[1.02]">
                        Entrar no Sistema
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    Não é filiado? <a href="{{ route('register.index') }}" class="font-semibold text-pct-blue hover:underline">Cadastre-se aqui</a>
                </p>
            </div>
        </div>
    </div>
</x-public-layout>
