const previousUserButton=document.querySelector(".previous-user");
const nextUserButton=document.querySelector(".next-user");
const previousBookutton=document.querySelector(".previous-book");
const nextBookButton=document.querySelector(".next-book");
var xhr = new XMLHttpRequest();
xhr.open('GET', 'search.php', true);
xhr.send();
xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        const bookPage= response.bookPage;
        const userPage= response.userPage;
        const totalBooks =response.totalBooks;
        const totalUsers = response.totalUsers;
        // Use the variable values in your JavaScript code
    }
};
function disableButton(button){
    button.style.disabled=true;
}
function enableButton(button){
    button.style.disabled=false;
}