function scrollTobottom()
{
    window.scrollTo(0,document.body.scrollHeight);
}
const button=document.querySelector("#dropdown");
button.addEventListener("change",e =>{
    e.preventDefault();//to prevent the default behavior from occuring
    button.classList.add("animate");
    setTimeout(()=>{
        button.classList.remove("animate");
    },600)//we chose the timeout time same as the time of the animation of bottomBublles & top ones

})
