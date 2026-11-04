# Skenario Demo Aplikasi Perpustakaan Digital Kampus

## 1. Deskripsi Project

Perpustakaan Digital Kampus merupakan aplikasi berbasis web yang dikembangkan menggunakan Laravel 12. Aplikasi ini digunakan untuk mengelola data buku, kategori, anggota, dan transaksi peminjaman serta pengembalian buku.

Aplikasi menyediakan autentikasi pengguna, pengaturan hak akses berdasarkan role, Dashboard statistik, laporan peminjaman, serta REST API yang dapat diuji menggunakan Postman.

## 2. Persiapan Demo

Sebelum demonstrasi, pastikan:

- Database telah dikonfigurasi dan diisi melalui Seeder.
- Server utama berjalan pada `http://localhost:8000`.
- Server API internal berjalan pada `http://localhost:8011`.
- Browser dan Postman tersedia.
- Akun admin dan petugas siap digunakan.

Perintah menjalankan server utama:

```bash
php artisan serve --port=8000
```

Perintah menjalankan server API internal melalui terminal kedua:

```bash
php artisan serve --port=8011
```

## 3. Urutan Skenario Demo

### Demo 1 – Login Pengguna

1. Buka `http://localhost:8000/login`.
2. Masukkan email dan password akun yang terdaftar.
3. Klik tombol Login.
4. Tunjukkan bahwa pengguna diarahkan ke halaman Dashboard.

**Hasil yang diharapkan:** Login berhasil dan Dashboard ditampilkan.

### Demo 2 – Dashboard Statistik

1. Buka menu Dashboard.
2. Tunjukkan statistik Total Buku, Total Anggota, dan Peminjaman Aktif.
3. Buka endpoint `http://localhost:8011/api/stats`.
4. Bandingkan data JSON dengan nilai pada Dashboard.

**Hasil yang diharapkan:** Statistik pada Dashboard sesuai dengan respons API.

### Demo 3 – Pengelolaan Kategori

1. Login menggunakan akun admin.
2. Buka menu Kategori.
3. Tambahkan kategori baru.
4. Tunjukkan kategori yang berhasil disimpan.
5. Demonstrasikan perubahan dan penghapusan kategori apabila diperlukan.

**Hasil yang diharapkan:** Admin dapat mengelola kategori buku.

### Demo 4 – Pengelolaan Buku

1. Buka menu Buku.
2. Tampilkan daftar buku beserta pagination.
3. Tambahkan buku baru dengan data lengkap.
4. Tampilkan detail buku.
5. Ubah salah satu informasi buku.
6. Tunjukkan hasil pembaruan.

**Hasil yang diharapkan:** Fitur pengelolaan buku berjalan dengan benar.

### Demo 5 – Pengelolaan Anggota

1. Buka menu Anggota.
2. Tampilkan daftar anggota.
3. Tambahkan anggota baru.
4. Tampilkan detail anggota.
5. Demonstrasikan perubahan data anggota.
6. Tunjukkan pagination apabila tersedia.

**Hasil yang diharapkan:** Data anggota dapat dikelola melalui aplikasi.

### Demo 6 – Transaksi Peminjaman Buku

1. Buka menu Peminjaman.
2. Pilih fitur tambah peminjaman.
3. Tentukan anggota dan buku yang akan dipinjam.
4. Isi tanggal peminjaman dan batas pengembalian.
5. Simpan transaksi.
6. Periksa transaksi pada daftar peminjaman.

**Hasil yang diharapkan:** Transaksi berhasil tersimpan dengan status peminjaman yang sesuai.

### Demo 7 – Proses Pengembalian Buku

1. Buka daftar peminjaman.
2. Pilih transaksi yang masih aktif.
3. Jalankan proses pengembalian.
4. Tunjukkan perubahan status transaksi menjadi dikembalikan.

**Hasil yang diharapkan:** Status dan tanggal pengembalian diperbarui sesuai proses yang dilakukan.

### Demo 8 – Laporan Peminjaman

1. Buka menu Laporan.
2. Tampilkan tabel laporan peminjaman.
3. Jelaskan informasi anggota, petugas, buku, tanggal, dan status.
4. Buka endpoint `/api/loans` melalui server API internal.
5. Tunjukkan bahwa data laporan berasal dari REST API.

**Hasil yang diharapkan:** Laporan berhasil menampilkan data peminjaman melalui konsumsi API.

### Demo 9 – Pengujian REST API Menggunakan Postman

1. Buka Postman.
2. Pilih Collection API Perpustakaan.
3. Uji endpoint `GET /api/books`.
4. Uji endpoint `GET /api/members`.
5. Uji endpoint `GET /api/loans`.
6. Uji endpoint `GET /api/stats`.
7. Demonstrasikan endpoint POST, PUT, dan DELETE menggunakan data pengujian yang aman.
8. Tunjukkan HTTP status code dan respons JSON.

**Hasil yang diharapkan:** Endpoint REST API menerima request dan menghasilkan respons yang sesuai.

### Demo 10 – Logout

1. Klik tombol Logout.
2. Pastikan pengguna keluar dari sesi.
3. Coba buka halaman yang memerlukan autentikasi.

**Hasil yang diharapkan:** Pengguna diarahkan kembali ke login ketika mengakses halaman yang dilindungi.

## 4. Kesimpulan Demo

Demonstrasi ini menunjukkan integrasi fitur CRUD, autentikasi, role pengguna, pengelolaan transaksi, REST API, Dashboard, dan laporan peminjaman dalam satu aplikasi Laravel.

Penggunaan Seeder dan Factory membantu menyediakan data pengujian, sedangkan Laravel HTTP Client memungkinkan Dashboard dan laporan mengonsumsi REST API internal.