@extends('layouts.app')

@section('title', 'Filiar-se | PCT – Movimento Cidadania e Trabalho')
@section('description', 'Junte-se ao PCT – Movimento Cidadania e Trabalho. Preencha o formulário de filiação.')

@section('breadcrumb')
  <a href="{{ url('/') }}">Início</a>
  <span class="pct-breadcrumb__sep">›</span>
  <span class="pct-breadcrumb__item pct-breadcrumb__item--active">Filiar-se</span>
@endsection

@section('content')

  <!-- Cabeçalho da página -->
  <section style="background:var(--bg-dark); padding:56px 0 48px; border-bottom:3px solid var(--pct-laranja);">
    <div class="pct-container text-center">
      <span class="pct-eyebrow">Participe</span>
      <h1 class="pct-section-title" style="color:var(--text-white);">Junte-se ao Movimento</h1>
      <p class="pct-section-subtitle">
        Preencha o formulário abaixo para solicitar sua filiação ao PCT.
        A adesão é gratuita e aberta a maiores de 16 anos.
      </p>
    </div>
  </section>

  <!-- Formulário -->
  <section class="pct-section">
    <div class="pct-container pct-container--sm">

      @if($errors->any())
      <div class="pct-alert pct-alert--danger mb-4">
        <span class="pct-alert__icon">⚠️</span>
        <div>
          <div class="pct-alert__title">Corrija os erros abaixo</div>
          <ul style="margin-top:8px; padding-left:16px; font-size:14px;">
            @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif

      <!-- Steps -->
      <div class="pct-steps mb-5" id="stepsBar">
        <div class="pct-step pct-step--active" id="step1Indicator">
          <div class="pct-step__wrapper">
            <div class="pct-step__dot">1</div>
            <div class="pct-step__label">Dados Pessoais</div>
          </div>
          <div class="pct-step__line"></div>
        </div>
        <div class="pct-step" id="step2Indicator">
          <div class="pct-step__wrapper">
            <div class="pct-step__dot">2</div>
            <div class="pct-step__label">Localização</div>
          </div>
          <div class="pct-step__line"></div>
        </div>
        <div class="pct-step" id="step3Indicator">
          <div class="pct-step__wrapper">
            <div class="pct-step__dot">3</div>
            <div class="pct-step__label">Confirmação</div>
          </div>
        </div>
      </div>

      <form method="POST" action="{{ route('filiacao.store') }}" id="filiacaoForm">
        @csrf

        <!-- PASSO 1 -->
        <div id="passo1">
          <div class="pct-card">

            <h2 style="font-family:var(--font-display); font-size:20px; font-weight:800; color:var(--pct-azul); margin-bottom:24px;">
              1. Dados Pessoais
            </h2>

            <div class="pct-grid pct-grid--2">
              <div class="pct-form-group">
                <label class="pct-label" for="nome">Nome completo <span>*</span></label>
                <input type="text" id="nome" name="nome" class="pct-input {{ $errors->has('nome') ? 'pct-input--error' : '' }}"
                       value="{{ old('nome') }}" placeholder="Seu nome completo" required>
                @error('nome')<div class="pct-form-error">⚠ {{ $message }}</div>@enderror
              </div>

              <div class="pct-form-group">
                <label class="pct-label" for="cpf">CPF <span>*</span></label>
                <input type="text" id="cpf" name="cpf" class="pct-input {{ $errors->has('cpf') ? 'pct-input--error' : '' }}"
                       value="{{ old('cpf') }}" placeholder="000.000.000-00" maxlength="14" required>
                @error('cpf')<div class="pct-form-error">⚠ {{ $message }}</div>@enderror
              </div>
            </div>

            <div class="pct-grid pct-grid--2">
              <div class="pct-form-group">
                <label class="pct-label" for="nascimento">Data de nascimento <span>*</span></label>
                <input type="date" id="nascimento" name="nascimento" class="pct-input {{ $errors->has('nascimento') ? 'pct-input--error' : '' }}"
                       value="{{ old('nascimento') }}" required>
                @error('nascimento')<div class="pct-form-error">⚠ {{ $message }}</div>@enderror
              </div>

              <div class="pct-form-group">
                <label class="pct-label" for="telefone">Telefone / WhatsApp <span>*</span></label>
                <input type="tel" id="telefone" name="telefone" class="pct-input {{ $errors->has('telefone') ? 'pct-input--error' : '' }}"
                       value="{{ old('telefone') }}" placeholder="(51) 99999-0000" required>
                @error('telefone')<div class="pct-form-error">⚠ {{ $message }}</div>@enderror
              </div>
            </div>

            <div class="pct-form-group">
              <label class="pct-label" for="email">E-mail <span>*</span></label>
              <input type="email" id="email" name="email" class="pct-input {{ $errors->has('email') ? 'pct-input--error' : '' }}"
                     value="{{ old('email') }}" placeholder="seu@email.com" required>
              @error('email')<div class="pct-form-error">⚠ {{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-between mt-4">
              <div></div>
              <button type="button" class="pct-btn pct-btn--primary" onclick="irPasso(2)">
                Próximo →
              </button>
            </div>

          </div>
        </div>

        <!-- PASSO 2 -->
        <div id="passo2" style="display:none;">
          <div class="pct-card">

            <h2 style="font-family:var(--font-display); font-size:20px; font-weight:800; color:var(--pct-azul); margin-bottom:24px;">
              2. Localização
            </h2>

            <div class="pct-grid pct-grid--2">
              <div class="pct-form-group">
                <label class="pct-label" for="estado">Estado <span>*</span></label>
                <select id="estado" name="estado" class="pct-select" required>
                  <option value="">Selecione o estado</option>
                  <option value="RS" {{ old('estado') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                  <option value="SC" {{ old('estado') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                  <option value="PR" {{ old('estado') == 'PR' ? 'selected' : '' }}>Paraná</option>
                  {{-- demais estados --}}
                </select>
                @error('estado')<div class="pct-form-error">⚠ {{ $message }}</div>@enderror
              </div>

              <div class="pct-form-group">
                <label class="pct-label" for="municipio">Município <span>*</span></label>
                <input type="text" id="municipio" name="municipio" class="pct-input {{ $errors->has('municipio') ? 'pct-input--error' : '' }}"
                       value="{{ old('municipio') }}" placeholder="Sua cidade" required>
                @error('municipio')<div class="pct-form-error">⚠ {{ $message }}</div>@enderror
              </div>
            </div>

            <div class="pct-form-group">
              <label class="pct-label" for="bairro">Bairro</label>
              <input type="text" id="bairro" name="bairro" class="pct-input"
                     value="{{ old('bairro') }}" placeholder="Seu bairro">
            </div>

            <div class="pct-form-group">
              <label class="pct-label" for="motivacao">Por que deseja se filiar ao PCT?</label>
              <textarea id="motivacao" name="motivacao" class="pct-textarea"
                        placeholder="Conte-nos brevemente sua motivação (opcional)...">{{ old('motivacao') }}</textarea>
              <div class="pct-form-hint">Opcional. Máximo de 500 caracteres.</div>
            </div>

            <div class="d-flex justify-between mt-4">
              <button type="button" class="pct-btn pct-btn--outline" onclick="irPasso(1)">
                ← Voltar
              </button>
              <button type="button" class="pct-btn pct-btn--primary" onclick="irPasso(3)">
                Revisar →
              </button>
            </div>

          </div>
        </div>

        <!-- PASSO 3 -->
        <div id="passo3" style="display:none;">
          <div class="pct-card">

            <h2 style="font-family:var(--font-display); font-size:20px; font-weight:800; color:var(--pct-azul); margin-bottom:24px;">
              3. Confirmação
            </h2>

            <div class="pct-alert pct-alert--info mb-4">
              <span class="pct-alert__icon">ℹ️</span>
              <div>
                <div class="pct-alert__title">Leia antes de confirmar</div>
                <div class="pct-alert__text">
                  Ao se filiar, você declara que leu e concorda com o
                  <a href="{{ url('/estatuto') }}" target="_blank">Estatuto do PCT</a> e com o
                  <a href="{{ url('/manifesto') }}" target="_blank">Manifesto Oficial</a>.
                  Seus dados são tratados conforme nossa Política de Privacidade (LGPD).
                </div>
              </div>
            </div>

            <div class="pct-form-group">
              <label class="pct-check">
                <input type="checkbox" name="aceite_estatuto" required>
                <span class="pct-check__label">
                  Li e concordo com o <a href="{{ url('/estatuto') }}" target="_blank">Estatuto Social do PCT</a>. <span style="color:var(--pct-laranja);">*</span>
                </span>
              </label>
            </div>

            <div class="pct-form-group">
              <label class="pct-check">
                <input type="checkbox" name="aceite_lgpd" required>
                <span class="pct-check__label">
                  Autorizo o uso dos meus dados pessoais para fins de filiação e comunicação do movimento, conforme a LGPD. <span style="color:var(--pct-laranja);">*</span>
                </span>
              </label>
            </div>

            <div class="pct-form-group">
              <label class="pct-check">
                <input type="checkbox" name="whatsapp_opt" value="1">
                <span class="pct-check__label">
                  Desejo receber informações e atualizações do PCT via WhatsApp.
                </span>
              </label>
            </div>

            <div class="d-flex justify-between mt-4">
              <button type="button" class="pct-btn pct-btn--outline" onclick="irPasso(2)">
                ← Voltar
              </button>
              <button type="submit" class="pct-btn pct-btn--primary pct-btn--lg">
                ✅ Confirmar Filiação
              </button>
            </div>

          </div>
        </div>

      </form>

    </div>
  </section>

@endsection

@push('scripts')
<script>
  function irPasso(n) {
    [1,2,3].forEach(i => {
      document.getElementById('passo'+i).style.display = i === n ? 'block' : 'none';
      const ind = document.getElementById('step'+i+'Indicator');
      ind.classList.remove('pct-step--done', 'pct-step--active');
      if (i < n)  ind.classList.add('pct-step--done');
      if (i === n) ind.classList.add('pct-step--active');
    });
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  // Máscara CPF
  document.getElementById('cpf').addEventListener('input', function() {
    let v = this.value.replace(/\D/g, '').slice(0,11);
    v = v.replace(/(\d{3})(\d)/, '$1.$2')
         .replace(/(\d{3})(\d)/, '$1.$2')
         .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    this.value = v;
  });

  // Máscara telefone
  document.getElementById('telefone').addEventListener('input', function() {
    let v = this.value.replace(/\D/g, '').slice(0,11);
    if (v.length > 10) v = v.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    else if (v.length > 5) v = v.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
    else if (v.length > 2) v = v.replace(/(\d{2})(\d{0,5})/, '($1) $2');
    else if (v.length > 0) v = v.replace(/(\d{0,2})/, '($1');
    this.value = v;
  });
</script>
@endpush
