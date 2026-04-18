<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Inteligência - PCT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800;900&family=Barlow:wght@400;500;600;700&display=swap');
        body { font-family: 'Barlow', sans-serif; }
        h1, h2, h3, .condensed { font-family: 'Barlow Condensed', sans-serif; }
        @media print {
            .no-print { display: none !important; }
            @page { margin: 1.5cm; }
        }
    </style>
</head>
<body class="bg-white p-8 md:p-16" onload="window.print()">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between border-b-4 border-blue-900 pb-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-blue-900 uppercase tracking-tighter">Relatório Estratégico</h1>
                <p class="text-sm font-bold text-gray-500 uppercase tracking-[0.2em]">PCT – Inteligência e Controle Nacional</p>
            </div>
            <div class="text-right">
                <p class="text-xs font-black text-gray-400 uppercase">Emissor</p>
                <p class="text-sm font-bold text-blue-900">{{ $user->name }}</p>
                <p class="text-[10px] font-black text-pct-green uppercase tracking-widest">{{ $user->position?->title ?? ($user->role === 'admin' ? 'Presidência Nacional' : $user->role) }}</p>
                <p class="text-[9px] text-gray-400 mt-1">{{ now()->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <!-- Executive Summary -->
        <div class="grid grid-cols-3 gap-8 mb-12">
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                <p class="text-[10px] font-black text-gray-400 uppercase mb-2">Total de Filiados</p>
                <p class="text-3xl font-black text-blue-900">{{ number_format($totalUsers, 0, ',', '.') }}</p>
            </div>
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                <p class="text-[10px] font-black text-gray-400 uppercase mb-2">Novos (Mês)</p>
                <p class="text-3xl font-black text-blue-900">{{ number_format($newUsersThisMonth, 0, ',', '.') }}</p>
            </div>
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100">
                <p class="text-[10px] font-black text-gray-400 uppercase mb-2">Eficiência Média</p>
                <p class="text-3xl font-black text-green-600">{{ number_format($efficiency, 1) }}/10</p>
            </div>
        </div>

        <!-- Regional Distribution -->
        <div class="mb-12">
            <h2 class="text-xl font-black text-blue-900 uppercase tracking-widest mb-6 border-l-4 border-green-500 pl-4">Distribuição por Estado</h2>
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 font-black text-gray-400 uppercase text-[10px]">Estado</th>
                        <th class="px-4 py-3 font-black text-gray-400 uppercase text-[10px]">Nº de Filiados</th>
                        <th class="px-4 py-3 font-black text-gray-400 uppercase text-[10px]">Percentual</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($statsByState as $stat)
                    <tr>
                        <td class="px-4 py-3 font-bold text-blue-900 uppercase">{{ $stat->state }}</td>
                        <td class="px-4 py-3 font-medium">{{ number_format($stat->count, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-gray-400">{{ number_format(($stat->count / $totalUsers) * 100, 1) }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Full Directory Ranking -->
        <div class="mb-12">
            <h2 class="text-xl font-black text-blue-900 uppercase tracking-widest mb-6 border-l-4 border-green-500 pl-4">Ranking de Diretórios</h2>
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 font-black text-gray-400 uppercase text-[10px]">Posição</th>
                        <th class="px-4 py-3 font-black text-gray-400 uppercase text-[10px]">Diretório</th>
                        <th class="px-4 py-3 font-black text-gray-400 uppercase text-[10px]">Cidade/UF</th>
                        <th class="px-4 py-3 font-black text-gray-400 uppercase text-[10px]">Membros</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($allDirectories as $index => $dir)
                    <tr>
                        <td class="px-4 py-3 font-black text-blue-900">#{{ $index + 1 }}</td>
                        <td class="px-4 py-3 font-bold uppercase text-xs">{{ $dir->name }}</td>
                        <td class="px-4 py-3 text-gray-400 uppercase text-[10px]">{{ $dir->city }} / {{ $dir->state }}</td>
                        <td class="px-4 py-3 font-black text-blue-900">{{ number_format($dir->memberships_count, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Member Verification List (New) -->
        <div class="mb-12">
            <h2 class="text-xl font-black text-blue-900 uppercase tracking-widest mb-6 border-l-4 border-blue-500 pl-4">Conferência de Membros Ativos</h2>
            <div class="bg-blue-50 p-4 rounded-xl mb-4">
                <p class="text-[10px] text-blue-700 font-bold uppercase italic">Abaixo estão listados os nomes que compõem o total de {{ $totalUsers }} filiados. Identifique possíveis testes para remoção manual no painel de Membros.</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach($memberList as $m)
                <div class="p-3 border-b border-slate-100 flex justify-between items-center">
                    <span class="text-xs font-bold text-gray-700 uppercase">{{ $m->name }}</span>
                    <span class="text-[9px] text-gray-400 uppercase font-bold">{{ $m->city }}/{{ $m->state }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-20 pt-8 border-t border-slate-200 text-center">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Documento Oficial – PCT Movimento Cidadania e Trabalho</p>
            <p class="text-[9px] text-gray-400 mt-2 italic">A reprodução não autorizada deste documento está sujeita às sanções do código de ética institucional.</p>
        </div>
    </div>

    <div class="fixed bottom-8 right-8 no-print">
        <button onclick="window.close()" class="bg-blue-900 text-white px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest shadow-xl">Fechar Relatório</button>
    </div>
</body>
</html>
