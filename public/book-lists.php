<!doctype html>
<html lang="en">

<?php
require_once "../templates/header.php";
?>
<link rel="stylesheet" href="css/book-identity.css">
<link rel="stylesheet" href="node_modules/bootswatch/dist/lux/bootstrap.min.css">
<title> book-list</title>


<body>
<!--zeineb's page-->
<?php
/*export to another file*/
require_once dirname(__FILE__, 2) . '/modules/book_identification/BookRepository.php';
require_once dirname(__FILE__, 2) . '/modules/author/AuthorRepository.php';
require_once "../modules/book_identification/ProcessBookIdentity.php";
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

