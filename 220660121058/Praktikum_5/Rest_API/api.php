<?php
// api.php

require_once 'core/Database.php';
require_once 'models/TodoModel.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$model = new TodoModel();

switch ($method) {
    case 'GET':
        $todos = $model->getAllTodos();
        echo json_encode($todos);
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $model->addTodo($data['title'], $data['description']);
        echo json_encode(['message' => 'Todo added successfully']);
        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $model->updateTodo($data['id'], $data['title'], $data['description']);
        echo json_encode(['message' => 'Todo updated successfully']);
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);
        $model->deleteTodo($data['id']);
        echo json_encode(['message' => 'Todo deleted successfully']);
        break;
    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method Not Allowed']);
        break;
}
?>
