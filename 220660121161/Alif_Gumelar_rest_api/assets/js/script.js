document.addEventListener("DOMContentLoaded", function () {
    const filterSelect = document.getElementById("filter");
    const searchInput = document.getElementById("search");
    const todoList = document.getElementById("todoList");
  
    // Fitur pencarian
    searchInput.addEventListener("input", function () {
      filterTodos();
    });
  
    // Fitur filter berdasarkan status
    filterSelect.addEventListener("change", function () {
      filterTodos();
    });
  
    // Fungsi untuk memfilter Todo List
    function filterTodos() {
      const filter = filterSelect.value;
      const searchTerm = searchInput.value.trim().toLowerCase();
      const todos = todoList.getElementsByTagName("li");
  
      Array.from(todos).forEach(function (todo) {
        const taskText = todo.textContent.toLowerCase();
        const isCompleted = todo.classList.contains("completed");
  
        let shouldShow = true;
  
        // Pencarian berdasarkan kata kunci
        if (searchTerm && !taskText.includes(searchTerm)) {
          shouldShow = false;
        }
  
        // Filter berdasarkan status (completed atau pending)
        if (filter !== "all") {
          if (filter === "completed" && !isCompleted) {
            shouldShow = false;
          } else if (filter === "pending" && isCompleted) {
            shouldShow = false;
          }
        }
  
        todo.style.display = shouldShow ? "" : "none";
      });
    }
  
    // Menambahkan event listener untuk tombol "Mark as Completed"
  });
  