<?php
    include_once "../modules/autoloader.php";
    
    $username = $_GET['username'];
    $status = $_GET['status'];
    $time = $_GET['time'];

    $AuthorRepo = new AuthorRepository();
    // Getting stat data for my first pie chart  
    $genres = [];

    // Modify each key with their number of occurences in the database
    // Still need to rewrite this query to respect the status and the year indicated
    
    
    $Result = $AuthorRepo->getNumberOfAuhtors($username,$status,$time);

    $AuthorPile = [];

    foreach($Result as $author){
        $AuthorPile[$author->pen_name] = $author->Total;
    }


    // Get rid of null values
    $AuthorPile = array_filter($AuthorPile, function($value){
        return $value != 0;
    });
    
    arsort($AuthorPile);

    $jsonData = json_encode($AuthorPile);

    echo $jsonData;

?>