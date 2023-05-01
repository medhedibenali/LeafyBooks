
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--page title should be the title of the book-->
  <title>Book Title </title>
    <!--<div class="BookTitle">INSERT CODE PHP </div> -->
  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="css/BookTemplate.css">
  <link rel="stylesheet" href="css/UserTemplate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- adding carousel -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


  <!-- pie charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>

<!-- adding carousel --> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<!--  NAVBAR   -->
<nav class="navbar navbar-expand-lg t d-flex justify-content-center sticky-lg-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-leaf"></i> LeafyBooks</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav" style="margin-left: 15rem;">
        <li class="nav-item">
          <a class="nav-link" href="#" style="margin-right: 20px;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="margin-left: 20px; margin-right: 20px;">Browse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="margin-left: 20px; margin-right: 20px;">My Books</a>
        </li>
        <li class="nav-item">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 20rem;margin-left: 3rem">
            <i class="fa-solid fa-magnifying-glass" ></i>
          </form>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav" >
        <li class="nav-item">
          <a class="nav-link" href="#"><img src="pictures/user.png" class="profilePic"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

