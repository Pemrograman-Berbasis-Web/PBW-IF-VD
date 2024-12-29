# Todo List App

## Deskripsi
Ini adalah aplikasi Todo List sederhana untuk mencatat tugas harian. Aplikasi ini memiliki tampilan yang bersih dan responsif serta menyediakan beberapa fungsionalitas tambahan untuk meningkatkan pengalaman pengguna.

## Fitur Utama
- **Tambah Tugas**: Menambahkan tugas baru ke dalam daftar.
- **Edit Tugas**: Memungkinkan pengguna untuk mengedit teks tugas.
- **Tandai Selesai**: Menandai tugas sebagai selesai dengan memberikan tanda silang pada teks.
- **Hapus Tugas**: Menghapus tugas dari daftar.
- **Filter Tugas**: Menampilkan tugas yang belum selesai, sudah selesai, atau semuanya.
- **Penyimpanan Lokal**: Menyimpan daftar tugas secara lokal di browser agar tetap tersedia setelah halaman dimuat ulang.

## Cara Kerja Fungsionalitas

1. **Filter Tugas**
   - Pengguna dapat memfilter tugas berdasarkan statusnya: "Semua", "Selesai", atau "Belum Selesai".
   - JavaScript digunakan untuk memanipulasi DOM dan menyembunyikan atau menampilkan tugas sesuai dengan statusnya.

2. **Animasi Penambahan dan Penghapusan**
   - Tugas yang baru ditambahkan atau dihapus akan dianimasikan menggunakan transisi CSS. Misalnya, tugas yang baru ditambahkan akan muncul dengan efek transisi `opacity`, dan tugas yang dihapus akan menghilang dengan transisi.

3. **Penyimpanan Lokal**
   - Saat tugas ditambahkan, diubah, atau dihapus, daftar tugas akan disimpan dalam `localStorage` sehingga tetap tersedia saat aplikasi dimuat kembali.
   - Ketika aplikasi dimuat, data dari `localStorage` akan diambil dan ditampilkan dalam daftar.

## Cara Menggunakan
1. **Tambah Tugas**: Masukkan teks tugas pada form di bagian atas halaman, lalu klik tombol "Tambah".
2. **Tandai Tugas Sebagai Selesai**: Klik tombol "Selesai" di samping tugas untuk menandainya sebagai selesai. Tugas yang sudah selesai akan dicoret.
3. **Edit Tugas**: Klik tombol "Update" di samping tugas untuk mengedit teks tugas.
4. **Hapus Tugas**: Klik tombol "Hapus" di samping tugas untuk menghapusnya dari daftar.
5. **Filter Tugas**: Gunakan tombol filter di atas daftar tugas untuk menampilkan tugas berdasarkan statusnya: "Semua", "Selesai", atau "Belum Selesai".

## Teknologi yang Digunakan
- **HTML/CSS**: Untuk struktur dan styling aplikasi.
- **JavaScript**: Untuk manipulasi DOM, filter tugas, animasi, dan penyimpanan lokal.
