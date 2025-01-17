<?php
// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Sertakan file controller dan koneksi database
require_once 'controllers/TodoController.php';

// Set header untuk JSON response
header('Content-Type: application/json');

// Inisialisasi controller
$controller = new TodoController();

// Tangani aksi berdasarkan parameter 'action'
$action = $_GET['action'] ?? null;

try {
    switch ($action) {
        case 'list':
            // Mendapatkan daftar todos
            $todos = $controller->index();
            echo json_encode($todos);
            break;

        case 'add':
            // Menambahkan todo baru
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $inputData = json_decode(file_get_contents('php://input'), true);
                if (isset($inputData['task']) && !empty($inputData['task'])) {
                    $controller->add($inputData['task']);
                    echo json_encode(['message' => 'Todo added successfully']);
                } else {
                    echo json_encode(['error' => 'Task is required']);
                }
            } else {
                echo json_encode(['error' => 'Invalid request method. Use POST to add a todo.']);
            }
            break;

        case 'complete':
            // Menandai todo sebagai selesai
            $inputData = json_decode(file_get_contents('php://input'), true);
            if (isset($inputData['id'])) {
                $controller->markAsCompleted($inputData['id']);
                echo json_encode(['message' => 'Todo marked as completed']);
            } else {
                echo json_encode(['error' => 'ID is required']);
            }
            break;

        case 'delete':
            // Menghapus todo
            $inputData = json_decode(file_get_contents('php://input'), true);
            if (isset($inputData['id'])) {
                $controller->delete($inputData['id']);
                echo json_encode(['message' => 'Todo deleted']);
            } else {
                echo json_encode(['error' => 'ID is required']);
            }
            break;

        default:
            echo json_encode(['error' => 'Invalid action specified']);
            break;
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
