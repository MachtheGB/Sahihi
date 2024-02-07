// server.js
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors'); // Optional: For cross-origin resource sharing

const app = express();
const port = 3001; // You can choose any available port

// In-memory database (replace with a real database in a production environment)
let tasks = [
    { id: 1, task: "Complete project", completed: false },
    { id: 2, task: "Read a book", completed: true },
    { id: 3, task: "Exercise", completed: false }
];

// Middleware
app.use(cors()); // Optional: Enable CORS
app.use(bodyParser.json());

// Routes
app.get('/tasks', (req, res) => {
    res.json(tasks);
});

app.post('/tasks', (req, res) => {
    const newTask = {
        id: Date.now(),
        task: req.body.task,
        completed: false
    };

    tasks.push(newTask);

    res.status(201).json(newTask);
});

app.delete('/tasks/:id', (req, res) => {
    const taskId = parseInt(req.params.id);

    tasks = tasks.filter(task => task.id !== taskId);

    res.status(204).end();
});

// Start the server
app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
