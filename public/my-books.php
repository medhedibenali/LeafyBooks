<?php
session_start();

require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';
require TEMPLATES_PATH . '/verification.php';

$pageTitle = 'My Books';

$stylesheets = array(
    'css/my-books.css',
    'css/static-rating.css',
);

require TEMPLATES_PATH . '/header.php';

$userRepository = new UserRepository();
$user = $userRepository->find(['username' => $_SESSION['username']]);

$readActRepository = new ReadActRepository();
$bookRepository = new BookRepository();
?>

<!--this part is for sorting the books either by book title or by start date-->
<div class="sorting_row">
    <div class="col-md-3">
        <!--this is the drop-down menu to select the column to order by-->
        <form method="post" action="my-books.php">
            <div class="form-group d-flex align-items-center">
                <label for="exampleFormControlSelect1" id="sort">Sort</label>
                <select class="form-control" id="exampleFormControlSelect1" name="sort">
                    <option value="start_date">Start Date</option>
                    <option value="title">Book Title</option>
                </select>
            </div>

    </div>

    <div class="col-md-4">
        <!--this part is for selecting if it is ascending order or descending-->
        <div class="form-group d-flex align-items-center">
            <label>Order by:</label>
            <div class="form-check d-flex align-items-center ml-3">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="desc" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Descending
                </label>
            </div>
            <div class="form-check d-flex align-items-center ml-3">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="asc">
                <label class="form-check-label" for="exampleRadios2">
                    Ascending
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Apply</button>
    </form>
</div>

<!--this css grid that contains the books added by the user-->

<div class="grid">
    <div class="text">Cover</div>
    <div class="text">Title</div>
    <div class="text">Genre</div>
    <div class="text">Author</div>
    <div class="text">AVG Rating</div>
    <div class="text">My Rating</div>
    <div class="text">Status</div>
    <div class="text">Starting Date</div>

    <?php

    //change user1 with the user connecting
    $sort = $_POST["sort"] ?? 'start_date';
    $orderBy = $_POST["exampleRadios"] ?? 'DESC';

    $list = $readActRepository->find(['username' => 'user1'], ['order_by' => [$sort => $orderBy]]);
    foreach ($list as $element) {
        $book = $bookRepository->find(['isbn' => $element->isbn]);
        $percentage = ($book->rating) * 20;
        echo "<a href='book-page.php?isbn=" . $book->isbn . "'> <img src='img/books/" . $book->image . "' alt='Book Cover'></a>";
        echo "<div class='content'>" . $book->title . "</div>";
        echo "<div class='content'>" . $book->genre . "</div>";
        echo "<div class='content'>" . $book->author . "</div>";
        echo "<div class='content'>" . $book->rating . "</div>";
    ?>
        <div class="content">
            <?php
            require TEMPLATES_PATH . '/rating-static-percentage.php';
            ?>
        </div>
    <?php
        echo "<div class='content'>" . $element->status . "</div>";
        echo "<div class='content'>" . $element->start_date . "</div>";
    }
    ?>
</div>

<?php
require TEMPLATES_PATH . '/footer.php';
