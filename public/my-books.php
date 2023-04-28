<?php
require_once '../modules/book-activity/ReadActRepository.php';
require_once '../modules/book_identification/BookRepository.php';
require_once 'header.php';


?>

<!-- Your HTML code for the my-books.php page goes here -->

?>
<title><i class="fa-solid fa-leaf"></i> My Books </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/my-books.css">
<!--this part is for sorting the books either by book title or by start date-->
<div class="row">
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

<div class="grid" >
    <div class="text">Cover</div>
    <div class="text">Title</div>
    <div class="text">Author</div>
    <div class="text">Rating</div>
    <div class="text">Status</div>
    <div class="text">Starting Date</div>

    <?php
    $readActRepository = new ReadActRepository();
    $bookRepository = new BookRepository();
    //change user1 with the user connecting
        $sort = $_POST["sort"] ?? 'start_date';
        $orderBy = $_POST["exampleRadios"] ?? 'DESC';

        $list = $readActRepository->find(['username' => 'user1'], ['order_by' => [$sort => $orderBy]]);

        foreach ($list as $element) {
            $book = $bookRepository->find(['isbn' => $element->isbn]);
            echo "<a href='book-page.php?isbn=' . $book->isbn . <img src='" . $book->picture . "' alt='Book Cover'></a>";
            echo "<div>" . $book->title . "</div>";
            echo "<div>" . $book->author . "</div>";
            echo "<div>" . $book->rating . "</div>";
            echo "<div>" . $element->status . "</div>";
            echo "<div>" . $element->start_date . "</div>";
    }
    ?>
</div>



</body>
</html>




