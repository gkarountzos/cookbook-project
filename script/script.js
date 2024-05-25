// sets variables for the profile picture button and the info button
const togglePfpButton = document.getElementById("togglePfp");
const toggleInfoButton = document.getElementById("toggleInfo");

// sets variables for the profile picture update form and the info update form
const updatePfpForm = document.getElementById("updatePfp");
const updateInfoForm = document.getElementById("updateInfo");

togglePfpButton.addEventListener("click", () => {
  // event listener on click to the profile picture button

  if (
    // checks if the profile picture form is currently hidden
    updatePfpForm.style.display === "none" ||
    updatePfpForm.style.display === ""
  ) {
    // shows the profile picture form and hides the info update form
    updatePfpForm.style.display = "block";
    updateInfoForm.style.display = "none";
  } else {
    updatePfpForm.style.display = "none"; //hides the profile picture form if it is currently visible
  }
});

toggleInfoButton.addEventListener("click", () => {
  // event listener on click to the info button

  if (
    // checks if the info update form is currently hidden
    updateInfoForm.style.display === "none" ||
    updateInfoForm.style.display === ""
  ) {
    // shows the info form and hide the profile picture form
    updateInfoForm.style.display = "block";
    updatePfpForm.style.display = "none";
  } else {
    // hides the info form if it is currently visible
    updateInfoForm.style.display = "none";
  }
});

// gathers all elements with the class like-button
const likeButtons = document.querySelectorAll(".like-button");

// loop over each like button, adding an event listener on click
likeButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const recipeId = this.getAttribute("data-recipe-id"); // gets the recipe id from the data attribute of the button
    const likeCountSpan = this.querySelector(".like-count"); // gets the span that displays the like count
    // sends a post request to like.php file with the recipe id
    fetch("like.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: recipeId }),
    })
      .then((response) => response.json()) // parses the response as JSON
      .then((data) => {
        // handles the response
        if (data.success) {
          // updates the button text(1,2,3 etc) and like count based on whether the recipe was liked or unliked

          if (data.liked) {
            this.textContent = `Remove Like (${data.newLikeCount})`;
          } else {
            this.textContent = `Like (${data.newLikeCount})`;
          }
          likeCountSpan.textContent = data.newLikeCount; // updates the like count with the new like count
        } else {
          alert(data.message); // if there was an error, it displays an alert
        }
      });
  });
});
