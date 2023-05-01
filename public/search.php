<?php

$pageTitle = 'Search';
require_once 'php/SearchManager.php';
require_once dirname(__FILE__,2).'/templates/searchResults.php';
$response = array('bookPage' => $booksPage, 'userPage' => $usersPage,'totalBooks'=>$booksNumber_of_page,'totalUsers'=>$usersNumber_of_page);
echo json_encode($response);
$scripts=["js/search.js"];
require_once '../templates/footer.php';