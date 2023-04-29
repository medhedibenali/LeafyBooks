<?php
require 'php/ProcessSimilarBooks.php';

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
                <img src="<?= $book->picture ?>">
            </a>
        </div>
<?php
        $nb++;
    }
}
