<?php
require_once '../modules/book-activity/ReadActRepository.php';?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Books</title>
</head>
<body>
<div>
    hello
</div>
<?php
//$_SESSION['user']['name']='Tom';
$readActRepository=new ReadActRepository();

$liste = $readActRepository->find(['username'=>'Tom','state'=>'toread']);
//var_dump($liste);
echo isset($liste);
foreach ($liste as $element) {?>
    <div>
        <?php
        echo "ID: " . $element->ISBN . "<br>";
        ?>
    </div>

    <!--echo "User Name: " . $element['username'] . "<br>";-->
    <!--    echo "Status : " . $element['status'] . "<br>";-->
    <!--    echo "Library : " . $element['library'] . "<br>";-->
    <!--    echo "Start Date : " . $element['start_date'] . "<br>";-->
    <!--    echo "Finish Date : " . $element['finish_date'] . "<br>";-->
    <!--    echo "<br>";-->
    <!---->
    <?php
}?>

</body>
</html>
