// Event listener untuk menampilkan pesan saat tugas ditambahkan
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const input = document.querySelector('input[name="task"]');
    
    form.addEventListener("submit", function (e) {
        if (!input.value.trim()) {
            e.preventDefault();
            alert("Task cannot be empty!");
            return false;
        }
        alert("Task added successfully!");
    });

    // Tambahkan event listener untuk tombol Mark as Completed
    const completeLinks = document.querySelectorAll('a[href*="action=complete"]');
    completeLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Mark this task as completed?")) {
                window.location.href = this.href;
            }
        });
    });

    // Tambahkan event listener untuk tombol Delete
    const deleteLinks = document.querySelectorAll('a[href*="action=delete"]');
    deleteLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to delete this task?")) {
                window.location.href = this.href;
            }
        });
    });
});
