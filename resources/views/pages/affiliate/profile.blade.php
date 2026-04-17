@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
    <style>
        .cropper-container { max-width: 100%; }
        .cropper-view-box, .cropper-face { border-radius: 50%; }
        .input-premium {
            @apply w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-pct-blue focus:border-transparent outline-none transition-all font-bold text-gray-700 placeholder:text-gray-300 placeholder:font-normal;
        }
    </style>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
@endpush

<x-dashboard-layout>
    <x-slot name="title">Meu Perfil - PCT</x-slot>

    <div class="max-w-4xl" x-data="profilePhotoUpload()">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-pct-blue mb-2">Meu Perfil</h1>
            <p class="text-gray-500">Gerencie suas informações pessoais e sua identidade no movimento.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2 space-y-8">
                <div class="card-premium">
                    <div class="flex items-center justify-between mb-8 border-b border-slate-100 pb-4">
                        <h3 class="text-xl font-bold text-pct-blue">Informações de Filiação</h3>
                        <span class="px-3 py-1 bg-blue-50 text-pct-blue text-[10px] font-black rounded-full uppercase tracking-widest">Cadastro Completo</span>
                    </div>

                    <form action="{{ route('affiliate.profile.update') }}" method="POST" class="space-y-8">
                        @csrf
                        @if(session('success'))
                            <div class="p-4 bg-emerald-50 text-pct-green rounded-2xl font-bold text-sm mb-6 border border-emerald-100 flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Seção 1: Dados Pessoais -->
                        <div class="space-y-6">
                            <h4 class="text-xs font-black text-blue-400 uppercase tracking-[0.2em] mb-4">01. Dados Pessoais</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Nome Completo</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="input-premium w-full">
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Data de Nascimento</label>
                                    <input type="date" name="birth_date" value="{{ auth()->user()->birth_date }}" class="input-premium w-full">
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Estado Civil</label>
                                    <select name="marital_status" class="input-premium w-full">
                                        <option value="">Selecione...</option>
                                        @foreach(['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)', 'União Estável'] as $status)
                                            <option value="{{ $status }}" {{ auth()->user()->marital_status == $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Nacionalidade</label>
                                    <input type="text" name="nationality" value="{{ auth()->user()->nationality ?? 'Brasileira' }}" class="input-premium w-full">
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Escolaridade</label>
                                    <input type="text" name="education" value="{{ auth()->user()->education }}" placeholder="Ex: Ensino Médio Completo" class="input-premium w-full">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Profissão / Ocupação</label>
                                    <input type="text" name="profession" value="{{ auth()->user()->profession }}" class="input-premium w-full">
                                </div>
                            </div>
                        </div>

                        <!-- Seção 2: Documentação -->
                        <div class="space-y-6 pt-8 border-t border-slate-50">
                            <h4 class="text-xs font-black text-blue-400 uppercase tracking-[0.2em] mb-4">02. Documentação</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">CPF</label>
                                    <input type="text" name="cpf" value="{{ auth()->user()->cpf }}" class="input-premium w-full">
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">RG / Órgão Emissor</label>
                                    <input type="text" name="rg" value="{{ auth()->user()->rg }}" class="input-premium w-full">
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Título de Eleitor</label>
                                    <input type="text" name="voter_id" value="{{ auth()->user()->voter_id }}" class="input-premium w-full">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Zona</label>
                                        <input type="text" name="voter_zone" value="{{ auth()->user()->voter_zone }}" class="input-premium w-full">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Seção</label>
                                        <input type="text" name="voter_section" value="{{ auth()->user()->voter_section }}" class="input-premium w-full">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Seção 3: Localização e Contato -->
                        <div class="space-y-6 pt-8 border-t border-slate-50">
                            <h4 class="text-xs font-black text-blue-400 uppercase tracking-[0.2em] mb-4">03. Endereço e Contato</h4>
                            <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
                                <div class="md:col-span-4">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Endereço</label>
                                    <input type="text" name="address" value="{{ auth()->user()->address }}" placeholder="Rua, Número, Complemento" class="input-premium w-full">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Bairro</label>
                                    <input type="text" name="neighborhood" value="{{ auth()->user()->neighborhood }}" class="input-premium w-full">
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Cidade (Sub-filiação)</label>
                                    <input type="text" name="city" value="{{ auth()->user()->city }}" placeholder="Cidade de sua atuação" class="input-premium w-full">
                                </div>
                                <div class="md:col-span-1">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">UF</label>
                                    <input type="text" name="state" value="{{ auth()->user()->state }}" placeholder="RS" maxlength="2" class="input-premium w-full text-center">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">CEP</label>
                                    <input type="text" name="zip_code" value="{{ auth()->user()->zip_code }}" class="input-premium w-full">
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">E-mail</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="input-premium w-full">
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Telefone / WhatsApp</label>
                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="input-premium w-full">
                                </div>
                            </div>
                        </div>

                        <!-- Seção 4: Institucional -->
                        <div class="space-y-6 pt-8 border-t border-slate-50">
                            <h4 class="text-xs font-black text-blue-400 uppercase tracking-[0.2em] mb-4">04. Vínculo Institucional</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Comitê Municipal Principal</label>
                                    <input type="text" name="committee_city" value="{{ auth()->user()->committee_city ?? 'Taquara' }}" class="input-premium w-full bg-slate-100 cursor-not-allowed" readonly>
                                    <p class="text-[10px] text-gray-400 mt-2 italic">* O comitê principal de registro é Taquara/RS por padrão.</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Status da Filiação</label>
                                    <div class="flex items-center gap-4 py-3">
                                        <span class="px-4 py-1.5 bg-emerald-100 text-pct-green text-[10px] font-black rounded-full uppercase tracking-widest">Ativo</span>
                                        <span class="px-4 py-1.5 bg-blue-100 text-pct-blue text-[10px] font-black rounded-full uppercase tracking-widest">Filiado</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-10 border-t border-slate-100 flex justify-between items-center">
                            <p class="text-xs text-gray-400 italic">Última atualização: {{ auth()->user()->updated_at->format('d/m/Y H:i') }}</p>
                            <button type="submit" class="btn-primary px-12 py-4 shadow-xl shadow-pct-blue/20">Salvar Informações</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Avatar & ID card preview -->
            <div class="space-y-8">
                <div class="card-premium text-center">
                    <div class="relative inline-block mb-6">
                        <div class="h-32 w-32 rounded-full bg-pct-blue flex items-center justify-center text-white text-4xl font-black shadow-2xl ring-8 ring-white overflow-hidden">
                            <template x-if="photoUrl">
                                <img :src="photoUrl" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!photoUrl">
                                <span>{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </template>
                        </div>
                        <button @click="$refs.photoInput.click()" class="absolute bottom-1 right-1 h-10 w-10 bg-pct-green text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </button>
                        <input type="file" x-ref="photoInput" @change="handleFileSelect" class="hidden" accept="image/*">
                    </div>
                    <h4 class="text-xl font-bold text-pct-blue">{{ auth()->user()->name }}</h4>
                    <p class="text-sm text-gray-500 mb-6">Membro desde {{ auth()->user()->created_at->format('M Y') }}</p>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('affiliate.carteirinha') }}" class="w-full py-3 bg-slate-100 text-pct-blue rounded-xl font-bold hover:bg-slate-200 transition-colors">Ver Carteirinha</a>
                    </div>
                </div>

                <div class="bg-pct-blue p-8 rounded-[2.5rem] text-white overflow-hidden relative group">
                    <div class="relative z-10">
                        <p class="text-pct-green font-black tracking-widest text-[10px] uppercase mb-1">Status de Filiação</p>
                        <h4 class="text-2xl font-black mb-4 tracking-tight">Registro Ativo</h4>
                        <p class="text-blue-100 text-sm mb-6">Você está devidamente registrado e apto para participar de todas as atividades do PCT.</p>
                        <div class="flex items-center gap-2 text-pct-green font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Certificado Digital Disponível
                        </div>
                    </div>
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-pct-green/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                </div>
            </div>
        </div>

        <!-- Modal de Recorte -->
        <div x-show="showCropper" 
             x-cloak 
             class="fixed inset-0 z-[100] flex items-center justify-center bg-black/80 p-4"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100">
            
            <div class="bg-white rounded-[2rem] w-full max-w-xl overflow-hidden shadow-2xl" @click.away="cancelCrop()">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-pct-blue">Ajustar Foto</h3>
                    <button @click="cancelCrop()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <div class="p-8">
                    <div class="aspect-square bg-slate-100 rounded-2xl overflow-hidden mb-6">
                        <img x-ref="cropperImage" class="max-w-full">
                    </div>
                    
                    <div class="flex gap-4">
                        <button @click="cancelCrop()" class="flex-1 py-4 bg-slate-100 text-gray-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">Cancelar</button>
                        <button @click="saveCrop()" class="flex-1 py-4 bg-pct-green text-white rounded-2xl font-bold hover:shadow-lg hover:shadow-pct-green/30 transition-all flex items-center justify-center gap-2">
                            <span x-show="!uploading">Salvar Foto</span>
                            <span x-show="uploading" class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                Processando...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function profilePhotoUpload() {
            return {
                photoUrl: '{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : null }}',
                showCropper: false,
                uploading: false,
                cropper: null,

                handleFileSelect(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.showCropper = true;
                        this.$refs.cropperImage.src = e.target.result;
                        
                        this.$nextTick(() => {
                            if (this.cropper) {
                                this.cropper.destroy();
                            }
                            
                            this.cropper = new Cropper(this.$refs.cropperImage, {
                                aspectRatio: 1,
                                viewMode: 1,
                                dragMode: 'move',
                                guides: true,
                                center: true,
                                highlight: false,
                                cropBoxMovable: true,
                                cropBoxResizable: false,
                                toggleDragModeOnDblclick: false,
                            });
                        });
                    };
                    reader.readAsDataURL(file);
                },

                cancelCrop() {
                    this.showCropper = false;
                    this.$refs.photoInput.value = '';
                    if (this.cropper) {
                        this.cropper.destroy();
                        this.cropper = null;
                    }
                },

                saveCrop() {
                    if (!this.cropper) return;
                    
                    this.uploading = true;
                    
                    const canvas = this.cropper.getCroppedCanvas({
                        width: 400,
                        height: 400
                    });

                    const base64Image = canvas.toDataURL('image/png');

                    fetch('{{ route('affiliate.profile.photo') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ photo: base64Image })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.photoUrl = data.photo_url;
                            this.cancelCrop();
                            // Atualiza outros avatares na pÃ¡gina se houver
                            window.location.reload(); // Recarrega para atualizar o topbar também
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao enviar foto:', error);
                        alert('Erro ao processar a imagem. Tente novamente.');
                    })
                    .finally(() => {
                        this.uploading = false;
                    });
                }
            }
        }
    </script>
    @endpush
</x-dashboard-layout>
