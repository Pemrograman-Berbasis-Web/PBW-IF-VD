const express = require('express');
const app = express();
const PORT = 3000;

// Middleware untuk parsing JSON
app.use(express.json());

// Data sementara (simulasi database)
let todos = [
    { id: 1, title: 'Belajar Node.js', completed: false },
    { id: 2, title: 'Belajar REST API', completed: false },
];

// Endpoint untuk mendapatkan semua todo
app.get('/api/todos', (req, res) => {
    res.json({ status: 'success', data: todos });
});

// Endpoint untuk menambahkan todo
app.post('/api/add', (req, res) => {
    const { title } = req.body;
    if (!title) {
        return res.status(400).json({ status: 'error', message: 'Title tidak boleh kosong' });
    }
    const newTodo = {
        id: todos.length + 1,
        title,
        completed: false,
    };
    todos.push(newTodo);
    res.status(201).json({ status: 'success', message: 'Tugas berhasil ditambahkan', data: newTodo });
});

// Endpoint untuk menandai todo sebagai selesai
app.patch('/api/complete/:id', (req, res) => {
    const { id } = req.params;
    const todo = todos.find((t) => t.id === parseInt(id));
    if (!todo) {
        return res.status(404).json({ status: 'error', message: 'Tugas tidak ditemukan' });
    }
    todo.completed = true;
    res.json({ status: 'success', message: 'Tugas berhasil diselesaikan', data: todo });
});

// Endpoint untuk menghapus todo
app.delete('/api/delete/:id', (req, res) => {
    const { id } = req.params;
    const index = todos.findIndex((t) => t.id === parseInt(id));
    if (index === -1) {
        return res.status(404).json({ status: 'error', message: 'Tugas tidak ditemukan' });
    }
    const deletedTodo = todos.splice(index, 1);
    res.json({ status: 'success', message: 'Tugas berhasil dihapus', data: deletedTodo });
});

// Jalankan server
app.listen(PORT, () => {
    console.log(`Server berjalan di http://localhost:${PORT}`);
});
