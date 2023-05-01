<?php

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