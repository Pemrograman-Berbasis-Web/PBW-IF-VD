const translations = {
    id: {
        title: "Daftar Tugas Saya",
        placeholder: "Tambahkan tugas baru...",
        addButton: "Tambah Tugas",
        languageLabel: "Bahasa:"
    },
    en: {
        title: "My To-Do List",
        placeholder: "Add a new task...",
        addButton: "Add Task",
        languageLabel: "Language:"
    }
};
function updateLanguage(lang) {
    document.getElementById("title").innerText = translations[lang].title;
    document.getElementById("new-task").placeholder = translations[lang].placeholder;
    document.getElementById("add-task-btn").innerText = translations[lang].addButton;
    document.getElementById("language-label").innerText = translations[lang].languageLabel;
}
document.getElementById("language-select").addEventListener("change", function() {
    updateLanguage(this.value);
});
updateLanguage("id"); // default language

let tasks = []; //task

// function to render tasks
function renderTasks() {
    const taskList = document.getElementById("task-list");
    taskList.innerHTML = "";  // clear current list

    tasks.forEach((task, index) => {
        const li = document.createElement("li");

        // create task text
        const taskText = document.createElement("span");
        taskText.innerText = task.text;
        taskText.classList.add("task-text");
        // mark completed task
        if (task.completed) {
            taskText.style.textDecoration = "line-through";
            taskText.style.color = "#888";
        }
        // task completion button
        taskText.addEventListener("click", () => {
            task.completed = !task.completed; // button complete
            renderTasks();
        });
        // delete button
        const deleteBtn = document.createElement("button");
        deleteBtn.innerText = "Delete";
        deleteBtn.classList.add("task-delete-btn");
        deleteBtn.addEventListener("click", () => {
            tasks.splice(index, 1);  // remove task
            renderTasks();
        });
        // Append elements to the list item
        li.appendChild(taskText);
        li.appendChild(deleteBtn);
        // Append list item to the task list
        taskList.appendChild(li);
    });
}

// add task when clicking the add Task
document.getElementById("add-task-btn").addEventListener("click", () => {
    const newTaskInput = document.getElementById("new-task");
    const newTaskText = newTaskInput.value.trim();

    if (newTaskText) {
        // add the new task
        tasks.push({ text: newTaskText, completed: false });
        // clear input
        newTaskInput.value = "";
        // new updated task
        renderTasks();
    } else {
        alert("Please enter a task.");
    }
});

// add task
document.getElementById("new-task").addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
        document.getElementById("add-task-btn").click();
    }
});
