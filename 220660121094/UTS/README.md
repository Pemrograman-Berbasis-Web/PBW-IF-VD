# Aplikasi Todo List
![Screenshot portofolio](https://github.com/AuraRa-chan/PBW-IF-VD/raw/main/220660121094/UTS/Screenshot%20aplikasi.png)

Aplikasi Todo List yang sudah ada saya percantik tampilan dengan kode css sebagai berikut:

# Kode CSS
```css
/* Style untuk body */
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #95b7fb, #2626f7);
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

/* Style untuk header */
h1 {
    color: white;
    font-size: 2.5em;
    margin-top: 20px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    animation: fadeIn 2s ease-in-out;
}

/* Style untuk daftar tugas */
ul {
    list-style-type: none;
    padding: 0;
    width: 80%;
    max-width: 600px;
    margin: 20px auto;
}

li {
    background: #fff;
    margin: 10px 0;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.2s ease;
}

li:hover {
    transform: scale(1.02);
}

/* Style untuk tombol */
a, button {
    text-decoration: none;
    color: white;
    background-color: #007bff;
    border: none;
    padding: 8px 12px;
    border-radius: 3px;
    cursor: pointer;
    font-size: 0.9em;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

a:hover, button:hover {
    background-color: #0056b3;
}

/* Style untuk tombol submit */
button[type="submit"] {
    background-color: #28a745;
    padding: 10px 15px;
    font-size: 1em;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button[type="submit"]:hover {
    background-color: #218838;
    transform: scale(1.05);
}

/* Style untuk form */
form {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 10px;
    width: 80%;
    max-width: 600px;
}

input[type="text"] {
    width: 70%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Animasi fade-in untuk elemen header */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

Kode terakhir memberikan efek fadeIn pada tulisan Todo List pada saat membuka aplikasi nya

# Contoh Kode JavaScript
Berikut adalah contoh kode JavaScript yang digunakan dalam proyek ini:

```javascript
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

