AOS.init(
  {
    easing: "ease-out",
    duration: 3000,
    delay: 100,
  },
);

list = document.querySelector("#actionOnBook");
form = document.querySelector("#addToList");

list.addEventListener("change", function () {
  if (list.value !== "") {
    list.text = list.options[list.selectedIndex].text;
  } else {
    list.text = "select an option";
  }
});
