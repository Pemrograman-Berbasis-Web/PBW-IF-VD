<?php
require_once 'core/Database.php';

class TodoModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllTodos() {
        $query = "SELECT * FROM todos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addTodo($task) {
        $query = "INSERT INTO todos (task) VALUES (:task)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task', $task);
        return $stmt->execute();
    }

    public function deleteTodo($id) {
        $query = "DELETE FROM todos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
