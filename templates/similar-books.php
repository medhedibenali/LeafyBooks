<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/book_identification/SimilarBooks.php';

$nb = 0;
$books = getSimilarBooks($isbn);

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
                <img src="img/books/<?= $book->image ?>">
            </a>
        </div>
<?php
        $nb++;
    }
}
