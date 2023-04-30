<div class="book">
    <a href=<?="book-page.php?isbn=$book->isbn"?>>
        <div class="image book_cover center">
            <img src=<?= $book->cover ?> class="image__img book_cover center"  />
            <div class="image__overlay image__overlay--blur book_cover">
                <p class="image__description">
                    <?= $book->synopsis?>
                </p>
            </div>
        </div>

    </a>

    <div class="book_info center">
        <a class="book_title center" href=<?="book-page.php?isbn=$book->isbn"?>><?= $book->title ?></a>
        <div class="book_author center"> <span>By: </span> <?= $book->author ?></div>
        <div class="book_rating center">
            <div class="rating">
                <div class="rating-lower">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                </div>
                <div class="rating-upper" style="width:<?= $book->rating *20 ?>%">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                </div>
            </div>
            (<?= $book->rating ?>)</div>
    </div>
</div>