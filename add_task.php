<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST["task_name"];
    $description = $_POST["description"];
    $due_date = $_POST["due_date"];

    // Add your validation logic here

    $sql = "INSERT INTO tasks (task_name, description, due_date, status) VALUES ('$task_name', '$description', '$due_date', 'Pending')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
