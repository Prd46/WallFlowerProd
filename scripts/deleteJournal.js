const deleteB = document.querySelector(".js-delete");
const deleteNo = document.querySelector(".js-cancel");
const confirmer = document.querySelector(".js-confirm");

deleteB.addEventListener("click", function () {
    if (confirmer.classList.contains("hidden")) {
      confirmer.classList.remove("hidden");
    }
  });
  
  deleteNo.addEventListener("click", function () {
    if (!confirmer.classList.contains("hidden")) {
      confirmer.classList.add("hidden");
    }
  });
  