# Todo List Application

Aplikasi Todo List sederhana berbasis PHP untuk mencatat, menandai selesai, dan menghapus daftar tugas. Proyek ini berjalan di server lokal, misalnya dengan Laragon.

## Fitur
- **Menambah Tugas Baru**: Pengguna dapat menambahkan tugas baru ke dalam daftar.
- **Menandai Tugas Selesai**: Pengguna dapat menandai tugas yang sudah selesai.
- **Menghapus Tugas**: Pengguna dapat menghapus tugas dari daftar.
- **Penyimpanan Data Sementara**: Data disimpan sementara di array PHP (untuk pengembangan lanjutan, dapat ditambahkan database).
  
## Cara Instalasi
1. **Clone Repository**: Clone atau unduh kode ini ke folder *www* pada server lokal Anda (misalnya, `C:\laragon\www\todo-list`).
2. **Jalankan Server**: Nyalakan Laragon atau server lokal lainnya.
3. **Akses Aplikasi**: Buka browser dan akses `http://localhost/todo-list/`.

## Struktur Proyek
- `index.php` - File utama yang menampilkan daftar tugas.
- `views/` - Folder yang berisi file tampilan seperti `listTodos.php`.
- `assets/css/style.css` - File CSS untuk mempercantik tampilan.
- `assets/js/script.js` - File JavaScript untuk fungsi tambahan.

## Cara Menggunakan
1. Buka aplikasi di browser Anda.
2. Ketikkan tugas baru pada kolom input dan klik tombol "Add" untuk menambahkan tugas.
3. Klik "Mark as completed" untuk menandai tugas yang sudah selesai.
4. Klik "Delete" untuk menghapus tugas dari daftar.

## Teknologi yang Digunakan
- **PHP**: Untuk pengelolaan logika backend dan manajemen tugas.
- **HTML & CSS**: Untuk struktur dan tampilan halaman.
- **JavaScript**: Untuk interaksi tambahan di aplikasi (seperti alert setelah penambahan tugas).

---

Semoga panduan ini membantu dalam memahami proyek Todo List Anda!
