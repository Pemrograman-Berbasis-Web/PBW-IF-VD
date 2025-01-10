<?php
// controllers/TodoController.php

// Memanggil file TodoModel.php untuk menggunakan kelas TodoModel
require_once 'models/TodoModel.php';

/**
 * Kelas yang bertanggung jawab untuk menangani permintaan terkait TodoItems.
 */
class TodoController {
    /**
     * Instans dari TodoModel
     * @var TodoModel
     */
    private $model;

    /**
     * Konstruktor untuk kelas.
     * Menginisialisasi model TodoModel yang akan digunakan oleh controller.
     */
    public function __construct() {
        $this->model = new TodoModel();
    }

    /**
     * Mengambil semua todo yang ada di database.
     * @return array Sebuah array dari semua todo.
     */
    public function index() {
        return $this->model->getAllTodos();
    }

    /**
     * Menambahkan todo baru ke dalam database.
     * @param string $task Teks dari tugas.
     * @return bool Mengembalikan true jika berhasil, false jika gagal.
     */
    public function add($task) {
        if (!empty($task)) {
            return $this->model->createTodo($task);
        }
        return false;
    }

    /**
     * Menandai todo sebagai selesai.
     * @param int $id ID dari todo yang akan ditandai sebagai selesai.
     * @return bool Mengembalikan true jika berhasil, false jika gagal.
     */
    public function markAsCompleted($id) {
        if (!empty($id)) {
            return $this->model->updateTodoStatus($id, 1);
        }
        return false;
    }

    /**
     * Menghapus todo dari database.
     * @param int $id ID dari todo yang akan dihapus.
     * @return bool Mengembalikan true jika berhasil, false jika gagal.
     */
    public function delete($id) {
        if (!empty($id)) {
            return $this->model->deleteTodo($id);
        }
        return false;
    }
}
