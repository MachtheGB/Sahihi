document.addEventListener("DOMContentLoaded", function () {
    loadTasks();
});

function loadTasks() {
    const taskList = document.getElementById("taskList");
    taskList.innerHTML = '';

    // Fetch tasks from the server
    fetch('http://localhost:3001/tasks')
        .then(response => response.json())
        .then(tasks => {
            tasks.forEach(task => {
                addTaskToList(task);
            });
        })
        .catch(error => console.error('Error fetching tasks:', error));
}

function addTask() {
    const taskInput = document.getElementById("taskInput");
    const task = taskInput.value.trim();

    if (task !== '') {
        const newTask = { task };

        // Send new task to the server
        fetch('http://localhost:3001/tasks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(newTask),
        })
            .then(response => response.json())
            .then(task => {
                addTaskToList(task);
            })
            .catch(error => console.error('Error adding task:', error));

        taskInput.value = '';
    }
}

function removeTask(id) {
    // Remove task from the server
    fetch(`http://localhost:3001/tasks/${id}`, {
        method: 'DELETE',
    })
        .then(() => {
            const taskToRemove = document.querySelector(`li[data-id="${id}"]`);
            if (taskToRemove) {
                taskToRemove.remove();
            }
        })
        .catch(error => console.error('Error removing task:', error));
}

function addTaskToList(task) {
    const taskList = document.getElementById("taskList");

    const li = document.createElement("li");
    li.setAttribute("data-id", task.id);
    li.innerHTML = `
        <span>${task.task}</span>
        <button onclick="removeTask(${task.id})">Remove</button>
    `;

    taskList.appendChild(li);
}
