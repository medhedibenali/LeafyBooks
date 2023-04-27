list=document.querySelector("#actionOnBook");
form=document.querySelector("#addToList");
form2=document.querySelector(".OnLoad");
form4=document.querySelector(".OnLoad3");
list.addEventListener("change", () =>
    {
            if (list.value !== "") {
                form.submit();
            }
    }
    )

window.onload = function()
{
    form4.submit();
    form2.submit();
}



