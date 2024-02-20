const menuButton = document.querySelector(".js-menu-button");
const menu = document.querySelector(".js-menu");
const menuIcon = document.querySelector(".js-menu_icon");
const xIcon = document.querySelector(".js-x_icon");


menuButton.addEventListener("click", function () {
  if (menu.classList.contains("hidden")) {
    menu.classList.remove("hidden");
    menuIcon.classList.add("hidden");
    xIcon.classList.remove("hidden");
  } else {
    menu.classList.add("hidden");
    menuIcon.classList.remove("hidden");
    xIcon.classList.add("hidden");
  }
});

