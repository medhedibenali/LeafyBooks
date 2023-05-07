<?php
$userReviewRepository = new UserReviewsRepository();
$reviews = $userReviewRepository->find(['isbn' => $isbn]);
$userRepository = new UserRepository();
foreach ($reviews as $review) {
    $user=$userRepository->find(['username'=>$_SESSION['username']]);
    $percentage = ($review->rating) * 20;
?>
    <div class="Name_Review">
        <img class="pdp" src="img/<?= $user->picture ?>" alt="userPicture" style="margin-right: 10px;" />
        <div>
            <div><?= $review->username ?></div>
            <?php require dirname(__FILE__) . '/rating-static-percentage.php'; ?>
        </div>
    </div>
    <div style="font-size:0.8rem; color:#808080;">
        <?php
        $status = $review->is_updated ? "Updated" : "First submitted";
        echo $status . " on " . $review->time_submitted;
        ?>
    </div>
    <br>
    <!--the review-->
    <div style="font-family:'DecoType Naskh';font-size:1.2rem;">
        <?= $review->review ?>
    </div>
    <br>
<?php
}

