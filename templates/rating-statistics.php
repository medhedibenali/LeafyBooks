
<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/book_identification/ProcessRatingStatistics.php';

$per = GetPercentage();

?>
<link rel="stylesheet" href="css/rating-bars.css">
<div class="rating">
    <table>
        <tr>
            <td>
                <div class="number-of-stars">5★</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" per="<?= $per[5] ?>%" style="max-width:<?= $per[5] ?>%"></div>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="number-of-stars">4/4.5★</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" per="<?= $per[4] ?>%" style="max-width:<?= $per[4] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">3/3.5★</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" per="<?= $per[3] ?>%" style="max-width:<?= $per[3] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">2/2.5★</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" per="<?= $per[2] ?>%" style="max-width:<?= $per[2] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">1.5/1★</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" per="<?= $per[1] ?>%" style="max-width:<?= $per[1] ?>%"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="number-of-stars">0.5★</div>
            </td>
            <td>
                <div class="rating-bar">
                    <div class="ratingper" per="<?= $per[0] ?>%" style="max-width:<?= $per[0] ?>%"></div>
                </div>
            </td>
        </tr>
    </table>
</div>