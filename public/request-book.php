<?php
require_once dirname(__FILE__, 2) . '/config/config.php';

if (!isset($_SESSION)) {
    session_start();
}

$pageTitle = "Request Book";

require TEMPLATES_PATH . '/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h2 class="text-center py-2"> <small style=" font-size: 16px;
                    font-family:'Lucida Console', 'Courier New', monospace; "> psst we want your help!</small><br> Request To Add A Book To Our Amazing Collection!
                    </h2>
                    <hr>

                    <?php

                    if (isset($_SESSION['request-error'])) {
                    ?>
                        <div class="alert alert-danger">
                            Please Fill in the Blanks
                        </div>
                    <?php
                        unset($_SESSION['request-error']);
                    }

                    if (isset($_SESSION['request-success'])) {
                    ?>
                        <div class="alert alert-success">
                            Your Message Has Been Sent
                        </div>
                    <?php
                        unset($_SESSION['request-success']);
                    }

                    ?>

                </div>
                <div class="card-body">
                    <form action="php/BookRequestManager.php" method="post">
                        <input type="email" name="email" placeholder="Email" class="form-control mb-2">
                        <input type="text" name="bookTitle" placeholder="Book Title" class="form-control mb-2">
                        <input name="author" class="form-control mb-2" placeholder="Author"></input>
                        <button class="btn btn-success" name="btn-send"> Send </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require TEMPLATES_PATH . '/footer.php';
