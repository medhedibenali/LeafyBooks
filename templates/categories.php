<?php
$icons=array(
'fantasy'=>"fas fa-wand-sparkles fa-2x",
'sciFi'=>"fa-solid fa-user-astronaut fa-2x",
'thriller'=>"fa-solid fa-user-secret fa-2x",
'romance'=>"fa-regular fa-heart fa-2x",
'youngAdult'=>"bi bi-cloud-rain-fill cloudicon",
);

$genrePicture=array(
    'fantasy'=>"img/fantasy.png",
    'sciFi'=>"img/sci-fi.png",
    'thriller'=>"img/thriller.png",
    'romance'=>"img/romance.png",
    'youngAdult'=>"img/ya.png",
);

$fantasyString="Do you feel like going  on
 fantastical adventures, heroic battles, and epic journeys to save people, kingdoms, 
 or dynasties ? In a world of your own imagination, fantasy explores the magical and mythical unknown, 
 ancient folklore, and mythical creatures. Are you looking for characters like  a soon-to-be queen living in a magical kingdom, 
 or a dragon riding the winds of an ancient land? Books penning the next Descendants of the Crane, 
The Witcher, or Lord of the Rings or those classics themselves are then for you.";

$thrillerString="Do you like books that keep you  on the edge of your seat and glued to your screen. 
From solving crimes to racing against the clock to stop one from happening, 
the Mystery & Thriller genre is packed with stories having suspenseful plots, high stakes, 
and satisfying endings. Stories in this category will help bring out your inner detective! 
Spanning from bestsellers like Gone Girl, When No One Is Watching, or Behind Her Eyes to hidden-gems for you to discover ";

$sciFiString="This genre celebrates the ahead-of-their-age books  who evoke a sense of wonder, 
unravel new realities, and send us shooting into the void. 
The Science Fiction genre recognizes stories that center around science and technology—like Star Trek, 
Fahrenheit 451, or The Fifth Season—and challenge us to think big and differently about the world we live in. 
Space operas set in a galaxy far away, near-future dystopias, alternate histories..you get the picture.";

$romanceString="This genre celebrates the swoon-worthy storytellers who tug on our heartstrings 
and demand our emotional investment. From passionate cowboys to billionaire rendezvous and 
squee-worthy soulmates, these stories focus on adult characters and themes within modern, real-world settings. 
The Romance genre is all about stories that depict a central love story that compels us to hope for a happy ending. 
This category includes stories like The Kiss Quotient, The Hating Game, or The Wedding Date.";

$youngAdultString="This genre champions stories that explore the teen experience, from coping with loss to exploring gender, 
and navigating high-school crushes and first romantic experiences. The Young Adult genre recognizes modern, 
real-world stories that capture an authentic teen voice and the emotional stakes of growing up. 
Be prepared for coming-of-age stories from all walks of life, 
similar to the likes of To All the Boys I’ve Loved Before, The Hate U Give, and Simon vs. the Homo Sapiens Agenda.";

?>
<div data-aos="fade-up">
<div class="category-box">
    <div class="discover-more">
        Discover your next favourite book on Leafy Books
    </div>
<div class="flex-box2">

    <?php
        $indice=2;
        foreach($icons as $key => $value)
        {
    ?>
            <?php
            if ($indice%2==0)
            {
            ?>
                <div data-aos="fade-right" data-aos-offset="200">
        <?php
            }
        else
            {
        ?>
                <div data-aos="fade-left" data-aos-offset="200"  data-aos-delay="200">

                    <?php
            }
        ?>
    <div class="flex-item" id="#my_flex">
        <div class="picture">
            <div class="category-head">
                <p class="genre"><?=$key?></p>
                <i class="<?=$value?>" style="color:white;" id="my-icons"></i>
            </div>
            <img src="<?=$genrePicture[$key]?>" class="genre-picture">
            <p class="genre-description">
                <?=${$key . "String"}?>
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
                        <a href="book-page.php?isbn=<?= ($pictures[$key][0])->isbn ?>">
                        <img class="d-block w-100" src="<?=($pictures[$key][0])->picture?>" alt="First slide" id="f1">
                        </a>
                    </div>
                    <div class="carousel-item" >
                        <a href="book-page.php?isbn=<?= ($pictures[$key][1])->isbn ?>">
                        <img class="d-block w-100" src="<?=($pictures[$key][1])->picture?>" alt="Second slide" id="f2" >
                        </a>
                    </div>
                    <div class="carousel-item" >
                        <a href="book-page.php?isbn=<?= ($pictures[$key][2])->isbn ?>">
                        <img class="d-block w-100" src="<?=($pictures[$key][2])->picture?>" alt="Third slide" id="f3">
                        </a>
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
</div>
</div>