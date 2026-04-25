<x-public-layout>
    <x-slot name="title">Cadastre-se no PCT - Movimento Cidadania e Trabalho</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full glass p-8 rounded-3xl shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-pct-green/5 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-pct-blue/5 rounded-full -ml-12 -mb-12"></div>
            
            <div class="relative">
                <div class="text-center mb-8">
                    <img class="mx-auto h-16 w-auto mb-4" src="{{ asset('logo.png') }}" alt="PCT Logo">
                    <h2 class="text-3xl font-extrabold text-pct-blue tracking-tight">Cadastre-se no PCT</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Junte-se ao movimento que valoriza o seu trabalho.
                    </p>
                </div>

                <form class="space-y-6" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                            <input id="name" name="name" type="text" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="Seu nome completo">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                            <input id="email" name="email" type="email" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="seu@email.com">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="cpf" class="block text-sm font-medium text-gray-700 mb-1">CPF</label>
                                <input id="cpf" name="cpf" type="text" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="000.000.000-00">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Celular/WhatsApp</label>
                                <input id="phone" name="phone" type="text" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="(00) 00000-0000">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="********">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-pct-blue focus:ring-pct-blue border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-700 leading-tight">
                            Eu aceito os <a target="_blank" href="{{ route('terms') }}" class="font-bold text-pct-blue hover:underline">Termos de Uso</a> e a <a target="_blank" href="{{ route('privacy') }}" class="font-bold text-pct-blue hover:underline">Política de Privacidade</a> (LGPD).
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-pct-blue hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pct-blue transition-all transform hover:scale-[1.02]">
                            Confirmar Cadastro
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600">
                        Já possui conta? <a href="{{ route('login') }}" class="font-semibold text-pct-blue hover:underline">Fazer login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
