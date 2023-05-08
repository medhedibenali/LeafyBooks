<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$pageTitle = 'Book List';

$stylesheets = array(
    'css/book-identity.css'
);

require TEMPLATES_PATH . '/header.php';

$bookRepository = new BookRepository();
$books = $bookRepository->find();

$authorRepository = new AuthorRepository();

foreach ($books as $book) {
    $author = $authorRepository->find(['id' => trim($book->author)]);
?>
    <div class="bookImage">
        <a href="book-page.php?isbn=<?= $book->isbn ?>">
            <img src="img/books/<?= $book->image ?>">
        </a>

    </div>
    <div class="bookTitle&Author">
        <p><?= $book->title ?></p>
        <p>by <?= $author->pen_name ?></p>
    </div>
<?php
}

require TEMPLATES_PATH . '/footer.php';
