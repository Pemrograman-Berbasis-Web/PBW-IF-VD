<?php
// models/TodoModel.php
class TodoModel {
    private $todos = [];

    public function __construct() {
        // Mock data for demonstration purposes
        $this->todos = [
            ['id' => 1, 'task' => 'Buy groceries', 'priority' => 'high', 'status' => 'pending', 'created_at' => '2024-11-01 12:00:00'],
            ['id' => 2, 'task' => 'Finish homework', 'priority' => 'medium', 'status' => 'pending', 'created_at' => '2024-11-02 14:00:00'],
        ];
    }

    /**
     * Mengambil semua todo
     * @return array
     */
    public function getAllTodos() {
        return $this->todos;
    }

    /**
     * Membuat todo baru
     * @param string $task Teks dari tugas
     * @param string $priority Prioritas tugas
     * @param string $created_at Waktu pembuatan tugas
     * @return array Todo yang baru dibuat
     */
    public function createTodo($task, $priority, $created_at) {
        $id = count($this->todos) + 1;
        $todo = [
            'id' => $id,
            'task' => $task,
            'priority' => $priority,
            'status' => 'pending',
            'created_at' => $created_at
        ];
        $this->todos[] = $todo;
        return $todo;
    }

    /**
     * Memperbarui status todo
     * @param int $id ID todo yang akan diperbarui
     * @param string $status Status baru (completed, in-progress, etc.)
     * @return array Todo yang diperbarui
     */
    public function updateTodoStatus($id, $status) {
        foreach ($this->todos as &$todo) {
            if ($todo['id'] == $id) {
                $todo['status'] = $status;
                return $todo;
            }
        }
        return null;
    }

    /**
     * Menghapus todo
     * @param int $id ID todo yang akan dihapus
     * @return array Todo yang dihapus
     */
    public function deleteTodo($id) {
        foreach ($this->todos as $key => $todo) {
            if ($todo['id'] == $id) {
                unset($this->todos[$key]);
                return $todo;
            }
        }
        return null;
    }

    /**
     * Memperbarui teks todo
     * @param int $id ID todo yang akan diperbarui
     * @param string $task Teks baru untuk tugas
     * @return array Todo yang diperbarui
     */
    public function updateTodoText($id, $task) {
        foreach ($this->todos as &$todo) {
            if ($todo['id'] == $id) {
                $todo['task'] = $task;
                return $todo;
            }
        }
        return null;
    }

    /**
     * Mengambil todo berdasarkan ID
     * @param int $id ID todo
     * @return array Todo yang ditemukan
     */
    public function getTodoById($id) {
        foreach ($this->todos as $todo) {
            if ($todo['id'] == $id) {
                return $todo;
            }
        }
        return null;
    }
}
