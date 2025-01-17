<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel 11 + Vue 3 + Bootstrap 5 Aplikasi CRUD

Repositori ini berisi aplikasi CRUD dasar yang dibangun dengan Laravel 11, Vue 3, dan Bootstrap 5. Panduan ini akan membantu Anda melalui proses instalasi untuk mengatur proyek.

## Tentang Laravel

Laravel adalah kerangka kerja aplikasi web dengan sintaksis yang ekspresif dan elegan. Kami percaya pengembangan harus menjadi pengalaman yang menyenangkan dan kreatif agar benar-benar memuaskan. Laravel mempermudah pengembangan dengan menyederhanakan tugas umum yang digunakan di banyak proyek web, seperti:

-   [Mesin routing yang sederhana dan cepat](https://laravel.com/docs/routing).
-   [Kontainer injeksi dependensi yang kuat](https://laravel.com/docs/container).
-   Berbagai backend untuk penyimpanan [session](https://laravel.com/docs/session) dan [cache](https://laravel.com/docs/cache).
-   [ORM database](https://laravel.com/docs/eloquent) yang ekspresif dan intuitif.
-   [Migrasi skema](https://laravel.com/docs/migrations) yang agnostik terhadap database.
-   [Pemrosesan job latar belakang yang kuat](https://laravel.com/docs/queues).
-   [Penyiaran event real-time](https://laravel.com/docs/broadcasting).

Laravel dapat diakses, kuat, dan menyediakan alat yang dibutuhkan untuk aplikasi besar dan tangguh.

## Belajar Laravel

Laravel memiliki [dokumentasi](https://laravel.com/docs) yang sangat lengkap dan perpustakaan tutorial video yang luas, menjadikannya mudah untuk mulai menggunakan framework ini.

Anda juga dapat mencoba [Laravel Bootcamp](https://bootcamp.laravel.com), untuk membangun aplikasi Laravel modern dari awal.

Jika Anda lebih suka belajar melalui video, [Laracasts](https://laracasts.com) menyediakan ribuan tutorial video tentang Laravel, PHP modern, pengujian unit, dan JavaScript.

## Langkah Instalasi

1.  Clone Repository
    Pertama, Clone repositori ke mesin lokal Anda:

        git clone https://github.com/kishanbusa4u/Laravel11Vue3.git
        cd Laravel11Vue3

2.  Install PHP Dependencies
    Jalankan perintah berikut untuk menginstal semua PHP Dependencies:

        composer install

3.  Install JavaScript Dependencies
    Selanjutnya, instal JavaScript Dependencies, termasuk Vue 3 dan Bootstrap 5:

        npm install

4.  Konfigurasikan Environment
    Salin contoh file .env.example untuk membuat file .env Anda sendiri:
    cp .env.example .env
    Buka file .env dan perbarui baris berikut dengan kredensial basis data dan konfigurasi lainnya:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_user
        DB_PASSWORD=your_database_password

5.  Hasilkan Kunci Aplikasi
    Untuk memastikan keamanan aplikasi Anda, Anda perlu membuat kunci aplikasi:

        php artisan key:generate

6.  Jalankan Database Migrations
    Jalankan perintah berikut untuk membuat tabel basis data yang diperlukan:

        php artisan migrate

7.  Kompilasi Aset Frontend
    Kompilasi aset frontend (CSS dan JavaScript) menggunakan Vite:

        npm run dev

    Untuk produksi:

        npm run build

8.  Sajikan Aplikasi
    Anda sekarang dapat menjalankan aplikasi secara lokal menggunakan perintah berikut:

        php artisan serve

Secara default, aplikasi akan dapat diakses di http://127.0.0.1:8000.

9.  Pengaturan Vue 3
    Vue 3 sudah terintegrasi ke dalam proyek menggunakan vite untuk penggabungan aset. File Vue terletak di direktori resources/js.
    Pastikan resources/js/app.js Anda terlihat seperti ini:

         import { createApp } from 'vue';
         import App from './components/App.vue';

// Import Bootstrap CSS

        import 'bootstrap/dist/css/bootstrap.min.css';

// Optional: Import Bootstrap JS (untuk fitur seperti modal dan tooltips)

    import 'bootstrap/dist/js/bootstrap.bundle.min.js';
    createApp(App).mount('#app');

Titik masuk untuk komponen Vue ada di templat Blade yang terletak di resources/views/welcome.blade.php:

    <div id="app"></div>

Pastikan direktif @vite ada di welcome.blade.php:

    @vite(['resources/css/app.css', 'resources/js/app.js'])

## Kode Etik

Untuk memastikan bahwa komunitas Laravel ramah terhadap semua orang, harap tinjau dan patuhi [Kode Etik](https://laravel.com/docs/contributions#code-of-conduct).

## Kerentanan Keamanan

Jika Anda menemukan kerentanan keamanan dalam Laravel, silakan kirim email ke Taylor Otwell melalui [taylor@laravel.com](mailto:taylor@laravel.com). Semua kerentanan keamanan akan segera ditangani.

## Lisensi

Framework Laravel adalah perangkat lunak sumber terbuka yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).
