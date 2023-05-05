<?php
$userReviewRepository = new UserReviewsRepository();
$reviews = $userReviewRepository->find(['isbn' => $isbn]);
$userRepository = new UserRepository();
foreach ($reviews as $review) {
    $user=$userRepository->find(['username'=>$_SESSION['username']]);
    $percentage = ($review->rating) * 20;
?>
    <div style="font-family:'DecoType Naskh';font-size:1.2rem;">
    <img class="pdp" src="img/<?= $user->picture ?>" alt="userPicture" />      <?= $review->username ?>
    </div>
    <!--rating-->
    <div>
        <?php
        require dirname(__FILE__) . '/rating-static-percentage.php';
        ?>
    </div>
    <!--the review-->
    <div style="font-family:'DecoType Naskh';font-size:1.2rem;">
        <?= $review->review ?>
    </div>

<?php
}
