<?php
require_once __DIR__ . '/../db_conn.php';

class TodoController {
    private $conn;

    public function __construct() {
        global $conn; // Gunakan koneksi global
        $this->conn = $conn;
    }

    public function index() {
        $stmt = $this->conn->query("SELECT * FROM todos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($task) {
        $stmt = $this->conn->prepare("INSERT INTO todos (title, checked, date_time) VALUES (:title, 0, NOW())");
        $stmt->bindParam(':title', $task);
        $stmt->execute();
    }

    public function markAsCompleted($id) {
        $stmt = $this->conn->prepare("UPDATE todos SET checked = NOT checked WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
