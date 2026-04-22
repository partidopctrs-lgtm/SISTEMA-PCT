<!-- ============================================================
  PCT – Design System
  layout.php — Layout base para PHP PURO (sem framework)
  Inclua este arquivo via: include 'layout/header.php'
  ============================================================ -->
<?php
// Helpers PHP puro
function asset($path) {
  return '/public/' . ltrim($path, '/');
}
function url($path) {
  $base = rtrim($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'], '/');
  return $base . '/' . ltrim($path, '/');
}
function active($path) {
  return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path ? 'active' : '';
}
function old($key, $default = '') {
  return htmlspecialchars($_POST[$key] ?? $_SESSION['old'][$key] ?? $default);
}
function csrf() {
  if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
  return '<input type="hidden" name="_token" value="'.htmlspecialchars($_SESSION['csrf']).'">';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?? 'PCT – Movimento Cidadania e Trabalho' ?></title>
  <meta name="description" content="<?= $pageDesc ?? 'PCT – Unir, Defender, Transformar.' ?>">
  <link rel="stylesheet" href="<?= asset('css/pct.css') ?>">
  <?= $extraStyles ?? '' ?>
</head>
<body>

<header class="pct-navbar">
  <div class="pct-container">
    <div class="pct-navbar__inner">
      <a href="<?= url('/') ?>" class="pct-navbar__brand">
        <div class="pct-navbar__logo">PCT</div>
        <div>
          <div class="pct-navbar__name">PCT – Movimento Cidadania e Trabalho</div>
          <div class="pct-navbar__tagline">Unir &bull; Defender &bull; Transformar</div>
        </div>
      </a>
      <nav class="pct-navbar__nav">
        <a href="<?= url('/') ?>"          class="pct-navbar__link <?= active('/') ?>">Início</a>
        <a href="<?= url('/sobre') ?>"     class="pct-navbar__link <?= active('/sobre') ?>">Sobre</a>
        <a href="<?= url('/propostas') ?>" class="pct-navbar__link <?= active('/propostas') ?>">Propostas</a>
        <a href="<?= url('/noticias') ?>"  class="pct-navbar__link <?= active('/noticias') ?>">Notícias</a>
        <a href="<?= url('/contato') ?>"   class="pct-navbar__link <?= active('/contato') ?>">Contato</a>
      </nav>
      <a href="<?= url('/filiacao') ?>" class="pct-navbar__cta">Filiar-se</a>
      <button class="pct-navbar__toggle" id="navToggle"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>

<?php if (isset($breadcrumbs)): ?>
<div style="background:var(--bg-white); border-bottom:1px solid var(--border);">
  <div class="pct-container">
    <nav class="pct-breadcrumb">
      <?php foreach ($breadcrumbs as $i => $bc): ?>
        <?php if ($i > 0): ?><span class="pct-breadcrumb__sep">›</span><?php endif; ?>
        <?php if (isset($bc['url'])): ?>
          <a href="<?= htmlspecialchars($bc['url']) ?>"><?= htmlspecialchars($bc['label']) ?></a>
        <?php else: ?>
          <span class="pct-breadcrumb__item pct-breadcrumb__item--active"><?= htmlspecialchars($bc['label']) ?></span>
        <?php endif; ?>
      <?php endforeach; ?>
    </nav>
  </div>
</div>
<?php endif; ?>

<?php if (isset($_SESSION['flash_success'])): ?>
<div class="pct-container mt-2">
  <div class="pct-alert pct-alert--success">
    <span class="pct-alert__icon">✅</span>
    <div><div class="pct-alert__title">Sucesso</div><div class="pct-alert__text"><?= htmlspecialchars($_SESSION['flash_success']) ?></div></div>
  </div>
</div>
<?php unset($_SESSION['flash_success']); ?>
<?php endif; ?>

<main>
  <?= $content ?? '' ?>
</main>

<footer class="pct-footer">
  <div class="pct-container">
    <div class="pct-footer__grid">
      <div>
        <div class="pct-footer__brand-name">PCT</div>
        <div class="pct-footer__brand-tag">Unir &bull; Defender &bull; Transformar</div>
        <p class="pct-footer__desc">Movimento Cidadania e Trabalho — organização civil comprometida com liberdade, responsabilidade e transparência. Sede: Taquara, Rio Grande do Sul.</p>
      </div>
      <div>
        <div class="pct-footer__heading">Movimento</div>
        <ul class="pct-footer__list">
          <li><a href="<?= url('/sobre') ?>">Quem Somos</a></li>
          <li><a href="<?= url('/manifesto') ?>">Manifesto</a></li>
          <li><a href="<?= url('/estatuto') ?>">Estatuto</a></li>
        </ul>
      </div>
      <div>
        <div class="pct-footer__heading">Propostas</div>
        <ul class="pct-footer__list">
          <li><a href="<?= url('/propostas/sndah') ?>">SNDAH</a></li>
          <li><a href="<?= url('/propostas') ?>">Todas</a></li>
        </ul>
      </div>
      <div>
        <div class="pct-footer__heading">Participe</div>
        <ul class="pct-footer__list">
          <li><a href="<?= url('/filiacao') ?>">Filiar-se</a></li>
          <li><a href="<?= url('/contato') ?>">Contato</a></li>
        </ul>
      </div>
    </div>
    <div class="pct-footer__bottom">
      <div class="pct-footer__copy">&copy; <?= date('Y') ?> PCT – Movimento Cidadania e Trabalho. Taquara – RS.</div>
      <div class="pct-footer__links">
        <a href="<?= url('/privacidade') ?>">Privacidade</a>
        <a href="https://pct.social.br" target="_blank">pct.social.br</a>
      </div>
    </div>
  </div>
</footer>

<div class="pct-toast-area" id="toastArea"></div>

<script>
  const navToggle = document.getElementById('navToggle');
  const navMobile = document.getElementById('navMobile');
  if (navToggle && navMobile) {
    navToggle.addEventListener('click', () => {
      navMobile.style.display = navMobile.style.display === 'flex' ? 'none' : 'flex';
    });
  }
  function pctToast(title, text = '', type = 'info') {
    const icons = { info:'ℹ️', success:'✅', warning:'⚠️', danger:'🚫' };
    const area = document.getElementById('toastArea');
    const el = document.createElement('div');
    el.className = `pct-toast pct-toast--${type}`;
    el.innerHTML = `<span class="pct-toast__icon">${icons[type]||'ℹ️'}</span><div><div class="pct-toast__title">${title}</div>${text?`<div class="pct-toast__text">${text}</div>`:''}</div>`;
    area.appendChild(el);
    setTimeout(() => el.style.animation = 'fadeIn .3s reverse both', 2700);
    setTimeout(() => el.remove(), 3000);
  }
  function pctModal(id, open = true) {
    document.getElementById(id)?.classList.toggle('open', open);
  }
  document.addEventListener('click', e => {
    if (e.target.classList.contains('pct-modal-backdrop')) e.target.classList.remove('open');
    const mc = e.target.closest('.pct-modal__close');
    if (mc) mc.closest('.pct-modal-backdrop')?.classList.remove('open');
    const mb = e.target.closest('[data-modal-open]');
    if (mb) pctModal(mb.dataset.modalOpen, true);
  });
</script>
<?= $extraScripts ?? '' ?>
</body>
</html>
