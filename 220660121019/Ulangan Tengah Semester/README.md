Ulangan Tengah Semester
Rifky Septiana Rizki
220660121019
IF-V5

Todo List dengan tampilan Css sederhana dan sentuhan JavaScript

1. INDEX.PHP
   File ini adalah halaman utama dari aplikasi Todo List, yang menangani penambahan, pengeditan, penghapusan, dan pembaruan status tugas :

A. Koneksi Database :
// include 'database.php'; //
Kode ini menyertakan file database.php, yang berisi konfigurasi untuk menghubungkan aplikasi ke database.

B. Proses Penambahan Tugas :

if (isset($_POST['add'])) {
   // $q_insert = "INSERT INTO tasks (tasklabel, taskstatus) VALUES (
        '" . $_POST['task'] . "', 'open'
    )";
    $run_q_insert = mysqli_query($conn, $q_insert);

    if (!$run_q_insert) {
        echo "Error: " . mysqli_error($conn);
    } else {
        header('Location: index.php');
    }

} //
Jika form dengan metode POST mengandung data untuk menambahkan tugas (add), maka:
Query SQL untuk memasukkan data ke dalam tabel tasks akan dibuat.
Jika query berhasil, pengguna akan diarahkan kembali ke index.php.

C . Proses Menampilkan Tugas :
// $q_select = "SELECT * FROM tasks ORDER BY taskid DESC";
$run_q_select = mysqli_query($conn, $q_select); //
Query ini mengambil semua data dari tabel tasks dan mengurutkannya berdasarkan taskid secara menurun (tugas terbaru di atas).

D. Proses Penghapusan Tugas :

// if(isset($_GET['delete'])){
    $q_delete = "DELETE FROM tasks WHERE taskid = '".$\_GET['delete']."' ";
$run_q_delete = mysqli_query($conn, $q_delete);
header('Refresh:0; url=index.php');
} //
Jika URL memiliki parameter delete, tugas dengan taskid tersebut akan dihapus dari database.
Setelah itu, halaman akan diperbarui secara otomatis.

E . Proses Pembaruan Status Tugas :
// if(isset($\_GET['done'])){
// Kode untuk mengubah status tugas
} //
Jika URL memiliki parameter done, status tugas akan diubah antara 'open' dan 'close'.

F . Tampilan HTML :
Bagian ini menampilkan form untuk menambah tugas dan daftar tugas yang ada.
Tugas ditampilkan dalam format yang bisa dicentang, dan ada opsi untuk mengedit atau menghapus tugas.

2. EDIT.PHP
   File ini digunakan untuk mengedit tugas yang telah ada.

A . Memilih Data Tugas untuk Diedit :
// $q_select = "SELECT * FROM tasks WHERE taskid = '".$\_GET['id']."' ";
$run_q_select = mysqli_query($conn, $q_select);
$d = mysqli_fetch_object($run_q_select); //
Tugas yang ingin diedit dipilih berdasarkan taskid yang didapat dari URL.

B. Proses Pembaruan Data Tugas :
// if(isset($_POST['edit'])){
    $q_update = "UPDATE tasks SET tasklabel = '".$\_POST['task']."' WHERE taskid = '".$_GET['id']."' ";
    $run_q_update = mysqli_query($conn, $q_update);
header('Refresh:0; url=index.php');
} //
Ketika form edit disubmit, query SQL untuk memperbarui tasklabel dari tugas yang sesuai dengan taskid yang diberikan akan dieksekusi.

C. Tampilan HTML :
Halaman ini menampilkan form untuk mengedit tugas yang telah dipilih sebelumnya, dengan nilai awal diisi dengan nama tugas saat ini.

3. DATABASE.PHP
   File ini digunakan untuk mengatur koneksi ke database.

// <?php
$host = "localhost"; // Alamat server database
$user = "username"; // Nama pengguna database
$pass = "password"; // Kata sandi database
$db = "todolist"; // Nama database //

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db); //

// Mengecek koneksi
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?> //

File ini mengatur parameter untuk menghubungkan aplikasi dengan database MySQL.
Jika koneksi gagal, pesan kesalahan akan ditampilkan.

KESIMPULAN
index.php mengatur logika utama untuk menambah, menampilkan, menghapus, dan memperbarui tugas.
edit.php pengguna untuk mengedit tugas yang sudah ada.
database.php mengatur koneksi ke database.

DOKUMENTASI TAMPILAN :
![sebelum memasukan data base baru](/img/sebelumdb.png)
![tampilan utama](/img/utama.png)
![menambahkan item baru](/img/add%20item%20baru.png)
![tampilan data base setelah menambahkan item baru](/img/additembarudb.png)
![mencentang ceklis untuk close](/img/statusclose.png)
![tampilan data base ketika mencentak ceklis](/img/tampilandbstatusclose.png)
![halaman edit](/img/tampilanedit.png)
![tampilan setelah data di edit](/img/setelahedit.png)
![tampilan data base setelah di edit](/img/tampilandbedit.png)
![tampilan ketika click delete akan ada peringatan](/img/sebelumdelete.png)
![tampilan setelah peringatan di click oke](/img/setelahdelete.png)
![tampilan data base setelah menghapus item/delete](/img/tampilandbdelete.png)
