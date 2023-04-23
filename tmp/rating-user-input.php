<?php
require_once "../public/book-identity.php";
?>
<form action="../public/php/add-review-&-rating-process.php" method="post">
    <!--    rating template-->
    <fieldset class="rate" >
        <input type="radio" id="rating10"name="rate" value="5" /><label for="rating10" title="5 stars"></label>
        <input type="radio" id="rating9" name="rate" value="4.5" /><label class="half" for="rating9" title="4 1/2 stars"></label>
        <input type="radio" id="rating8" name="rate" value="4" /><label for="rating8" title="4 stars"></label>
        <input type="radio" id="rating7" name="rate" value="3.5" /><label class="half" for="rating7" title="3 1/2 stars"></label>
        <input type="radio" id="rating6" name="rate" value="3" /><label for="rating6" title="3 stars"></label>
        <input type="radio" id="rating5" name="rate" value="2.5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
        <input type="radio" id="rating4" name="rate" value="2" /><label for="rating4" title="2 stars"></label>
        <input type="radio" id="rating3" name="rate" value="1.5" /><label class="half" for="rating3" title="1 1/2 stars"></label>
        <input type="radio" id="rating2" name="rate" value="1" /><label for="rating2" title="1 star"></label>
        <input type="radio" id="rating1" name="rate" value="0.5" /><label class="half" for="rating1" title="1/2 star"></label>

    </fieldset>

    <br>
    <br>
    <br>
    <h4>
        write a review!
    </h4>

    <textarea name = "review" rows="10" cols="50"></textarea>
    <br>
    <input type="hidden" value="<?=$ISBN?>" name="ISBN">
    <button type = "submit" >Submit
    </button >

</form>

