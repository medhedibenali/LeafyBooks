<?php
require_once dirname(__FILE__, 2) . '/modules/autoloader.php';
require_once dirname(__FILE__, 2) . '/templates/header.php';
?>

<link rel="stylesheet" href="css/book-identity.css">
<link rel="stylesheet" href="node_modules/bootswatch/dist/lux/bootstrap.min.css">
<title> book-list </title>


<?php

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

?>
</body>

</html>