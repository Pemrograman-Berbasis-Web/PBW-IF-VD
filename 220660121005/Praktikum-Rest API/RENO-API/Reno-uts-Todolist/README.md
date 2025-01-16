Praktikum REST API dengan PHP dan Postman
Pendahuluan
Dokumentasi ini menjelaskan langkah-langkah untuk menguji API berbasis PHP yang memiliki fitur:

ADD: Menambahkan data baru.
COMPLETE: Menandai data sebagai selesai.
DELETE: Menghapus data.
Pengujian dilakukan menggunakan Postman, alat yang mempermudah pengiriman request HTTP ke API.

Prasyarat
Server lokal: Gunakan software seperti Laragon, XAMPP, atau lainnya untuk menjalankan server PHP.
Postman: Aplikasi untuk menguji endpoint API.
Database: Pastikan database sudah diatur sesuai kebutuhan API.
Struktur Endpoint
1. ADD
URL: /api/add
Method: POST
Body (JSON):
json

{
  "title": "Belajar REST API",
  "description": "Membuat dan menguji API dengan PHP dan Postman"
}
Response:
Success (200):
json

{
  "status": "success",
  "message": "Data berhasil ditambahkan"
}
Error (400):
json

{
  "status": "error",
  "message": "Data tidak valid"
}
2. COMPLETE
URL: /api/complete/{id}
Method: PATCH
Parameter:
{id}: ID dari item yang ingin ditandai selesai.
Response:
Success (200):
json

{
  "status": "success",
  "message": "Tugas berhasil diselesaikan"
}
Error (404):
json

{
  "status": "error",
  "message": "Data tidak ditemukan"
}
3. DELETE
URL: /api/delete/{id}
Method: DELETE
Parameter:
{id}: ID dari item yang ingin dihapus.
Response:
Success (200):
json
{
  "status": "success",
  "message": "Data berhasil dihapus"
}
Error (404):

{
  "status": "error",
  "message": "Data tidak ditemukan"
}
Langkah Pengujian di Postman
Install Postman dari postman.com.
Buat Environment dengan URL server lokal, misalnya http://localhost/api/.
Kirim Request ke endpoint sesuai dengan metode:
POST untuk menambahkan data.
PATCH untuk menandai data sebagai selesai.
DELETE untuk menghapus data.
Periksa Response untuk memastikan API berfungsi dengan benar.