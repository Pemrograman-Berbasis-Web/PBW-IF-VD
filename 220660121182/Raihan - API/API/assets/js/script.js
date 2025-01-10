// Menampilkan konfirmasi sebelum menghapus todo
document.addEventListener('DOMContentLoaded', function () {
    // Menemukan semua link "Delete"
    const deleteLinks = document.querySelectorAll('a[href*="action=delete"]');

    deleteLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            const confirmed = confirm("Apakah Anda yakin ingin menghapus tugas ini?");
            if (!confirmed) {
                event.preventDefault();
            }
        });
    });

    // Menampilkan alert setelah berhasil menambahkan tugas baru
    const form = document.querySelector('form');
    form.addEventListener('submit', function () {
        alert("Tugas berhasil ditambahkan!");
    });
});
