# Plano de Implementação da Nova Arquitetura Central do PCT

Esta reestruturação transforma o sistema em uma plataforma unificada de inteligência, operação política e gestão partidária, conectando todas as pontas (afiliado, diretório, jurídico e nacional) com dados reais.

> [!IMPORTANT]
> **Toda a estrutura abaixo será implementada com banco de dados real (sem dados falsos/mocks).** Cada botão, gráfico e lista será alimentado por tabelas e fluxos reais.

## 1. Arquitetura do Painel Central (Admin Nacional)

O menu principal do Admin será reorganizado nestes 7 pilares estratégicos:

### 1.1 Partido em Formação (Coleta de Assinaturas)
- **Funções:** Formulário de apoio formal, geração de protocolo e PDF, controle de metas por cidade/estado, impressão em lote e verificação por protocolo.
- **Integração:** Conectado ao Painel do Afiliado para que a base possa assinar e convidar.

### 1.2 Demandas da População (Ouvidoria/Denúncias)
- **Funções:** Registro de problemas estruturais das cidades recebidos através dos afiliados.
- **Integração de Urgência:** O sistema apurará as demandas e, ao atingir um número crítico de denúncias sobre o mesmo tema/cidade, gerará alertas de urgência para protocolo formal (pressionar gestão pública).
- **Indicadores:** Ranking de cidades com mais problemas e categorias críticas.

### 1.3 Gestão de Diretórios
- **Funções:** Lista de diretórios, aprovação de ONG para Diretório, definição de líderes e responsáveis locais, acompanhamento de metas operacionais.

### 1.4 Governança Interna
- **Funções:** Estrutura hierárquica (cargos), sistema de eleições e votações internas com controle de quorum, promoções e substituições automáticas.

### 1.5 Comunicação e Mobilização
- **Funções:** Ferramenta de disparo em massa (E-mail, WhatsApp, Push), campanhas recorrentes e segmentadas por cidade ou status.

### 1.6 Inteligência e Controle (O Cérebro)
- **Funções:** Mapa de calor (Verde, Amarelo, Vermelho) do desempenho por cidade, metas comparativas, alertas preditivos (ex: "Diretório X parou de crescer") e ranking nacional.

### 1.7 Jurídico Institucional
- **Funções:** Validação de documentos da associação, estatutos, auditoria e revisão final.

---

## 2. Ecossistema Jurídico (Módulo 7 Expandido)

Para não misturar a operação do advogado com a supervisão institucional, criaremos duas áreas distintas:

### 2.1 Painel Jurídico (Supervisão Nacional)
- **Acesso:** Coordenadores Jurídicos Nacionais.
- **Visão:** Controle de compliance, auditoria de processos disciplinares em andamento, alertas de risco legal, acompanhamento de regularidade de diretórios e aprovação final de estatutos.

### 2.2 Painel Operacional do Advogado
- **Acesso:** Advogados cadastrados (Rota e Login próprios).
- **Visão:** Mesa de trabalho focada. O advogado verá apenas as solicitações atribuídas a ele, contratos para revisar, pareceres pendentes, agenda de prazos e seu histórico de produtividade. Não pode alterar o sistema, apenas emitir pareceres e análises.

---

## 3. Painel do Afiliado (Visão Básica e Direta)

O painel do afiliado será enxuto e prático, sem privilégios gerenciais:

- **Dashboard Básico:** Resumo de pontos, posição no ranking e impacto direto (indicados).
- **Apoio ao Partido:** Módulo em destaque para o afiliado registrar sua assinatura de apoio oficial, gerar seu PDF e enviar o link para outras pessoas apoiarem.
- **[NOVO] Demandas da População:** 
  - O afiliado poderá subir denúncias/demandas locais (ex: problemas na cidade).
  - Suporte para envio de relatos detalhados e upload de evidências (fotos, PDF, DOCX).
  - O sistema gera automaticamente um **Documento de Protocolo Oficial (PDF)** como recibo para o afiliado, detalhando o que foi pedido.
  - Essas demandas alimentam o módulo "Demandas da População" do Painel Central, que irá apurar urgências e gerar ações formais quando o volume atingir a meta.
- **Identidade e Missões:** Carteirinha, escola básica e missões gamificadas.

---

## 4. Plano de Execução (Banco de Dados e Código)

Para que tudo funcione sem "mocks", a execução seguirá estes passos técnicos:

1. **Modelagem de Dados (Migrations):** 
   - Criação das tabelas centrais: `signatures` (assinaturas do partido), `public_demands` (demandas da população com suporte a anexos), `internal_elections` (votações), `lawyer_tasks` (tarefas jurídicas), etc.
2. **Reestruturação das Rotas e Sidebars:**
   - Construir o menu exato dos 7 módulos no Admin.
   - Criar a rota de login isolada para o advogado (`/advogado/login`).
3. **Desenvolvimento das Lógicas (Controllers):**
   - Lógica de geração de PDF para recibos de protocolo das demandas da população.
   - Gatilhos automáticos para escalonamento de demandas no Admin.
4. **Interfaces Frontend:**
   - Desenhar os painéis com a estética premium, aplicando gráficos e formulários reais.

> [!WARNING]
> **PERGUNTA PARA APROVAÇÃO:** O plano foi atualizado com a funcionalidade de envio de demandas/denúncias com geração de protocolo e gatilho de urgência no painel do afiliado. Se tudo estiver correto, me dê o ok para eu iniciar a criação do banco de dados e rotas!
