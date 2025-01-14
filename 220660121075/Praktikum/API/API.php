<?php
require_once 'config.php';

header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
$response = [
    "status" => "error",
    "message" => "Invalid request"
];

switch ($method) {
    case 'GET':
        // Mendapatkan semua tugas
        $result = mysqli_query($db, "SELECT * FROM `task` ORDER BY `task_id` ASC");
        $tasks = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $tasks[] = $row;
        }
        $response = [
            "status" => "success",
            "data" => $tasks
        ];
        break;

    case 'POST':
        // tugas baru
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['task']) && $data['task'] !== "") {
            $task = $data['task'];
            $status = "Pending";
            mysqli_query($db, "INSERT INTO `task` (`task`, `status`) VALUES ('$task', '$status')");
            $response = [
                "status" => "success",
                "message" => "Task added successfully"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "Task field is required"
            ];
        }
        break;

    case 'PUT':
        // Memperbarui status tugas
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['task_id']) && $data['task_id'] !== "") {
            $task_id = $data['task_id'];
            mysqli_query($db, "UPDATE `task` SET `status` = 'Done' WHERE `task_id` = $task_id");
            $response = [
                "status" => "success",
                "message" => "Task updated successfully"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "Task ID is required"
            ];
        }
        break;

        case 'DELETE':
            // Menghapus tugas menggunakan JSON body
            $data = json_decode(file_get_contents("php://input"), true);
            if (isset($data['task_id']) && $data['task_id'] !== "") {
                $task_id = $data['task_id'];
                $deleteQuery = "DELETE FROM `task` WHERE `task_id` = $task_id";
                $result = mysqli_query($db, $deleteQuery);
                
                if ($result) {
                    $response = [
                        "status" => "success",
                        "message" => "Task deleted successfully"
                    ];
                } else {
                    $response = [
                        "status" => "error",
                        "message" => "Failed to delete task"
                    ];
                }
            } else {
                $response = [
                    "status" => "error",
                    "message" => "Task ID is required"
                ];
            }
            break;        
}
//format JSON
echo json_encode($response);
?>
