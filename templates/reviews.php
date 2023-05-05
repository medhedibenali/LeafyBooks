<?php

$userReviewRepository = new UserReviewsRepository();
$reviews = $userReviewRepository->find(['isbn' => $isbn]);

foreach ($reviews as $review) {
    $userRepository = new UserRepository();
    $user = $userRepository->find(['username' => $username]);

    $percentage = ($review->rating) * 20;
?>
    <img class="pdp" src="img/<?= $user->picture ?>" alt="userPicture" />
    <div>
        review by <?= $review->username ?>
    </div>
    <!--the review-->
    <div>
        <?= $review->review ?>
    </div>
    <div>
        <?php
        require dirname(__FILE__) . '/rating-static-percentage.php';
        ?>
    </div>
<?php
}
