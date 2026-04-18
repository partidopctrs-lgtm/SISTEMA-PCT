<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚖️ Portal Jurídico — PCT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(135deg, #0a0e1a 0%, #0f1729 50%, #0a1020 100%); min-height: 100vh; }
    </style>
</head>
<body class="flex items-center justify-center p-4 min-h-screen">

    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-amber-400 to-amber-600 rounded-3xl shadow-2xl shadow-amber-500/30 mb-6">
                <span class="text-3xl">⚖️</span>
            </div>
            <h1 class="text-2xl font-black text-white tracking-tight">Portal do Advogado</h1>
            <p class="text-slate-400 text-sm font-medium mt-1">Corpo Jurídico Nacional — PCT</p>
        </div>

        <!-- Card Login -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl">
            <h2 class="text-lg font-black text-white mb-1">Acesso Restrito</h2>
            <p class="text-slate-400 text-xs font-medium mb-8">Exclusivo para membros do Departamento Jurídico</p>

            @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-2xl">
                <p class="text-red-400 text-xs font-bold">{{ $errors->first('email') }}</p>
            </div>
            @endif

            <form method="POST" action="{{ route('advogado.login.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">E-mail Institucional</label>
                    <input type="email" name="email" required autofocus value="{{ old('email') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm font-medium placeholder-slate-600 focus:outline-none focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/20 transition-all"
                        placeholder="advogado@pct.social.br">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Senha</label>
                    <input type="password" name="password" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm font-medium placeholder-slate-600 focus:outline-none focus:border-amber-500/50 focus:ring-2 focus:ring-amber-500/20 transition-all"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="rounded">
                    <label for="remember" class="text-xs text-slate-400 font-medium">Manter sessão ativa</label>
                </div>

                <button type="submit"
                    class="w-full py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-black text-sm uppercase tracking-widest rounded-2xl hover:from-amber-400 hover:to-amber-500 transition-all shadow-xl shadow-amber-500/25 mt-2">
                    Acessar Painel Jurídico
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="/login" class="text-slate-500 text-xs font-bold hover:text-slate-400 transition-colors">
                ← Voltar ao Portal do Afiliado
            </a>
        </div>

        <!-- Segurança -->
        <div class="flex items-center justify-center gap-2 mt-8">
            <div class="h-px bg-white/5 w-12"></div>
            <p class="text-slate-600 text-[10px] font-bold uppercase tracking-widest">Acesso monitorado e auditado</p>
            <div class="h-px bg-white/5 w-12"></div>
        </div>
    </div>
</body>
</html>
