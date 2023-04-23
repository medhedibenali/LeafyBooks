<?php
require_once '../modules/book-activity/ReadActRepository.php';
require_once '../modules/book_identification/BookRepository.php';
require_once 'header.php'
?>
<link rel="stylesheet" href="my-books.css">
<body>

<table class="table">
    <tr>
        <th>Cover</th>
        <th>Title</th>
        <th>Author</th>
        <th>Rating</th>
        <th>Status</th>
        <th>Starting Date</th>
    </tr>
    <?php
    $readActRepository = new ReadActRepository();
    $bookRepository = new BookRepository();
    //change user1 with the user connecting
    $liste = $readActRepository->find(['username' => 'user1']);

    foreach ($liste as $element) {
        echo "<tr>";
        echo "<td><img src='" . $bookRepository->find(['ISBN' => $element->ISBN])->picture . "' alt='Book Cover'></td>";
        echo "<td>" . $bookRepository->find(['ISBN' => $element->ISBN])->title . "</td>";
        echo "<td>" . $bookRepository->find(['ISBN' => $element->ISBN])->author . "</td>";
        echo "<td>" . $bookRepository->find(['ISBN' => $element->ISBN])->rating . "</td>";
        echo "<td>" . $element->status . "</td>";
        echo "<td>" . $element->start_date . "</td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>




