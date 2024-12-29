Todo List Application
Aplikasi Todo List ini memungkinkan pengguna untuk mengelola daftar tugas dengan mudah. Pengguna dapat menambahkan, menyelesaikan, dan menghapus tugas. Aplikasi ini dibangun menggunakan PHP untuk backend dan MySQL sebagai basis data, dengan tampilan berbasis HTML dan CSS untuk antarmuka pengguna.

Fitur Utama
Melihat Daftar Tugas: Menampilkan semua tugas yang telah ditambahkan oleh pengguna, dengan informasi apakah tugas tersebut selesai atau masih pending.
Menambahkan Tugas Baru: Pengguna dapat menambah tugas baru yang langsung disimpan ke dalam database.
Menandai Tugas Sebagai Selesai: Pengguna dapat menandai tugas sebagai selesai, yang secara otomatis memperbarui statusnya dalam database.
Menghapus Tugas: Pengguna dapat menghapus tugas yang sudah tidak diperlukan, dan perubahan ini akan tercermin langsung dalam database.
Struktur Folder
index.php: Halaman utama aplikasi yang memuat navigasi dan mengarahkan pengguna ke daftar tugas.
views/listTodos.php: Halaman yang menampilkan seluruh daftar tugas beserta statusnya.
assets/css/style.css: File CSS yang digunakan untuk memperindah antarmuka pengguna.
assets/js/script.js: JavaScript tambahan untuk memperkaya interaksi pengguna di dalam form.
Penjelasan Fungsionalitas dan Cara Kerja
Melihat Daftar Tugas

Deskripsi: Semua tugas yang telah disimpan di database ditampilkan dalam bentuk daftar.
Proses:
Mengambil data tugas dengan query SQL SELECT * FROM todos.
Menampilkan hasil dalam elemen HTML <ul>, dengan setiap tugas sebagai item <li>.
Tugas yang belum selesai akan menampilkan link untuk menandai tugas sebagai selesai.
Menambahkan Tugas Baru

Deskripsi: Pengguna dapat menambahkan tugas baru melalui formulir di halaman.
Proses:
Menggunakan metode POST untuk mengirim data ke server dengan parameter ?action=add.
PHP memeriksa apakah ada data POST untuk tugas baru, kemudian memasukkan data ke database menggunakan SQL INSERT.
Setelah tugas ditambahkan, pengguna diarahkan kembali ke halaman utama untuk memperbarui daftar tugas.
Menandai Tugas Sebagai Selesai

Deskripsi: Pengguna dapat menandai tugas yang telah selesai melalui tautan "Mark as completed".
Proses:
Tautan ini mengirimkan parameter ?action=complete&id={task_id} ke server.
PHP memeriksa parameter tersebut dan menjalankan perintah SQL UPDATE untuk mengubah status tugas menjadi selesai di database.
Setelah status diperbarui, pengguna diarahkan kembali ke daftar tugas yang sudah diperbarui.
Menghapus Tugas

Deskripsi: Pengguna dapat menghapus tugas yang tidak diperlukan dari daftar.
Proses:
Mengklik tautan "Delete" yang mengirimkan parameter ?action=delete&id={task_id} ke server.
PHP memeriksa tindakan tersebut dan menjalankan perintah SQL DELETE untuk menghapus tugas yang dipilih dari database.
Setelah tugas dihapus, pengguna diarahkan kembali ke halaman utama.
