<?php
require dirname(__FILE__, 2) . '/modules/book_identification/ProcessSimilarBooks.php';

$nb = 0;
$books = getSimilarBooks();
foreach ($books as $book) {
    if ($nb >= 3) { {
            break;
        }
    }
    $similarisbn = $book->isbn;
    if ($similarisbn != $isbn) {
?>
        <div class="SimilarBook">
            <a href="book-page.php?isbn=<?= $similarisbn ?>">
                <img src="<?= $book->picture ?>" class="book_img">
                <div class="book-title">
                    <p><?= $book->title ?></p>
                </div>
            </a>
        </div>
<?php
        $nb++;
    }
}
