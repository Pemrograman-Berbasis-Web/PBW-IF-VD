// Mengambil elemen-elemen yang diperlukan
const todoList = document.querySelector('ul');
const addForm = document.querySelector('form');
const inputField = document.querySelector('input[name="task"]');

// Fungsi untuk menambahkan task baru
function addTask(taskText) {
    const li = document.createElement('li');
    li.innerHTML = `
        <span>${taskText}</span>
        <a href="#" class="complete">Mark as completed</a>
        <a href="#" class="delete">Delete</a>
    `;
    todoList.appendChild(li);

    // Event listener untuk menyelesaikan task
    li.querySelector('.complete').addEventListener('click', function() {
        li.classList.toggle('completed');
    });

    // Event listener untuk menghapus task
    li.querySelector('.delete').addEventListener('click', function() {
        li.remove();
    });
}

// Event listener untuk penambahan task melalui form
addForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const taskText = inputField.value.trim();
    if (taskText) {
        addTask(taskText);
        inputField.value = ''; // Kosongkan input setelah menambah task
    } else {
        alert('Please enter a task!');
    }
});

// Menginisialisasi task yang ada pada halaman
document.querySelectorAll('ul li').forEach(li => {
    li.querySelector('.complete').addEventListener('click', function() {
        li.classList.toggle('completed');
    });

    li.querySelector('.delete').addEventListener('click', function() {
        li.remove();
    });
});
