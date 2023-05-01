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

    <form action="/php/AddReview.php" method="post">
        <!--    rating template-->
        <h3 style="font-family: 'Britannic Bold';font-style:italic;">
            write a review !
        </h3>
        <div style="position:relative;">
        <textarea name="review" rows="5" cols="100" class="textarea"></textarea>
        <br>
        <input type="hidden" value="<?= $isbn ?>" name="isbn">
        <button type="submit" class="writereview" style="position: relative; bottom: 0; right: 0;left: 90%; margin-top: 10px;">Submit</button>
        </div>
    </form>
<?php
}
