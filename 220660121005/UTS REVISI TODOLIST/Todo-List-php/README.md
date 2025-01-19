# Todo List with User Authentication in PHP
Deskripsi
Aplikasi Todo List berbasis PHP Natif ini memungkinkan pengguna untuk login menggunakan akun Gmail mereka dan mengelola daftar tugas dengan fitur CRUD (Create, Read, Update, Delete). Aplikasi ini dilengkapi dengan fitur Logout untuk keluar dari aplikasi.

Dengan menggunakan PHP untuk sisi server, aplikasi ini memungkinkan pengguna untuk menambahkan, melihat, memperbarui, dan menghapus tugas dengan mudah. Semua data disimpan di database MySQL dan dapat diakses setelah login.

Fitur Utama
Login dengan Gmail: Pengguna dapat login menggunakan email Gmail yang valid dan password mereka. Pastikan email memiliki format yang benar (username@gmail.com).
CRUD (Create, Read, Update, Delete):
Create: Pengguna dapat menambahkan tugas baru.
Read: Melihat daftar tugas yang telah ditambahkan.
Update: Memperbarui tugas yang ada.
Delete: Menghapus tugas yang sudah tidak relevan.
Logout: Pengguna dapat keluar dari aplikasi setelah selesai mengelola tugas.
Instalasi
Persyaratan
PHP 7.x atau lebih tinggi
MySQL atau database lainnya

Masuk ke folder aplikasi

cd todolist
Buat Database Buat database di MySQL dan buat tabel untuk pengguna dan tugas. Berikut adalah contoh SQL untuk membuat tabel:

sql
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `description`, `date`, `user_id`) VALUES
(1, 'Create a PHP Program', 'In this PHP program I will be create a Todo List with Multi User registration system. It means Multiple user can register their account and add todos.', '2021-09-15', 1),
(2, 'Upload a YouTube Video', 'Just for testing.....', '2021-09-15', 1),
(3, 'Newsapp for video', 'This is a basic news app and here all data from api.', '2021-09-15', 1),
(4, 'Aliquam feugiat sapien in turpis dapibus, sit amet', 'Donec nec velit et velit scelerisque vehicula eget non sem.\r\nMauris ac purus nec nisi bibendum accumsan vel sit amet lectus.', '2021-09-15', 1),
(5, 'Second user todo', 'here are some descriptions', '2021-09-15', 4),
(6, 'reno', 'ssssss', '2025-01-16', 5),
(7, 'a', 'a', '2025-01-16', 8),
(8, 'banngun pagi', 'makan', '2025-01-16', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(6, 'hidayatreno085@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

Jalankan Aplikasi Jalankan server PHP built-in:

bash
Copy
Edit
php -S localhost:8000
Akses aplikasi di browser melalui http://localhost:8000.

Penggunaan
1. Login
Pengguna dapat login dengan menggunakan email Gmail dan password mereka. Pastikan email yang dimasukkan memiliki format yang benar (username@gmail.com).
Setelah login berhasil, pengguna akan diarahkan ke halaman daftar tugas.
2. CRUD Todo List
Setelah login, pengguna dapat mengelola tugas mereka:

Create: Menambahkan tugas baru dengan memasukkan judul dan deskripsi pada halaman utama.
Read: Melihat semua tugas yang telah dibuat.
Update: Memperbarui tugas yang ada.
Delete: Menghapus tugas yang tidak diperlukan.
3. Logout
Pengguna dapat keluar dari aplikasi dengan mengklik tombol "Logout" yang akan menghapus sesi login dan mengarahkan pengguna kembali ke halaman login.

Dokumentasi ini memberikan gambaran lebih lengkap mengenai cara instalasi, penggunaan, dan struktur aplikasi Todo List berbasis PHP Natif.
