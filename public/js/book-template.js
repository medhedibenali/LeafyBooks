const body = document.querySelector("body");
const bookImage = document.querySelector(".book-image");

bookImage.addEventListener("mouseenter", () => {
  body.classList.add("blurred");
});

bookImage.addEventListener("mouseleave", () => {
  body.classList.remove("blurred");
});
