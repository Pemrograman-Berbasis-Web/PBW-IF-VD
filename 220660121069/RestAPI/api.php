<?php

// Aktifkan error reporting untuk memudahkan debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// api.php

require_once 'controllers/TodoController.php';
header('Content-Type: application/json');

// Menangani aksi berdasarkan parameter 'action'
$action = $_GET['action'] ?? null;
$controller = new TodoController();

switch ($action) {
    case 'list':
        // Mendapatkan daftar semua todos
        echo json_encode($controller->index());
        break;

    case 'add':
        // Menambahkan todo baru
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Debugging: lihat data mentah dari php://input
            $rawInput = file_get_contents('php://input');
            $inputData = json_decode($rawInput, true);

            // Debugging: log input mentah dan parsing
            error_log("Raw Input: $rawInput");
            error_log("Parsed Input: " . print_r($inputData, true));

            // Tampilkan informasi input sebagai respons untuk debugging
            echo json_encode([
                'method' => $_SERVER['REQUEST_METHOD'],
                'rawInput' => $rawInput,
                'parsedInput' => $inputData,
            ]);

            // Validasi dan tambahkan data jika valid
            if (isset($inputData['task']) && !empty($inputData['task'])) {
                $controller->add($inputData['task']);
                echo json_encode(['message' => 'Todo added successfully']);
            } else {
                echo json_encode(['message' => 'Task is required']);
            }
        } else {
            error_log('Invalid Request Method: ' . $_SERVER['REQUEST_METHOD']);
            echo json_encode(['message' => 'Invalid request method. Use POST to add a todo.']);
        }
        break;

    case 'complete':
        // Menandai todo sebagai selesai
        $rawInput = file_get_contents('php://input');
        $inputData = json_decode($rawInput, true);

        error_log("Raw Input: $rawInput");
        error_log("Parsed Input: " . print_r($inputData, true));

        if (isset($inputData['id'])) {
            $controller->markAsCompleted($inputData['id']);
            echo json_encode(['message' => 'Todo marked as completed']);
        } else {
            echo json_encode(['message' => 'ID is required']);
        }
        break;

    case 'delete':
        // Menghapus todo
        $rawInput = file_get_contents('php://input');
        $inputData = json_decode($rawInput, true);

        error_log("Raw Input: $rawInput");
        error_log("Parsed Input: " . print_r($inputData, true));

        if (isset($inputData['id'])) {
            $controller->delete($inputData['id']);
            echo json_encode(['message' => 'Todo deleted']);
        } else {
            echo json_encode(['message' => 'ID is required']);
        }
        break;

    default:
        echo json_encode(['message' => 'Invalid action']);
}
