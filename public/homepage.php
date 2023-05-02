<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
$pageTitle = "Home";
$stylesheets = array(
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
    'css/book-identity.css',
    'css/static-rating.css',
    'css/homepage.css',
    'css/header.css',
    'css/categories.css'
);

$pic1="img/royal.jpg";
$pic2="img/HP1.jpg";
$pic3="img/HP3.jpg";
$pictures=array(
    "picture1"=>$pic1,
    "picture2"=>$pic2,
    "picture3"=>$pic3,

);
require TEMPLATES_PATH . '/header.php';
require TEMPLATES_PATH.'/book-carrousel.php';
require TEMPLATES_PATH .'/categories.php';
$scripts=array(
    "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js",
    "https://code.jquery.com/jquery-3.2.1.slim.min.js"
);
require TEMPLATES_PATH.'/footer.php';