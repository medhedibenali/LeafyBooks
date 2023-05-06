<div class="content books-content">
        <div class="grid-container">
            <?php
            if(!$books)
            {
                echo '<div> Oops! No results found! </div>';
            }
                else
            {
                foreach ($books as $book) {
                    require dirname(__FILE__, 2) . '/templates/book-item.php';
                }
            }?>
        </div>
        