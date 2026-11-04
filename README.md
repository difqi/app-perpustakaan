# Sistem Perpustakaan Digital Kampus

Aplikasi Perpustakaan Digital Kampus merupakan sistem informasi berbasis web yang dikembangkan menggunakan **Laravel 12** untuk mengelola buku, kategori, anggota, peminjaman, dan pengembalian buku.

Project ini dikembangkan sebagai bagian dari praktikum mata kuliah Pemrograman Framework dan mencakup implementasi MVC, Blade Template, autentikasi, otorisasi berbasis role, REST API, serta konsumsi API menggunakan Laravel HTTP Client.

## 1. Fitur Aplikasi

- **Autentikasi:** Login dan logout pengguna.
- **Role Pengguna:** Admin dan petugas dengan hak akses berbeda.
- **Dashboard:** Statistik total buku, total anggota, dan peminjaman aktif.
- **Manajemen Buku:** Menambah, melihat, mengubah, dan menghapus data buku.
- **Manajemen Kategori:** Pengelolaan kategori buku oleh admin.
- **Manajemen Anggota:** Pengelolaan data anggota perpustakaan.
- **Peminjaman Buku:** Pencatatan transaksi peminjaman dan pengembalian.
- **Laporan Peminjaman:** Menampilkan laporan transaksi melalui REST API.
- **REST API:** Endpoint untuk buku, anggota, peminjaman, dan statistik.
- **Seeder dan Factory:** Pembuatan data dummy untuk pengujian.
- **Pagination:** Navigasi halaman pada daftar data.
- **Profil Pengguna:** Melihat profil dan mengubah password.

## 2. Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| Laravel 12 | Framework utama aplikasi |
| PHP | Bahasa pemrograman backend |
| Blade | Template engine untuk tampilan |
| Eloquent ORM | Pengelolaan data dan relasi database |
| Laravel HTTP Client | Konsumsi REST API internal |
| MySQL / SQLite | Database sesuai konfigurasi `.env` |
| Faker | Pembuatan data dummy |
| Postman | Pengujian REST API |
| Git dan GitHub | Version control |

## 3. Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan telah tersedia:

- PHP yang kompatibel dengan Laravel 12.
- Composer.
- Database MySQL atau SQLite sesuai konfigurasi project.
- Git.
- Browser.
- Postman untuk pengujian REST API.
- Node.js dan npm apabila project menggunakan asset frontend yang perlu dikompilasi.

## 4. Instalasi Project

### 4.1 Clone Repository

Clone repository project dari GitHub:

```bash
git clone <URL_REPOSITORY_PROJECT>
```

Masuk ke folder aplikasi:

```bash
cd app-perpustakaan
```

Ganti `<URL_REPOSITORY_PROJECT>` dengan URL repository GitHub yang sebenarnya.

### 4.2 Install Dependency

Jalankan:

```bash
composer install
```

Jika project menggunakan dependency frontend, jalankan juga:

```bash
npm install
```

### 4.3 Konfigurasi Environment

Salin `.env.example` menjadi `.env`.

Untuk Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Untuk Linux/macOS:

```bash
cp .env.example .env
```

Kemudian jalankan:

```bash
php artisan key:generate
```

Pastikan konfigurasi aplikasi memiliki nilai berikut:

```env
APP_NAME="Perpustakaan Digital Kampus"
APP_URL=http://localhost:8000
INTERNAL_API_URL=http://localhost:8011
APP_FAKER_LOCALE=id_ID
```

Konfigurasi lain di `.env` tetap disesuaikan dengan lingkungan pengembangan.

### 4.4 Konfigurasi Database

Sesuaikan koneksi database pada file `.env`.

Contoh apabila menggunakan MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_perpustakaan
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan database telah dibuat dan server database berjalan.

Jika menggunakan SQLite, sesuaikan `DB_CONNECTION=sqlite` dan pastikan file database SQLite tersedia.

### 4.5 Menjalankan Migration dan Seeder

Untuk instalasi baru dengan database kosong:

```bash
php artisan migrate --seed
```

Perintah tersebut membuat tabel melalui migration dan memasukkan data awal melalui Seeder.

Target data awal:

| Data | Jumlah |
|---|---:|
| User | 3 |
| Kategori | 5 |
| Buku | 20 |
| Anggota | 15 |
| Peminjaman | 10 |

Jumlah peminjaman aktif dapat berbeda karena status transaksi dihasilkan secara acak.

**Perhatian:** Jangan menjalankan `php artisan migrate:fresh --seed` pada database yang masih memiliki data penting. Perintah tersebut menghapus seluruh tabel sebelum membuat dan mengisinya kembali.

## 5. Menjalankan Aplikasi

Aplikasi menggunakan dua instance server Laravel untuk memisahkan request browser dan request API internal selama pengembangan lokal.

### Terminal 1 – Server Utama

```bash
php artisan serve --port=8000
```

Akses aplikasi melalui:

http://localhost:8000

### Terminal 2 – Server API Internal

Buka terminal lain pada folder project yang sama:

```bash
php artisan serve --port=8011
```

Server kedua digunakan oleh Dashboard dan Laporan Peminjaman untuk mengonsumsi REST API melalui Laravel HTTP Client.

Contoh endpoint:

http://localhost:8011/api/stats

**Kedua server perlu berjalan bersamaan** agar Dashboard dan Laporan Peminjaman dapat mengambil data dari API internal.

## 6. Akun Pengujian

Jika menggunakan UserSeeder sesuai Modul 10, akun pengujian yang tersedia adalah:

| Role | Email | Password |
|---|---|---|
| Admin | admin@pens.ac.id | password |
| Petugas | petugas1@pens.ac.id | password |
| Petugas | petugas2@pens.ac.id | password |

Akun tersebut hanya diperuntukkan bagi lingkungan pengembangan atau demonstrasi. Ganti password sebelum aplikasi digunakan di lingkungan produksi.

## 7. REST API

REST API menyediakan endpoint untuk mengelola dan mengakses data perpustakaan.

| Method | Endpoint | Keterangan |
|---|---|---|
| GET | `/api/books` | Mengambil daftar buku |
| GET | `/api/books/{id}` | Mengambil detail buku |
| POST | `/api/books` | Menambahkan buku |
| PUT | `/api/books/{id}` | Memperbarui buku |
| DELETE | `/api/books/{id}` | Menghapus buku |
| GET | `/api/members` | Mengambil daftar anggota |
| GET | `/api/members/{id}` | Mengambil detail anggota |
| GET | `/api/loans` | Mengambil daftar peminjaman |
| POST | `/api/loans` | Membuat transaksi peminjaman |
| PUT | `/api/loans/{id}/kembalikan` | Memproses pengembalian |
| GET | `/api/stats` | Mengambil statistik perpustakaan |

Base URL untuk pengujian API:

```text
http://localhost:8011/api
```

Dokumentasi pengujian endpoint dapat dilihat pada file `API.md`.

## 8. Dashboard dan Laporan Peminjaman

### Dashboard

Dashboard tersedia pada:

```text
http://localhost:8000/
```

Halaman ini menggunakan Laravel HTTP Client untuk mengambil data dari endpoint:

```text
GET /api/stats
```

Informasi yang ditampilkan meliputi total buku, total anggota, dan jumlah peminjaman aktif.

### Laporan Peminjaman

Laporan tersedia pada:

```text
http://localhost:8000/loans/report
```

Halaman ini mengonsumsi endpoint:

```text
GET /api/loans
```

Data laporan mencakup anggota, petugas, buku, tanggal peminjaman, batas pengembalian, dan status transaksi.

## 9. Seeder dan Factory

Seeder dan Factory digunakan untuk menyediakan data pengujian secara otomatis.

File utama:

```text
database/
├── factories/
│   ├── BookFactory.php
│   └── MemberFactory.php
└── seeders/
    ├── UserSeeder.php
    ├── CategorySeeder.php
    ├── BookSeeder.php
    ├── MemberSeeder.php
    ├── LoanSeeder.php
    └── DatabaseSeeder.php
```

Factory memanfaatkan Faker dengan locale `id_ID` untuk menghasilkan data anggota dan buku yang lebih sesuai dengan konteks Indonesia.

## 10. Pengujian Aplikasi

Pengujian dilakukan dengan:

1. Menjalankan kedua server Laravel.
2. Login menggunakan akun admin atau petugas.
3. Memeriksa statistik Dashboard.
4. Menguji fitur CRUD buku, kategori, dan anggota.
5. Menguji transaksi peminjaman dan pengembalian.
6. Memeriksa laporan peminjaman.
7. Memeriksa pagination.
8. Menguji REST API melalui Postman.
9. Menguji penanganan kegagalan koneksi API internal.

Skenario demonstrasi lengkap tersedia pada file `DEMO.md`.

## 11. Dokumentasi Project

- `README.md` — Informasi project dan panduan instalasi.
- `API.md` — Dokumentasi endpoint REST API.
- `DEMO.md` — Skenario demonstrasi aplikasi untuk UAS.

## 12. Pengembangan

Project ini dikembangkan sebagai bagian dari praktikum Pemrograman Framework menggunakan Laravel 12, mulai dari implementasi MVC dan CRUD hingga integrasi REST API dan Blade.

Aplikasi ditujukan untuk pembelajaran, pengujian, dan demonstrasi akademik.