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
let categories = [];

filterButtons.forEach((button) => {
  button.addEventListener("click", function () {
    category = button.innerHTML;
    if (!button.classList.contains("filterButton_lit")) {
      button.classList.add("filterButton_lit");
      categories.push(category)
    } else {
      button.classList.remove("filterButton_lit");
      const index = categories.indexOf(category);
      if (index > -1) { // only splice array when item is found
        categories.splice(index, 1); // 2nd parameter means remove one item only
      }
    }
    const cards = document.querySelectorAll(".js-dbResult");
    cards.forEach((card) => {
      let match = 0;
      categories.forEach((cg) =>{
        let fixedCategory = cg.split(" ").join("_");

      if (card.classList.contains(fixedCategory)) {
        match = 1;
        card.classList.remove("hidden");
      } else if (match == 0){
        card.classList.add("hidden");
      }

    });
    });
  });
});
