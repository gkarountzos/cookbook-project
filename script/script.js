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
