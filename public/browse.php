<?php

if (!isset($_GET['tag'])) {
    header('location: index.php');
    die();
}

require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$tag = trim(htmlspecialchars($_GET['tag']));

$pageTitle = 'Browse For ' . $tag;

$stylesheets = [
    "css/search.css",
    "css/browse.css"
];

require TEMPLATES_PATH . '/header.php';

$bookRepository = new BookRepository();
$tagsRepository = new TagsRepository();
$authorRepository = new AuthorRepository();
$isbn = $tagsRepository->find(['tag' => $tag]);
?>

<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.js"></script>

<div class="content">
    <div class="bar">
        <h2> <?= $tag ?> Books </h2>
    </div>
    <?php
    if (!$isbn) {
        require TEMPLATES_PATH . '/no-results.php';
    } else {
    ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>cover</th>
                    <th>title</th>
                    <th>author</th>
                    <th>rating</th>
                    <th>publisher</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($isbn as $i) {
                    $book = $bookRepository->find(['isbn' => ($i->isbn)]);
                    $author = $authorRepository->find(['id' => ($book->author)]);
                ?>
                    <tr>
                        <td> <a href=<?= "book-page.php?isbn=$book->isbn" ?>><img src=<?=  'img/books/'. $book->image ?>></a></td>
                        <td> <a href=<?= "book-page.php?isbn=$book->isbn" ?>><?= $book->title ?> </a></td>
                        <td> <a href=<?= "author.php?id=$book->author" ?>><?= "$author->first_name $author->last_name" ?> </a></td>
                        <td> <?= $book->rating ?>
                            <div>
                                <?php
                                $percentage = $book->rating * 20;
                                require TEMPLATES_PATH . '/rating-static-percentage.php';
                                ?>
                            </div>
                        </td>
                        <td> <?= $book->publisher ?></td>

                    </tr> <?php }; ?>
            </tbody>

        </table> <?php } ?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('table').DataTable({
            ordering: true,
        });

    })
</script>
<?php

