<?php
session_start();
if(isset($_SESSION['user']))
{
    $user=$_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<!--  NAVBAR   -->
<nav class="navbar navbar-expand-lg t d-flex justify-content-center sticky-lg-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-leaf"></i> LeafyBooks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav" style="margin-left: 15rem;">
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-right: 20px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 20px; margin-right: 20px;">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 20px; margin-right: 20px;">My Books</a>
                </li>
                <li class="nav-item">
                    <form class="d-flex" role="search" action="../public/search.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width: 20rem;margin-left: 3rem">
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php
                        if(!isset($_SESSION['user'])) {
                            ?>
                            <img src="../public/pictures/user.png" class="profilePic">
                        <?php } else { ?>
                            <img src="<?php echo $user->picture; ?>" class="profilePic">
                        <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const navbarBrandIcon = document.querySelector(".fa-leaf");
    // variable initialized to track if the leaf was clicked once or not
    let clickedOnce = false;
    // the icon is clicked, it first checks whether clickedOnce is false
    navbarBrandIcon.addEventListener("click", event => {
        event.preventDefault();

        if (!clickedOnce) {
            // it is, it adds the class active to the icon and scales it up to twice its size using the transform property.
            navbarBrandIcon.classList.add("active");
            navbarBrandIcon.style.transform = "scale(2)";
            setTimeout(() => {
                navbarBrandIcon.classList.remove("active");
            }, 300);
            clickedOnce = true;
            // after a delay of 300 it removes the active class and sets clickedOnce to true.
        } else {
            // sets the animation property of the icon to "rotateFall 2s forwards" triggers a CSS animation called rotateFall
                navbarBrandIcon.style.animation = "rotateFall 1s forwards";
            setTimeout(() => {
                navbarBrandIcon.remove();
            }, 2000);
            // after 2 sec the setTimeout function is called  which removes the icon from the DOM using the remove method.
        }
    });

</script>

