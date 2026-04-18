<x-dashboard-layout>
    <x-slot name="title">Gestão de Backups - Portal DEV</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Segurança de Dados</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Backups do Sistema</h1>
            <p class="text-gray-500 font-medium">Histórico de snapshots do banco de dados e arquivos.</p>
        </div>
        <div class="flex gap-3">
            <button class="px-6 py-2 bg-pct-blue text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Criar Novo Backup</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Último Backup</p>
            <h3 class="text-xl font-black text-pct-blue uppercase">Há 2 Horas</h3>
            <p class="text-[10px] text-emerald-600 font-bold mt-2 uppercase tracking-tighter">Automático - Sucesso</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Total Armazenado</p>
            <h3 class="text-xl font-black text-pct-blue uppercase">1.2 GB</h3>
            <p class="text-[10px] text-gray-400 font-bold mt-2 uppercase tracking-tighter">S3 AWS / Local Storage</p>
        </div>
        <div class="card-premium">
            <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-4">Próxima Execução</p>
            <h3 class="text-xl font-black text-pct-blue uppercase">Hoje às 00:00</h3>
            <p class="text-[10px] text-amber-600 font-bold mt-2 uppercase tracking-tighter">Agendado (Cron)</p>
        </div>
    </div>

    <div class="card-premium p-0 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
            <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Histórico de Arquivos</h3>
            <span class="text-[10px] text-gray-400 font-bold uppercase">Exibindo últimos 10 backups</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-4">Arquivo</th>
                        <th class="px-6 py-4">Tamanho</th>
                        <th class="px-6 py-4">Tipo</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @php
                        $backups = [
                            ['name' => 'db_prod_2026-04-18_1200.sql.gz', 'size' => '45MB', 'type' => 'SQL', 'status' => 'success'],
                            ['name' => 'storage_prod_2026-04-18_0000.tar.gz', 'size' => '850MB', 'type' => 'Storage', 'status' => 'success'],
                            ['name' => 'db_prod_2026-04-17_1200.sql.gz', 'size' => '44MB', 'type' => 'SQL', 'status' => 'success'],
                        ];
                    @endphp
                    @foreach($backups as $b)
                    <tr class="border-b border-slate-50 hover:bg-slate-50 transition-all">
                        <td class="px-6 py-4 font-bold text-pct-blue">{{ $b['name'] }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $b['size'] }}</td>
                        <td class="px-6 py-4 font-black text-[10px] text-slate-400 uppercase">{{ $b['type'] }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-emerald-100 text-emerald-600 rounded text-[9px] font-black uppercase">Sucesso</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                </button>
                                <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
