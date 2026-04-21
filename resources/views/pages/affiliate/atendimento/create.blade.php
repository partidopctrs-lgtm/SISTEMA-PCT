<x-dashboard-layout>
    <x-slot name="title">Atendimento PCT - Novo Relato</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-10 text-center">
            <div class="inline-flex p-4 bg-blue-50 text-pct-blue rounded-3xl mb-6">
                <img src="{{ asset('icons/agua.svg') }}" class="w-10 h-10" alt="Água">
            </div>
            <h1 class="text-3xl font-black text-pct-blue uppercase tracking-tighter">Enviar Novo Relato</h1>
            <p class="text-gray-500 font-medium">Sua denúncia ajuda o PCT a pressionar por soluções reais para a água no RS.</p>
        </div>

        <form action="{{ route('affiliate.atendimento.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <!-- Hidden Geolocation Fields -->
            <input type="hidden" name="latitude" id="lat">
            <input type="hidden" name="longitude" id="lng">

            <div class="bg-white rounded-[3rem] border border-slate-100 shadow-xl p-8 md:p-12 space-y-10">
                <!-- Seção 1: Onde e Quando -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="w-8 h-8 rounded-full bg-pct-blue text-white flex items-center justify-center text-xs font-black">1</span>
                        <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Localização e Data</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Cidade</label>
                            <input type="text" name="city" id="city_input" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Ex: Taquara">
                            <button type="button" onclick="detectLocation()" class="text-[9px] font-black text-pct-blue uppercase tracking-widest ml-4 hover:underline flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Detectar minha localização
                            </button>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Bairro / Região</label>
                            <input type="text" name="neighborhood" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Ex: Santa Rosa">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Data do Problema</label>
                            <input type="date" name="event_date" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Tipo de Problema</label>
                            <select name="problem_type" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all appearance-none">
                                <option value="">Selecione...</option>
                                <option value="Falta de Água">Falta de Água</option>
                                <option value="Água Suja/Barrenta">Água Suja / Barrenta</option>
                                <option value="Baixa Pressão">Baixa Pressão</option>
                                <option value="Vazamento na Rua">Vazamento na Rua</option>
                                <option value="Falta de Esgoto">Problemas de Esgoto</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-50">

                <!-- Seção 2: Detalhes -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="w-8 h-8 rounded-full bg-pct-blue text-white flex items-center justify-center text-xs font-black">2</span>
                        <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Descrição e Gravidade</h3>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Relate o que está acontecendo</label>
                        <textarea name="description" rows="4" required class="w-full bg-slate-50 border border-slate-100 rounded-[2rem] px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="Descreva o problema em detalhes..."></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Nível de Gravidade</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="relative flex flex-col items-center gap-2 p-4 bg-slate-50 rounded-2xl border border-slate-100 cursor-pointer hover:bg-white transition-all group">
                                    <input type="radio" name="gravity" value="baixa" checked class="absolute opacity-0">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-pct-blue uppercase">Baixa</span>
                                </label>
                                <label class="relative flex flex-col items-center gap-2 p-4 bg-slate-50 rounded-2xl border border-slate-100 cursor-pointer hover:bg-white transition-all group">
                                    <input type="radio" name="gravity" value="alta" class="absolute opacity-0">
                                    <span class="text-[10px] font-black text-slate-400 group-hover:text-red-500 uppercase">Alta / Crítica</span>
                                </label>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Impacto Social</label>
                            <div class="flex flex-wrap gap-2">
                                <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-full border border-slate-100 cursor-pointer hover:bg-white transition-all">
                                    <input type="checkbox" name="is_urgent" class="rounded text-pct-blue">
                                    <span class="text-[9px] font-black text-slate-400 uppercase">Urgente</span>
                                </label>
                                <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-full border border-slate-100 cursor-pointer hover:bg-white transition-all">
                                    <input type="checkbox" name="is_collective" class="rounded text-pct-blue">
                                    <span class="text-[9px] font-black text-slate-400 uppercase">Coletivo (Bairro todo)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-50">

                <!-- Seção 3: Provas -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="w-8 h-8 rounded-full bg-pct-blue text-white flex items-center justify-center text-xs font-black">3</span>
                        <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Anexar Provas (Fotos/Vídeos/PDF)</h3>
                    </div>

                    <div class="relative group">
                        <input type="file" name="evidences[]" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleFiles(this.files)">
                        <div class="p-12 border-4 border-dashed border-slate-100 rounded-[3rem] bg-slate-50/50 text-center group-hover:border-pct-blue transition-all">
                            <svg class="w-12 h-12 text-slate-200 mx-auto mb-4 group-hover:text-pct-blue transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class="text-xs font-black text-pct-blue uppercase tracking-widest">Arraste arquivos ou clique aqui</p>
                            <p class="text-[10px] text-gray-400 mt-2">Formatos aceitos: JPG, PNG, MP4, PDF (Max 20MB)</p>
                        </div>
                    </div>
                    <div id="file-preview" class="grid grid-cols-3 gap-4"></div>
                </div>

                <hr class="border-slate-50">

                <!-- Seção 4: Contato -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="w-8 h-8 rounded-full bg-pct-blue text-white flex items-center justify-center text-xs font-black">4</span>
                        <h3 class="text-sm font-black text-pct-blue uppercase tracking-widest">Seu Contato (WhatsApp)</h3>
                    </div>
                    <div class="space-y-2">
                        <input type="text" name="contact" required class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs font-bold text-pct-blue focus:ring-2 focus:ring-pct-blue outline-none transition-all" placeholder="(00) 00000-0000" value="{{ auth()->user()->phone }}">
                    </div>
                </div>
            </div>

            <div class="flex justify-center pt-6">
                <button type="submit" class="w-full md:w-auto px-12 py-5 bg-pct-blue text-white rounded-[2rem] font-black uppercase text-sm tracking-[0.2em] hover:bg-blue-900 transition-all shadow-2xl shadow-blue-900/40 transform hover:-translate-y-1 active:scale-95">
                    🚀 Enviar Relato Oficial
                </button>
            </div>
        </form>
    </div>

    <script>
        function handleFiles(files) {
            const preview = document.getElementById('file-preview');
            preview.innerHTML = '';
            Array.from(files).forEach(file => {
                const item = document.createElement('div');
                item.className = 'bg-slate-50 p-3 rounded-2xl border border-slate-100 text-center';
                item.innerHTML = `
                    <p class="text-[9px] font-black text-pct-blue uppercase truncate">${file.name}</p>
                    <p class="text-[8px] text-gray-400 font-bold">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                `;
                preview.appendChild(item);
            });
        }

        function detectLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('lat').value = position.coords.latitude;
                    document.getElementById('lng').value = position.coords.longitude;
                    alert("Localização capturada com sucesso! Isso ajudará na precisão do nosso mapa de problemas.");
                });
            } else {
                alert("Geolocalização não suportada pelo seu navegador.");
            }
        }
    </script>
</x-dashboard-layout>
