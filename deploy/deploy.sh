#!/bin/bash
# =============================================================
# Deploy PCT - pct.hotdogdovini.com.br
# VPS: 187.127.17.241 | AlmaLinux 9 | Nginx | MariaDB
# =============================================================
set -e

APP_DIR="/var/www/pct"
DB_NAME="pct_db"
DB_USER="pct_user"
DB_PASS="PCT@Forte2026!"
REPO_URL="https://github.com/dresbach-records/pct-political-platform.git"

echo "=========================================="
echo "  DEPLOY PCT - pct.hotdogdovini.com.br"
echo "=========================================="

# --- 1. Verificar PHP ---
echo "[1/9] Verificando PHP e Composer..."
php -v
composer --version

# --- 2. Clonar ou atualizar repositório ---
echo "[2/9] Repositório..."
if [ -d "$APP_DIR/.git" ]; then
    echo "  → Atualizando..."
    cd $APP_DIR && git pull origin main
else
    echo "  → Clonando..."
    git clone $REPO_URL $APP_DIR
    cd $APP_DIR
fi
cd $APP_DIR

# --- 3. Dependências PHP ---
echo "[3/9] composer install..."
composer install --no-dev --optimize-autoloader --no-interaction

# --- 4. Dependências Node e build frontend ---
echo "[4/9] npm ci && npm run build..."
npm ci
npm run build

# --- 5. Criar banco e usuário dedicados para o PCT ---
echo "[5/9] Criando banco pct_db e usuário pct_user..."
mysql -u root -e "
  CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
  CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';
  GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';
  FLUSH PRIVILEGES;
" 2>/dev/null
echo "  → Banco $DB_NAME e usuário $DB_USER criados com sucesso!"

# --- 6. Configurar .env ---
echo "[6/9] Configurando .env..."
cp $APP_DIR/.env.example $APP_DIR/.env
php $APP_DIR/artisan key:generate --force

# --- 7. Migrations ---
echo "[7/9] Rodando migrations..."
php $APP_DIR/artisan migrate --force

# --- 8. Cache de produção ---
echo "[8/9] Cache de produção..."
php $APP_DIR/artisan config:cache
php $APP_DIR/artisan route:cache
php $APP_DIR/artisan view:cache

# --- 9. Permissões + Nginx ---
echo "[9/9] Permissões e Nginx..."
chown -R nginx:nginx $APP_DIR
chmod -R 755 $APP_DIR/storage
chmod -R 755 $APP_DIR/bootstrap/cache

# Instalar config do Nginx
cp $APP_DIR/deploy/nginx-pct.conf /etc/nginx/conf.d/pct.hotdogdovini.com.br.conf
nginx -t && systemctl reload nginx

# SSL
echo ""
echo "Obtendo certificado SSL..."
certbot --nginx -d pct.hotdogdovini.com.br --non-interactive --agree-tos -m admin@pct.org.br

echo ""
echo "=========================================="
echo "  ✅ DEPLOY CONCLUÍDO!"
echo "  🌐 https://pct.hotdogdovini.com.br"
echo "=========================================="
