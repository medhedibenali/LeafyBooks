list = document.querySelector("#actionOnBook");
form = document.querySelector("#addToList");
list.addEventListener("change", () => {
        if (list.value !== "") {
            form.submit();
        }
    }
)

