<x-dashboard-layout>
    <x-slot name="title">Configurações Técnicas - Portal DEV</x-slot>

    <div class="mb-12">
        <p class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] mb-2">Variáveis de Ambiente</p>
        <h1 class="text-3xl font-black text-pct-blue tracking-tight">Parâmetros do Sistema</h1>
        <p class="text-gray-500 font-medium">Configurações de infraestrutura e chaves de integração.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest border-b border-slate-50 pb-4">Conexão de Banco</h3>
            <div class="space-y-6">
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Host do Banco</label>
                    <input type="text" disabled value="{{ config('database.connections.'.config('database.default').'.host') }}" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue">
                </div>
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Nome da Base</label>
                    <input type="text" disabled value="{{ config('database.connections.'.config('database.default').'.database') }}" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue">
                </div>
                <div class="flex items-center gap-4 p-4 bg-amber-50 rounded-2xl border border-amber-100">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <p class="text-[10px] text-amber-700 font-bold leading-relaxed uppercase tracking-tighter">As chaves reais estão protegidas pelo arquivo .env. Use o terminal VPS para modificações sensíveis.</p>
                </div>
            </div>
        </div>

        <div class="card-premium">
            <h3 class="text-lg font-black text-pct-blue mb-8 uppercase tracking-widest border-b border-slate-50 pb-4">Servidor de E-mail (SMTP)</h3>
            <div class="space-y-6">
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Host SMTP</label>
                    <input type="text" disabled value="{{ config('mail.mailers.smtp.host') }}" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue">
                </div>
                <div class="flex justify-between gap-4">
                    <div class="w-full">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Porta</label>
                        <input type="text" disabled value="{{ config('mail.mailers.smtp.port') }}" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue">
                    </div>
                    <div class="w-full">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Encryption</label>
                        <input type="text" disabled value="{{ config('mail.mailers.smtp.encryption') }}" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue">
                    </div>
                </div>
                <button class="w-full py-3 bg-slate-900 text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-black transition-all">Testar Conexão SMTP</button>
            </div>
        </div>
    </div>
</x-dashboard-layout>
