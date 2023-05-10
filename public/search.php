<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once PUBLIC_PATH . '/php/SearchManager.php';

$pageTitle = 'Search';
$stylesheets = array("css/search.css");

require TEMPLATES_PATH . '/header.php';

$previousUserPage = $usersPage - 1;
$nextUserPage = $usersPage + 1;
$previousBookPage = $booksPage - 1;
$nextBookPage = $booksPage + 1;
?>

<h1 style="margin-top: 70px; margin-left: 30px; ">Search Results For "<?= $search ?>"</h1>
<h2>All Books</h2>

<?php
require TEMPLATES_PATH . '/book-content-results.php';
?>

<nav class="pages ">
    <ul class="pagination pagination-sm">
        <li class="page-item">

            <a class="<?= 'page-link previous-book ' . ($booksPage == 1 ? "disabled" : '') ?> " href=<?= "search.php?booksPage=$previousBookPage&usersPage=$usersPage&search=$search" ?> aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php
        for ($page = 1; $page <= $booksNumber_of_page; $page++) { ?>
            <li class="page-item">
                <a class="page-link" href=<?= "search.php?booksPage=$page&usersPage=$usersPage&search=$search" ?>><?= $page ?></a>
            </li>
        <?php } ?>
        <li class="page-item">

            <a class="<?= 'page-link next-book ' . ($booksPage == $booksNumber_of_page ? 'disabled' : '') ?> " href=<?= "search.php?booksPage=$nextBookPage&usersPage=$usersPage&search=$search" ?> aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

</div>
<h2>All Users</h2>
<div class="content users-content">
    <div class="">
        <div class="grid-container">
            <?php
            if (!$users)
                echo '<div> Oops! No results found! </div>';
            else {
                foreach ($users as $user) {
                    require TEMPLATES_PATH . '/user-item.php';
                }
            } ?>
        </div>
    </div>
    <nav class="pages">
        <ul class="pagination pagination-sm justify-content-center">
            <li class="page-item">
                <a class="<?= 'page-link previous-user ' . ($usersPage == 1 ? 'disabled' : '') ?>" href=<?= "search.php?booksPage=$booksPage&usersPage=$previousUserPage&search=$search" ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php
            for ($page = 1; $page <= $usersNumber_of_page; $page++) { ?>
                <li class="page-item">
                    <a class="page-link page" href=<?= "search.php?booksPage=$booksPage&usersPage=$page&search=$search" ?>><?= $page ?></a>
                </li>
            <?php } ?>
            <li class="page-item">

                <a class="<?= 'page-link page next-user ' . ($usersPage == $usersNumber_of_page ? 'disabled' : '') ?>" href=<?= "search.php?booksPage=$booksPage&usersPage=$nextUserPage&search=$search" ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<?php
require TEMPLATES_PATH . '/footer.php';
