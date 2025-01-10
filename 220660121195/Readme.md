# Sistem CRUD Reservasi Hotel Uno

## Anggota Kelompok
Egi Rangga Maulana 220660121137
Alif Gumelar Syah Moeslim 220660121161
Ruspandi 220660121051
Yogi Cahya Yogaswara 220660121195
## Deskripsi Proyek
Sistem ini dirancang untuk mengelola reservasi hotel secara efisien dengan menerapkan operasi CRUD (Create, Read, Update, Delete). Aplikasi ini memungkinkan pengguna untuk membuat, membaca, memperbarui, dan menghapus data reservasi tamu.

## Fitur Utama
- **Create:** Menambahkan data reservasi baru ke sistem.
- **Read:** Melihat daftar reservasi yang ada.
- **Update:** Memperbarui data reservasi yang telah tersimpan.
- **Delete:** Menghapus data reservasi dari sistem.

## Struktur Data Reservasi
Setiap data reservasi mencakup:
- **ID Reservasi**: Identifikasi unik untuk setiap reservasi.
- **Nama Tamu**: Nama tamu yang melakukan reservasi.
- **Tanggal Check-In**: Tanggal mulai menginap.
- **Tanggal Check-Out**: Tanggal selesai menginap.
- **Nomor Kamar**: Kamar yang dipesan.
- **Status Reservasi**: Status seperti "Dipesan", "Dibatalkan", atau "Selesai".

## Teknologi yang Digunakan
- **Backend**: [sebutkan framework atau bahasa pemrograman yang digunakan]
- **Database**: [sebutkan sistem database yang digunakan]
- **Frontend**: [sebutkan framework atau library jika ada]

## Cara Menjalankan Proyek
1. Clone repository ini:
   ```bash
   git clone [URL_REPOSITORY]
   ```
2. Install dependensi yang diperlukan:
   ```bash
   [perintah instalasi dependensi]
   ```
3. Jalankan aplikasi:
   ```bash
   [perintah menjalankan aplikasi]
   ```

## API Endpoint CRUD
1. **Create Reservasi**
   - **Endpoint**: `POST /reservasi`
   - **Deskripsi**: Menambahkan data reservasi baru.
   - **Payload**:
     ```json
     {
       "nama_tamu": "John Doe",
       "tanggal_check_in": "2025-01-10",
       "tanggal_check_out": "2025-01-15",
       "nomor_kamar": 101,
       "status": "Dipesan"
     }
     ```

2. **Read Reservasi**
   - **Endpoint**: `GET /reservasi`
   - **Deskripsi**: Mendapatkan daftar semua reservasi.

3. **Update Reservasi**
   - **Endpoint**: `PUT /reservasi/{id}`
   - **Deskripsi**: Memperbarui data reservasi berdasarkan ID.
   - **Payload**:
     ```json
     {
       "nama_tamu": "Jane Doe",
       "tanggal_check_in": "2025-01-12",
       "tanggal_check_out": "2025-01-18",
       "nomor_kamar": 102,
       "status": "Dipesan"
     }
     ```

4. **Delete Reservasi**
   - **Endpoint**: `DELETE /reservasi/{id}`
   - **Deskripsi**: Menghapus data reservasi berdasarkan ID.

## Anggota Kelompok
1. Egi Rangga Maulana
2. Alif Gumelar Syah Moeslim
3. Ruspandi
4. Yogi Cahya

---

## Lisensi
Proyek ini dilisensikan di bawah [nama lisensi, jika ada].
