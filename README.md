# 🎓 Sistem Informasi Sidang Tugas Akhir

Aplikasi berbasis **Laravel 10** untuk mengelola data sidang tugas akhir mahasiswa, seperti data mahasiswa, dosen, jadwal sidang, penilaian, dan notifikasi. Aplikasi ini menggunakan **API backend** dari **CodeIgniter 4**, sehingga semua proses (Create, Read, Update, Delete) dilakukan melalui API.

---

## 📦 Tutorial Instalasi Laravel

###  1. Download Laravel

Buka terminal dan jalankan:

```bash
composer create-project laravel/laravel PBF_Frontend_Kelompok4
cd PBF_Frontend_Kelompok4

```
### 2. Ganti File .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_sidangakhir
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Jalankan Laravel
```bash
php artisan serve
```

### 4. Akses di Browser
```bash
http://localhost:8000/
```

### 5. Fitur Utama
```
✅ Admin
- Kelola data mahasiswa
- Kelola data dosen
- Kelola jadwal sidang
- Lihat hasil sidang
- Lihat notifikasi

✅ Dosen
- Melihat daftar mahasiswa yang disidangkan
- Memberi nilai dan catatan
- Mengirim notifikasi ke mahasiswa

✅ Mahasiswa
- Melihat jadwal sidang
- Melihat nilai hasil sidang
- Menerima notifikasi dari dosen
```
### 📁 Struktur Folder Laravel
```
PBF_Frontend_Kelompok4/
├── app/
│ ├── Console/
│ ├── Exceptions/
│ ├── Http/
│ │ ├── Controllers/
│ │ │ ├── Admin/ # Controller untuk role Admin
│ │ │ ├── Dosen/ # Controller untuk role Dosen
│ │ │ ├── Mahasiswa/ # Controller untuk role Mahasiswa
│ │ │ └── AuthController.php
│ │ └── Middleware/
│ ├── Models/
├── bootstrap/
├── config/
├── database/
│ ├── factories/
│ └── seeders/
├── public/
│ └── index.php
├── resources/
│ ├── views/
│ │ ├── admin/ # View untuk Admin
│ │ ├── dosen/ # View untuk Dosen
│ │ ├── mahasiswa/ # View untuk Mahasiswa
│ │ └── layouts/ # Template Blade
├── routes/
│ └── web.php # Routing Laravel
├── storage/
├── tests/
├── .env # Konfigurasi environment
├── composer.json
└── README.md
```


## 🔗 API Backend (CI4)
### Clone backend:
```bash
https://github.com/shelalaa20/PBF_KEL4_backend.git
```
### Jalankan server API (CI4):
```
php spark serve
```
## 📦 API dengan Postman
```bash
- Download Postman: https://www.postman.com/downloads/

- Import koleksi backend: https://drive.google.com/drive/folders/1oM_-M4-XOv8jatZQ66pT2e_izZ_DCZaM?usp=sharing

```
## 🌍 Tampilan UI (Screenshots)

### Login
![Image](https://github.com/user-attachments/assets/2374dbfc-689f-42aa-9a62-907473059b36)

### Registrasi

![Image](https://github.com/user-attachments/assets/2374dbfc-689f-42aa-9a62-907473059b36)

### Role Dosen

a. Dashboard Dosen

![Image](https://github.com/user-attachments/assets/e5a5dfa9-4394-4131-8610-3a3513f0b7f6)

b. Data Mahasiswa

![Image](https://github.com/user-attachments/assets/250e654e-93ee-4360-9f3c-e012794c6d35)

c. Data Dosen

![Image](https://github.com/user-attachments/assets/2132b597-fe20-4dc4-865b-604d7c33b380)

d. Jadwal Sidang

![Image](https://github.com/user-attachments/assets/85ea24fe-633e-4051-b6bb-e391b97ab752)

e. Laporan Hasil Sidang

![Image](https://github.com/user-attachments/assets/226ec963-79da-483e-b189-adf1753fdaeb)

f. Notifikasi

![Image](https://github.com/user-attachments/assets/9a15e674-879f-4135-a98e-7790f7c2d4e5)

