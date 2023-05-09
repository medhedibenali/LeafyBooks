<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$stylesheets = array_merge(
    array(
        array(
            'href' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css',
            'integrity' => 'sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ',
            'crossorigin' => 'anonymous'
        ),
        array(
            'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
            'integrity' => 'sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==',
            'crossorigin' => 'anonymous',
            'referrerpolicy' => 'no-referrer'
        ),
        'css/header.css'
    ),
    $stylesheets ?? []
);
require dirname(__FILE__) . '/base-header.php';

$userRepository = new UserRepository();

$user = false;

if (isset($_SESSION['username'])) {
    $user = $userRepository->find(['username' => $_SESSION['username']]);
}
?>

<!--  NAVBAR   -->

<nav class="navbar navbar-expand-lg t d-flex justify-content-center sticky-lg-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-leaf"></i> LeafyBooks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav" style="margin-left: 15rem;">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="margin-right: 20px;">Home</a>
                </li>
                <!-- TODO link to browse -->
                <li class="nav-item">
                    <div class="dropdown">
                        <a class=" nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 20px; margin-right: 20px;">Browse</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="browse.php?tag=action">Action</a>
                            <a class="dropdown-item" href="browse.php?tag=fantasy">Fantasy</a>
                            <a class="dropdown-item" href="browse.php?tag=adventure">Adventure</a>
                            <a class="dropdown-item" href="browse.php?tag=horror">Horror</a>
                            <a class="dropdown-item" href="browse.php?tag=thriller">Thriller</a>
                            <a class="dropdown-item" href="browse.php?tag=sci-fi">Sci-fi</a>
                            <a class="dropdown-item" href="browse.php?tag=mystery">Mystery</a>
                            <a class="dropdown-item" href="browse.php?tag=contemporary">Contempopary</a>
                            <a class="dropdown-item" href="browse.php?tag=young">Young Adult</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <?php if ($user) { ?>
                        <a class="nav-link" href="my-books.php" style="margin-left: 20px; margin-right: 20px;">My Books</a>
                    <?php } else { ?>
                        <!--                        when clicked on if user is connected it will take him to my books if not the login page-->
                        <a class="nav-link" href="sign-in.php" style="margin-left: 20px; margin-right: 20px;">My Books</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <form class="d-flex" role="search" action="search.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" style="width: 20rem;margin-left: 3rem">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                    <?php
                    if (!$user) {
                    ?>
                        <div class="btn-group btn-group-2">
                            <a href="sign-up.php">
                                <button type="button" class="navButton">Sign up</button>
                            </a>
                            <a href="sign-in.php">
                                <button type="button" class="navButton">Log in</button>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="dropdown">
                            <a class=" nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img src="img/users/<?= $user->image ?>" class="profilePic">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="user_profile.php"><i class="fa-solid fa-book-open-reader"></i> View Profile</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i></i>Disconnect</a>
                            </div>
                        </div>
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