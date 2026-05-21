#!/bin/bash
# Cetako Production Deployment Script
# Jalankan: bash deploy.sh

echo "🚀 Deploying Cetako..."

# 1. Install dependencies (tanpa dev)
composer install --no-dev --optimize-autoloader

# 2. Generate key jika belum ada
php artisan key:generate --force

# 3. Run migrations
php artisan migrate --force

# 4. Seed admin user (hanya pertama kali)
php artisan db:seed --class=AdminSeeder --force

# 5. Create storage link
php artisan storage:link 2>/dev/null || true

# 6. Cache config, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Optimize
php artisan optimize

echo "✅ Deployment selesai!"
echo ""
echo "📋 Langkah selanjutnya:"
echo "   1. Pastikan .env sudah dikonfigurasi (APP_URL, DB, MAIL)"
echo "   2. Set permission: chmod -R 775 storage bootstrap/cache"
echo "   3. Login admin: /admin/login (admin@cetako.com / cetako2026)"
echo "   4. Ganti password admin segera setelah login pertama"
