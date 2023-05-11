<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$pageTitle = "Home";

$stylesheets = array(
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
    'css/static-rating.css',
    'css/index.css',
    'css/header.css',
    'css/categories.css',
    'css/carousel-principal.css',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    "https://unpkg.com/bootstrap-icons@1.6.1/font/bootstrap-icons.css",
    "https://unpkg.com/aos@next/dist/aos.css"
);

require TEMPLATES_PATH . '/header.php';
?>

<div data-aos="zoom-in">
    <div class="hp-anniversary-text">
        <h1>
            Join us in celebration of 25 years
            <span class="magic">
                <?php
                for ($i = 0; $i < 3; $i++) {
                ?>
                    <span class="magic-star">
                        <svg viewBox="0 0 512 512">
                            <path d="M512 255.1c0 11.34-7.406 20.86-18.44 23.64l-171.3 42.78l-42.78 171.1C276.7 504.6 267.2 512 255.9 512s-20.84-7.406-23.62-18.44l-42.66-171.2L18.47 279.6C7.406 276.8 0 267.3 0 255.1c0-11.34 7.406-20.83 18.44-23.61l171.2-42.78l42.78-171.1C235.2 7.406 244.7 0 256 0s20.84 7.406 23.62 18.44l42.78 171.2l171.2 42.78C504.6 235.2 512 244.6 512 255.1z" />
                        </svg>
                    </span>
                <?php
                }
                ?>
                <span class="magic-text">magic</span>
            </span>
        </h1>
    </div>
</div>

<?php
require TEMPLATES_PATH . '/book-carrousel.php';
?>

<div data-aos="zoom-in" data-aos-duration="2000">
    <h1 class="carousel-footer">
        <span class="magic">
            <span style="color:plum; font-family: DecoType Naskh">with the brand-new illustrated collection by Jim Kay</span>
        </span>
    </h1>
    <p class="inspo">
        Daily words of wisdom from your favourite authors
    </p>
    <div data-aos="fade-right" data-aos-duration="1000">
        <div class="quote-box">
            <?php
            require_once 'php/QuotesAPICall.php';
            foreach ($quotes as $quote) {
            ?>
                <div class="quote-author">
                    <div class="quote"> <?= $quote["content"] ?> </div>
                    <div class="author"><?= $quote["author"] ?> </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php

$bookRepo = new BookRepository();
$fantasy = $bookRepo->find(['genre' => trim('fantasy')]);
$sciFi = $bookRepo->find(['genre' => trim('sci-fi')]);
$thriller = $bookRepo->find(['genre' => trim('thriller')]);
$ya = $bookRepo->find(['genre' => trim('young adult')]);
$romance = $bookRepo->find(['genre' => trim('romance')]);
$pictures = array(
    'fantasy' => $fantasy,
    'sciFi' => $sciFi,
    'thriller' => $thriller,
    'youngAdult' => $ya,
    'romance' => $romance,
);

require TEMPLATES_PATH . '/categories.php';

$scripts = array(
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js",
    "https://code.jquery.com/jquery-3.2.1.slim.min.js",
    "js/magic-text.js",
    "js/quotes.js",
    "https://unpkg.com/aos@next/dist/aos.js",
    "js/index.js"

);

require TEMPLATES_PATH . '/footer.php';
