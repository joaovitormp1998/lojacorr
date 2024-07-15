#!/bin/sh

echo "🟡 Aguardando o Banco de Dados MySQL iniciar..."
while ! nc -z db 3306; do
  echo "MySQL ainda não está pronto. Tentando novamente em 5 segundos..."
  sleep 5
done

echo "✅ Banco de Dados MySQL iniciado com sucesso (db:3306)"

echo "Verificando diretórios..."
cd /usr/src/lojacorr

echo "Executando as migrações..."
php artisan migrate

echo "Executando seeders..."
php artisan db:seed --class=DatabaseSeeder

echo "Executando testes..."
php artisan test

echo "Instalando dependências npm..."
npm install

echo "Executando npm run dev..."
npm run dev &

echo "Gerando documentações..."
php artisan l5-swagger:generate &

echo "Iniciando o servidor Laravel..."
php artisan serve --host=0.0.0.0 --port=8000
