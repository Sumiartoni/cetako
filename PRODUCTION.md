# 🚀 Cetako - Production Deployment Guide

## Persyaratan Server
- PHP 8.2+ (dengan extensions: mbstring, openssl, pdo, sqlite3/mysql, gd, fileinfo)
- Composer 2.x
- Web server: Nginx atau Apache
- SQLite (default) atau MySQL 8.0+

## Langkah Deploy

### 1. Upload Files
Upload semua file ke server (kecuali `node_modules`, `.env`, `storage/logs/*`).

### 2. Konfigurasi Environment
```bash
cp .env.production .env
php artisan key:generate
```
Edit `.env` dan sesuaikan:
- `APP_URL` = URL domain Anda
- `DB_*` = Konfigurasi database
- `MAIL_*` = Konfigurasi email (opsional)

### 3. Jalankan Deployment
```bash
bash deploy.sh
```

Atau manual:
```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan db:seed --class=AdminSeeder --force
php artisan storage:link
php artisan optimize
```

### 4. Set Permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 5. Konfigurasi Web Server

#### Nginx
```nginx
server {
    listen 80;
    server_name cetako.com www.cetako.com;
    root /var/www/cetako/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

#### Apache (.htaccess sudah ada di /public)
Pastikan `mod_rewrite` aktif.

## Login Admin
- URL: `https://domain.com/admin/login`
- Email: `admin@cetako.com`
- Password: `cetako2026`
- ⚠️ **Ganti password segera setelah login pertama!**

## Struktur Menu Admin
| Menu | Fungsi |
|------|--------|
| Dashboard | Overview statistik |
| Artikel | Kelola blog/artikel |
| Produk | Kelola produk & layanan |
| Tentang Kami | Edit halaman tentang (visi, misi, tim) |
| Layanan | Edit halaman layanan (6 layanan, harga) |
| Testimonial | Kelola testimoni klien |
| FAQ | Kelola pertanyaan umum |
| Statistik | Kelola angka statistik |
| Pengaturan | SEO, kontak, sosial media |

## Halaman Publik
| URL | Halaman |
|-----|---------|
| `/` | Landing page |
| `/tentang` | Tentang Kami |
| `/layanan` | Layanan |
| `/produk` | Katalog Produk |
| `/portofolio` | Portofolio |
| `/blog` | Blog & Artikel |
| `/kontak` | Hubungi Kami |
| `/sitemap.xml` | Sitemap SEO |

## Troubleshooting
- **500 Error**: Cek `storage/logs/laravel.log`, pastikan permissions benar
- **Halaman kosong**: Jalankan `php artisan view:clear && php artisan cache:clear`
- **Upload gagal**: Pastikan `storage/app/public` writable dan `php artisan storage:link` sudah dijalankan
- **CSS/JS tidak muncul**: Pastikan `APP_URL` di `.env` benar
