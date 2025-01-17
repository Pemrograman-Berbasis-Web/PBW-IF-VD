# README - Aplikasi To-do List dengan REST API

## **Deskripsi Proyek**
Aplikasi To-do List ini adalah aplikasi sederhana untuk mengelola daftar tugas (To-do). Aplikasi ini memiliki antarmuka pengguna berbasis web dan menggunakan REST API untuk operasi seperti menambah, menampilkan, menandai selesai, dan menghapus tugas.

## **Persyaratan Sistem**
- **Server:** XAMPP atau server lokal lainnya.
- **Bahasa Pemrograman:** PHP 7.4+.
- **Database:** MySQL.
- **Library Tambahan:** jQuery.

---

## **Struktur Folder**
```
UTS-TODO LIST-ARYA/
|-- api.php                     # Endpoint utama REST API
|-- db_conn.php                 # File koneksi database
|-- controllers/                # Folder berisi controller aplikasi
|   |-- TodoController.php      # Controller untuk operasi CRUD
|-- css/                        # Folder berisi file CSS
|   |-- style.css               # File gaya tampilan
|-- js/                         # Folder berisi file JavaScript
|   |-- jquery-3.2.1.min.js     # Library jQuery
|-- app/                        # Folder berisi operasi tambahan
|   |-- add.php                 # Script untuk menambahkan tugas
|   |-- check.php               # Script untuk menandai tugas selesai
|   |-- remove.php              # Script untuk menghapus tugas
|-- index.php                   # Halaman utama aplikasi
|-- README.txt                  # Panduan proyek ini
```

---

## **Langkah Instalasi**
1. **Unduh dan Ekstrak Proyek:**
   - Unduh file proyek dan ekstrak ke folder `htdocs` pada XAMPP.

2. **Buat Database:**
   - Masuk ke phpMyAdmin dan buat database baru bernama `to-do-list`.
   - Jalankan file SQL berikut untuk membuat tabel:
     ```sql
     CREATE TABLE todos (
         id INT AUTO_INCREMENT PRIMARY KEY,
         title VARCHAR(255) NOT NULL,
         checked TINYINT(1) DEFAULT 0,
         date_time DATETIME DEFAULT CURRENT_TIMESTAMP
     );
     ```

3. **Konfigurasi Database:**
   - Pastikan file `db_conn.php` memiliki konfigurasi koneksi yang benar:
     ```php
     <?php
     $host = 'localhost';
     $dbname = 'todo_list';
     $username = 'root';
     $password = '';

     try {
         $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } catch (PDOException $e) {
         die("Connection failed: " . $e->getMessage());
     }
     ?>
     ```

4. **Jalankan Aplikasi:**
   - Akses aplikasi melalui browser dengan URL:
     ```
     http://localhost/UTS-TODO LIST-ARYA/index.php
     ```

---

## **Panduan REST API**

### **Endpoint Tambah Tugas (Add Todo)**
- **Method:** `POST`
- **URL:** `http://localhost/UTS-TODO LIST-ARYA/api.php?action=add`
- **Body (JSON):**
  ```json
  {
      "task": "Belajar PHP"
  }
  ```

### **Endpoint Daftar Tugas (List Todos)**
- **Method:** `GET`
- **URL:** `http://localhost/UTS-TODO LIST-ARYA/api.php?action=list`

### **Endpoint Tandai Selesai (Mark As Completed)**
- **Method:** `POST`
- **URL:** `http://localhost/UTS-TODO LIST-ARYA/api.php?action=complete`
- **Body (JSON):**
  ```json
  {
      "id": 1
  }
  ```

### **Endpoint Hapus Tugas (Delete Todo)**
- **Method:** `POST`
- **URL:** `http://localhost/UTS-TODO LIST-ARYA/api.php?action=delete`
- **Body (JSON):**
  ```json
  {
      "id": 1
  }
  ```

---

## **Catatan Penting**
- Pastikan server lokal XAMPP berjalan sebelum mengakses aplikasi.
- Jika API tidak bekerja, periksa file `db_conn.php` dan pastikan pengaturan database sesuai.
- Gunakan Postman atau alat lain untuk menguji API jika diperlukan.

---

## **Lisensi**
Proyek ini dibuat untuk keperluan pembelajaran dan dapat digunakan secara bebas dengan memberikan atribusi kepada penulis.

