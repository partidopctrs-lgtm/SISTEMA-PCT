<x-dashboard-layout>
    <x-slot name="title">Repositório Oficial - Admin PCT</x-slot>

    <div class="mb-12 flex justify-between items-end">
        <div>
            <h1 class="text-4xl font-black text-pct-blue tracking-tight mb-2 italic underline decoration-pct-green decoration-8 underline-offset-8">Repositório Oficial</h1>
            <p class="text-gray-500 font-medium tracking-wide">Gerencie os documentos, hinos, manuais e materiais de campanha do movimento.</p>
        </div>
        <button class="btn-primary px-6 py-3 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            <span>Upload de Arquivo</span>
        </button>
    </div>

    <!-- Storage Info -->
    <div class="glass p-8 rounded-3xl mb-12 flex items-center justify-between bg-gradient-to-r from-pct-blue to-blue-900 text-white">
        <div class="flex items-center space-x-6">
            <div class="p-4 bg-white/10 rounded-2xl ring-1 ring-white/20">
                <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-blue-300 mb-1">Espaço Utilizado</p>
                <h3 class="text-3xl font-black italic tracking-tighter">4.2 GB / 10 GB</h3>
            </div>
        </div>
        <div class="w-64 h-2 bg-white/10 rounded-full overflow-hidden">
            <div class="h-full bg-pct-green" style="width: 42%"></div>
        </div>
    </div>

    <div class="glass p-8 rounded-[2rem] shadow-sm">
        <h3 class="font-black text-pct-blue uppercase tracking-widest mb-8">Arquivos no Repositório</h3>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            @foreach([
                ['name' => 'Manifesto Oficial_2026.pdf', 'size' => '2.4 MB', 'type' => 'PDF', 'downloads' => 1240],
                ['name' => 'Hino_PCT_Força_Brasil.mp3', 'size' => '8.7 MB', 'type' => 'Audio', 'downloads' => 850],
                ['name' => 'Manual_de_Identidade_Visual.zip', 'size' => '45 MB', 'type' => 'ZIP', 'downloads' => 320],
                ['name' => 'Ficha_de_Filiação_Modelo.docx', 'size' => '840 KB', 'type' => 'DOCX', 'downloads' => 2100],
            ] as $file)
            <div class="flex items-center justify-between p-6 bg-white/50 border border-gray-100 rounded-2xl hover:bg-white hover:shadow-md transition-all group">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-50 text-pct-blue rounded-xl flex items-center justify-center font-black text-[10px]">
                        {{ $file['type'] }}
                    </div>
                    <div>
                        <p class="font-bold text-pct-blue tracking-tight leading-none mb-1">{{ $file['name'] }}</p>
                        <p class="text-[10px] text-gray-400 font-medium italic">{{ $file['size'] }} • {{ $file['downloads'] }} Downloads</p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                    <button class="p-2 text-gray-400 hover:text-pct-blue transition-colors">
                         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
