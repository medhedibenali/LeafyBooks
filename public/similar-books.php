<?php
require dirname(__FILE__, 2) . '/public/php/ProcessSimilarBooks.php';
$nb = 0;
$books = getSimilarBooks();
foreach ($books as $book) {
    if ($nb >= 3) {
        {
            break;
        }
    }
    $similarisbn = $book->isbn;
    if ($similarisbn != $isbn) {
        ?>
        <div class="SimilarBook">
            <a href="book-identity.php?isbn=<?= $similarisbn ?>">
                <img src="<?= $book->picture ?>">
            </a>
        </div>
        <?php
        $nb++;
    }
}
?>




















