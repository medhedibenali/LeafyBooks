const fileInput = document.querySelector("#image");
const preview = document.querySelector(".js-preview");

const originalSrc = preview.src;

fileInput.addEventListener("change", () => {
  const image = fileInput.files[0];
  if (!image) {
    preview.src = originalSrc;
  }
  const url = URL.createObjectURL(image);
  preview.src = url;
});
