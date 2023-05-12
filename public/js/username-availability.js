const usernameInput = document.querySelector(".js-username");

async function checkAvailability(username) {
  try {
    const response = await fetch(
      `../php/UsernameAvailability.php?username=${username}`,
    );
    const isAvailable = await response.json();
    return isAvailable;
  } catch (error) {
    return false;
  }
}

let timeoutId = -1;

usernameInput.addEventListener("keyup", async () => {
  clearTimeout(timeoutId);
  timeoutId = setTimeout(async () => {
    const username = usernameInput.value;
    if (username === "") {
      usernameInput.classList.remove("is-not-available");
      usernameInput.setCustomValidity("");
      return;
    }
    const isAvailable = await checkAvailability(username);
    if (!isAvailable) {
      usernameInput.classList.add("is-not-available");
      usernameInput.setCustomValidity("Username already exists.");
    } else {
      usernameInput.classList.remove("is-not-available");
      usernameInput.setCustomValidity("");
    }
  }, 300);
});
