<?php
require_once dirname(__FILE__, 2) . '/modules/book_identification/ProcessBookIdentity.php';

foreach (getReviews($isbn) as $reviewLine) {
    $percentage = ($reviewLine->rating) * 20;
?>
    <img class="pdp" src="<?= getUserPicture($reviewLine->username) ?>" alt="userPicture" />
    <div>
        review by <?= $reviewLine->username ?>
    </div>
    <!--the review-->
    <div>
        <?= $reviewLine->review ?>
    </div>
    <div>
        <?php
        require dirname(__FILE__) . '/rating-static-percentage.php';
        ?>
    </div>
    <br>
<?php
}
