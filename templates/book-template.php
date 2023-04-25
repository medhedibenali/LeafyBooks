<?php
require_once 'header.php'
?>

<link rel="stylesheet" href="../public/css/book-template.css">


<div class="container">
  <!--BOOK COVER & BUTTON TO ADD  -->
<div class="ImagePos">
  <img id="cover" src="pictures/playdead.jpg" alt="Book pic">
  <button id="addtolist">Add to list</button>
</div>

  <!--INFO ABOUT THE BOOK   -->
<div class="box1">
  <h1 style="font-family: 'Britannic Bold';font-size: 50px">Play Dead</h1>

  <!--NUMBER OF PAGES AND PUBLISHING DATE  -->
  <p style="font-family:  'Times New Roman, serif'">
    452 Pages
    <br>
    First published June 1, 1990
  </p>
  <p style="font-size: 20px;font-family: 'DecoType Naskh';">By Harlan Coben</p>
  <div>
    Rate this book REVIEW THINGY
  </div>
  <p id="synopsis">
    Theirs was a marriage made in tabloid heaven, but no sooner had supermodel Laura Ayars and Celtics star David Baskin said “I do” than tragedy struck. While honeymooning on Australia’s Great Barrier Reef, David went out for a swim—and never returned.
    Now widowed and grieving, Laura has a thousand questions and no answers. Her search for the truth will draw her into a web of lies and deception that stretches back thirty years—while on the court at Boston Garden, a rookie phenom makes his spectacular debut...
  </p>
  <p style="color: grey;margin-right: 10px;font-family: 'DecoType Naskh';font-size: 20px">Genres </p>
  <ul id="liste" style="list-style: none;">

    <li id="lii" >Mystery</li>
    <li id="lii">Thriller</li>
    <li id="lii">Fiction</li>
    <li id="lii">Crime</li>
    <li id="lii">Suspense</li>
    <li id="lii">Murder</li>
  </ul>


  <!--AUTHOR INFO -->
  <div class="author">

    <h5 style="font-weight: bold"> About the author</h5>
    <img id="authorpic" src="../public/pictures/authorpic.jpg"> Harlan Coben
    <br><br>
    Harlan Coben is a #1 New York Times bestselling author and one of the world's leading storytellers. His suspense novels are published in forty-five languages and have been number one bestsellers in more than a dozen countries with seventy-five million books in print worldwide.

    His books have earned the Edgar, Shamus, and Anthony Awards, and many have been developed into Netflix Original Drama series, including his adaptations of The Stranger, The Innocent, Gone for Good and The Woods. His most recent adaptation for Netflix, Stay Close, premiered on December 31, 2021 and stars Cush Jumbo, James Nesbitt, and Richard Armitage.
  </div>

  <!--RECOMMENDING LIST OF BOOKS CAROUSEL MAYBE  -->
    <div style="margin-top: 70px;">
  <h2 style="font-family:'DecoType Naskh';font-style:italic "> Readers also enjoy</h2>
    </div>
<div>
  BOOKSSSS
</div>

<hr style="margin-top: 7em">


  <!--WRITTEN REVIEWS  -->
  <div>

    <h2 style="font-family:'DecoType Naskh';">Ratings & Reviews</h2>
    <img src="../public/pictures/catuser.jpg" id="userpic">
    <br>
    <p id="question">
      What do you think ?
    </p>
    <p style=" display: flex;justify-content: center;">
    Review stars
    <button onclick="scrollTobottom()" class="writereview">Write a review</button>
    </p>

  </div>
</div>
</div>



<script src="js/book-template.js"></script>
</body>
</html>