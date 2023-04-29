<?php
if (!isset($_SESSION['username'])) {
?>
    <div class="no-user-error">
        Please <a href="../public/sign-in.php">login</a> or <a href="../public/sign-in.php">signup</a> to post review
    </div>
<?php
}
else {
?>

    <form action="../public/php/AddReview.php" method="post">
        <!--    rating template-->
        <h4>
            write a review!
        </h4>
        <textarea name="review" rows="10" cols="50"></textarea>
        <br>
        <input type="hidden" value="<?= $isbn ?>" name="isbn">
        <button type="submit">Submit
        </button>
    </form>
<?php
}
