# Dokumentasi REST API - Aplikasi Perpustakaan

## Informasi Umum

- **Project:** Aplikasi Perpustakaan
- **Framework:** Laravel 12
- **Base URL:** `http://127.0.0.1:8000`
- **Format Request:** JSON
- **Format Response:** JSON
- **Tools Pengujian:** Postman

## Daftar Endpoint API

### 1. Books

| Method (Nama Request) | URL | Body (jika ada) | Contoh Response |
|---|---|---|---|
| GET (GET - Daftar Buku) | `http://127.0.0.1:8000/api/books` | - | **200 OK** — `{"data":[{"id":2,"judul":"naruto",...},{"id":5,"judul":"dilan 1995",...},...]}` |
| POST (POST - Tambah Buku) | `http://127.0.0.1:8000/api/books` | `{"judul":"Pemrograman Laravel 12","penulis":"Penulis Praktikum","penerbit":"Penerbit Kampus","tahun_terbit":2026,"isbn":"9781234567897","stok":10,"category_id":3}` | **201 Created** — `{"data":{"id":18,"judul":"Pemrograman Laravel 12","penulis":"Penulis Praktikum","penerbit":"Penerbit Kampus","tahun_terbit":2026,"isbn":"9781234567897","stok":10,"sampul":null,"category":{"id":3,"nama_kategori":"Superhero"},...}}` |
| POST (POST - Validasi Buku Kosong) | `http://127.0.0.1:8000/api/books` | `{}` | **422 Unprocessable Entity** — `{"message":"Judul buku wajib diisi. (and 5 more errors)","errors":{"judul":["Judul buku wajib diisi."],"penulis":["Nama penulis wajib diisi."],"penerbit":["Nama penerbit wajib diisi."],"tahun_terbit":["Tahun terbit wajib diisi."],"stok":["Stok wajib diisi."],"category_id":["Kategori wajib dipilih."]}}` |
| GET (GET - Detail Buku) | `http://127.0.0.1:8000/api/books/5` | - | **200 OK** — `{"data":{"id":5,"judul":"dilan 1995","penulis":"Budi","penerbit":"indo","tahun_terbit":"1995","isbn":"200","stok":1,"sampul":null,"category":{"id":5,"nama_kategori":"Slice of life"},...}}` |
| PUT (PUT - Update Buku) | `http://127.0.0.1:8000/api/books/18` | `{"judul":"Pemrograman Laravel 12 - Revisi","penulis":"Penulis Praktikum","penerbit":"Penerbit Kampus","tahun_terbit":2026,"isbn":"9781234567897","stok":15,"category_id":3}` | **200 OK** — `{"data":{"id":18,"judul":"Pemrograman Laravel 12 - Revisi","penulis":"Penulis Praktikum","penerbit":"Penerbit Kampus","tahun_terbit":2026,"isbn":"9781234567897","stok":15,"sampul":null,"category":{"id":3,"nama_kategori":"Superhero"},...}}` |
| DELETE (DELETE - Hapus Buku) | `http://127.0.0.1:8000/api/books/18` | - | **200 OK** — `{"message":"Buku berhasil dihapus."}` |

### 2. Members

| Method (Nama Request) | URL | Body (jika ada) | Contoh Response |
|---|---|---|---|
| GET (GET - Daftar Anggota) | `http://127.0.0.1:8000/api/members` | - | **200 OK** — `{"data":[{"id":1,"nama":"Difqi","nim":"3125500044","status":"aktif",...}],"links":{...},"meta":{...}}` |
| GET (GET - Detail Anggota) | `http://127.0.0.1:8000/api/members/1` | - | **200 OK** — `{"data":{"id":1,"nama":"Difqi","nim":"3125500044","status":"aktif","created_at":"2026-09-24T06:07:10.000000Z","updated_at":"2026-09-24T06:07:10.000000Z",...}}` |

### 3. Loans

| Method (Nama Request) | URL | Body (jika ada) | Contoh Response |
|---|---|---|---|
| GET (GET - Daftar Peminjaman) | `http://127.0.0.1:8000/api/loans` | - | **200 OK** — `{"data":[{"id":5,"member":{"id":1,"nama":"Difqi"},"status":"dikembalikan","books":[{"id":5,"judul":"dilan 1995"}]},...]}` |
| POST (POST - Tambah Peminjaman) | `http://127.0.0.1:8000/api/loans` | `{"member_id":1,"user_id":1,"tanggal_pinjam":"2026-10-30","tanggal_kembali":"2026-11-06","book_ids":[5,7]}` | **201 Created** — `{"data":{"id":8,"member":{"id":1,"nama":"Difqi"},"petugas":{"id":1,"name":"Petugas Perpustakaan"},"tanggal_pinjam":"2026-10-30","tanggal_kembali":"2026-11-06","tanggal_dikembalikan":null,"status":"dipinjam","books":[...]}}` |
| PUT (PUT - Kembalikan Peminjaman) | `http://127.0.0.1:8000/api/loans/7/kembalikan` | - | **200 OK** — `{"data":{"id":7,"member":{"id":1,"nama":"Difqi"},"petugas":{"id":1,"name":"Petugas Perpustakaan"},"tanggal_pinjam":"2026-10-30","tanggal_kembali":"2026-11-06","tanggal_dikembalikan":"2026-10-30","status":"dikembalikan","books":[{"id":5,"judul":"dilan 1995"},{"id":7,"judul":"islam ala avas"}]}}` |

### 4. Stats

| Method (Nama Request) | URL | Body (jika ada) | Contoh Response |
|---|---|---|---|
| GET (GET - Statistik Perpustakaan) | `http://127.0.0.1:8000/api/stats` | - | **200 OK** — `{"total_buku":10,"total_anggota":1,"peminjaman_aktif":2}` |

## Catatan Pengujian

1. GET Books digunakan untuk menampilkan daftar buku yang tersedia.
2. POST Books digunakan untuk menambahkan buku baru ke database.
3. Validasi POST Books membuktikan bahwa sistem menolak data kosong dengan status 422.
4. GET Books Detail digunakan untuk menampilkan informasi buku berdasarkan ID.
5. PUT Books digunakan untuk memperbarui informasi buku.
6. DELETE Books digunakan untuk menghapus data buku.
7. GET Members digunakan untuk menampilkan daftar anggota perpustakaan.
8. GET Member Detail digunakan untuk menampilkan informasi anggota berdasarkan ID.
9. GET Loans digunakan untuk menampilkan daftar transaksi peminjaman.
10. POST Loans digunakan untuk membuat transaksi peminjaman buku.
11. PUT Loans digunakan untuk mengubah status peminjaman menjadi dikembalikan.
12. GET Stats digunakan untuk menampilkan statistik jumlah buku, anggota, dan peminjaman aktif.

## Kesimpulan

Berdasarkan pengujian menggunakan Postman, seluruh 11 endpoint REST API pada aplikasi perpustakaan berhasil dijalankan sesuai fungsinya. Pengujian mencakup operasi GET, POST, PUT, dan DELETE, serta validasi data yang menghasilkan status 422 ketika request tidak memenuhi ketentuan. Response API ditampilkan dalam format JSON dan menunjukkan bahwa aplikasi dapat melakukan pengelolaan data buku, anggota, transaksi peminjaman, pengembalian, serta statistik perpustakaan.