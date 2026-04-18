<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Unidade Territorial - {{ $directory->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800;900&family=Barlow:wght@400;500;600;700&display=swap');
        body { font-family: 'Barlow', sans-serif; background-color: #f8fafc; }
        h1, h2, h3, .condensed { font-family: 'Barlow Condensed', sans-serif; }
        @media print {
            body { background-color: white; }
            .no-print { display: none !important; }
            @page { margin: 1cm; }
            .sheet { border: none !important; box-shadow: none !important; }
        }
    </style>
</head>
<body class="p-8" onload="window.print()">
    <div class="max-w-[21cm] mx-auto bg-white p-12 shadow-2xl border border-slate-200 sheet rounded-sm min-h-[29.7cm] flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between border-b-2 border-blue-900 pb-6 mb-8">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-900 rounded-lg flex items-center justify-center text-white font-black text-xl">PCT</div>
                <div>
                    <h1 class="text-2xl font-black text-blue-900 uppercase tracking-tighter">Ficha Cadastral de Unidade</h1>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Secretaria Nacional de Organização Territorial</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-[9px] font-black text-gray-400 uppercase">Protocolo Sistema</p>
                <p class="text-xs font-bold text-blue-900 uppercase">#DIR-{{ str_pad($directory->id, 5, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>

        <!-- Directory Info -->
        <div class="grid grid-cols-12 gap-6 mb-12">
            <div class="col-span-12 bg-slate-50 p-6 rounded-xl border border-slate-100">
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Nome da Unidade Territorial</p>
                <p class="text-xl font-black text-blue-900 uppercase">{{ $directory->name }}</p>
            </div>
            
            <div class="col-span-6 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Cidade Sede</p>
                <p class="text-sm font-bold text-gray-700">{{ $directory->city }}</p>
            </div>
            <div class="col-span-2 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">UF</p>
                <p class="text-sm font-bold text-gray-700">{{ $directory->state }}</p>
            </div>
            <div class="col-span-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Nível de Hierarquia</p>
                <p class="text-sm font-bold text-blue-900 uppercase">{{ $directory->directory_type }}</p>
            </div>

            <div class="col-span-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Status de Atividade</p>
                <p class="text-sm font-bold {{ $directory->status === 'active' ? 'text-green-600' : 'text-amber-600' }} uppercase">
                    {{ $directory->status === 'active' ? 'Ativo / Homologado' : 'Em Análise / Pendente' }}
                </p>
            </div>
            <div class="col-span-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Data de Fundação</p>
                <p class="text-sm font-bold text-gray-700">{{ $directory->created_at->format('d/m/Y') }}</p>
            </div>
            <div class="col-span-4 bg-slate-50 p-4 rounded-xl border border-slate-100 text-center">
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Total de Filiados</p>
                <p class="text-lg font-black text-blue-900">{{ $directory->memberships_count }}</p>
            </div>
        </div>

        <!-- Signature Section -->
        <div class="mt-auto grid grid-cols-2 gap-12 border-t-2 border-slate-100 pt-12">
            <div class="text-center">
                <div class="h-px bg-slate-300 w-full mb-2"></div>
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Assinatura Coordenador Responsável</p>
            </div>
            <div class="text-center">
                <div class="h-px bg-slate-300 w-full mb-2"></div>
                <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Secretaria Nacional de Expansão</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-12 pt-8 text-center border-t border-slate-50">
            <p class="text-[8px] font-black text-gray-300 uppercase tracking-[0.3em]">Documento Oficial Gerado Eletronicamente pelo Sistema de Inteligência PCT</p>
            <p class="text-[7px] text-gray-300 mt-1 uppercase italic">A validade jurídica deste documento depende da homologação na ata nacional de diretórios.</p>
        </div>
    </div>

    <div class="fixed bottom-8 right-8 no-print">
        <button onclick="window.close()" class="bg-blue-900 text-white px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest shadow-xl">Fechar Documento</button>
    </div>
</body>
</html>
