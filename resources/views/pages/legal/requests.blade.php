<x-dashboard-layout>
    <x-slot name="title">Solicitações Jurídicas - PCT</x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-3xl font-black text-pct-blue tracking-tight mb-2">Central de Solicitações</h1>
                <p class="text-gray-500 font-medium">Gerencie e responda às demandas jurídicas de todos os níveis.</p>
            </div>
            
            <div class="flex gap-3">
                <div class="bg-white p-2 rounded-2xl shadow-sm border border-slate-100 flex gap-2">
                    <a href="?level=local" class="px-4 py-2 {{ request('level') == 'local' ? 'bg-blue-600 text-white' : 'bg-slate-50 text-gray-500' }} rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">Local</a>
                    <a href="?level=state" class="px-4 py-2 {{ request('level') == 'state' ? 'bg-blue-600 text-white' : 'bg-slate-50 text-gray-500' }} rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">Estadual</a>
                    <a href="?level=national" class="px-4 py-2 {{ request('level') == 'national' ? 'bg-blue-600 text-white' : 'bg-slate-50 text-gray-500' }} rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">Nacional</a>
                    <a href="{{ route('legal.requests') }}" class="px-4 py-2 {{ !request('level') ? 'bg-pct-blue text-white' : 'bg-slate-50 text-gray-500' }} rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">Todos</a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Código</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Solicitante</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Demanda</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Nível</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($requests as $request)
                    <tr class="hover:bg-slate-50/50 transition-all cursor-pointer" onclick="window.location='{{ route('legal.requests.show', $request->id) }}'">
                        <td class="px-8 py-6">
                            <span class="font-black text-pct-blue text-xs tracking-tighter">{{ $request->request_code }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 bg-indigo-50 rounded-lg flex items-center justify-center text-indigo-600 text-[10px] font-black">
                                    {{ substr($request->requester->full_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-900 leading-none mb-1">{{ $request->requester->full_name }}</p>
                                    <p class="text-[9px] text-gray-400 font-black uppercase tracking-widest">{{ $request->requester_profile_type }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <p class="text-xs font-bold text-pct-blue mb-1">{{ $request->title }}</p>
                            <span class="text-[9px] px-2 py-0.5 bg-slate-100 text-slate-500 rounded font-black uppercase tracking-widest">{{ $request->request_type }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-black uppercase tracking-widest {{ $request->level == 'national' ? 'text-red-600' : ($request->level == 'state' ? 'text-amber-600' : 'text-blue-500') }}">
                                {{ $request->level }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full {{ $request->status == 'new' ? 'bg-blue-500' : ($request->status == 'in_progress' ? 'bg-amber-500' : 'bg-pct-green') }}"></span>
                                <span class="text-[10px] font-black uppercase tracking-widest text-gray-500">{{ $request->status }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <a href="{{ route('legal.requests.show', $request->id) }}" class="p-2 bg-white border border-slate-200 rounded-xl text-pct-blue hover:bg-pct-blue hover:text-white transition-all shadow-sm flex items-center justify-center w-10 h-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="px-8 py-6 bg-slate-50/50">
                {{ $requests->links() }}
            </div>
        </div>
    </div>
</x-dashboard-layout>
