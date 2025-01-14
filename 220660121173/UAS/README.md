**OUR TEAM**
`1. Rifky Septiana Rizki - 220660121019`
`2. Daffa Putra Emeral - 220660121173`
`3. Raihan Aqimulael - 220660121182`
`4. Reyhan Dwika Putra - 220660121039`

Alur CRUD dalam website ini dimulai dengan _tampilan dashboard awal_ yang muncul saat pengguna pertama kali mengakses website. Pengguna dapat melakukan _register_ untuk membuat akun dengan mengisi data yang akan tersimpan di database, lalu melanjutkan proses _login_ menggunakan email dan password yang telah didaftarkan. Setelah berhasil login, pengguna akan diarahkan ke halaman utama untuk melihat daftar _data pelanggan (READ)_. Pengguna dapat menambahkan _data pelanggan baru (CREATE)_ melalui form input yang tersedia, mengedit _data pelanggan (UPDATE)_ jika diperlukan, serta menghapus _data pelanggan (DELETE)_ dari daftar. Setiap proses ini memberikan notifikasi keberhasilan, seperti penambahan, pembaruan, dan penghapusan data. Selain itu, website menyediakan fitur _pencarian data pelanggan_ berdasarkan kriteria seperti nama, email, nomor telepon, alamat, atau total transaksi untuk memudahkan pengelolaan data. Semua perubahan data akan terlihat langsung di halaman utama dan di database, memastikan proses CRUD berjalan dengan baik dan efisien.

Berikut adalah deskripsi dari **ALUR CRUD** pada sistem website yang Saya buat

**1. Tampilan Dashboard Ketika Pertama Kali Masuk Website**  
![Dasboard](./public/UAS%20PBW%20Dokumentasi/Dasboard.png)

-   Pengguna akan melihat _halaman utama_ (dashboard) ketika pertama kali mengakses website.
-   Belum ada akses spesifik karena pengguna belum melakukan **register** atau **login**.

**2. Tampilan Ketika User Register/Membuat Akun**  
![Register](./public/UAS%20PBW%20Dokumentasi/Register.png)

-   Pengguna diarahkan ke _form registrasi_ untuk membuat akun baru.
-   Pengguna harus mengisi data seperti _nama_, _email_, _password_, dan informasi lainnya.

**3. Tampilan Database Ketika User Membuat Akun**  
![Database User Register](./public/UAS%20PBW%20Dokumentasi/database_user+regist.png)

-   Setelah user berhasil register, data yang diinput akan tersimpan di dalam **database**.
-   Data seperti _user ID_, _username_, _email_, dan _password_ akan terlihat.

**4. Tampilan Ketika User Melakukan Login**  
![Login](./public/UAS%20PBW%20Dokumentasi/login.png)

-   Setelah registrasi, pengguna akan diarahkan ke _form login_.
-   User dapat login menggunakan _email_ dan _password_ yang telah terdaftar.

**5. Tampilan Database Ketika User Melakukan Login**  
![Database Login](./public/UAS%20PBW%20Dokumentasi/database_user+login.png)

-   Database menunjukkan _aktivitas user_ terkait login.
-   Status login akan diperbarui sesuai aktivitas user.

**6. Tampilan Ketika User Berhasil Register/Membuat Akun**  
![Home](./public/UAS%20PBW%20Dokumentasi/home.png)

-   Jika proses registrasi berhasil, user akan diarahkan ke _halaman home_.
-   Halaman ini menampilkan informasi selamat datang atau menu navigasi utama.

**7. Tampilan Dashboard Ketika User Sudah Login**  
![Dashboard2](./public/UAS%20PBW%20Dokumentasi/Dasboard2.png)

-   Setelah berhasil login, user akan melihat tampilan dashboard yang lebih lengkap.
-   Dashboard ini memungkinkan user mengakses berbagai fitur, termasuk CRUD data pelanggan.

**8. Tampilan Halaman Utama Untuk Melihat Data Customers (READ)**  
![Pelanggan1](./public/UAS%20PBW%20Dokumentasi/pelanggan1.png)

-   User dapat melihat _daftar data customers_ yang sudah ada dalam sistem.
-   Data yang ditampilkan mencakup informasi seperti nama, email, telepon, alamat, dan total.

**9. Tampilan Proses Menambahkan Data Customers (CREATE)**  
![Add](./public/UAS%20PBW%20Dokumentasi/add.png)

-   User dapat menambahkan data customers dengan mengisi _form tambah data_.
-   Data seperti _nama pelanggan, email, telepon, alamat_, dan _total transaksi_ harus diinput.

**10. Tampilan Notifikasi Ketika Data Berhasil Ditambahkan**  
![Succes Add](./public/UAS%20PBW%20Dokumentasi/succes_add.png)

-   Setelah data berhasil ditambahkan, sistem akan menampilkan _notifikasi sukses_.

**11. Tampilan Ketika Data Berhasil Ditambahkan (READ)**  
![View](./public/UAS%20PBW%20Dokumentasi/view.png)

-   Data baru akan langsung terlihat pada halaman utama dalam _daftar customers_.

**12. Tampilan Proses Mengubah Data Customers (UPDATE)**  
![Edit](./public/UAS%20PBW%20Dokumentasi/edit.png)

-   User dapat mengedit atau memperbarui informasi data pelanggan.
-   Informasi yang ingin diperbarui dapat diubah melalui _form edit_.

**13. Tampilan Ketika Data Berhasil Diubah**  
![Succes Update](./public/UAS%20PBW%20Dokumentasi/succes_update.png)

-   Setelah proses update selesai, sistem akan menampilkan _notifikasi sukses_.

**14. Tampilan Halaman Utama Setelah Data Diperbarui**  
![View2](./public/UAS%20PBW%20Dokumentasi/view2.png)

-   Data yang telah diperbarui akan ditampilkan di halaman utama dengan _informasi terbaru_.

**15-19. Tampilan Proses Mencari Data Customers (SEARCH)**

-   _Search By Name_  
    ![Search Name](./public/UAS%20PBW%20Dokumentasi/search%20name.png)
-   _Search By Email_
    ![Search Email](./public/UAS%20PBW%20Dokumentasi/search%20email.png)
-   _Search By Phone_  
    ![Search Phone](./public/UAS%20PBW%20Dokumentasi/search%20phone.png)
-   _Search By Address_  
    ![Search Address](./public/UAS%20PBW%20Dokumentasi/search%20addres.png)
-   _Search By Total_
    ![Search Total](./public/UAS%20PBW%20Dokumentasi/search%20total.png)

    -   User dapat mencari data pelanggan berdasarkan _nama_, _email_, _telepon_, _alamat_, atau _total transaksi_.
    -   Fitur ini memudahkan user dalam mencari informasi spesifik dengan cepat.

**20. Tampilan Proses Menghapus Data Customers (DELETE)**  
![Notif Delete](./public/UAS%20PBW%20Dokumentasi/notif_deleted.png)

-   User dapat menghapus data pelanggan dengan mengonfirmasi aksi penghapusan.

**21. Tampilan Ketika Data Berhasil Dihapus**  
![Succes Delete](./public/UAS%20PBW%20Dokumentasi/succes%20deleted.png)

-   Setelah proses delete berhasil, sistem akan menampilkan _notifikasi sukses_.

**22. Tampilan Database Sebelum dan Sesudah Menghapus Data**

-   _Sebelum Delete_  
    ![Database Sebelum](./public/UAS%20PBW%20Dokumentasi/database_customers_nodelete.png)
-   _Sesudah Delete_  
    ![Database Sesudah](./public/UAS%20PBW%20Dokumentasi/database_customers_delete.png)
-   Tampilan database menunjukkan bahwa data pelanggan yang dihapus sudah tidak lagi ada.

    **23. Tampilan Ketika Melakukan Refresh**  
    ![Refresh](./public/UAS%20PBW%20Dokumentasi/Succes_refresh.png)

-   Setelah refresh halaman, sistem akan _memuat ulang data terbaru_ sehingga user dapat melihat perubahan secara real-time.

**Rangkuman Alur CRUD**

1. _Create_ : Menambahkan data customers melalui form input.
2. _Read_ : Menampilkan data customers yang ada.
3. _Update_ : Memperbarui data customers melalui form edit.
4. _Delete_ : Menghapus data customers yang dipilih.
5. _Search_ : Mencari data berdasarkan kriteria tertentu (nama, email, dll).

**CREATE BY RIFKY**
