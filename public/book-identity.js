
AOS.init(
    {
        easing:'ease-out',
        duration:2500,
    }
);
list=document.querySelector("#actionOnBook");
form=document.querySelector("#addToList");
form2=document.querySelector(".OnLoad");
form4=document.querySelector(".OnLoad3");

list.addEventListener("change", () => {
            if (!list.value == "") {
                form.submit();
            }
            else
            {

            }
    }

    )


window.onload = function()
{
    form4.submit();
     form2.submit();
}


