document.addEventListener('DOMContentLoaded', () => {
    const taskInput = document.getElementById('task');
    const addButton = document.getElementById('addBtn');
    const todoList = document.getElementById('todoList');
    const clearButton = document.getElementById('clearBtn');

    // Fungsi untuk menambahkan tugas
    function addTodo(task) {
        const li = document.createElement('li');
        li.textContent = task;

        // Buat tombol hapus
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.classList.add('delete-btn');
        
        // Event listener untuk menghapus tugas
        deleteBtn.addEventListener('click', () => {
            li.remove(); // Menghapus elemen li secara langsung
        });

        // Tambahkan tombol hapus ke dalam elemen li
        li.appendChild(deleteBtn);
        todoList.appendChild(li);
    }

    // Menambahkan tugas dengan tombol 'Add'
    addButton.addEventListener('click', () => {
        const task = taskInput.value.trim();
        if (task) {
            addTodo(task);
            taskInput.value = ''; // Bersihkan input setelah menambah tugas
        }
    });

    // Menambahkan tugas dengan menekan tombol 'Enter'
    taskInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            const task = taskInput.value.trim();
            if (task) {
                addTodo(task);
                taskInput.value = ''; // Bersihkan input setelah menambah tugas
            }
        }
    });

    // Menghapus semua tugas
    clearButton.addEventListener('click', () => {
        todoList.innerHTML = ''; // Menghapus semua tugas dalam daftar
    });
});
