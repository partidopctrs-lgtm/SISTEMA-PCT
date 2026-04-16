# 🏛️ PCT - Partido Cidadania e Trabalho
1
[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2.x-blue.svg)](https://php.net)
[![Tailwind Version](https://img.shields.io/badge/Tailwind-4.x-38B2AC.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-Proprietary-black.svg)](LICENSE.md)

O **PCT Political Platform** é um ecossistema digital completo projetado para gerenciar todas as esferas de um movimento político moderno. Desde a mobilização de base e arrecadação financeira até a conformidade jurídica com o TSE.

---

## 🚀 Funcionalidades Principais

### 🌐 Portal Público
- **Site Institucional**: Landing page de alto impacto com manifesto e plataforma.
- **Filiação Digital**: Fluxo de cadastro otimizado para novos membros.
- **Transparência**: Painel público de prestação de contas.

### 📊 Ecossistema de Dashboards (Acessos de Teste)

Abaixo estão os dados para acesso em ambiente de homologação. Todas as senhas de teste são `PCT@123456`.

| Módulo | Perfil | URL | E-mail |
| :--- | :--- | :--- | :--- |
| **Admin** | Gestor Nacional | `/admin/dashboard` | `admin@pct.org.br` |
| **Afiliado** | Apoiador/Membro | `/affiliate/dashboard` | `afiliado@pct.org.br` |
| **Candidato** | Gabinete Digital | `/candidate/dashboard` | `candidato@pct.org.br` |
| **Comitê** | Líder Regional | `/committee/dashboard` | `comite@pct.org.br` |
| **Tesouraria** | Gestor Financeiro | `/finance/dashboard` | `financeiro@pct.org.br` |
| **Jurídico** | Compliance TSE | `/legal/dashboard` | `juridico@pct.org.br` |
| **Comunicação** | Marketing Político | `/communication/dashboard` | `comunicacao@pct.org.br` |

---

## 🛠️ Stack Tecnológica

- **Backend**: Laravel 12.x
- **Frontend**: Blade + Tailwind CSS 4.x (Engine CSS Moderno)
- **Database**: MySQL 8.x
- **Interatividade**: Alpine.js
- **Tooling**: Vite 6.x

---

## ⚙️ Instalação e Configuração

### Requisitos
- PHP >= 8.2
- MySQL >= 8.0
- Node.js & NPM

### Passo a Passo
1. **Clone o repositório**:
   ```bash
   git clone https://github.com/dresbach-records/pct-political-platform.git
   ```
2. **Instale as dependências PHP**:
   ```bash
   composer install
   ```
3. **Instale as dependências Frontend**:
   ```bash
   npm install && npm run build
   ```
4. **Configure o ambiente**:
   ```bash
   cp .env.example .env
   # Ajuste as credenciais do DB_DATABASE, DB_USERNAME (root-ai) e DB_PASSWORD
   ```
5. **Gere a chave da aplicação**:
   ```bash
   php artisan key:generate
   ```
6. **Migre e popule o banco**:
   ```bash
   php artisan migrate:fresh --seed --force
   ```

---

## ⚖️ Licença Restritiva

Este software é proprietário e todos os direitos são reservados ao **PCT - Partido Cidadania e Trabalho**. O uso, modificação ou distribuição não autorizada é estritamente proibido. Veja [LICENSE.md](LICENSE.md) para mais detalhes.

---

## 📧 Testes de E-mail
Para testes de e-mail em ambiente local, recomendamos o uso de ferramentas como **Mercury** ou MailHog. Configure no `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
```

---
**Desenvolvido com ❤️ para transformar o Brasil.**
