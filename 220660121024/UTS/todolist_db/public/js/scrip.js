document.addEventListener('DOMContentLoaded', () => {
    const taskInput = document.getElementById('taskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const todoList = document.getElementById('todoList');
    const clearAllBtn = document.getElementById('clearAllBtn');

    // Add a new task
    addTaskBtn.addEventListener('click', () => {
        const taskText = taskInput.value.trim();
        if (taskText) {
            addTodoItem(taskText);
            taskInput.value = ''; // Clear input field
        }
    });

    // Add task by pressing Enter
    taskInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            const taskText = taskInput.value.trim();
            if (taskText) {
                addTodoItem(taskText);
                taskInput.value = ''; // Clear input field
            }
        }
    });

    // Add a new todo item to the list
    function addTodoItem(task) {
        const li = document.createElement('li');
        li.textContent = task;

        // Create the 'Mark as Completed' button
        const completeBtn = document.createElement('button');
        completeBtn.textContent = '✔';
        completeBtn.classList.add('complete-btn');
        completeBtn.addEventListener('click', () => {
            li.classList.toggle('completed');
        });

        // Create the 'Delete' button
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.classList.add('delete-btn');
        deleteBtn.addEventListener('click', () => {
            todoList.removeChild(li);
        });

        // Append buttons to the list item
        li.appendChild(completeBtn);
        li.appendChild(deleteBtn);

        // Append the new todo item to the list
        todoList.appendChild(li);
    }

    // Clear all tasks
    clearAllBtn.addEventListener('click', () => {
        todoList.innerHTML = ''; // Remove all todo items
    });
});
