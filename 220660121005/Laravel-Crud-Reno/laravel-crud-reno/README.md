# Proyek CRUD Laravel

Ini adalah aplikasi CRUD (Create, Read, Update, Delete) sederhana yang dibangun menggunakan Laravel.

## Persyaratan

- PHP 8.0 atau lebih tinggi
- Composer
- MySQL atau database lain yang didukung

## Instalasi

Ikuti langkah-langkah berikut untuk menyiapkan dan menjalankan aplikasi secara lokal:

### 1. Clone Repositori
Clone repositori ke mesin lokal Anda menggunakan Git:

```bash
git clone https://github.com/Renohidayat/laravel_crud_reno.git

2. Instal Dependensi
Masuk ke direktori proyek dan instal dependensi yang diperlukan:

cd laravel_crud_reno
composer install

3. Siapkan File .env
Salin file .env.example menjadi .env:
cp .env.example .env
Perbarui file .env dengan konfigurasi database Anda, seperti nama database, username, dan pasword

Contoh:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=

4. Generate Kunci Aplikasi
Generate kunci aplikasi:
php artisan key:generate

5. Buat Database
Pastikan Anda sudah membuat database yang disebutkan dalam file .env. Jika belum, Anda bisa membuatnya secara manual menggunakan MySQL atau menjalankan migrasi yang akan otomatis membuat database.

6. Jalankan Migrasi
Jalankan migrasi untuk membuat tabel-tabel yang diperlukan di database:

php artisan migrate

7. Seed Database (Opsional)
Jika Anda sudah menyiapkan seeder untuk database, Anda bisa mengisinya dengan data dummy:

php artisan db:seed

8. Jalankan Server Pengembangan
Jalankan server pengembangan Laravel:

php artisan serve
Aplikasi sekarang seharusnya berjalan di http://127.0.0.1:8000.

Penggunaan
Setelah aplikasi berjalan, Anda dapat melakukan operasi berikut:

Create (Tambah): Menambahkan data baru melalui form yang tersedia.
Read (Baca): Melihat data yang ada dalam daftar.
Update (Ubah): Mengedit data yang sudah ada.
Delete (Hapus): Menghapus data dari database.
Kontribusi
Fork repositori ini.
Buat cabang fitur baru (git checkout -b nama-fitur).
Commit perubahan Anda (git commit -am 'Tambahkan fitur baru').
Push cabang Anda (git push origin nama-fitur).
Buka pull request.
Lisensi
Proyek ini dilisensikan di bawah Lisensi MIT - lihat file LICENSE untuk detail lebih lanjut.

### Penjelasan:
- **Instalasi**: Langkah-langkah untuk mengatur proyek di lingkungan lokal, mulai dari meng-clone repositori hingga mengonfigurasi database.
- **Penggunaan**: Deskripsi singkat tentang cara aplikasi digunakan untuk melakukan operasi CRUD.
- **Kontribusi**: Instruksi dasar bagi kontributor yang ingin berkontribusi pada proyek.
- **Lisensi**: Menyebutkan lisensi yang digunakan oleh proyek.

Silakan sesuaikan bagian-bagian tertentu seperti nama repositori atau instruksi tambahan sesuai dengan kebutuhan proyek Anda.







