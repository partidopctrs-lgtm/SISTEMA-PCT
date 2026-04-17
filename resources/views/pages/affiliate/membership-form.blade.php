<x-dashboard-layout>
    <x-slot name="title">Ficha de Filiação – PCT</x-slot>

    <!-- UI Controls (Hidden on Print) -->
    <div class="mb-8 flex justify-between items-center print:hidden">
        <div>
            <h1 class="text-2xl font-black text-pct-blue">Sua Ficha de Filiação</h1>
            <p class="text-gray-500">Imprima este documento para formalizar sua participação oficial.</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('affiliate.documentos') }}" class="btn-secondary px-6">
                Voltar
            </a>
            <button onclick="window.print()" class="btn-primary px-8 flex items-center gap-2 shadow-lg shadow-pct-blue/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                Imprimir Ficha (PDF)
            </button>
        </div>
    </div>

    <!-- Printable A4 Block -->
    <div class="bg-white p-0 sm:p-4 mb-20 flex justify-center">
        <div id="print-area" class="a4-sheet bg-white shadow-2xl print:shadow-none p-12 md:p-16 border border-gray-200 print:border-0 print:p-0">
            <!-- Header -->
            <div class="flex items-start justify-between border-b-4 border-pct-blue pb-8 mb-8">
                <div class="flex items-center gap-6">
                    <img src="{{ asset('logo.png') }}" alt="Logo PCT" class="h-20 w-auto">
                    <div>
                        <h2 class="text-3xl font-black text-pct-blue uppercase tracking-tighter leading-none">PCT</h2>
                        <p class="text-[10px] font-bold text-pct-green tracking-[0.3em] uppercase">Movimento Cidadania e Trabalho</p>
                    </div>
                </div>
                <!-- Foto 3x4 Placeholder -->
                <div class="w-[3cm] h-[4cm] border-2 border-dashed border-gray-300 rounded flex items-center justify-center text-center p-2">
                    <p class="text-[8px] font-bold text-gray-300 uppercase">Foto 3×4</p>
                </div>
            </div>

            <div class="text-center mb-10">
                <h3 class="text-xl font-black text-gray-800 uppercase tracking-tight">Ficha Nacional de Filiação</h3>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">ID de Registro <span class="text-pct-blue font-black">(Uso Interno)</span>: <span class="text-gray-900">{{ auth()->user()->registration_number }}</span></p>
            </div>

            <!-- 01. Dados Pessoais -->
            <div class="mb-10">
                <div class="bg-slate-100 p-2 px-4 rounded mb-6 print:bg-gray-100">
                    <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest">01. Dados Pessoais</h4>
                </div>
                
                <div class="grid grid-cols-6 gap-y-5 gap-x-6 px-2">
                    <div class="col-span-4">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Nome Completo</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm uppercase">{{ auth()->user()->name }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Data de Nascimento</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->birth_date ? \Carbon\Carbon::parse(auth()->user()->birth_date)->format('d / m / Y') : '__ / __ / ____' }}</p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">CPF</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->cpf ?? '___.___.___-__' }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">RG / Órgão Emissor</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->rg ?? '_________________' }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Nacionalidade</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">Brasileira</p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Estado Civil</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->marital_status ?? '_________________' }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Título de Eleitor</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->voter_id ?? '_________________' }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Zona</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->voter_zone ?? '____' }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Seção</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->voter_section ?? '____' }}</p>
                    </div>

                    <div class="col-span-3">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Profissão / Ocupação</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->profession ?? '_________________________' }}</p>
                    </div>
                    <div class="col-span-3">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Escolaridade</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->education ?? '_________________________' }}</p>
                    </div>
                </div>
            </div>

            <!-- 02. Contato e Endereço -->
            <div class="mb-10">
                <div class="bg-slate-100 p-2 px-4 rounded mb-6 print:bg-gray-100">
                    <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest">02. Contato e Endereço</h4>
                </div>
                <div class="grid grid-cols-6 gap-y-5 gap-x-6 px-2">
                    <div class="col-span-4">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Endereço Completo (Rua, Número, Complemento)</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic uppercase">{{ auth()->user()->address ?? '____________________________________________________________' }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Bairro</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic uppercase">{{ auth()->user()->neighborhood ?? '_________________' }}</p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Cidade</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic uppercase">{{ auth()->user()->city ?? '_________________' }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Estado</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic uppercase">{{ auth()->user()->state ?? '____' }}</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">CEP</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->zip_code ?? '_____-___' }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Telefone / WhatsApp</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->phone ?? '(__) _____-____' }}</p>
                    </div>
                    <div class="col-span-6">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">E-mail</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- 03. Áreas de Interesse -->
            <div class="mb-10">
                <div class="bg-slate-100 p-2 px-4 rounded mb-4 print:bg-gray-100">
                    <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest">03. Áreas de Interesse / Atuação</h4>
                </div>
                <div class="grid grid-cols-3 gap-y-3 px-4">
                    @foreach(['Educação política', 'Comunicação', 'Captação de membros', 'Eventos e mobilização', 'Propostas e projetos', 'Núcleo local', 'Redes sociais', 'Jurídico', 'Outra área'] as $area)
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 border border-gray-400 rounded-sm"></div>
                        <span class="text-[10px] font-bold text-gray-700">{{ $area }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Declaração -->
            <div class="p-6 border-2 border-slate-100 bg-slate-50/50 rounded-2xl mb-12 print:border-gray-300 print:rounded-none px-10">
                <h4 class="text-[10px] font-black text-pct-blue mb-3 uppercase">Declaração de Filiação</h4>
                <p class="text-[10px] text-slate-700 leading-relaxed text-left font-medium">
                    Declaro que li e concordo com o Manifesto Oficial do **PCT – Movimento Cidadania e Trabalho**, que sou maior de 18 anos, que os dados fornecidos são verdadeiros e que desejo me filiar voluntariamente a este movimento, comprometendo-me com seus valores de Liberdade, Trabalho, Responsabilidade e Transparência.
                </p>
            </div>

            <!-- Assinatura e Rodapé -->
            <div class="mt-8">
                <div class="flex justify-between items-start gap-12">
                    <div class="w-1/2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-6">Local e Data</p>
                        <div class="border-b border-gray-400 w-full text-center pb-1 font-bold text-xs">
                            ____________________, ____ de __________ de 20____
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="h-12 flex items-end">
                            <div class="border-b border-gray-800 w-full mb-1"></div>
                        </div>
                        <p class="text-center text-[9px] font-black uppercase text-gray-800">Assinatura do Filiado</p>
                    </div>
                </div>
                
                <div class="mt-12 flex justify-center">
                    <div class="w-2/3 border-t border-dashed border-gray-300 pt-1 text-center font-bold uppercase text-[9px] text-gray-400">
                        Responsável pelo cadastro
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-24 pt-8 border-t border-gray-100 flex justify-between items-center opacity-40">
                <p class="text-[8px] font-bold uppercase tracking-widest text-gray-400">Documento Gerado em: {{ now()->format('d/m/Y H:i') }}</p>
                <p class="text-[8px] font-bold uppercase tracking-widest text-gray-400">PCT.SOCIAL.BR</p>
            </div>
        </div>
    </div>

    <style>
        @media screen {
            .a4-sheet {
                width: 210mm;
                min-height: 297mm;
                background: white;
            }
        }
        @media print {
            /* Hide all UI elements */
            aside, header, nav, footer, .print-hidden, .btn-primary, .btn-secondary, .sidebar-toggle { 
                display: none !important; 
            }

            /* Reset layout constraints for printing */
            body, html {
                background: white !important;
                height: auto !important;
                overflow: visible !important;
                width: 100% !important;
            }

            div.flex.h-screen {
                display: block !important;
                height: auto !important;
                overflow: visible !important;
            }

            div.flex-grow.flex.flex-col {
                display: block !important;
                width: 100% !important;
            }

            main {
                padding: 0 !important;
                margin: 0 !important;
                overflow: visible !important;
            }

            .a4-sheet {
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                border: 0 !important;
                box-shadow: none !important;
            }

            /* Ensure colors and backgrounds print correctly */
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</x-dashboard-layout>
