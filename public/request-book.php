<?php
$pageTitle="Request Book";
include_once dirname(__FILE__,2).'/templates/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h2 class="text-center py-2"> <small style=" font-size: 16px;font-family: "Lucida Console", "Courier New", monospace; "> psst we want your help!</small><br> Request To Add A Book To Our Amazing Collection!
                    </h2>
                    <hr>
                    <?php
                    $Msg = "";
                    if(isset($_GET['error']))
                    {
                        $Msg = " Please Fill in the Blanks ";
                        echo '<div class="alert alert-danger">'.$Msg.'</div>';
                    }

                    if(isset($_GET['success']))
                    {
                        $Msg = " Your Message Has Been Sent ";
                        echo '<div class="alert alert-success">'.$Msg.'</div>';
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
include_once dirname(__FILE__,2).'/templates/footer.php'
?>
