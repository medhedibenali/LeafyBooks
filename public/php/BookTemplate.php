<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--page title should be the title of the book-->
  <title>Book Title </title>
  <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/BookTemplate.css">
</head>
<body>
<!--  NAVBAR   -->
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LeafyBooks</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">browse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Books</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>



<div class="container">
  <!--BOOK COVER & BUTTON TO ADD  -->
<div class="ImagePos">
  <img id="cover" src="../pictures/playdead.jpg" alt="Book pic">
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
    <img >
    <h5 style="font-weight: bold"> About the author</h5>
    <img id="authorpic" src="../pictures/authorpic.jpg"> Harlan Coben
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
    <img src="../pictures/catuser.jpg" id="userpic">
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




<script src="../BookTemplate.js"></script>
</body>
</html>