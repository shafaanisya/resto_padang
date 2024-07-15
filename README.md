# Website Reservasi dan Pemesanan Restoran Padang Berbasis

## Deskripsi
Aplikasi Resto Padang – Sistem Informasi Reservasi dan Pemesanan Restoran Padang Berbasis web. Aplikasi ini dibuat dengan menggunakan framework PHP Laravel 10. Aplikasi ini dibuat untuk memenuhi kebutuhan manajemen resto padang secara online. Aplikasi ini memiliki fitur untuk manajemen customer, menu makanan dan minuman, user, booking dan transaksi.

## Fitur
- Manajemen Customer
- Manajemen User
- Manajemen Menu Makanan dan Minuman
- Manajemen Booking
- Manajemen Transaksi

## System Requirement
- PHP 8.0+
- MySQL 5.7+
- Composer
- Node.js LTS 18.04+
- GIT 2.33+

## Skills Requirement
- HTML
- CSS
- JavaScript
- PHP
- MySQL
- MVC Pattern

## Teknologi
- PHP 8.0+
- Laravel 10
- MySQL 5.7+
- Tailwind CSS atau Bootstrap 5

## Instalasi
1. Clone repository ini
2. Masuk ke folder repository
3. Jalankan perintah `composer install`
4. Buat file `.env` dengan menyalin isi dari file `.env.example`
5. Jalankan perintah `php artisan key:generate`
6. Buat database baru
7. Isi konfigurasi database pada file `.env`
8. Jalankan perintah `php artisan migrate --seed`
9. Jalankan perintah `php artisan serve`
10. Buka browser dan akses `http://localhost:8000`

## Cara Kolaborasi
1. Fork repository ini dengan cara klik tombol `Fork` pada halaman repository ini di GitHub
2. Clone repository hasil fork

```bash
git clone <url-repository-hasil-fork>
```

3. Buat branch baru

```bash
git checkout -b <nama-fitur>
```

4. Lakukan perubahan
5. Commit dan push perubahan

```bash
git add .
git commit -m "<pesan-commit>"
git push origin <nama-branch>
```
6. Buat pull request dengan cara klik tombol `New Pull Request` pada halaman repository hasil fork di GitHub
7. Tunggu sampai pull request di-approve oleh maintainer
8. Jika ada perubahan pada repository utama, lakukan sinkronisasi dengan repository hasil fork

```bash
git fetch origin
git merge origin/main
```

9. Selesai
