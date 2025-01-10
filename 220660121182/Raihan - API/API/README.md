# FocusList - A Simple Todo List Application

FocusList adalah aplikasi Todo List sederhana yang membantu Anda mengatur dan melacak tugas-tugas Anda dengan mudah. Dengan antarmuka yang ramah pengguna dan fungsionalitas yang intuitif, Anda dapat dengan cepat menambahkan, menyelesaikan, dan menghapus tugas dari daftar Anda.

## Fitur Utama

- **Menambahkan Tugas**: Tambahkan tugas baru dengan deskripsi singkat dan prioritas.
- **Menandai Tugas sebagai Selesai**: Tandai tugas yang telah selesai dengan satu klik.
- **Menghapus Tugas**: Hapus tugas yang tidak lagi diperlukan dari daftar Anda.
- **Antarmuka Responsif**: Aplikasi ini dirancang untuk berjalan di berbagai perangkat.
- **Penyimpanan Database**: Semua tugas disimpan dalam database untuk akses yang mudah dan aman.

## Cara Kerja Fungsionalitas

### Menambahkan Tugas

1. **Input Tugas**: Pengguna dapat memasukkan deskripsi tugas dalam field input yang tersedia di bagian atas halaman.
2. **Tombol Tambah**: Setelah memasukkan deskripsi tugas, pengguna dapat menekan tombol "Tambah" untuk menambahkan tugas ke daftar.
3. **Proses Penyimpanan**: Aplikasi akan mengirim permintaan ke server untuk menyimpan tugas baru dalam database. Jika berhasil, tugas akan ditampilkan dalam daftar tugas yang belum selesai, lengkap dengan timestamp.

### Menandai Tugas sebagai Selesai

1. **Daftar Tugas**: Pengguna melihat daftar tugas yang ada.
2. **Tombol Selesai**: Untuk menandai tugas sebagai selesai, pengguna cukup mengklik tombol "Selesai" di sebelah tugas tersebut.
3. **Update Status**: Aplikasi akan mengupdate status tugas di database menjadi "selesai". Tugas yang selesai akan dipindahkan ke bagian khusus untuk tugas selesai, dan tampak berbeda agar mudah dikenali.

### Menghapus Tugas

1. **Daftar Tugas**: Pengguna melihat daftar tugas yang ada.
2. **Tombol Hapus**: Untuk menghapus tugas, pengguna cukup mengklik tombol "Hapus" di sebelah tugas tersebut.
3. **Proses Penghapusan**: Aplikasi akan mengirim permintaan ke server untuk menghapus tugas dari database. Setelah berhasil, tugas tidak akan ditampilkan lagi dalam daftar.

## Tampilan Antarmuka

- **Halaman Utama**: Halaman utama menampilkan daftar tugas yang jelas dan terorganisir dengan baik. Tugas yang belum selesai akan ditampilkan di bagian atas, sedangkan tugas yang telah selesai akan muncul di bagian bawah.
  
- **Input Tugas**: Di bagian atas halaman, terdapat form input yang sederhana untuk menambahkan tugas baru, dilengkapi dengan placeholder yang membantu pengguna.
  
- **Tombol Aksi**: Setiap tugas dalam daftar memiliki tombol aksi yang jelas dan mudah diakses untuk menyelesaikan atau menghapus tugas, membuat interaksi menjadi lebih efisien.

## Instalasi

1. **Kloning repositori ini**:
   ```bash
   git clone https://github.com/Albani-A-it/PBW-IF-VC.git
   cd focuslist
