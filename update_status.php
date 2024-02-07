<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $task_id = $_GET["id"];

    // Update status to "Complete"
    $update_sql = "UPDATE tasks SET status = 'Complete' WHERE id = $task_id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

$conn->close();
?>
