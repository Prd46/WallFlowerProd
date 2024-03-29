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
const allButton = document.querySelector(".js-all");
const allCheck = allButton.querySelector(".check");
const allUncheck = allButton.querySelector(".uncheck");
allButton.classList.add("filterButton_lit");
allCheck.classList.remove("hidden");
allUncheck.classList.add("hidden");

filterButtons.forEach((button) => {

  button.addEventListener("click", function () {
    const textDiv = button.querySelector(".js-filter");
    const check = button.querySelector(".check");
    const uncheck = button.querySelector(".uncheck");
    category = textDiv.innerHTML;
    if (!button.classList.contains("filterButton_lit")) {
      allButton.classList.remove("filterButton_lit");
      allCheck.classList.add("hidden");
      allUncheck.classList.remove("hidden");
      button.classList.add("filterButton_lit");
      check.classList.remove("hidden");
      uncheck.classList.add("hidden");
      // console.log(button.img)
      // button.img.classList.remove("hidden");
      categories.push(category);
    } else {
      button.classList.remove("filterButton_lit");
      // button.img.classList.add("hidden");
      check.classList.add("hidden");
      uncheck.classList.remove("hidden");
      const index = categories.indexOf(category);
      if (index > -1) {
        // only splice array when item is found
        categories.splice(index, 1); // 2nd parameter means remove one item only
      }
    }
    if (button.classList.contains("js-all")){
      categories = [];
      filterButtons.forEach((button) => {
        if (!button.classList.contains("js-all")){
          const check = button.querySelector(".check");
          const uncheck = button.querySelector(".uncheck");
          button.classList.remove("filterButton_lit");
          check.classList.add("hidden");
          uncheck.classList.remove("hidden");
        };
      });

    };

    const cards = document.querySelectorAll(".js-dbResult");
    cards.forEach((card) => {
      let match = 0;

      if (categories.length == 0) {
        card.classList.remove("hidden");
        console.log("Array is empty");
        allButton.classList.add("filterButton_lit");
        allCheck.classList.remove("hidden");
        allUncheck.classList.add("hidden");
        // categories.push("All");
      }

      categories.forEach((cg) => {
        let fixedCategory = cg.split(" ").join("_");

        if (card.classList.contains(fixedCategory)) {
          match = 1;
          card.classList.remove("hidden");
        } else if (match == 0) {
          card.classList.add("hidden");
        }
      });
    });
    console.log(categories);
  });
});
