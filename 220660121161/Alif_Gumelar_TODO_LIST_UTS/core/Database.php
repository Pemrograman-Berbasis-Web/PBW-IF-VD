<?php
class Database {
    private $host = "localhost";
    private $db_name = "todolist"; // Ganti dengan nama database Anda
    private $username = "root";    // Username default MySQL XAMPP
    private $password = "";        // Password default kosong
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
