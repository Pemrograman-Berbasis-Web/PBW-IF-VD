# README - Aplikasi To-Do List Tanpa REST API

## Deskripsi Proyek
Aplikasi To-Do List ini adalah aplikasi sederhana berbasis web yang digunakan untuk mencatat dan mengelola daftar tugas. Aplikasi ini dirancang dengan PHP dan MySQL sebagai backend dan menggunakan HTML, CSS, serta JavaScript untuk tampilan antarmuka.

---

## Fitur Utama
1. **Menambahkan Tugas**
   - Pengguna dapat menambahkan tugas baru dengan mengisi form input di halaman utama.
2. **Menandai Tugas Selesai**
   - Tugas yang telah selesai dapat ditandai dengan checkbox, dan akan ditampilkan sebagai selesai di daftar tugas.
3. **Menghapus Tugas**
   - Pengguna dapat menghapus tugas tertentu dari daftar.
4. **Menampilkan Daftar Tugas**
   - Semua tugas ditampilkan dalam daftar dengan urutan terbaru.
5. **Validasi Input**
   - Aplikasi memastikan input tugas tidak kosong sebelum ditambahkan ke daftar.

---

## Teknologi yang Digunakan
- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript, jQuery

---

## Instalasi dan Konfigurasi
1. **Persyaratan**
   - PHP dan MySQL di server lokal atau hosting.
   - Web server seperti Apache (disarankan menggunakan XAMPP).

2. **Langkah Instalasi**
   - Unduh atau clone repositori ini.
   - Ekstrak file proyek ke dalam folder web server (misalnya `htdocs` jika menggunakan XAMPP).
   - Buat database MySQL dengan nama `to-do-list`.
   - Impor file `to-do-list.sql` ke dalam database Anda menggunakan phpMyAdmin.
   - Pastikan file `db_conn.php` sudah diatur dengan konfigurasi database yang benar.

---

## Struktur Proyek
```
UTS-TODO-LIST-ARYA/
|-- css/
|   `-- style.css         # File CSS untuk desain antarmuka
|-- img/
|   |-- f.png             # Gambar untuk placeholder
|   `-- Ellipsis.gif      # GIF untuk loading
|-- app/
|   |-- add.php           # Logika untuk menambahkan tugas
|   |-- check.php         # Logika untuk menandai tugas selesai
|   `-- remove.php        # Logika untuk menghapus tugas
|-- db_conn.php           # Koneksi database
|-- index.php             # Halaman utama aplikasi
|-- sql/
|   `-- todo_list.sql     # Struktur database
`-- js/
    `-- jquery-3.2.1.min.js  # Library jQuery
```

---

## Cara Menggunakan Aplikasi
1. **Menambahkan Tugas**:
   - Buka aplikasi di browser.
   - Masukkan tugas baru pada form input di bagian atas halaman.
   - Klik tombol "Add" untuk menyimpan tugas.

2. **Menandai Tugas Selesai**:
   - Centang kotak di samping tugas untuk menandainya sebagai selesai.
   - Status tugas akan diperbarui secara otomatis.

3. **Menghapus Tugas**:
   - Klik tombol "x" di samping tugas untuk menghapusnya dari daftar.

4. **Melihat Daftar Tugas**:
   - Semua tugas yang belum dan sudah selesai ditampilkan di halaman utama.

---

## Catatan
- Pastikan server berjalan dengan benar sebelum membuka aplikasi.
- Database harus diatur terlebih dahulu sebelum digunakan.
- Jika terjadi masalah, periksa file log PHP atau konfigurasi koneksi database.

---

## Kontak
Jika ada pertanyaan atau masalah, silakan hubungi:
- Nama: Arya Mahendrata
- Email: arya.mahendrata@example.com

