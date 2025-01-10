<?php
// models/Todo.php

class Todo {
    public $id;
    public $task;
    public $is_completed;
    public $created_at;
    public $updated_at;

    /**
     * Konstruktor untuk Todo
     * @param int $id ID dari todo
     * @param string $task Tugas dari todo
     * @param bool $is_completed Apakah todo diselesaikan
     * @param string $created_at Timestamp pembuatan todo
     * @param string $updated_at Timestamp pembaharuan todo
     */
    public function __construct($id, $task, $is_completed, $created_at, $updated_at) {
        $this->id = $id;
        $this->task = $task;
        $this->is_completed = $is_completed;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
?>
```






# Membuat Controller Class
Controller adalah tempat logika aplikasi berada. `TodoController.php` akan memproses permintaan dan menampilkan hasilnya melalui `view.`

```php
<?php
// controllers/TodoController.php
// Memanggil file TodoModel.php untuk menggunakan class TodoModel
require_once 'config/Database.php';
/**
 * Kelas yang bertanggung jawab untuk menangani permintaan terkait TodoItems
 */
class TodoController {
    /**
     * Instans dari TodoModel
     * @var TodoModel
     */
    private $model;

    /**
     * Konstruktor untuk kelas
     */
    public function __construct() {
        $this->model = new TodoModel();
    }

    /**
     * Mengembalikan semua todo
     * @return array Sebuah array dari semua todo
     */
    public function index() {
        return $this->model->getAllTodos();
    }

    /**
     * Membuat todo baru
     * @param string $task Teks dari tugas
     * @return array Todo yang baru dibuat
     */
    public function add($task) {
        return $this->model->createTodo($task);
    }

    /**
     * Menandai todo sebagai selesai
     * @param int $id ID dari todo yang akan ditandai sebagai selesai
     * @return array Todo yang diperbarui
     */
    public function markAsCompleted($id) {
        return $this->model->updateTodoStatus($id, 1);
    }

    /**
     * Menghapus todo
     * @param int $id ID dari todo yang akan dihapus
     * @return array Todo yang dihapus
     */
    public function delete($id) {
        return $this->model->deleteTodo($id);
    }
}