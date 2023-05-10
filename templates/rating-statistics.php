<?php
require_once dirname(__FILE__, 2) . '/modules/book_identification/Rating.php';

$percentages = getPercentages($isbn);
?>

<link rel="stylesheet" href="css/rating-bars.css">
<div class="rating">
    <table>
        <tr>
            <td>
                <div class="number-of-stars">5 stars</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" data-aos="example-anim" per="<?= $percentages[5] ?>%" style="max-width:<?= $percentages[5] ?>%"></div>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="number-of-stars">4/4.5 stars</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper"  data-aos="example-anim" per="<?= $percentages[4] ?>%" style="max-width:<?= $percentages[4] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">3/3.5 stars</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" data-aos="example-anim" per="<?= $percentages[3] ?>%" style="max-width:<?= $percentages[3] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">2/2.5 stars</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" data-aos="example-anim" per="<?= $percentages[2] ?>%" style="max-width:<?= $percentages[2] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">1/1.5 stars</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" data-aos="example-anim"  per="<?= $percentages[1] ?>%" style="max-width:<?= $percentages[1] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">0/0.5 stars</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" data-aos="example-anim"  per="<?= $percentages[0] ?>%" style="max-width:<?= $percentages[0] ?>%"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</div>