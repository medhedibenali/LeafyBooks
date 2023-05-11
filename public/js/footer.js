// To ensure that the JavaScript code runs after the element has been loaded,
//  we wrap the code inside an event listener that waits for the DOM to finish loading before running.
document.addEventListener("DOMContentLoaded", function () {
  let leafIcon = document.querySelector("#footerLeaf");
  leafIcon.addEventListener("mouseover", function () {
    leafIcon.classList.toggle("rotate");
  });
});
