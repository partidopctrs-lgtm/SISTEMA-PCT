<x-dashboard-layout>
    <x-slot name="title">Certificado de Conclusão - Escola PCT</x-slot>

    <!-- UI Controls (Hidden on Print) -->
    <div class="mb-8 flex justify-between items-center print:hidden">
        <div>
            <h1 class="text-2xl font-black text-pct-blue">Seu Certificado Oficial</h1>
            <p class="text-gray-500">Parabéns por concluir sua formação política na Escola PCT.</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('affiliate.escola') }}" class="btn-secondary px-6">
                Voltar
            </a>
            <button onclick="window.print()" class="btn-primary px-8 flex items-center gap-2 shadow-lg shadow-pct-blue/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Imprimir / Salvar PDF
            </button>
        </div>
    </div>

    <!-- Certificate Block -->
    <div class="bg-white p-0 sm:p-10 mb-20 flex justify-center overflow-auto">
        <div id="print-area" class="certificate-sheet bg-white shadow-2xl print:shadow-none p-1 border-[16px] border-pct-blue relative">
            <div class="border-2 border-pct-green p-12 md:p-20 h-full flex flex-col items-center text-center relative overflow-hidden">
                
                <!-- Background Decorations -->
                <div class="absolute inset-0 flex items-center justify-center opacity-[0.03] pointer-events-none">
                    <img src="{{ asset('logo.png') }}" alt="" class="w-[800px] h-[800px] object-contain">
                </div>

                <!-- Header -->
                <div class="mb-14 relative z-10">
                    <img src="{{ asset('logo.png') }}" alt="Logo PCT" class="h-28 w-auto mx-auto mb-8">
                    <h2 class="text-xl font-black text-pct-blue tracking-[0.5em] uppercase">Escola Política Nacional</h2>
                    <p class="text-xs font-bold text-pct-green tracking-[0.3em] uppercase mt-3">Movimento Cidadania e Trabalho</p>
                </div>

                <!-- Title -->
                <div class="mb-14 relative z-10">
                    <h3 class="text-6xl font-black text-pct-blue uppercase tracking-tighter mb-4 italic">Certificado</h3>
                    <div class="flex items-center gap-4 justify-center">
                        <div class="h-0.5 w-20 bg-pct-green opacity-40"></div>
                        <span class="text-[10px] font-black tracking-widest text-slate-400 uppercase">Diploma de Formação</span>
                        <div class="h-0.5 w-20 bg-pct-green opacity-40"></div>
                    </div>
                </div>

                <!-- Body -->
                <div class="max-w-4xl mx-auto space-y-10 relative z-10">
                    <p class="text-xl text-slate-400 font-medium font-serif italic">
                        Certificamos para os devidos fins institucionais e estatutários que
                    </p>
                    
                    <h4 class="text-5xl font-black text-pct-blue uppercase tracking-tight">
                        {{ $user->name ?? 'MEMBRO DO MOVIMENTO' }}
                    </h4>

                    <div class="px-16">
                        <p class="text-xl text-slate-600 font-medium leading-relaxed">
                            concluiu com êxito e aproveitamento integral a <span class="text-pct-blue font-black underline decoration-pct-green decoration-2 underline-offset-4">Jornada de Formação Oficial do Afiliado PCT</span>, composta por 12 módulos técnicos abrangendo princípios de conduta, ideologia política, organização de diretórios e liderança comunitária.
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-20 grid grid-cols-2 gap-32 w-full px-24 relative z-10">
                    <div class="flex flex-col items-center">
                        <div class="w-full border-b-2 border-slate-200 pb-3 mb-3 italic font-serif text-2xl text-pct-blue font-bold">
                            Diretório Nacional
                        </div>
                        <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Secretaria de Formação Política</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-full border-b-2 border-slate-200 pb-3 mb-3 font-mono text-xl text-slate-700">
                            {{ now()->format('d/m/Y') }}
                        </div>
                        <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest">Data de Outorga</p>
                    </div>
                </div>

                <!-- Auth / Seal -->
                <div class="mt-16 flex flex-col items-center gap-4">
                    <div class="w-16 h-16 border-2 border-pct-green/20 rounded-full flex items-center justify-center">
                        <div class="w-12 h-12 bg-pct-green/10 rounded-full flex items-center justify-center text-pct-green">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="text-[9px] font-bold text-slate-300 uppercase tracking-[0.3em]">
                        Autenticação Digital: PCT-{{ strtoupper(Str::random(12)) }}
                    </div>
                </div>
            </div>

            <!-- Decorative Corners -->
            <div class="absolute top-2 left-2 w-12 h-12 border-t-2 border-l-2 border-pct-green opacity-40"></div>
            <div class="absolute top-2 right-2 w-12 h-12 border-t-2 border-r-2 border-pct-green opacity-40"></div>
            <div class="absolute bottom-2 left-2 w-12 h-12 border-b-2 border-l-2 border-pct-green opacity-40"></div>
            <div class="absolute bottom-2 right-2 w-12 h-12 border-b-2 border-r-2 border-pct-green opacity-40"></div>
        </div>
    </div>

    @push('styles')
    <style>
        @media screen {
            .certificate-sheet {
                width: 297mm;
                height: 210mm;
                background: white;
            }
        }
        @media print {
            @page {
                size: landscape;
                margin: 0;
            }
            body {
                margin: 0;
                padding: 0;
            }
            aside, header, nav, footer, .print:hidden, .btn-primary, .btn-secondary, .sidebar-toggle { 
                display: none !important; 
            }
            main {
                padding: 0 !important;
                margin: 0 !important;
                width: 100% !important;
                height: 100% !important;
                display: block !important;
            }
            .certificate-sheet {
                width: 297mm !important;
                height: 210mm !important;
                margin: 0 !important;
                padding: 0 !important;
                border: 16px solid #003366 !important;
                box-shadow: none !important;
                page-break-inside: avoid;
            }
            .certificate-sheet > div {
                border-color: #00A859 !important;
            }
        }
    </style>
    @endpush
</x-dashboard-layout>
