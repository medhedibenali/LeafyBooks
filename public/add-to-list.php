<?php
require_once '../public/book-identity.php';
if(!isset($_SESSION['username']))
{
?>
    <link rel="stylesheet" href="css/book-template.css">
    <div class="no-user-error">
        Please <a href="../sign-in.php">login</a> or <a href="../sign-up.php">signup</a> to post review
    </div>
<?php
}

//        Rating Stars
else
{

?>
<form id="addToList" action="php/add-to-list-process.php" method="post">
        <select id="dropdown" name="answer">
            <option value="default"></option>
            <option value="currentlyreading">currently reading</option>
            <option value="finishedreading">read</option>
            <option value="toread">want to read</option>
        </select>
        <input type="hidden" name="ISBN" value="<?=$isbn?>">
    </form>
    <br>
    <br>
<?php

}
?>
<script src="../templates/js/book-template.js"></script>