<x-public-layout>
    <x-slot name="title">Recuperar Acesso - PCT</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full glass p-8 rounded-3xl shadow-xl">
            <div class="text-center mb-8">
                <img class="mx-auto h-16 w-auto mb-4" src="{{ asset('logo.png') }}" alt="PCT Logo">
                <h2 class="text-3xl font-extrabold text-pct-blue tracking-tight">Recuperar Acesso</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Digite seu E-mail ou CPF para localizarmos seu cadastro.
                </p>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-pct-green text-sm font-bold flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div>
                    <label for="identifier" class="block text-sm font-medium text-gray-700 mb-1">E-mail ou CPF</label>
                    <input id="identifier" name="identifier" type="text" required class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pct-blue focus:border-pct-blue sm:text-sm" placeholder="ex: seu@email.com ou 000.000.000-00">
                    @error('identifier')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-pct-blue hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pct-blue transition-all">
                        Localizar Cadastro
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-8 border-t border-gray-100">
                <div class="bg-blue-50/50 p-6 rounded-2xl">
                    <h4 class="text-sm font-bold text-pct-blue mb-2 uppercase tracking-wider text-center">Perdeu o acesso ao e-mail?</h4>
                    <p class="text-xs text-gray-600 text-center mb-4 leading-relaxed">
                        Se você não lembra ou perdeu o acesso ao seu e-mail cadastrado, entre em contato com nosso suporte via WhatsApp.
                    </p>
                    <a href="https://wa.me/5551933806899" target="_blank" class="w-full flex items-center justify-center gap-2 py-3 bg-pct-green text-white rounded-xl font-bold hover:bg-emerald-600 transition-all text-sm">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.025 3.012l-.548 2.001 2.05-.539c.678.43 1.579.738 2.535.74h.005c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.767-5.766zM12.031 16.921c-2.766 0-5.011-2.245-5.012-5.012 0-2.766 2.245-5.011 5.012-5.011s5.011 2.245 5.012 5.012c0 2.766-2.245 5.011-5.012 5.011z"></path></svg>
                        Suporte via WhatsApp
                    </a>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-pct-blue hover:underline">Voltar para o Login</a>
            </div>
        </div>
    </div>
</x-public-layout>
