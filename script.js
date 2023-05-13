const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbar = document.getElementsByClassName("navbar")[0];

toggleButton.addEventListener("click", function () {
  navbar.classList.toggle("active");
});
