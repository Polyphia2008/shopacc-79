#!/usr/bin/env bash
# Khoi dong preview (Apache + MariaDB) cho sandbox.
set -e

PROJECT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DB_NAME="randomsieuxin_test11"
DB_USER="randomsieuxin_test11"
DB_PASS="randomsieuxin_test11"

echo "[1/4] Khoi dong MariaDB..."
sudo service mariadb start >/dev/null 2>&1 || true
for i in $(seq 1 20); do
  if mariadb-admin ping >/dev/null 2>&1; then break; fi
  sleep 1
done

echo "[2/4] Kiem tra database ${DB_NAME}..."
if ! mariadb -e "USE ${DB_NAME};" >/dev/null 2>&1; then
  echo "      -> Chua co DB, tao moi va import dump..."
  sudo mariadb -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME} CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    CREATE USER IF NOT EXISTS '${DB_USER}'@'localhost' IDENTIFIED BY '${DB_PASS}';
    GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'localhost';
    FLUSH PRIVILEGES;"
  sudo mariadb "${DB_NAME}" < "${PROJECT_DIR}/database/nick6.sql"
  sudo mariadb "${DB_NAME}" < "${PROJECT_DIR}/database/01_admin_account.sql"
fi

echo "[3/4] Kich hoat module + vhost..."
sudo a2enmod rewrite headers >/dev/null 2>&1 || true
sudo apache2ctl configtest

echo "[4/4] Khoi dong Apache (cong 3000)..."
sudo apache2ctl start 2>/dev/null || sudo apache2ctl restart 2>/dev/null || true
sleep 2

CODE=$(curl -s -o /dev/null -w "%{http_code}" http://127.0.0.1:3000/)
echo "      HTTP ${CODE} tren http://127.0.0.1:3000/"
echo "      Dang nhap: admin / Admin@123456  ->  /Auth/Login"
