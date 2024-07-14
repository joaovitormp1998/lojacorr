#!/bin/sh

echo "🟡 Aguardando o Banco de Dados MySQL iniciar..."
while ! nc -z db 3306; do
  echo "MySQL ainda não está pronto. Tentando novamente em 5 segundos..."
  sleep 5
done

echo "✅ Banco de Dados MySQL iniciado com sucesso ($DB_HOST:$DB_PORT)"

echo "Verificando diretórios..."
cd /usr/src/lojacorr

echo "Executando as migrações..."
php artisan migrate

echo "Iniciando o servidor Laravel..."
php artisan serve --host=0.0.0.0 --port=8000
