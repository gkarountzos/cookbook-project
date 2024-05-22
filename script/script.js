document.addEventListener("DOMContentLoaded", () => {
  const togglePfpButton = document.getElementById("togglePfp");
  const toggleInfoButton = document.getElementById("toggleInfo");
  const updatePfpForm = document.getElementById("updatePfp");
  const updateInfoForm = document.getElementById("updateInfo");

  togglePfpButton.addEventListener("click", () => {
    if (
      updatePfpForm.style.display === "none" ||
      updatePfpForm.style.display === ""
    ) {
      updatePfpForm.style.display = "block";
      updateInfoForm.style.display = "none";
    } else {
      updatePfpForm.style.display = "none";
    }
  });

  toggleInfoButton.addEventListener("click", () => {
    if (
      updateInfoForm.style.display === "none" ||
      updateInfoForm.style.display === ""
    ) {
      updateInfoForm.style.display = "block";
      updatePfpForm.style.display = "none";
    } else {
      updateInfoForm.style.display = "none";
    }
  });
});

const likeButtons = document.querySelectorAll(".like-button");

likeButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const recipeId = this.getAttribute("data-recipe-id");
    const likeCountSpan = this.querySelector(".like-count");

    fetch("like.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: recipeId }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          if (data.liked) {
            this.textContent = `Remove Like (${data.newLikeCount})`;
          } else {
            this.textContent = `Like (${data.newLikeCount})`;
          }
          likeCountSpan.textContent = data.newLikeCount;
        } else {
          alert(data.message);
        }
      });
  });
});
