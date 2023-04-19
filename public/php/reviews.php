<?php
foreach (getReviews($ISBN) as $reviewLine)
{
    ?>
    <img class="pdp" src="<?=getUserPicture($reviewLine->username)?>" alt="userPicture"/>
    <div>
        review by <?=$reviewLine->username?>
    </div>
    <!--the review-->
    <div>
        <?=$reviewLine->review?>
    </div>
    <?php
}?>