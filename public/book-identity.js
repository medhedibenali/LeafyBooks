list=document.querySelector("#actionOnBook");
form=document.querySelector("#addToList");
form2=document.querySelector(".OnLoad");
form3=document.querySelector(".OnLoad2");
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

// document.addEventListener("DOMContentLoaded", ()=>
//     {
//         form2.submit();
//         form3.submit();
//     }
// );

window.onload = function()
{
    form4.submit();
     form2.submit();
    // form3.submit();



}

