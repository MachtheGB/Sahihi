<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body>
<h2>Add Task</h2>
    <form action="add_task.php" method="post">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" cols="50" required></textarea><br>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" required><br>

        <input type="submit" value="Add Task">
    </form>

    <h2>Task List</h2>
<?php include 'display_tasks.php'; ?>

</body>
</html>
