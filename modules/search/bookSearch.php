<?php
$bookRepo=new BookRepository();
if(isset($_GET['search'])){
    $search=htmlspecialchars($_GET['search']);
    $books=$bookRepo->findByTitleOrAuthor($search);

}