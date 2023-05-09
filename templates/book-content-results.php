<div class="content books-content">
    <div class="grid-container">
        <?php
        if (!$books) {
            echo '<div> Oops! No results found! </div>';
        } else {
            foreach ($books as $book) {
                require dirname(__FILE__) . '/book-item.php';
            }
        } ?>
    </div>
</div>