<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $task_id = $_GET["id"];

    // Retrieve the original status
    $original_status_sql = "SELECT original_status FROM tasks WHERE id = $task_id";
    $result = $conn->query($original_status_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $original_status = $row["original_status"];

        // Update the status to the original value
        $update_sql = "UPDATE tasks SET status = '$original_status' WHERE id = $task_id";

        if ($conn->query($update_sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error undoing status change: " . $conn->error;
        }
    } else {
        echo "Original status not found.";
    }
}

$conn->close();
?>
