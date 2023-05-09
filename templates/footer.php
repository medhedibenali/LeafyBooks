<?php

$scripts = array_merge(
    $scripts ?? [],
    array(
        'js/scroll-to-top.js',
        'js/header.js',
        array(
            'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js',
            'integrity' => 'sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe',
            'crossorigin' => 'anonymous'
        )
    )
);
require dirname(__FILE__) . '/base-footer.php';

?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Request Book</a></li>
                    <li><a href="#"><img src="../img/gitIcon.png" class="git"></a></li>
                </ul>
                <hr>
                <p class="footer-text">LeafyBooks</p>
                <p class="description">
                    LeafyBooks is an online platform dedicated to book enthusiasts who love to read, discover new books, and
                    share their opinions with like-minded people. The website provides a user-friendly interface that allows
                    users to browse and search for books by title, author, tags...
                    In addition to browsing, LeafyBooks also offers features such as creating YOUR reading lists,
                    rating books and leaving reviews The platform also welcomes authors
                    to request adding their books to the website's library, making it a great platform for self-published authors
                    to showcase their work.
                    Whether you're a casual reader or a bookworm, LeafyBooks is the perfect online destination to explore
                    and discover new books and stay up-to-date with the latest releases and
                    trends in the world of literature.
                </p>
            </div>
        </div>
    </div>
</footer>