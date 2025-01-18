const inputBox = document.getElementById("inputBox");
const addBtn = document.getElementById("addBtn");
const todoList = document.getElementById("todoList");
const removeAllBtn = document.getElementById("removeAllBtn");

let editTodo = null;

const addTodo = () => {
  const inputText = inputBox.value.trim();
  if (inputText.length <= 0) {
    alert("Please enter valid task");
    return false;
  }

  if (addBtn.value === "Edit") {
    editLocalTodos(editTodo.target.previousElementSibling.innerHTML);
    editTodo.target.previousElementSibling.innerHTML = inputText;
    addBtn.value = "Add";
    inputBox.value = "";
  } else {
    const li = document.createElement("li");
    const p = document.createElement("p");
    p.innerHTML = inputText;
    li.appendChild(p);

    const editBtn = document.createElement("button");
    editBtn.innerText = "Edit";
    editBtn.classList.add("btn", "editBtn");
    li.appendChild(editBtn);

    const deleteBtn = document.createElement("button");
    deleteBtn.innerText = "Remove";
    deleteBtn.classList.add("btn", "deleteBtn");
    li.appendChild(deleteBtn);

    todoList.appendChild(li);
    inputBox.value = "";

    saveLocalTodos(inputText);
  }
};

const updateTodo = (e) => {
  if (e.target.classList.contains("deleteBtn")) {
    todoList.removeChild(e.target.parentElement);
    deleteLocalTodos(e.target.parentElement);
  } else if (e.target.classList.contains("editBtn")) {
    inputBox.value = e.target.previousElementSibling.innerHTML;
    inputBox.focus();
    addBtn.value = "Edit";
    editTodo = e;
  } else {
    e.target.classList.toggle("expanded");
  }
};

const saveLocalTodos = (todo) => {
  let todos;
  if (localStorage.getItem("todos") === null) {
    todos = [];
  } else {
    todos = JSON.parse(localStorage.getItem("todos"));
  }
  todos.push(todo);
  localStorage.setItem("todos", JSON.stringify(todos));
};

const getLocalTodos = () => {
  let todos;
  if (localStorage.getItem("todos") === null) {
    todos = [];
  } else {
    todos = JSON.parse(localStorage.getItem("todos"));
    todos.forEach((todo) => {
      const li = document.createElement("li");
      const p = document.createElement("p");
      p.innerHTML = todo;
      li.appendChild(p);

      const editBtn = document.createElement("button");
      editBtn.innerText = "Edit";
      editBtn.classList.add("btn", "editBtn");
      li.appendChild(editBtn);

      const deleteBtn = document.createElement("button");
      deleteBtn.innerText = "Remove";
      deleteBtn.classList.add("btn", "deleteBtn");
      li.appendChild(deleteBtn);

      todoList.appendChild(li);
    });
  }
};

const deleteLocalTodos = (todo) => {
  let todos;
  if (localStorage.getItem("todos") === null) {
    todos = [];
  } else {
    todos = JSON.parse(localStorage.getItem("todos"));
  }

  let todoText = todo.children[0].innerHTML;
  let todoIndex = todos.indexOf(todoText);
  todos.splice(todoIndex, 1);
  localStorage.setItem("todos", JSON.stringify(todos));
};

const editLocalTodos = (todo) => {
  let todos = JSON.parse(localStorage.getItem("todos"));
  let todoIndex = todos.indexOf(todo);
  todos[todoIndex] = inputBox.value;
  localStorage.setItem("todos", JSON.stringify(todos));
};

// Fungsi Remove All Todos
const removeAllTodos = () => {
  todoList.innerHTML = "";
  localStorage.removeItem("todos");
};

document.addEventListener("DOMContentLoaded", getLocalTodos);
addBtn.addEventListener("click", addTodo);
todoList.addEventListener("click", updateTodo);
removeAllBtn.addEventListener("click", removeAllTodos);

inputBox.addEventListener("keypress", (event) => {
  if (event.key === "Enter") {
    addTodo();
  }
});
