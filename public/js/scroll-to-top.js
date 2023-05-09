const button = document.querySelector("#back-to-top-btn");
window.addEventListener("scroll", scrollFunction);
function scrollFunction() {
  if (window.scrollY > 250) {
    if (!button.classList.contains("btnEntrance")) {
      button.classList.add("btnEntrance");
      button.classList.remove("btnExit");
      button.style.display = "block";
    }
  } else {
    if (button.classList.contains("btnEntrance")) {
      button.classList.add("btnExit");
      button.classList.remove("btnEntrance");
      setTimeout(() => {
        button.style.display = "none";
      }, 250);
    }
  }
}
button.addEventListener("click", () => {
  window.scrollTo(0, 0);
});
