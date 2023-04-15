<?php
require_once dirname(__FILE__, 2) . '/config/config.php';

$pageTitle = 'Search';
require_once TEMPLATES_PATH . '/header.php';

require_once dirname(__FILE__) . 'php/SearchManager.php';
?>

<ul class="list-group">
    <?php
    foreach ($books as $book) {
        $cover = $book->cover;
        $title = $book->title;
        $synopsis = $book->synopsis;
        $author = $book->author;
        require dirname(__FILE__, 2) . '/templates/bookItem.php';
    } ?>
</ul>
<div>
    <?php
    for ($page = 1; $page <= $number_of_page; $page++) { ?>
        <a href=<?= "search.php?page=$page&search=$search" ?>><?= $page ?></a>
    <?php } ?>
</div>

<?php
require_once TEMPLATES_PATH . '/header.php';
