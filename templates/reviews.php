<?php

$userReviewRepository = new UserReviewsRepository();
$reviews = $userReviewRepository->find(['isbn' => $isbn]);

$userRepository = new UserRepository();
if(isset($reviews))
{
foreach ($reviews as $review) {
   
         $user = $userRepository->find(['username' => $review->username]);
    
?>
    <div class="Name_Review">
                 <img class="pdp" src="img/users/<?= $user->image ?>" alt="userPicture" style="margin-right: 10px;" />
        <?php
             }
             ?>
        <div>
            <div>
                <?php if (isset($review) )echo $review->username ?>
            </div>
            <?php
            if  (isset($review)&&$review->rating !== null) {
                $percentage = ($review->rating) * 20;
                require dirname(__FILE__) . '/rating-static-percentage.php';
            }
            ?>
        </div>
    </div>
    <div style="font-size:0.8rem; color:#808080;">
        <?php
        if(isset($review))
        {
        $status = $review->is_updated ? "Updated" : "First submitted";
        echo $status . " on " . $review->time_submitted;
        }
        ?>
    </div>
    <!--the review-->
    <?php
    if (isset($review) && $review->review !== null) {
    ?>
        <div style="font-family:'DecoType Naskh';font-size:1.2rem;">
            <?= $review->review ?>
        </div>
    <?php
    }
    ?>
    <br>

<?php

}
?>