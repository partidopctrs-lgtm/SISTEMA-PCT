<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'PCT – Movimento Cidadania e Trabalho')</title>
  <meta name="description" content="@yield('description', 'PCT – Movimento Cidadania e Trabalho. Unir, Defender, Transformar.')">

  <!-- Fonts (via CSS @import) -->
  <!-- PCT Design System -->
  <link rel="stylesheet" href="{{ asset('css/pct.css') }}">

  @stack('styles')
</head>
<body>

  <!-- ===== NAVBAR ===== -->
  <header class="pct-navbar">
    <div class="pct-container">
      <div class="pct-navbar__inner">

        <a href="{{ url('/') }}" class="pct-navbar__brand">
          <div class="pct-navbar__logo">PCT</div>
          <div>
            <div class="pct-navbar__name">PCT – Movimento Cidadania e Trabalho</div>
            <div class="pct-navbar__tagline">Unir &bull; Defender &bull; Transformar</div>
          </div>
        </a>

        <nav class="pct-navbar__nav">
          <a href="{{ url('/') }}"          class="pct-navbar__link {{ request()->is('/') ? 'active' : '' }}">Início</a>
          <a href="{{ url('/sobre') }}"     class="pct-navbar__link {{ request()->is('sobre') ? 'active' : '' }}">Sobre</a>
          <a href="{{ url('/propostas') }}" class="pct-navbar__link {{ request()->is('propostas*') ? 'active' : '' }}">Propostas</a>
          <a href="{{ url('/noticias') }}"  class="pct-navbar__link {{ request()->is('noticias*') ? 'active' : '' }}">Notícias</a>
          <a href="{{ url('/contato') }}"   class="pct-navbar__link {{ request()->is('contato') ? 'active' : '' }}">Contato</a>
        </nav>

        <a href="{{ url('/filiacao') }}" class="pct-navbar__cta">Filiar-se</a>

        <!-- Mobile toggle -->
        <button class="pct-navbar__toggle" id="navToggle" aria-label="Menu">
          <span></span><span></span><span></span>
        </button>

      </div>

      <!-- Mobile menu (expandido via JS) -->
      <nav class="pct-navbar__mobile" id="navMobile" style="display:none; padding-bottom:16px;">
        <a href="{{ url('/') }}"          class="pct-navbar__link">Início</a>
        <a href="{{ url('/sobre') }}"     class="pct-navbar__link">Sobre</a>
        <a href="{{ url('/propostas') }}" class="pct-navbar__link">Propostas</a>
        <a href="{{ url('/noticias') }}"  class="pct-navbar__link">Notícias</a>
        <a href="{{ url('/contato') }}"   class="pct-navbar__link">Contato</a>
        <a href="{{ url('/filiacao') }}"  class="pct-btn pct-btn--primary mt-2">Filiar-se</a>
      </nav>

    </div>
  </header>

  <!-- ===== BREADCRUMB (opcional, injetar via @section) ===== -->
  @hasSection('breadcrumb')
  <div style="background:var(--bg-white); border-bottom:1px solid var(--border);">
    <div class="pct-container">
      <nav class="pct-breadcrumb">
        @yield('breadcrumb')
      </nav>
    </div>
  </div>
  @endif

  <!-- ===== FLASH MESSAGES ===== -->
  @if(session('success'))
  <div class="pct-container mt-2">
    <div class="pct-alert pct-alert--success">
      <span class="pct-alert__icon">✅</span>
      <div>
        <div class="pct-alert__title">Sucesso</div>
        <div class="pct-alert__text">{{ session('success') }}</div>
      </div>
    </div>
  </div>
  @endif

  @if(session('error'))
  <div class="pct-container mt-2">
    <div class="pct-alert pct-alert--danger">
      <span class="pct-alert__icon">⚠️</span>
      <div>
        <div class="pct-alert__title">Erro</div>
        <div class="pct-alert__text">{{ session('error') }}</div>
      </div>
    </div>
  </div>
  @endif

  <!-- ===== CONTEÚDO PRINCIPAL ===== -->
  <main>
    @yield('content')
  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="pct-footer">
    <div class="pct-container">
      <div class="pct-footer__grid">

        <div>
          <div class="pct-footer__brand-name">PCT</div>
          <div class="pct-footer__brand-tag">Unir &bull; Defender &bull; Transformar</div>
          <p class="pct-footer__desc">
            Movimento Cidadania e Trabalho — organização civil comprometida com liberdade,
            responsabilidade e transparência. Sede: Taquara, Rio Grande do Sul.
          </p>
        </div>

        <div>
          <div class="pct-footer__heading">Movimento</div>
          <ul class="pct-footer__list">
            <li><a href="{{ url('/sobre') }}">Quem Somos</a></li>
            <li><a href="{{ url('/manifesto') }}">Manifesto</a></li>
            <li><a href="{{ url('/estatuto') }}">Estatuto</a></li>
            <li><a href="{{ url('/liderancas') }}">Lideranças</a></li>
          </ul>
        </div>

        <div>
          <div class="pct-footer__heading">Propostas</div>
          <ul class="pct-footer__list">
            <li><a href="{{ url('/propostas/sndah') }}">SNDAH – Água para Todos</a></li>
            <li><a href="{{ url('/propostas') }}">Todas as Propostas</a></li>
            <li><a href="{{ url('/noticias') }}">Notícias</a></li>
          </ul>
        </div>

        <div>
          <div class="pct-footer__heading">Participe</div>
          <ul class="pct-footer__list">
            <li><a href="{{ url('/filiacao') }}">Filiar-se</a></li>
            <li><a href="{{ url('/voluntarios') }}">Seja Voluntário</a></li>
            <li><a href="{{ url('/contato') }}">Contato</a></li>
            <li><a href="{{ url('/nucleo') }}">Núcleos Locais</a></li>
          </ul>
        </div>

      </div>

      <div class="pct-footer__bottom">
        <div class="pct-footer__copy">
          &copy; {{ date('Y') }} PCT – Movimento Cidadania e Trabalho. Taquara – RS.
        </div>
        <div class="pct-footer__links">
          <a href="{{ url('/privacidade') }}">Privacidade</a>
          <a href="{{ url('/termos') }}">Termos</a>
          <a href="https://pct.social.br" target="_blank">pct.social.br</a>
        </div>
      </div>

    </div>
  </footer>

  <!-- ===== TOAST AREA ===== -->
  <div class="pct-toast-area" id="toastArea"></div>

  <!-- ===== JS BASE ===== -->
  <script>
    // Mobile nav toggle
    const navToggle = document.getElementById('navToggle');
    const navMobile = document.getElementById('navMobile');
    if (navToggle && navMobile) {
      navToggle.addEventListener('click', () => {
        const open = navMobile.style.display === 'flex';
        navMobile.style.display = open ? 'none' : 'flex';
        navMobile.style.flexDirection = 'column';
        navMobile.style.gap = '4px';
      });
    }

    // Toast helper (uso: pctToast('Título', 'Mensagem', 'success'))
    function pctToast(title, text = '', type = 'info') {
      const icons = { info: 'ℹ️', success: '✅', warning: '⚠️', danger: '🚫' };
      const area = document.getElementById('toastArea');
      const el = document.createElement('div');
      el.className = `pct-toast pct-toast--${type}`;
      el.innerHTML = `
        <span class="pct-toast__icon">${icons[type] || 'ℹ️'}</span>
        <div>
          <div class="pct-toast__title">${title}</div>
          ${text ? `<div class="pct-toast__text">${text}</div>` : ''}
        </div>`;
      area.appendChild(el);
      setTimeout(() => el.style.animation = 'fadeIn .3s reverse both', 2700);
      setTimeout(() => el.remove(), 3000);
    }

    // Modal helper
    function pctModal(id, open = true) {
      const el = document.getElementById(id);
      if (!el) return;
      el.classList.toggle('open', open);
    }

    // Fechar modal ao clicar fora
    document.addEventListener('click', e => {
      if (e.target.classList.contains('pct-modal-backdrop')) {
        e.target.classList.remove('open');
      }
    });

    // Fechar modal pelo botão .pct-modal__close
    document.addEventListener('click', e => {
      if (e.target.closest('.pct-modal__close')) {
        e.target.closest('.pct-modal-backdrop')?.classList.remove('open');
      }
    });

    // Abrir modal por data-modal-open
    document.addEventListener('click', e => {
      const btn = e.target.closest('[data-modal-open]');
      if (btn) pctModal(btn.dataset.modalOpen, true);
    });
  </script>

  @stack('scripts')

</body>
</html>
