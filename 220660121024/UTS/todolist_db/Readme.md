Todo List
Deskripsi
Aplikasi Todo List ini memungkinkan pengguna untuk menambahkan, menandai sebagai selesai, menghapus, dan menghapus semua tugas. Data tugas disimpan menggunakan PHP Session, sehingga tugas akan tetap ada meskipun halaman direfresh.

Fitur
Menambahkan tugas baru.
Menandai tugas sebagai selesai.
Menghapus tugas tertentu.
Menghapus semua tugas.
Teknologi yang Digunakan
PHP untuk backend dan logika aplikasi.
Session untuk menyimpan daftar tugas.
HTML/CSS untuk tampilan antarmuka pengguna.
Cara Penggunaan
Prasyarat
Pastikan Anda sudah menginstal XAMPP atau server PHP lainnya untuk menjalankan aplikasi ini secara lokal.

Langkah-langkah untuk Menjalankan Aplikasi
Download dan Install XAMPP (Jika belum terpasang):

XAMPP adalah server yang mendukung PHP dan MySQL, yang dapat Anda gunakan untuk menjalankan aplikasi PHP secara lokal.
Siapkan Proyek:

Clone atau download proyek ini ke dalam folder htdocs XAMPP (misalnya C:/xampp/htdocs/todolist).
Struktur folder akan terlihat seperti berikut:
Copy code
todolist/
├── index.php
├── styles.css
├── script.js
└── README.md
Jalankan Server:

Buka aplikasi XAMPP dan jalankan Apache.
Akses aplikasi di browser dengan membuka http://localhost/todolist/.
Menggunakan Aplikasi:

Menambahkan Tugas: Ketikkan tugas baru di input dan klik tombol Add.
Menandai Tugas sebagai Selesai: Klik tombol ✔ di sebelah tugas untuk menandai tugas sebagai selesai.
Menghapus Tugas: Klik tombol Delete di sebelah tugas yang ingin dihapus.
Menghapus Semua Tugas: Klik tombol Clear All untuk menghapus semua tugas dalam daftar.
File yang Tersedia
index.php:

Halaman utama yang menampilkan daftar tugas, serta menangani logika penambahan, penghapusan, dan pengeditan tugas menggunakan PHP dan session.
styles.css:

File CSS yang digunakan untuk mengatur tampilan antarmuka pengguna.
script.js:

File JavaScript untuk memberikan interaktivitas pada aplikasi (misalnya, untuk efek tombol atau validasi form).
Struktur Proyek
graphql
Copy code
todolist/
├── index.php       # Halaman utama aplikasi
├── styles.css      # File CSS untuk styling halaman
├── script.js       # File JavaScript untuk interaktivitas
└── README.md       # File ini
Fitur yang Dapat Dikembangkan
Menambahkan penyimpanan database (MySQL atau SQLite) untuk menyimpan daftar tugas secara lebih permanen.
Mengatur tanggal jatuh tempo dan pengingat untuk setiap tugas.
Menambahkan fitur untuk mengedit tugas yang sudah ada.
Menambahkan sistem autentikasi pengguna (login dan register).