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

// const observer = new IntersectionObserver(entries => {
//     entries.forEach(entry => {
//         const bar = entry.target.querySelector('.ratingper');
//
//         if (entry.isIntersecting) {
//             bar.classList.add('ratingper-animation');
//             return; // if we added the class, exit the function
//         }
//
//         // We're not intersecting, so remove the class!
//         bar.classList.remove('ratingper-animation');
//     });
// });
//
// observer.observe(document.querySelector('.rating-bar'));


function scrollTobottom()
{
    window.scrollTo(0,document.body.scrollHeight);
}
const button=document.querySelector("#addtolist");
button.addEventListener("click",e =>{
    e.preventDefault();//to prevent the default behavior from occuring
    button.classList.add("animate");
    setTimeout(()=>{
        button.classList.remove("animate");
    },600)//we chose the timeout time same as the time of the animation of bottomBublles & top ones

})
