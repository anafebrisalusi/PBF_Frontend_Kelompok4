<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

# PBF_KELOMPOK-4

Repositori ini berisi proyek Pemrograman Berbasis Framework (PBF) yang dikembangkan oleh Kelompok 4.

## 📌 Teknologi yang Digunakan
- **Laravel 10** 
- **Blade & Bootstrap** 
- **MySQL** (Database)
- **Postman** (API Testing)

## 📂 Struktur Folder
```
PBF_KELOMPOK-4/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
└── vendor/
```

## 🚀 Cara Menjalankan Proyek
### 1. Clone Repositori
```sh
git clone https://github.com/anafebrisalusi/PBF_KELOMPOK-4.git
cd PBF_KELOMPOK-4
```

### 2. Install Dependensi
```sh
composer install
npm install
```

### 3. Konfigurasi Environment
Buat file `.env` berdasarkan `.env.example`:
```sh
cp .env.example .env
```
Lalu atur koneksi database di file `.env`.

### 4. Generate Key
```sh
php artisan key:generate
```

### 5. Migrasi Database
```sh
php artisan migrate --seed
```

### 6. Jalankan Server
```sh
php artisan serve
```
Akses aplikasi di `http://127.0.0.1:8000`

## ✨ Fitur Utama
- Manajemen Data Mahasiswa dan Dosen
- Pendaftaran dan Jadwal Sidang
- Pencatatan Hasil Sidang
- Notifikasi untuk Mahasiswa dan Dosen

## 📜 Lisensi
Proyek ini dibuat untuk kepentingan akademik dan dapat digunakan dengan bebas.

---

💡 **Dikembangkan oleh Kelompok 4**
