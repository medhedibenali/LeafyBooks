<?php

if (!isset($_SESSION['username'])) {
?>
    <div class="no-user-error1">
        Please <a href="sign-in.php">sign-in</a> or <a href="sign-up.php">sign-up</a> to post a review
    </div>
<?php
} //        Rating Stars
else {
?>
<div class="btn-group btn-group-1" >
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:darkgreen;border:none;">
            Add to List
        </button>
        <div id="addToList" class="dropdown-menu">
            <form  action="php/AddToListAction.php" method="post">
                <input type="hidden" name="isbn" value="<?= $isbn ?>">
                <button type="submit" name="answer" value="currently_reading" class="dropdown-item">Currently Reading</button>
                <button type="submit" name="answer" value="finished_reading" class="dropdown-item">Finished Reading</button>
                <button type="submit" name="answer" value="to_read" class="dropdown-item">Want to Read</button>
            </form>
        </div>
</div>
    <?php
}
