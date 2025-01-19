// Import Express
const express = require('express');

// Inisialisasi Express
const app = express();

// Tambahkan middleware untuk menangani request
app.use(express.json());

// Rute utama untuk memverifikasi server berjalan
app.get('/', (req, res) => {
    console.log("Received request at /");
    res.send('Server is running on Express!');
});

// Tambahkan rute lainnya sesuai kebutuhan
app.get('/about', (req, res) => {
    res.send('This is the About Page');
});
app.listen(8080, () => {
    console.log('Server is running on http://localhost:8080');
  });
  
