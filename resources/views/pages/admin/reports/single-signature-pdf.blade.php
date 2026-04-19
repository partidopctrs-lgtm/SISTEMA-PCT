<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Ficha de Apoio à Criação de Partido – PCT</title>
<style>
  /* ── Estilos Adaptados para DomPDF (Sem Grid/Flex) ─────────── */
  body {
    font-family: 'Helvetica', sans-serif;
    background: #FFFFFF;
    color: #222;
    margin: 0;
    padding: 20px;
    font-size: 11px;
  }

  .azul { color: #1A3A6B; }
  .verde { color: #1E7A3A; }
  .azul-bg { background-color: #1A3A6B; }
  
  /* ── Folha A4 ──────────────────────────────────────────────── */
  #ficha {
    width: 100%;
    background: #FFFFFF;
    border: 1px solid #C8CDD6;
  }

  /* ── Cabeçalho (Table Based) ───────────────────────────────── */
  .header-table {
    width: 100%;
    border-bottom: 3px solid #1E7A3A;
    padding: 15px 20px;
  }
  .header-logo { width: 100px; text-align: center; }
  .org-nome {
    font-size: 16px;
    font-weight: bold;
    color: #1A3A6B;
    text-transform: uppercase;
  }
  .org-slogan {
    font-size: 9px;
    font-weight: bold;
    color: #1E7A3A;
    text-transform: uppercase;
  }
  .header-num {
    text-align: right;
    font-size: 10px;
    color: #4A5568;
  }

  /* Faixa de título */
  .titulo-ficha {
    background: #1A3A6B;
    text-align: center;
    padding: 10px;
  }
  .titulo-ficha h1 {
    font-size: 18px;
    font-weight: bold;
    color: #FFFFFF;
    text-transform: uppercase;
    margin: 0;
  }
  .titulo-ficha p {
    font-size: 9px;
    color: #adc4e8;
    margin: 2px 0 0;
  }
  .barra-amarela {
    height: 4px;
    background: #F5A800;
  }

  /* ── Corpo ─────────────────────────────────────────────────── */
  .doc-body { padding: 15px 20px; }

  /* ── Seções ────────────────────────────────────────────────── */
  .secao-header {
    background: #1A3A6B;
    color: #FFFFFF;
    padding: 5px 10px;
    font-size: 11px;
    font-weight: bold;
    text-transform: uppercase;
    margin-top: 15px;
  }
  .secao-body {
    border: 1px solid #1A3A6B;
    border-top: none;
    padding: 10px;
  }

  /* ── Campos ────────────────────────────────────────────────── */
  .campo-table { width: 100%; margin-bottom: 8px; }
  .label {
    font-size: 8px;
    font-weight: bold;
    color: #1A3A6B;
    text-transform: uppercase;
    display: block;
    margin-bottom: 2px;
  }
  .valor {
    height: 22px;
    border: 1px solid #C8CDD6;
    border-bottom: 2px solid #1E4D9B;
    padding: 4px 8px;
    font-size: 11px;
    background: #FAFBFD;
    font-weight: bold;
  }

  /* ── Destaques ─────────────────────────────────────────────── */
  .bloco-eleitoral {
    background: #F2F4F7;
    border: 2px solid #1A3A6B;
    padding: 10px;
    margin-top: 5px;
  }
  .valor-grande {
    font-size: 15px;
    text-align: center;
    color: #1A3A6B;
  }

  /* ── Declaração ────────────────────────────────────────────── */
  .decl-box {
    background: #F2F4F7;
    border-left: 4px solid #1A3A6B;
    padding: 10px;
    font-size: 11px;
    line-height: 1.5;
    text-align: justify;
  }

  /* ── Assinatura ────────────────────────────────────────────── */
  .ass-box {
    margin-top: 30px;
    text-align: center;
  }
  .ass-linha {
    width: 350px;
    border-top: 1.5px solid #888;
    margin: 40px auto 5px;
  }
  .ass-span {
    font-style: italic;
    color: #bbb;
    font-size: 10px;
  }

  /* ── Uso Interno ───────────────────────────────────────────── */
  .uso-interno {
    border: 1px dashed #C8CDD6;
    background: #F8F9FB;
    padding: 8px;
    font-size: 9px;
  }

  /* ── Rodapé ────────────────────────────────────────────────── */
  .rodape {
    background: #1A3A6B;
    padding: 10px;
    text-align: center;
  }
  .rodape p {
    color: #adc4e8;
    font-size: 8px;
    margin: 0;
  }
</style>
</head>
<body>

<div id="ficha">

  <!-- Cabeçalho -->
  <table class="header-table">
    <tr>
      <td class="header-logo">
        <img src="{{ public_path('logo partido_cropped.png') }}" style="height: 60px;">
      </td>
      <td style="padding-left: 15px;">
        <div class="org-nome">PCT – PARTIDO CIDADANIA E TRABALHO</div>
        <div class="org-slogan">UNIR · DEFENDER · TRANSFORMAR</div>
        <div style="font-size: 9px; color: #4A5568;">{{ $sig->city }} – {{ $sig->state }}</div>
      </td>
      <td class="header-num">
        <strong>FICHA Nº:</strong><br>
        <span style="font-size: 14px; font-weight: bold; color: #1A3A6B;">{{ $sig->protocol_number }}</span>
      </td>
    </tr>
  </table>

  <!-- Título -->
  <div class="titulo-ficha">
    <h1>Ficha de Apoio à Criação de Partido Político</h1>
    <p>Nos termos da Lei nº 9.096/1995 e Resoluções do Tribunal Superior Eleitoral</p>
  </div>
  <div class="barra-amarela"></div>

  <div class="doc-body">

    <!-- SEÇÃO 1 -->
    <div class="secao-header">1 Identificação do Apoiante</div>
    <div class="secao-body">
      <table class="campo-table">
        <tr>
          <td colspan="2">
            <span class="label">Nome completo</span>
            <div class="valor">{{ $sig->full_name }}</div>
          </td>
        </tr>
        <tr>
          <td width="60%">
            <span class="label">CPF</span>
            <div class="valor">{{ $sig->cpf }}</div>
          </td>
          <td width="40%">
            <span class="label">Data de nascimento</span>
            <div class="valor">{{ ($user && $user->birth_date) ? $user->birth_date->format('d/m/Y') : 'N/A' }}</div>
          </td>
        </tr>
      </table>

      <div style="margin-top: 5px;">
        <span class="label">Título de eleitor</span>
        <div class="valor" style="font-size: 14px; border-color: #1A3A6B;">{{ $sig->voter_title }}</div>
      </div>

      <div class="bloco-eleitoral">
        <table class="campo-table" style="margin-bottom: 0;">
          <tr>
            <td width="50%">
              <span class="label">Zona eleitoral</span>
              <div class="valor valor-grande">{{ $user->voter_zone ?? '____' }}</div>
            </td>
            <td width="50%">
              <span class="label">Seção eleitoral</span>
              <div class="valor valor-grande">{{ $user->voter_section ?? '____' }}</div>
            </td>
          </tr>
          <tr>
            <td>
              <span class="label">Município</span>
              <div class="valor">{{ $sig->city }}</div>
            </td>
            <td>
              <span class="label">Estado (UF)</span>
              <div class="valor">{{ $sig->state }}</div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <!-- SEÇÃO 2 -->
    <div class="secao-header">2 Declaração de Apoio</div>
    <div class="secao-body">
      <div class="decl-box">
        Eu, eleitor(a) identificado(a) neste instrumento, portador(a) do título de eleitor acima referenciado, 
        no pleno exercício de minha capacidade civil e eleitoral, <strong>DECLARO, para os devidos fins legais, 
        que apoio a criação do Partido Cidadania e Trabalho (PCT)</strong>, nos termos da Lei Federal nº 9.096/1995.
        Declaro estar em pleno gozo dos meus direitos políticos e que as informações prestadas são verdadeiras.
      </div>
    </div>

    <!-- SEÇÃO 3 -->
    <div class="secao-header">3 Assinatura, Local e Data</div>
    <div class="secao-body">
      <div class="ass-box">
        <div class="ass-linha"></div>
        <div class="ass-span">(assinatura conforme documento de identificação)</div>
        
        <table class="campo-table" style="margin-top: 15px; margin-bottom: 0;">
          <tr>
            <td width="60%">
              <span class="label">Local</span>
              <div class="valor">{{ $sig->city }}</div>
            </td>
            <td width="40%">
              <span class="label">Data</span>
              <div class="valor">{{ $sig->created_at->format('d/m/Y') }}</div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <!-- SEÇÃO 4 -->
    <div class="secao-header">4 Uso Interno — Controle de Protocolo</div>
    <div class="secao-body">
      <div class="uso-interno">
        <table class="campo-table" style="margin-bottom: 0;">
          <tr>
            <td width="33%">
              <span class="label">Status</span>
              <div style="font-weight: bold; color: #1A3A6B;">{{ strtoupper($sig->status) }}</div>
            </td>
            <td width="33%">
              <span class="label">Data Registro</span>
              <div>{{ $sig->created_at->format('d/m/Y H:i') }}</div>
            </td>
            <td width="34%">
              <span class="label">Protocolo</span>
              <div style="font-weight: bold;">{{ $sig->protocol_number }}</div>
            </td>
          </tr>
        </table>
      </div>
    </div>

  </div>

  <!-- Rodapé -->
  <div class="rodape">
    <p>
      Este documento destina-se exclusivamente ao processo de apoio à criação do
      <strong>Partido Cidadania e Trabalho (PCT)</strong>.<br>
      PCT – Partido Cidadania e Trabalho | Taquara – RS | movimento@pct.social.br
    </p>
  </div>

</div>

</body>
</html>
