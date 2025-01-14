<?php
if (isset($_POST['add'])) {
    if ($_POST['task'] != "") {
        $task = $_POST['task'];

        // Kirim data ke API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/todo_app/api.php");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["task" => $task]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if ($result['status'] == "success") {
            header('location: index.php');
        } else {
            echo "Error: " . $result['message'];
        }
    }
}
?>
