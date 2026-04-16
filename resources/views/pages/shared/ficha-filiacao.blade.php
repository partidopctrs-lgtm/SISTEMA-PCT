<x-dashboard-layout>
    <x-slot name="title">Ficha de Filiação – PCT</x-slot>

    <!-- UI Controls (Hidden on Print) -->
    <div class="mb-8 flex justify-between items-center print:hidden">
        <div>
            <h1 class="text-2xl font-black text-pct-blue">Ficha de Filiação Nacional</h1>
            <p class="text-gray-500">Imprima este documento para formalizar novas participações no movimento.</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ url()->previous() }}" class="btn-secondary px-6">
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
                <div class="w-[3cm] h-[4cm] border-2 border-dashed border-gray-300 rounded flex items-center justify-center text-center p-2">
                    <p class="text-[8px] font-bold text-gray-300 uppercase">Foto 3×4</p>
                </div>
            </div>

            <div class="text-center mb-10">
                <h3 class="text-xl font-black text-gray-800 uppercase tracking-tight">Ficha Nacional de Filiação</h3>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">ID de Registro <span class="text-pct-blue font-black">(Uso Interno)</span>: _________________</p>
            </div>

            <!-- 01. Dados Pessoais -->
            <div class="mb-10">
                <div class="bg-slate-100 p-2 px-4 rounded mb-6 print:bg-gray-100">
                    <h4 class="text-xs font-black text-pct-blue uppercase tracking-widest">01. Dados Pessoais</h4>
                </div>
                
                <div class="grid grid-cols-6 gap-y-5 gap-x-6 px-2">
                    <div class="col-span-4">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Nome Completo</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">____________________________________________________________</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Data de Nascimento</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">___/___/______</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">CPF</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">___.___.___-__</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">RG / Órgão Emissor</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">_________________</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Nacionalidade</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">Brasileira</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Estado Civil</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">_________________</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Título de Eleitor</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">_________________</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Zona</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">____</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Seção</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">____</p>
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
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-xs italic text-gray-300">____________________________________________________________</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Bairro</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">_________________</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Cidade</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">_________________</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Estado</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">____</p>
                    </div>
                    <div class="col-span-1">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">CEP</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">_____-___</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">Telefone / WhatsApp</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">(__) _____-____</p>
                    </div>
                    <div class="col-span-6">
                        <p class="text-[9px] font-black text-gray-400 uppercase mb-0.5">E-mail</p>
                        <p class="border-b border-gray-300 pb-0.5 font-bold text-gray-800 text-sm italic text-gray-300">____________________________________________________________</p>
                    </div>
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
            </div>

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
            aside, header, nav, footer, .print-hidden, .btn-primary, .btn-secondary, .sidebar-toggle { 
                display: none !important; 
            }
            body, html {
                background: white !important;
                height: auto !important;
                overflow: visible !important;
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
            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</x-dashboard-layout>
