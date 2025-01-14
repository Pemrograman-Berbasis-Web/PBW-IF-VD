<?php
// config/database.php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'datamahasiswa_db';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>