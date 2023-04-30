<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$pageTitle = 'Book List';

$stylesheets = array(
    'css/book-identity.css'
);

require TEMPLATES_PATH . '/header.php';

$bookRepo = new BookRepository();
$authorRepo = new AuthorRepository();
$books = $bookRepo->find();
foreach ($books as $book) {
?>
    <div class="bookImage">
        <a href="book-page.php?isbn=<?= $book->isbn ?>">
            <img src="<?= $book->picture ?>">
        </a>

    </div>
    <div class="bookTitle&Author">
        <p><?= $book->title ?></p>
        <p>by <?= ($authorRepo->find(['id' => trim($book->author)]))->pen_name ?></p>
    </div>
<?php
}

require TEMPLATES_PATH . '/footer.php';
