<?php
require dirname(__FILE__) . '/base-header.php';
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
                    <a class="nav-link" href="#" style="margin-right: 20px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 20px; margin-right: 20px;">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 20px; margin-right: 20px;">My Books</a>
                </li>
                <li class="nav-item">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 20rem;margin-left: 3rem">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="img/user.png" class="profilePic"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>