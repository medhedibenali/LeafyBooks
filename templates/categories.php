<?php
$icons=array(
'fantasy'=>"fas fa-wand-sparkles",
'sc-fi'=>"fa-solid fa-user-astronaut",
'thriller'=>"fa-solid fa-user-secret",
'romance'=>"fa-regular fa-heart",
'young adult'=>"fas fa-transporter",
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
            <div class="category-head">
            <p class="genre"><?=$key?></p>
                <i class="<?=$value?>"></i>
            </div>
            <img src="img/fantasy.png">
            <p class="genre-description">
                This award recognizes the worldbuilders; the writers who take us on fantastical adventures, heroic battles, and epic journeys to save people, kingdoms, or dynasties. In a world of your own imagination, fantasy explores the magical and mythical unknown, ancient folklore, and mythical creatures. Is your character a soon-to-be queen living in a magical kingdom, or a dragon riding the winds of an ancient land? Writers penning the next Descendants of the Crane, The Witcher, or Lord of the Rings entered their stories in this category.
            </p>
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
