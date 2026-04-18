# Checklist de Execução: Estabilização de Infraestrutura PCT

- `[x]` **Fase 1: Roteamento e Código**
  - `[x]` Refatoração de Rotas (bootstrap/app.php + routes/web.php)
  - `[x]` Importação da Facade Route no bootstrap/app.php
  - `[x]` Padronização de Credenciais de Admin (admin@pct.org.br)

- `[x]` **Fase 2: Infraestrutura Nginx**
  - `[x]` Configuração de Bloco Principal (pct.social.br)
  - `[x]` Configuração de Subdomínios (administrativo, afiliado, etc.)
  - `[x]` Implementação de redirecionamentos automáticos de raiz para painéis
  - `[x]` Configuração de Ambiente Isolado (dev.pct.social.br)

- `[x]` **Fase 3: Configuração e Variáveis (.env)**
  - `[x]` Criação de .env.example
  - `[x]` Refino do .env.vps (Drivers database para Session/Cache/Queue)
  - `[x]` Configuração de SESSION_DOMAIN e SANCTUM_STATEFUL_DOMAINS
  - `[x]` Integração de credenciais de Email (SMTP real)

- `[x]` **Fase 4: Saneamento de Mocks e Governança**
  - `[x]` Fix: Erro 500 na Governança (Adição de position_id na tabela users)
  - `[x]` Governança Real: Criação de Seeder com cargos hierárquicos
  - `[x]` Inteligência Real: Cálculo dinâmico de eficiência e engajamento

- [x] Fase 5: Interface e Acessos Rápidos
  - [x] Identificação de cada painel no topo da página
  - [x] Grid de acesso rápido a todos os painéis na Área do Afiliado (para Admins)
  - [x] Padronização de títulos e rótulos institucionais
  - [x] Isolamento de menus no `dashboard-layout.blade.php` por portal
  - [x] Limpeza de redundâncias e lógica duplicada na sidebar
  - [x] Criação de menus exclusivos para Jurídico, Financeiro e Comitê

- [ ] **Fase 6: Deploy e Validação Final**
  - `[x]` Atualização do script deploy/deploy.sh
  - `[ ]` Teste de Fluxo de Login em todos os subdomínios (Simulação de Cookies)
  - `[ ]` Emissão de Certificados SSL (Certbot Multi-Domain)
