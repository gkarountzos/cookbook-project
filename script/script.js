const togglePfp = document.querySelector("#togglePfp");
const updatePfp = document.querySelector(".update-pfp");

const toggleInfo = document.querySelector("#toggleInfo");
const updateInfo = document.querySelector(".update-info");

togglePfp.addEventListener("click", (event) => {
  event.preventDefault();
  if (updatePfp.style.visibility === "hidden") {
    updatePfp.style.visibility = "visible";
  }
});

toggleInfo.addEventListener("click", (event) => {
  event.preventDefault();
  console.log("haha");
  if (updateInfo.style.visibility === "hidden") {
    updateInfo.style.visibility = "visible";
  }
});
