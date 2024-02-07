<?php
require_once 'db.php';

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Task Name</th><th>Description</th><th>Due Date</th><th>Status</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["task_name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["due_date"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        if ($row["status"] == "Complete") {
            echo "<td><a href='undo_status.php?id=" . $row["id"] . "'>Undo</a></td>";
        } else {
            echo "<td><a href='update_status.php?id=" . $row["id"] . "'>Complete</a></td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No tasks found.";
}

$conn->close();
?>
