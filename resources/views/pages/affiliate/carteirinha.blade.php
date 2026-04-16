<x-dashboard-layout>
    <x-slot name="title">Carteirinha Digital - PCT</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-black text-pct-blue mb-4">Minha Carteirinha Digital</h1>
            <p class="text-gray-500 font-medium">Leve sua identificação oficial do PCT para qualquer lugar.</p>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center gap-12">
            <!-- ID Card Presentation -->
            <div class="relative group">
                <!-- Front Side -->
                <div class="w-[320px] h-[520px] bg-pct-blue rounded-[2.5rem] shadow-2xl relative overflow-hidden flex flex-col p-8 text-white ring-8 ring-white/50 transition-transform duration-500 hover:rotate-2">
                    <!-- Background Graphics -->
                    <div class="absolute top-0 right-0 w-full h-1/2 bg-gradient-to-br from-pct-green/20 via-transparent to-transparent opacity-50"></div>
                    <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-tr from-pct-green/10 via-transparent to-transparent opacity-30"></div>
                    
                    <!-- Header -->
                    <div class="relative z-10 flex flex-col items-center mb-8">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto mb-4 brightness-0 invert">
                        <p class="text-[10px] font-black tracking-[0.3em] uppercase opacity-60">Movimento Nacional</p>
                        <h4 class="text-lg font-black tracking-normal uppercase">CIDADANIA & TRABALHO</h4>
                    </div>

                    <!-- Photo Section -->
                    <div class="relative z-10 flex flex-col items-center mb-8">
                        <div class="w-32 h-32 rounded-3xl bg-white/10 p-1 ring-4 ring-white/20">
                            <div class="w-full h-full rounded-2xl bg-pct-blue-dark flex items-center justify-center text-3xl font-black">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </div>
                    </div>

                    <!-- User Data -->
                    <div class="relative z-10 flex-grow text-center space-y-1">
                        <p class="text-[10px] font-black text-pct-green uppercase tracking-widest opacity-80">Membro Afiliado</p>
                        <h2 class="text-xl font-bold leading-tight">{{ auth()->user()->name }}</h2>
                        <p class="text-sm opacity-60">Filiado em: {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                        
                        <div class="mt-8 pt-6 border-t border-white/10">
                            <p class="text-[10px] font-black uppercase tracking-widest opacity-40 mb-1">Registro Nacional</p>
                            <p class="text-2xl font-mono font-black text-pct-green">#{{ str_pad(auth()->user()->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>

                    <!-- Footer / QR -->
                    <div class="relative z-10 mt-auto flex justify-between items-end">
                        <div class="bg-white p-2 rounded-xl">
                            <div class="w-16 h-16 bg-slate-100 flex items-center justify-center">
                                <svg class="w-12 h-12 text-pct-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[8px] font-black uppercase tracking-widest opacity-40">Validação</p>
                            <p class="text-sm font-bold">QR-PCT-{{ auth()->user()->id }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col gap-6 w-full max-w-xs">
                <div class="card-premium p-8">
                    <h3 class="text-xl font-bold text-pct-blue mb-6">Opções</h3>
                    <div class="space-y-4">
                        <button onclick="window.print()" class="w-full btn-primary flex items-center justify-center gap-3 py-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Imprimir Documento
                        </button>
                        <button class="w-full py-4 bg-emerald-50 text-pct-green rounded-xl font-bold flex items-center justify-center gap-3 hover:bg-emerald-100 transition-all border border-emerald-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download Imagem
                        </button>
                    </div>
                </div>

                <div class="bg-gray-100 p-6 rounded-3xl border border-gray-200">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Instruções</p>
                    <ul class="text-sm text-gray-600 space-y-2 font-medium">
                        <li>• Use esta carteirinha em eventos</li>
                        <li>• O QR code serve para validar presença</li>
                        <li>• Em caso de perda, gere uma nova</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            header, aside, .btn-primary, .btn-secondary, button, .actions, .instructions, .bg-gray-100 {
                display: none !important;
            }
            main {
                padding: 0 !important;
                background: white !important;
            }
            body {
                background: white !important;
            }
            .max-w-4xl {
                margin: 0 !important;
                padding: 0 !important;
            }
            .carteirinha {
                margin: auto !important;
            }
        }
    </style>
</x-dashboard-layout>
