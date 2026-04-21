<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Realizado - Portal PCT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .success-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }
        .animate-check {
            animation: scaleIn 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
        @keyframes scaleIn {
            from { transform: scale(0); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body class="antialiased bg-gray-50 flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center p-6 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-pct-green/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-pct-blue/10 rounded-full blur-3xl"></div>

        <div class="max-w-lg w-full relative z-10 text-center">
            <div class="success-card p-10 md:p-16 transition-all duration-700 animate-in fade-in slide-in-from-bottom-10">
                <div class="mb-8 flex justify-center">
                    <div class="w-24 h-24 bg-pct-green/10 rounded-full flex items-center justify-center animate-check">
                        <svg class="w-12 h-12 text-pct-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-4xl font-black text-pct-blue mb-4 tracking-tight">
                    Parabéns, {{ session('user_name') }}!
                </h1>
                <p class="text-lg text-gray-600 font-medium mb-8 leading-relaxed">
                    Seu pré-cadastro no <span class="text-pct-blue font-bold">Movimento PCT</span> foi concluído! <br>
                    <span class="text-pct-green font-bold uppercase text-sm tracking-widest bg-pct-green/5 px-3 py-1 rounded-full inline-block mt-4">📧 Verifique seu e-mail</span>
                </p>

                <p class="text-sm text-gray-500 mb-8">
                    Enviamos um link de ativação para o seu e-mail. <br>
                    <strong>Clique no link para liberar seu acesso e entrar automaticamente.</strong>
                </p>

                <div class="space-y-4">
                    <div class="bg-gray-100 p-4 rounded-2xl mb-4 border border-gray-200">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Dica de Acesso</p>
                        <p class="text-[11px] text-gray-500 font-medium leading-tight">Não encontrou o e-mail? Verifique sua pasta de <strong>Spam</strong> ou <strong>Promoções</strong>.</p>
                    </div>
                    <a href="{{ route('login') }}" 
                        class="block w-full py-5 px-6 bg-gray-200 text-gray-500 rounded-2xl text-lg font-black transition-all cursor-not-allowed">
                        PORTAL BLOQUEADO (AGUARDANDO E-MAIL)
                    </a>
                    <a href="/" class="block text-sm font-bold text-gray-400 hover:text-pct-blue transition-colors">
                        Voltar para a página inicial
                    </a>
                </div>
            </div>

            <p class="mt-8 text-xs font-bold text-gray-400 uppercase tracking-widest">
                Suporte: (51) 93380-6899 • Taquara, RS
            </p>
        </div>
    </div>
    
    <footer class="py-10 text-center opacity-40">
        <p class="text-[10px] font-bold text-pct-blue uppercase tracking-[0.2em]">Movimento Político Cidadania e Trabalho &copy; {{ date('Y') }}</p>
    </footer>
</body>
</html>
