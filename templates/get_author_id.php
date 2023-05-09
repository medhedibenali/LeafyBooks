<?php
    include_once "../modules/autoloader.php";

    $AuthorRepo = new AuthorRepository();
    $author = $_GET['author'];

    $Result = [];
    $Search = $AuthorRepo->find(['pen_name' => $author]);

    $Result[$Search[0]->pen_name] = $Search[0]->id;

    
    $jsonData = json_encode($Result);

    echo $jsonData;
?>
