<?php
require_once '../public/book-identity.php';
if (!isset($_SESSION['username'])) {
    ?>
    <div class="no-user-error">
        Please <a href="../sign-in.php">login</a> or <a href="../sign-up.php">signup</a> to post review
    </div>
    <?php
} //        Rating Stars
else {
    ?>
    <form id="addToList" action="php/AddToListAction.php" method="post">
        <select id="actionOnBook" name="answer">
            <option value="default"></option>
            <option value="currently_reading">currently reading</option>
            <option value="finished_reading">finishedreading</option>
            <option value="to_read">want to read</option>
        </select>
        <input type="hidden" name="isbn" value="<?= $isbn ?>">
    </form>
    <br>
    <br>
    <?php
}