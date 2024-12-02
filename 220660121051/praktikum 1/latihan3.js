// Menampilkan pesan sambutan
function showWelcomeMessage() {
  alert(
    "Selamat datang di portofolio saya! Saya adalah seorang pengembang web yang penuh semangat."
  );
}

window.onload = function () {
  changeBackgroundColor();
  showWelcomeMessage(); // Panggil fungsi pesan sambutan
  displayProjects();
  displayExperience();
};
