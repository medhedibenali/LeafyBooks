<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$AuthorRepo = new AuthorRepository();
$author = $_GET['author'];

$Result = [];
$Search = $AuthorRepo->find(['pen_name' => $author]);

$Result[$Search[0]->pen_name] = $Search[0]->id;

$jsonData = json_encode($Result);

echo $jsonData;
