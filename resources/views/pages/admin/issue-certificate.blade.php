<x-dashboard-layout>
    <x-slot name="title">Emissão de Certificado - Escola de Formação Política</x-slot>

    <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <p class="text-[10px] font-black text-blue-500 uppercase tracking-[0.3em] mb-2">Escola de Formação Política</p>
            <h1 class="text-3xl font-black text-pct-blue tracking-tight">Gerador de Certificados</h1>
            <p class="text-gray-500 font-medium">Emita certificados oficiais de conclusão de curso para a militância.</p>
        </div>
        <div class="flex gap-3">
            <button onclick="window.print()" class="px-6 py-2 bg-pct-blue text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20">Imprimir Certificado</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        <!-- Preview do Certificado -->
        <div class="sticky top-8">
            <div id="certificate-preview" class="bg-white shadow-2xl rounded-sm overflow-hidden transform scale-75 origin-top-left" style="width: 680px; min-height: 500px;">
                @include('components.certificate-template', [
                    'nome' => 'Nome do Aluno',
                    'num' => 'PCT-EFP-2026-XXX',
                    'curso' => 'Formação Política e Cidadania',
                    'modulo' => 'Módulo I — Fundamentos',
                    'ch' => '40 horas',
                    'periodo' => 'Março a Abril de 2026',
                    'modalidade' => 'Presencial',
                    'coord' => '[Nome do Coordenador]',
                    'inst' => '[Nome do Instrutor]',
                    'conc' => 'Aprovado(a)',
                    'data_emissao' => 'Abril de 2026'
                ])
            </div>
        </div>

        <!-- Formulário de Edição -->
        <div class="card-premium">
            <h3 class="text-sm font-black text-pct-blue mb-8 uppercase tracking-widest border-b border-slate-50 pb-4">Dados do Certificado</h3>
            <form id="cert-form" class="space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Nome do Aluno</label>
                        <input type="text" name="nome" id="in-nome" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue" value="Marcos Vinicius Dresbach do Amaral">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Nº do Certificado</label>
                        <input type="text" name="num" id="in-num" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue" value="PCT-EFP-2026-001">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Conceito Final</label>
                        <input type="text" name="conc" id="in-conc" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue" value="Aprovado(a)">
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Curso</label>
                        <input type="text" name="curso" id="in-curso" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue" value="Formação Política e Cidadania: Fundamentos da Participação Democrática">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Módulo</label>
                        <input type="text" name="modulo" id="in-modulo" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue" value="Módulo I — Introdução à Política e Cidadania">
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Carga Horária</label>
                        <input type="text" name="ch" id="in-ch" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue" value="40 horas">
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2">Período</label>
                        <input type="text" name="periodo" id="in-periodo" class="w-full bg-slate-50 border border-slate-100 p-3 rounded-xl text-sm font-bold text-pct-blue" value="Março a Abril de 2026">
                    </div>
                </div>

                <button type="button" onclick="updatePreview()" class="w-full py-4 bg-slate-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-black transition-all shadow-xl shadow-slate-900/20">Atualizar Pré-visualização</button>
            </form>
        </div>
    </div>

    @push('styles')
    <style>
        @media print {
            body * { visibility: hidden; }
            #certificate-preview, #certificate-preview * { visibility: visible; }
            #certificate-preview { position: absolute; left: 0; top: 0; transform: scale(1.4); }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        function updatePreview() {
            // Lógica para atualizar o DOM do iframe ou componente incluído
            const fields = ['nome', 'num', 'curso', 'modulo', 'ch', 'periodo', 'conc'];
            fields.forEach(f => {
                const val = document.getElementById('in-' + f).value;
                const target = document.querySelector('.cert [data-field="' + f + '"]');
                if(target) target.textContent = val;
            });
            
            // Especial para o protocolo no rodapé
            const num = document.getElementById('in-num').value;
            document.querySelector('.cert [data-field="num-raw"]').textContent = num;
            document.querySelector('.cert [data-field="bc-num"]').textContent = num.replace(/-/g, '');
        }

        // Inicializar
        window.onload = updatePreview;
    </script>
    @endpush
</x-dashboard-layout>
