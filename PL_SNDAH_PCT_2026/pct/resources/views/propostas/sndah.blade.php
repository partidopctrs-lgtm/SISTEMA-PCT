@extends('layouts.app')

@section('title', 'SNDAH – Sistema Nacional de Abastecimento Hídrico | PCT')
@section('description', 'Conheça o SNDAH – proposta do PCT para garantir água de qualidade a todos os brasileiros.')

@section('breadcrumb')
  <a href="{{ url('/') }}">Início</a>
  <span class="pct-breadcrumb__sep">›</span>
  <a href="{{ url('/propostas') }}">Propostas</a>
  <span class="pct-breadcrumb__sep">›</span>
  <span class="pct-breadcrumb__item pct-breadcrumb__item--active">SNDAH</span>
@endsection

@section('content')

  <!-- Hero da proposta -->
  <section style="background:var(--bg-dark); padding:64px 0 56px; position:relative; overflow:hidden; border-bottom:3px solid var(--pct-laranja);">
    <div style="position:absolute; inset:0; background:radial-gradient(ellipse 50% 100% at 80% 50%, rgba(27,79,138,.4) 0%, transparent 70%); pointer-events:none;"></div>
    <div class="pct-container" style="position:relative; z-index:1;">
      <div style="max-width:700px;">
        <div class="d-flex gap-2 mb-3 flex-wrap">
          <span class="pct-badge pct-badge--orange">Proposta Legislativa</span>
          <span class="pct-badge pct-badge--dark">Congresso Nacional – 2026</span>
        </div>
        <h1 style="font-family:var(--font-display); font-size:clamp(36px,6vw,68px); font-weight:900; color:var(--text-white); line-height:.95; margin-bottom:20px; letter-spacing:-1px;">
          SNDAH<br><span style="color:var(--pct-laranja);">Água para Todos</span>
        </h1>
        <p style="font-size:18px; color:rgba(255,255,255,.70); line-height:1.75; margin-bottom:32px; max-width:560px;">
          Sistema Nacional Descentralizado de Abastecimento Hídrico — proposta do PCT ao
          Congresso Nacional para reorganizar a gestão da água no Brasil, com autonomia
          municipal, qualidade obrigatória e transparência total.
        </p>
        <div class="d-flex gap-2 flex-wrap">
          <a href="{{ asset('docs/PL_SNDAH_2026.pdf') }}" class="pct-btn pct-btn--primary" target="_blank">
            📄 Baixar Projeto de Lei (PDF)
          </a>
          <a href="{{ asset('docs/Estudo_Tecnico_Hidrico_RS.pdf') }}" class="pct-btn pct-btn--ghost" target="_blank">
            📊 Estudo Técnico RS
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- O Problema -->
  <section class="pct-section">
    <div class="pct-container">
      <div class="pct-layout">

        <!-- Sidebar de navegação -->
        <aside class="pct-sidebar">
          <div class="pct-sidebar__title">Nesta página</div>
          <a href="#problema"     class="pct-sidebar__link"><span class="icon">⚠️</span> O Problema</a>
          <a href="#solucao"      class="pct-sidebar__link"><span class="icon">💡</span> A Solução</a>
          <a href="#principios"   class="pct-sidebar__link"><span class="icon">📋</span> Princípios</a>
          <a href="#financiamento" class="pct-sidebar__link"><span class="icon">💰</span> Financiamento</a>
          <a href="#penalidades"  class="pct-sidebar__link"><span class="icon">⚖️</span> Penalidades</a>
          <a href="#transparencia" class="pct-sidebar__link"><span class="icon">🔍</span> Transparência</a>
          <a href="#rs"           class="pct-sidebar__link"><span class="icon">🌊</span> Crise no RS</a>
        </aside>

        <!-- Conteúdo principal -->
        <div>

          <div id="problema">
            <span class="pct-eyebrow">O Problema</span>
            <h2 class="pct-section-title pct-section-header--left">Por que o modelo atual falha?</h2>
            <p class="pct-text-lead mb-3">
              Milhões de brasileiros ainda não dispõem de acesso a água tratada com regularidade,
              especialmente em municípios de pequeno porte, comunidades rurais e populações
              quilombolas e indígenas.
            </p>

            <div class="pct-alert pct-alert--warning mb-3">
              <span class="pct-alert__icon">🚰</span>
              <div>
                <div class="pct-alert__title">Rio Grande do Sul – Crise de 2026</div>
                <div class="pct-alert__text">
                  Em abril de 2026, moradores de Taquara, Rolante, Estância Velha, Campo Bom e Sapiranga
                  relataram água com cor, cheiro e gosto inadequados. A Agesan-RS multou a Corsan em
                  <strong>R$ 70 mil em Taquara</strong> e <strong>R$ 180 mil em Rolante</strong>.
                  O município de Rolante entrou com ação civil pública exigindo melhoria da qualidade.
                </div>
              </div>
            </div>

            <div class="pct-grid pct-grid--2 mb-4">
              @foreach([
                ['🔴', 'Captação única', 'Dependência de um único ponto de captação cria vulnerabilidade sistêmica. Qualquer evento no manancial afeta toda a cidade.'],
                ['🔴', 'Sem alternativas locais', 'Municípios não têm fontes alternativas. Quando o sistema central falha, não há redundância disponível.'],
                ['🔴', 'Tarifas sem qualidade', 'Reajustes anuais ocorrem independentemente da qualidade prestada. Em 2026, reajuste de 4,68% com piora do serviço.'],
                ['🔴', 'Falta de transparência', 'Dados de qualidade não são públicos. Moradores só descobrem problemas ao sentir o gosto e cheiro na água.'],
              ] as $prob)
              <div class="pct-card" style="border-left:4px solid #C81E1E;">
                <div style="font-size:22px; margin-bottom:10px;">{{ $prob[0] }}</div>
                <h4 style="font-family:var(--font-display); font-weight:700; color:#7F1D1D; margin-bottom:8px;">{{ $prob[1] }}</h4>
                <p style="font-size:14px; color:var(--text-secondary); line-height:1.6;">{{ $prob[2] }}</p>
              </div>
              @endforeach
            </div>
          </div>

          <hr class="pct-divider">

          <div id="solucao">
            <span class="pct-eyebrow">A Solução</span>
            <h2 class="pct-section-title pct-section-header--left">O que é o SNDAH?</h2>
            <p class="pct-text-lead mb-3">
              O SNDAH reorganiza o modelo de abastecimento de água potável no Brasil, promovendo
              descentralização da gestão, autonomia municipal, integração regional dos sistemas
              existentes, universalização do acesso e garantia de qualidade.
            </p>

            <div class="pct-grid pct-grid--2 mb-4">
              @foreach([
                ['💧', 'Qualidade Obrigatória', 'Art. 10: proibido fornecer água sem tratamento. Art. 11: monitoramento contínuo e publicação mensal dos resultados. Inclui parâmetros sensoriais (cor, odor, sabor).', 'pct-azul'],
                ['🏛️', 'Autonomia Municipal', 'Art. 7º: municípios escolhem o prestador, instituem tarifa social, criam conselho de controle e usam soluções alternativas sem imposição externa.', 'pct-verde'],
                ['📊', 'SINQUA', 'Sistema Nacional de Informações sobre Qualidade da Água — dados em tempo real, histórico completo e cadastro nacional de poços. Acesso público e gratuito.', 'pct-azul'],
                ['💰', 'FNSAH', 'Fundo Nacional de Suporte ao Abastecimento Hídrico Descentralizado — transferências de até 80% não reembolsáveis para municípios com menos de 50 mil habitantes.', 'pct-laranja'],
              ] as $sol)
              <div class="pct-card pct-card--featured">
                <div class="pct-card__icon" style="font-size:28px; width:60px; height:60px;">{{ $sol[0] }}</div>
                <h3 class="pct-card__title">{{ $sol[1] }}</h3>
                <p class="pct-card__text">{{ $sol[2] }}</p>
              </div>
              @endforeach
            </div>
          </div>

          <hr class="pct-divider">

          <div id="principios">
            <span class="pct-eyebrow">Art. 3º do PL</span>
            <h2 class="pct-section-title pct-section-header--left">Princípios do SNDAH</h2>
            <div style="columns:2; column-gap:24px; margin-top:16px;">
              @foreach([
                'Universalidade do acesso à água potável como direito fundamental',
                'Descentralização com fortalecimento da autonomia municipal',
                'Integração regional, preservando sistemas intermunicipais',
                'Qualidade obrigatória com monitoramento contínuo',
                'Eficiência operacional e sustentabilidade econômica',
                'Transparência, controle social e participação popular',
                'Responsabilidade ambiental e uso racional da água',
                'Solidariedade federativa com suporte aos menores municípios',
                'Equidade — atenção a comunidades rurais, quilombolas e indígenas',
              ] as $p)
              <div style="display:flex; align-items:flex-start; gap:10px; margin-bottom:12px; break-inside:avoid;">
                <span style="color:var(--pct-laranja); font-weight:900; flex-shrink:0; margin-top:1px;">›</span>
                <span style="font-size:14px; color:var(--text-secondary); line-height:1.5;">{{ $p }}</span>
              </div>
              @endforeach
            </div>
          </div>

          <hr class="pct-divider">

          <div id="financiamento">
            <span class="pct-eyebrow">Capítulo VI</span>
            <h2 class="pct-section-title pct-section-header--left">Financiamento – FNSAH</h2>

            <div class="pct-table-wrap mt-3">
              <table class="pct-table">
                <thead>
                  <tr>
                    <th>Porte do Município</th>
                    <th>Tipo de Recurso</th>
                    <th>Condição</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Até 50 mil hab.</strong></td>
                    <td>Transferência não reembolsável</td>
                    <td>Até <strong>80%</strong> do valor do projeto</td>
                  </tr>
                  <tr>
                    <td>Todos os portes</td>
                    <td>Financiamento especial</td>
                    <td>Juros máx. <strong>2% a.a.</strong>, prazo de até <strong>30 anos</strong></td>
                  </tr>
                  <tr>
                    <td>Emergência hídrica</td>
                    <td>Acesso simplificado</td>
                    <td>Prioridade máxima, requisitos reduzidos</td>
                  </tr>
                  <tr>
                    <td>Rural, quilombola, indígena</td>
                    <td>Soluções alternativas</td>
                    <td>Cisternas, captação de chuva, dessalinização</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <hr class="pct-divider">

          <div id="penalidades">
            <span class="pct-eyebrow">Capítulo IX</span>
            <h2 class="pct-section-title pct-section-header--left">Penalidades</h2>

            <div class="pct-grid pct-grid--3 mt-3">
              <div class="pct-card" style="border-top:4px solid var(--pct-amarelo);">
                <div style="font-family:var(--font-display); font-weight:800; font-size:13px; letter-spacing:1px; text-transform:uppercase; color:#7B4F00; margin-bottom:12px;">⚡ Infração Leve</div>
                <div style="font-family:var(--font-display); font-size:28px; font-weight:900; color:var(--text-primary);">R$ 100 mil</div>
                <p style="font-size:13px; color:var(--text-secondary); margin-top:8px; line-height:1.5;">Advertência e multa de até R$ 100.000. Ex: atraso na publicação de relatórios.</p>
              </div>
              <div class="pct-card" style="border-top:4px solid var(--pct-laranja);">
                <div style="font-family:var(--font-display); font-weight:800; font-size:13px; letter-spacing:1px; text-transform:uppercase; color:var(--pct-laranja-dark); margin-bottom:12px;">🚨 Infração Grave</div>
                <div style="font-family:var(--font-display); font-size:28px; font-weight:900; color:var(--text-primary);">R$ 1 milhão</div>
                <p style="font-size:13px; color:var(--text-secondary); margin-top:8px; line-height:1.5;">Multa + suspensão. Ex: água sem tratamento, adulteração de dados, descontinuidade.</p>
              </div>
              <div class="pct-card" style="border-top:4px solid #C81E1E;">
                <div style="font-family:var(--font-display); font-weight:800; font-size:13px; letter-spacing:1px; text-transform:uppercase; color:#7F1D1D; margin-bottom:12px;">🔴 Infração Gravíssima</div>
                <div style="font-family:var(--font-display); font-size:28px; font-weight:900; color:var(--text-primary);">R$ 10 milhões</div>
                <p style="font-size:13px; color:var(--text-secondary); margin-top:8px; line-height:1.5;">Multa + cassação + encampação. Ex: risco à saúde pública, laudos adulterados.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section style="background:var(--pct-azul); padding:64px 0;">
    <div class="pct-container text-center">
      <h2 style="font-family:var(--font-display); font-size:clamp(28px,4vw,44px); font-weight:900; color:var(--text-white); margin-bottom:12px; line-height:1.1;">
        Apoie esta proposta
      </h2>
      <p style="font-size:17px; color:rgba(255,255,255,.75); margin-bottom:32px; max-width:500px; margin-left:auto; margin-right:auto;">
        Compartilhe o SNDAH, filiar-se ao PCT e ajude a levar esta proposta ao Congresso Nacional.
      </p>
      <div class="d-flex gap-2 justify-center flex-wrap">
        <a href="{{ url('/filiacao') }}" class="pct-btn pct-btn--primary pct-btn--lg">Filiar-se ao PCT</a>
        <a href="{{ asset('docs/PL_SNDAH_2026.pdf') }}" class="pct-btn pct-btn--ghost pct-btn--lg" target="_blank">Baixar o PL</a>
      </div>
    </div>
  </section>

@endsection
