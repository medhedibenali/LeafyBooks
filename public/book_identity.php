<?php
//we need this for the reviews later
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootswatch/dist/lux/bootstrap.min.css"/>

    <title>Book identity</title>
</head>
<body>
<?php
require_once "../templates/process_book_identity.php";
$ISBN = htmlspecialchars($_GET['ISBN']);
$book=findBook($ISBN);

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

