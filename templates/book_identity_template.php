<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book identity</title>
</head>
<body>
<?php
require_once dirname(__FILE__, 2) . '/modules/book_identification/BookRepository.php';
$bookRepo=new BookRepository() ;
$ISBN=htmlspecialchars($_GET['ISBN']);//get the book id
$books=$bookRepo->find(["ISBN"=>$ISBN]); //find book with $ISBN id

foreach ($books as $book)
{
    $booktitle=$book->Title;
    ?>
    <!--   info about the book-->

    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>
    <table>
        <tr>
            <img src="<?=$book->picture?>"/>
        </tr>
        <tr>
            <div>
                title=<?=$book->title;?>
            </div>
        </tr>
        <tr>
            <div>
                author=<?=$book->author;?>
            </div>
        </tr>
        <tr>
            <div>
                Publisher=<?=$book->publisher;?>
            </div>
        </tr>
    </table>
    <?php
}
?>
</body>
</html>


