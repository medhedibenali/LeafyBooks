// LEAF ANIMATION THINGY
const navbarBrandIcon = document.querySelector(".fa-leaf");
// variable initialized to track if the leaf was clicked once or not
let clickedOnce = false;
// the icon is clicked, it first checks whether clickedOnce is false
navbarBrandIcon.addEventListener("click", (event) => {
  event.preventDefault();

  if (!clickedOnce) {
    // if it is, it adds the class active to the icon and makes it bigger
    navbarBrandIcon.classList.add("active");
    navbarBrandIcon.style.transform = "scale(2)";
    setTimeout(() => {
      navbarBrandIcon.classList.remove("active");
    }, 300);
    clickedOnce = true;
    // after a delay of 300 it removes the active class and sets clickedOnce to true.
  } else {
    // sets the animation property of the icon to "rotateFall 2s forwards" triggers a CSS animation called rotateFall
    navbarBrandIcon.style.animation = "rotateFall 1s forwards";
    setTimeout(() => {
      navbarBrandIcon.remove();
    }, 2000);
    // after 2 sec the setTimeout function is called  which removes the icon from the DOM using the remove method.
  }
});
