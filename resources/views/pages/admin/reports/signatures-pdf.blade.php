<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Relatório Nacional de Apoios – PCT</title>
<style>
  /* ── Estilos Premium para Relatório Coletivo ──────────────── */
  body {
    font-family: 'Helvetica', sans-serif;
    background: #FFFFFF;
    color: #222;
    margin: 0;
    padding: 0;
    font-size: 10px;
  }

  .azul { color: #1A3A6B; }
  .verde { color: #1E7A3A; }
  .azul-bg { background-color: #1A3A6B; }
  
  /* ── Cabeçalho ────────────────────────────────────────────── */
  .header-table {
    width: 100%;
    border-bottom: 3px solid #1E7A3A;
    padding: 15px 28px;
    background: #FFFFFF;
  }
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

  /* Faixa de título */
  .titulo-relatorio {
    background: #1A3A6B;
    text-align: center;
    padding: 12px 28px;
  }
  .titulo-relatorio h1 {
    font-size: 16px;
    font-weight: bold;
    color: #FFFFFF;
    text-transform: uppercase;
    margin: 0;
  }
  .barra-amarela {
    height: 4px;
    background: #F5A800;
  }

  /* ── Resumo / Stats ────────────────────────────────────────── */
  .stats-box {
    margin: 20px 28px;
    padding: 12px;
    background: #F8F9FB;
    border: 1px solid #C8CDD6;
    border-left: 4px solid #1A3A6B;
  }

  /* ── Tabela de Dados ───────────────────────────────────────── */
  .dados-container { padding: 0 28px; }
  table.lista-apoios {
    width: 100%;
    border-collapse: collapse;
  }
  table.lista-apoios th {
    background: #1A3A6B;
    color: #FFFFFF;
    padding: 8px;
    text-align: left;
    font-size: 9px;
    text-transform: uppercase;
    border: 1px solid #1A3A6B;
  }
  table.lista-apoios td {
    padding: 8px;
    border: 1px solid #E2E8F0;
    font-size: 9px;
  }
  table.lista-apoios tr:nth-child(even) { background: #F8FAFC; }

  /* ── Rodapé ────────────────────────────────────────────────── */
  .footer {
    background: #1A3A6B;
    padding: 12px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  .footer p {
    color: #adc4e8;
    font-size: 8px;
    margin: 0;
  }
  .page-number:after { content: counter(page); }
</style>
</head>
<body>

  <!-- Cabeçalho -->
  <table class="header-table">
    <tr>
      <td width="60">
        <img src="{{ public_path('logo partido_cropped.png') }}" style="height: 50px;">
      </td>
      <td style="padding-left: 15px;">
        <div class="org-nome">PCT – PARTIDO CIDADANIA E TRABALHO</div>
        <div class="org-slogan">UNIR · DEFENDER · TRANSFORMAR</div>
      </td>
      <td style="text-align: right; font-size: 9px; color: #4A5568;">
        <strong>EMISSÃO:</strong> {{ $date }}<br>
        <strong>AUDITORIA NACIONAL</strong>
      </td>
    </tr>
  </table>

  <!-- Título -->
  <div class="titulo-relatorio">
    <h1>Relatório Nacional de Apoios Oficiais</h1>
  </div>
  <div class="barra-amarela"></div>

  <!-- Stats -->
  <div class="stats-box">
    <table width="100%">
      <tr>
        <td><strong>TOTAL DE APOIOS:</strong> <span class="azul">{{ $total }}</span></td>
        <td><strong>RESPONSÁVEL:</strong> Governança Nacional PCT</td>
        <td style="text-align: right;"><strong>STATUS:</strong> PARTIDO EM FORMAÇÃO</td>
      </tr>
    </table>
  </div>

  <!-- Tabela -->
  <div class="dados-container">
    <table class="lista-apoios">
      <thead>
        <tr>
          <th>Protocolo</th>
          <th>Nome Completo</th>
          <th>CPF</th>
          <th>Título Eleitor</th>
          <th>Localidade</th>
          <th>Data Registro</th>
        </tr>
      </thead>
      <tbody>
        @foreach($signatures as $sig)
        <tr>
          <td style="font-weight: bold; color: #1A3A6B;">{{ $sig->protocol_number }}</td>
          <td>{{ $sig->full_name }}</td>
          <td>{{ $sig->cpf }}</td>
          <td>{{ $sig->voter_title }}</td>
          <td>{{ $sig->city }}/{{ $sig->state }}</td>
          <td>{{ $sig->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Rodapé -->
  <div class="footer">
    <p>
      PCT – Partido Cidadania e Trabalho | Documento Interno de Auditoria Partidária<br>
      Página <span class="page-number"></span> | Gerado em {{ $date }}
    </p>
  </div>

</body>
</html>
