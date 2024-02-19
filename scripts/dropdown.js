// const dropdownMenuButton = document.querySelector(".js-categoryButton");
// const dropdownMenu = document.querySelector(".js-dropdown");
// const dropdownOptions = document.querySelector(".js-menu_icon");

// dropdownMenuButton.addEventListener("click", function () {
//   if (dropdownMenu.classList.contains(".js-dropdown_closed")) {
//     console.log("click");
//     dropdownMenu.classList.remove(".js-dropdown_closed");
//     dropdownMenu.classList.add(".js-dropdown_open");
//   } else {
//     dropdownMenu.classList.add(".js-dropdown_closed");
//     dropdownMenu.classList.remove(".js-dropdown_open");
//   }
// });

const filterButtons = document.querySelectorAll(".filterButton");
let category = "";

filterButtons.forEach((button) => {
  button.addEventListener("click", function () {
    // console.log(button.innerHTML)
    category = button.innerHTML;
    let fixedCategory = category.split(" ").join("_");
    console.log(fixedCategory);
    const cards = document.querySelectorAll(".js-dbResult");
    

    cards.forEach((card) => {
      if (!card.classList.contains(fixedCategory)) {
        card.classList.add("hidden");
      } else {
        card.classList.remove("hidden");
      }
    });
  });
});
