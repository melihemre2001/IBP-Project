const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbar = document.getElementsByClassName("navbar")[0];

toggleButton.addEventListener("click", function () {
  navbar.classList.toggle("active");
});

let topBtn = document.getElementById("topBtn");
let purchaseBtn = document.querySelector(".purchase-buy-btn");

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    topBtn.style.display = "block";
  } else {
    topBtn.style.display = "none";
  }
}

function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function getDivId(button) {
  let divId = button.parentNode.parentNode.previousElementSibling.id;
  console.log(divId);
}

function getDivClass(button) {
  let divClass = button.parentNode.parentNode.parentNode.className;
  let targetClassName = "";

  targetClassName = divClass.substring(divClass.lastIndexOf(" ") + 1);

  console.log(targetClassName);
}
