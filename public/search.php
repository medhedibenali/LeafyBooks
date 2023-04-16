<?php
$styleSheets= '<link href="css/search.css" rel="stylesheet">';
$pageTitle = 'Search';
require_once dirname(__FILE__, 2) . '/templates/header.php';
require_once 'php/SearchManager.php'; ?>

<div class="books-content">
        <div class="">
            <div class="grid-container">
                <?php
                foreach ($books as $book) {
                $cover = $book->cover;
                $title = $book->title;
                $synopsis = $book->synopsis;
                $author = $book->author;
                require dirname(__FILE__,2).'/templates/bookItem.php';
                } ?>
            </div>
        </div>
        <div class="pages">
            <?php
            for ($page = 1; $page <= $booksNumber_of_page; $page++) { ?>
                <a href=<?= "search.php?booksPage=$page&usersPage=$usersPage&search=$search" ?>><?= $page ?></a>
            <?php } ?>
        </div>

    </div>
<div class="users-content">
    <div class="">
        <div class="grid-container">
            <?php
            foreach ($users as $user) {
                $profilePicture = $user->profilePicture;
                $username = $user->username;
                $firstName = $user->firstName;
                $lastName = $user->lastName;
                require dirname(__FILE__,2).'/templates/userItem.php';
            } ?>
        </div>
    </div>
    <div class="pages">
        <?php
        for ($page = 1; $page <= $usersNumber_of_page; $page++) { ?>
            <a href=<?= "search.php?booksPage=$booksPage&usersPage=$page&search=$search" ?>><?= $page ?></a>
        <?php } ?>
    </div>
</div>
<?php
require_once dirname(__FILE__, 2) . '/templates/header.php';
