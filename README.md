# 🏛️ PCT - Movimento Cidadania e Trabalho

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2.x-blue.svg)](https://php.net)
[![Tailwind Version](https://img.shields.io/badge/Tailwind-4.x-38B2AC.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-Proprietary-black.svg)](LICENSE.md)

---

## 📌 Sobre o Projeto

O **PCT Platform** é um ecossistema digital completo para gestão de um movimento político moderno, incluindo:

- Gestão de membros  
- Organização de diretórios  
- Controle financeiro  
- Conformidade jurídica  
- Comunicação institucional  

Projetado para operação em **escala nacional**.

---

## 🚀 Funcionalidades Principais

### 🌐 Portal Público
- Site institucional  
- Filiação digital  
- Transparência financeira  

---

### 📊 Sistema de Painéis

| Módulo | Perfil | URL | E-mail |
|--------|--------|-----|--------|
| 🛡️ Administrativo | Gestão Nacional | `/admin/dashboard` | `admin@pct.social.br` |
| 👤 Afiliado | Membro | `/dashboard` | `afiliado@pct.social.br` |
| 🗳️ Candidato | Pré-candidatura | `/candidate/dashboard` | `candidato@pct.social.br` |
| 🏛️ Comitê | Diretório Local | `/committee/dashboard` | `comite@pct.social.br` |
| 💰 Financeiro | Tesouraria | `/finance/dashboard` | `financeiro@pct.social.br` |
| ⚖️ Jurídico | Compliance | `/legal/dashboard` | `juridico@pct.social.br` |
| 📢 Comunicação | Marketing | `/communication/dashboard` | `comunicacao@pct.social.br` |

**Senha padrão de teste:**  
`12345678`

---

## 🛠️ Stack Tecnológica

- Backend: Laravel 12.x  
- Frontend: Blade + Tailwind CSS 4.x  
- Banco de Dados: MySQL / MariaDB  
- Interatividade: Alpine.js  
- Build: Vite  

---

## ⚙️ Instalação e Configuração

### 📋 Requisitos

- PHP >= 8.2  
- MySQL / MariaDB  
- Node.js >= 18  

---

### 🚀 Passo a Passo

#### 1. Clonar o projeto
```bash
git clone https://github.com/dresbach-records/pct-political-platform.git
cd pct-political-platform
2. Instalar dependências
composer install
npm install && npm run build
3. Configurar ambiente
cp .env.example .env

#### Editar o .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=pct_db
DB_USERNAME=pct_user
DB_PASSWORD=********
4. Gerar chave
php artisan key:generate
5. Rodar banco
php artisan migrate --seed
6. Limpar cache
php artisan optimize:clear
7. Rodar sistema
php artisan serve
🔐 Acesso
http://localhost:8002

####Use os e-mails da tabela acima.

📊 Estrutura
Admin → Jurídico / Financeiro / Comunicação → Comitês → Afiliados
⚠️ Segurança
Nunca usar APP_DEBUG=true em produção
Proteger .env
Usar HTTPS
Alterar senha padrão
📧 E-mail (Desenvolvimento)
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
⚖️ Licença

#### Software proprietário do:

#### PCT – Movimento Cidadania e Trabalho

####❤️ Desenvolvido para organização e transformação real.