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
<!--    <form id="addToList" action="php/AddToListAction.php" method="post">-->
<!--        <select id="actionOnBook" name="answer">-->
<!--            <option value="default"></option>-->
<!--            <option value="currently_reading">currently reading</option>-->
<!--            <option value="finished_reading">finished reading</option>-->
<!--            <option value="to_read">want to read</option>-->
<!--        </select>-->
<!--        <input type="hidden" name="isbn" value="--><?php //= $isbn ?><!--">-->
<!--        <button type="submit" class="btn btn-primary">Submit</button>-->
<!--    </form>-->
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select an Action
        </button>
        <div class="dropdown-menu">
            <form id="addToList" action="php/AddToListAction.php" method="post">
                <input type="hidden" name="isbn" value="<?= $isbn ?>">
                <button type="submit" name="answer" value="currently_reading" class="dropdown-item">Currently Reading</button>
                <button type="submit" name="answer" value="finished_reading" class="dropdown-item">Finished Reading</button>
                <button type="submit" name="answer" value="to_read" class="dropdown-item">Want to Read</button>
            </form>
        </div>
    </div>
    <?php
}
