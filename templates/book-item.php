<div class="book">
    <a href=<?= "book-page.php?isbn=$book->isbn" ?>>
        <div class="image book_cover center">
            <img src=<?=  'img/books/'. $book->image ?> class="image__img book_cover center" />
            <div class="image__overlay image__overlay--blur book_cover">
                <p class="image__description">
                    <?= $book->synopsis ?>
                </p>
            </div>
        </div>

    </a>

    <a class="book_title center" href=<?= "book-page.php?isbn=$book->isbn" ?>><?= $book->title ?></a>
    <!--      add a link to the authors page-->
    <div class="book_author center"> <span>By: </span><a href=<?= "author.php?id=$book->id" ?>><?= $book->first_name . ' ' . $book->last_name ?> </a> </div>
    <div>
        <div class="book_rating center">
            <div class="rating">
                <div class="rating-lower">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                </div>
                <div class="rating-upper" style="width:<?= $book->rating * 20 ?>%">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                </div>
            </div>
        </div>

    </div>
    <div class="center">
        (<?= $book->rating ?>)
    </div>
</div>