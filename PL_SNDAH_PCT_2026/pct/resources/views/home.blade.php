@extends('layouts.app')

@section('title', 'PCT – Movimento Cidadania e Trabalho | Taquara RS')
@section('description', 'PCT - Movimento Popular Cidadania e Trabalho. Unir, Defender, Transformar. Taquara, Rio Grande do Sul.')

@section('content')

  <!-- ======= HERO ======= -->
  <section class="pct-hero">
    <div class="pct-container">
      <div class="pct-hero__inner">

        <div class="pct-animate-up">
          <div class="pct-hero__eyebrow">Movimento Nacional • Taquara – RS</div>
          <h1 class="pct-hero__title">
            Unir.<br>
            Defender.<br>
            <span>Transformar.</span>
          </h1>
          <p class="pct-hero__desc">
            O PCT nasce da necessidade real de reconstruir a confiança na política.
            Cidadãos organizados em torno de um propósito: transformar o Brasil através
            da cidadania ativa e do trabalho produtivo.
          </p>
          <div class="pct-hero__actions">
            <a href="{{ url('/filiacao') }}" class="pct-btn pct-btn--primary pct-btn--lg">
              Filiar-se ao Movimento
            </a>
            <a href="{{ url('/sobre') }}" class="pct-btn pct-btn--ghost pct-btn--lg">
              Conheça o PCT
            </a>
          </div>
        </div>

        <div class="pct-hero__image-slot pct-animate-up pct-delay-3">
          {{-- Insira aqui: <img src="{{ asset('img/hero.jpg') }}" alt="PCT"> --}}
          <div style="text-align:center; color:rgba(255,255,255,.3); font-family:var(--font-display); font-size:48px; font-weight:900;">PCT</div>
        </div>

      </div>
    </div>
  </section>

  <!-- ======= STATS ======= -->
  <section style="background:var(--bg-white); border-bottom:1px solid var(--border); padding:40px 0;">
    <div class="pct-container">
      <div class="pct-grid pct-grid--4">
        <div class="pct-stat pct-animate-up pct-delay-1">
          <div class="pct-stat__number">2026<span>.</span></div>
          <div class="pct-stat__label">Fundação</div>
        </div>
        <div class="pct-stat pct-animate-up pct-delay-2">
          <div class="pct-stat__number"><span>RS</span></div>
          <div class="pct-stat__label">Sede em Taquara</div>
        </div>
        <div class="pct-stat pct-animate-up pct-delay-3">
          <div class="pct-stat__number">3<span>+</span></div>
          <div class="pct-stat__label">Propostas Legislativas</div>
        </div>
        <div class="pct-stat pct-animate-up pct-delay-4">
          <div class="pct-stat__number">100<span>%</span></div>
          <div class="pct-stat__label">Independente</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= VALORES ======= -->
  <section class="pct-section">
    <div class="pct-container">

      <div class="pct-section-header">
        <span class="pct-eyebrow">Nossos Princípios</span>
        <h2 class="pct-section-title">O que nos guia</h2>
        <p class="pct-section-subtitle">
          Um movimento fundamentado em valores sólidos, comprometido com resultados
          concretos e com a verdade.
        </p>
      </div>

      <div class="pct-grid pct-grid--3">
        @foreach([
          ['🗽', 'Liberdade', 'Direito de decidir, empreender e viver sem interferência excessiva do Estado. O cidadão é protagonista, não dependente.'],
          ['⚒️', 'Trabalho', 'Base do desenvolvimento individual e coletivo. Acreditamos no esforço e no mérito como fundamentos do progresso.'],
          ['⚖️', 'Responsabilidade', 'Compromisso com decisões sustentáveis, éticas e baseadas em evidências — não em promessas vazias.'],
          ['🔍', 'Transparência', 'Clareza total na atuação pública e organizacional. Dados abertos. Prestação de contas permanente.'],
          ['🤝', 'Ordem e Respeito', 'Fundamento da convivência social e da democracia. Diálogo, institucionalidade e civilidade.'],
          ['🏆', 'Mérito', 'Reconhecimento baseado em esforço e resultado, não em privilégios ou apadrinhamentos.'],
        ] as $valor)
        <div class="pct-card">
          <div class="pct-card__icon">{{ $valor[0] }}</div>
          <h3 class="pct-card__title">{{ $valor[1] }}</h3>
          <p class="pct-card__text">{{ $valor[2] }}</p>
        </div>
        @endforeach
      </div>

    </div>
  </section>

  <!-- ======= DESTAQUE: SNDAH ======= -->
  <section class="pct-section pct-section--dark">
    <div class="pct-container">
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:center;">

        <div>
          <span class="pct-eyebrow">Proposta Legislativa</span>
          <h2 class="pct-section-title" style="color:var(--text-white);">
            SNDAH — Água para<br>todo o Brasil
          </h2>
          <p style="font-size:17px; color:rgba(255,255,255,.65); line-height:1.75; margin-bottom:28px;">
            O Sistema Nacional Descentralizado de Abastecimento Hídrico propõe reorganizar
            o modelo de gestão da água no Brasil, garantindo qualidade, autonomia municipal
            e transparência para 215 milhões de brasileiros.
          </p>
          <div class="d-flex gap-2 flex-wrap">
            <a href="{{ url('/propostas/sndah') }}" class="pct-btn pct-btn--primary">
              Ver a Proposta Completa
            </a>
            <a href="{{ asset('docs/PL_SNDAH_2026.pdf') }}" class="pct-btn pct-btn--ghost" target="_blank">
              Baixar PDF
            </a>
          </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
          @foreach([
            ['💧', 'Qualidade obrigatória', 'Água tratada e monitorada em todos os sistemas públicos do país.'],
            ['🏛️', 'Autonomia municipal', 'Municípios com poder real de gestão e planejamento hídrico.'],
            ['📊', 'Transparência total', 'SINQUA: dados de qualidade em tempo real para toda a população.'],
            ['💰', 'Fundo FNSAH', 'Financiamento preferencial para municípios de menor porte.'],
          ] as $item)
          <div style="background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.10); border-radius:var(--radius-md); padding:20px;">
            <div style="font-size:28px; margin-bottom:10px;">{{ $item[0] }}</div>
            <div style="font-family:var(--font-display); font-weight:700; font-size:15px; color:var(--text-white); margin-bottom:6px;">{{ $item[1] }}</div>
            <div style="font-size:13px; color:rgba(255,255,255,.55); line-height:1.5;">{{ $item[2] }}</div>
          </div>
          @endforeach
        </div>

      </div>
    </div>
  </section>

  <!-- ======= ÚLTIMAS NOTÍCIAS ======= -->
  <section class="pct-section pct-section--alt">
    <div class="pct-container">

      <div class="pct-section-header">
        <span class="pct-eyebrow">Movimento em Ação</span>
        <h2 class="pct-section-title">Últimas Notícias</h2>
      </div>

      <div class="pct-grid pct-grid--3">
        @forelse($noticias ?? [] as $noticia)
        <article class="pct-card">
          @if($noticia->imagem)
          <img src="{{ asset('storage/'.$noticia->imagem) }}" alt="{{ $noticia->titulo }}"
               style="border-radius:var(--radius-sm); margin-bottom:16px; width:100%; aspect-ratio:16/9; object-fit:cover;">
          @endif
          <div class="pct-card__label">{{ $noticia->categoria ?? 'Notícia' }}</div>
          <h3 class="pct-card__title">{{ $noticia->titulo }}</h3>
          <p class="pct-card__text">{{ Str::limit($noticia->resumo, 120) }}</p>
          <a href="{{ route('noticias.show', $noticia->slug) }}" class="pct-card__link">
            Ler mais →
          </a>
        </article>
        @empty
        {{-- Placeholder enquanto não há conteúdo --}}
        @foreach([
          ['Crise Hídrica no RS', 'Agesan multa Corsan em R$ 70 mil por problemas de qualidade da água em Taquara', 'Proposta'],
          ['SNDAH no Congresso', 'PCT apresenta projeto para sistema descentralizado de abastecimento de água', 'Legislativo'],
          ['Rolante entra na Justiça', 'Município aciona Poder Judiciário para exigir qualidade da água da Corsan', 'Regional'],
        ] as $p)
        <article class="pct-card">
          <div class="pct-card__label">{{ $p[2] }}</div>
          <h3 class="pct-card__title">{{ $p[0] }}</h3>
          <p class="pct-card__text">{{ $p[1] }}</p>
          <a href="{{ url('/noticias') }}" class="pct-card__link">Ler mais →</a>
        </article>
        @endforeach
        @endforelse
      </div>

      <div class="text-center mt-5">
        <a href="{{ url('/noticias') }}" class="pct-btn pct-btn--outline">Ver Todas as Notícias</a>
      </div>

    </div>
  </section>

  <!-- ======= CTA FILIAÇÃO ======= -->
  <section style="background:var(--pct-laranja); padding:64px 0;">
    <div class="pct-container text-center">
      <h2 style="font-family:var(--font-display); font-size:clamp(32px,5vw,52px); font-weight:900; color:var(--text-white); margin-bottom:12px; line-height:1.1;">
        O Brasil não mudará por acaso.
      </h2>
      <p style="font-size:18px; color:rgba(255,255,255,.85); margin-bottom:32px; max-width:560px; margin-left:auto; margin-right:auto; line-height:1.6;">
        Mudará quando pessoas assumirem responsabilidade. Junte-se ao PCT.
      </p>
      <a href="{{ url('/filiacao') }}" class="pct-btn pct-btn--lg"
         style="background:var(--text-white); color:var(--pct-laranja-dark); border-color:var(--text-white);">
        Filiar-se Agora
      </a>
    </div>
  </section>

@endsection
