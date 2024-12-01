# UTS PEMROGRAMAN BERBASIS WEB

**Nama Legkap**: Muhammad Ghianza Al Ghifari <br>
**Nim**: 220660121058 <br>
**Kelas**: IF-VD <br>
**Dosen Pengampu**: Yanyan Sofiyan, S.Kom., M.Kom.

# PENJELASAN Todo List

Sebuah aplikasi **Todo List** sederhana berbasis web yang memungkinkan pengguna untuk menambah, menampilkan, menyelesaikan, menyaring, dan menghapus tugas.

## Fitur

1. **Tambah Tugas**: Pengguna dapat menambahkan tugas baru menggunakan input yang tersedia.
2. **Tandai Tugas Selesai**: Tugas dapat ditandai sebagai selesai dengan checkbox.
3. **Filter Tugas**:
   - **Selesai**: Menampilkan tugas yang telah diselesaikan.
   - **Belum Selesai**: Menampilkan tugas yang belum selesai.
4. **Hapus Tugas**: Menghapus tugas tertentu atau semua tugas sekaligus.
5. **Penyimpanan Lokal**: Semua tugas disimpan menggunakan `localStorage`, sehingga data tetap ada meskipun halaman di-refresh.

## Struktur File

- **TODO_LIST.html**: Berisi struktur HTML untuk tampilan aplikasi.
- **Style.css**: Berisi aturan CSS untuk memperindah antarmuka pengguna.
- **Script.js**: Berisi logika JavaScript untuk mengelola fungsi aplikasi.

## Teknologi yang Digunakan

- **HTML**: Untuk membangun struktur dasar halaman.
- **CSS**: Untuk styling dan layouting.
- **JavaScript**: Untuk logika interaktif aplikasi.
- **LocalStorage**: Untuk menyimpan data secara lokal di browser.

## Cara Menggunakan

1. Buka file `TODO_LIST.html` di browser.
2. Tambahkan tugas dengan mengetik di kolom input dan tekan tombol **+** atau tombol **Enter**.
3. Tandai tugas sebagai selesai dengan mencentang kotak yang tersedia.
4. Gunakan filter untuk menyaring tugas berdasarkan status:
   - Klik tombol **Complete** untuk melihat tugas yang selesai.
   - Klik tombol **Incomplete** untuk melihat tugas yang belum selesai.
5. Klik tombol **Delete All** untuk menghapus semua tugas.

## Struktur Tampilan

- **Header**: Judul aplikasi.
- **Input**: Kolom input untuk menambahkan tugas baru.
- **Daftar Tugas**: Daftar tugas yang dapat dilihat, diselesaikan, dan dihapus.
- **Filter**: Tombol untuk menyaring tugas berdasarkan status.
- **Tombol Hapus**: Tombol untuk menghapus semua tugas.

## Preview

Tampilan aplikasi mencakup desain modern dengan latar belakang gambar, efek blur, dan elemen yang responsif. Berikut beberapa fitur visual:
- **Desain Blur**: Elemen container transparan dengan efek blur.
- **Ikon**: Menggunakan ikon dari Font Awesome.
- **Responsif**: Tampilan aplikasi menyesuaikan dengan layar.

## Instalasi

1. Unduh atau clone repositori ini.
2. Pastikan semua file berada dalam folder yang sama.
3. Buka file `TODO_LIST.html` di browser untuk mulai menggunakan aplikasi.

## Lisensi

Proyek ini dibuat untuk tujuan memenuhi tugas UTS mata kuliah Bemrograman Berbasis Web. Bebas digunakan dan dimodifikasi sesuai kebutuhan.
