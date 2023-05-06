<?php
$icons=array(
'fantasy'=>"fas fa-wand-sparkles fa-6x",
'sc-fi'=>"fa-solid fa-user-astronaut fa-6x",
'thriller'=>"fa-solid fa-user-secret fa-6x",
'romance'=>"fa-regular fa-heart fa-6x",
'young adult'=>"fas fa-transporter fa-4x",
);
?>
<div class="category-box">
    <div class="discover-more">
        Discover your next favourite book on Leafy Books
    </div>
<div class="flex-box">

    <?php
        $indice=2;
        foreach($icons as $key => $value)
        {
    ?>
    <div class="flex-item" >
        <div class="picture">
            <p class="genre"><?=$key?></p>
            <i class="<?=$value?>" style="color:black;" id="my-icons"></i>
        </div>
        <div class="carousel-books">
            <div id="<?='carouselExampleIndicators'.$indice?>" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="<?='#carouselExampleIndicators'.$indice?>" data-slide-to="0" class="active"></li>
                    <li data-target="<?='#carouselExampleIndicators'.$indice?>" data-slide-to="1"></li>
                    <li data-target="<?='#carouselExampleIndicators'.$indice?>" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner2">
                    <div class="carousel-item active" >
                        <img class="d-block w-100" src="<?=$pictures['picture1']?>" alt="First slide" id="f1">
                    </div>
                    <div class="carousel-item" >
                        <img class="d-block w-100" src="<?=$pictures['picture2']?>" alt="Second slide" id="f2" >
                    </div>
                    <div class="carousel-item" >
                        <img class="d-block w-100" src="<?=$pictures['picture3']?>" alt="Third slide" id="f3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="<?= '#carouselExampleIndicators'.$indice?>"  role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="<?= '#carouselExampleIndicators'.$indice?>"  role="button" data-slide="next" ">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
    <?php

            $indice=$indice+1;
    }
    ?>
</div>
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


</div>
