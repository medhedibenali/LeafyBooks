

<?php
require  dirname(__FILE__, 2) . '/public/php/process-similar-books.php';
$nb=0;
$books=getSimilarBooks();
foreach ($books as $book)
{
    if($nb>=3)
        break;
    ?>

    <?php
    $SimilarISBN=$book->ISBN;
    if($SimilarISBN!=$ISBN)
    {
        ?>
        <div class="SimilarBook">
        <a href="book-identity.php?ISBN=<?=$SimilarISBN?>">
        <img src="<?= $book->picture?>">
        </a>
       </div>

<?php
        $nb++;
    }


}


?>




















