<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/mystyle.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/17c4aa7336.js" crossorigin="anonymous"></script>
    <title>Delicious Recipes</title>
    
</head>

<body>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand mx-0 my-0 pe-3" href="Home.php"><img src="images/logo.png" height="35" width="35"> Delicious Recipes</a>
     
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Home.php"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="Recipes.php"><i class="fa-solid fa-utensils"></i> All Recipes</a>
        </li>
                        
      </ul>
      
      <?php
    if (! isset($_SESSION['user'])) {
        echo '<a class="navbar-brand ms-auto" href="login.php"><i class="fa-solid fa-user"></i></a>';
    } else {
        $userImg = $_SESSION['user']['image'];
        $userName = $_SESSION['user']['username'];
        if ($userImg == "") {
            echo '<a class="navbar-brand ms-auto" href="my_profile.php"><i class="fa-solid fa-user"></i></a>';
        } else
            echo <<<USER
        <a href="my_profile.php"><img class="profile-img" src="$userImg" alt="$userName"></img></a>
USER;
    }
    ?>
          
         
                 
    </div>
  </div>
</nav>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>

  </div>
  <div class="carousel-inner">
    
    <div class="carousel-item active">
    
      <img src="images/caurosel1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-sm-block">
      
      <div class="p-2 mb-2 text-light"><h5>Food may be essential as fuel for the body, But good food is fuel for the soul.</h5></div>
      </div>
    
    </div>
    
    <div class="carousel-item">
   
      <img src="images/caurosel2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-sm-block">
        
      <div class="p-2 mb-2 text-light"><h5>You don't need a silver fork to eat good food.</h5></div>
      </div>

    </div>
    
    <div class="carousel-item">

      <img src="images/caurosel3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-sm-block">
      <div class="p-2 mb-2 text-light"><h5>Only the pure in the heart can make a good soup.</h5></div>
      </div>

    </div>   
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container py-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-lg-11 mb-4 mb-lg-0">

<div class="panel mb-3 p-4" style="border-radius: .5rem; background-color: #f4f5f7;">
<center>
<div class="about" id="about">
    <h3>We’re a group of foodies who love cooking and the internet</h3>
    <br>
    <p>Food qualities braise chicken cuts bowl through slices butternut snack. Tender meat juicy dinners. One-pot low heat plenty of time adobo fat raw soften fruit. sweet renders bone-in marrow richness kitchen, fricassee basted pork shoulder. Delicious butternut squash hunk.</p>
    
  </div>
</center>
</div>

<div class="panel mb-3 p-4" style="border-radius: .5rem; background-color: #f4f5f7;">
<center>
<div class="about" id="chef">
    <div class="text-center">
    <div class="container">
        <div class="row">
            <div class="mx-2 col-md-12">
                <h3 class="mb-3" contenteditable="true">Meet our chefs</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" alt="Card image cap" width="200" src="https://i.imgur.com/Ur43esv.jpg">
                <h6> <b>Marco d’Oliver-Ramsay</b> </h6>
            </div>
            <div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="https://i.imgur.com/8RKXAIV.jpg" alt="Card image cap" width="200">
                <h6> <b>Sam ilana</b> </h6>
            </div>
            <div class="col-lg-4 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="https://i.imgur.com/J6l19aF.jpg" width="200">
                <h6> <b>Maria Samantha</b> </h6>
            </div>
        </div>
    </div>
</div>
  </div>
</center>
</div>

<div class="panel mb-3 p-4" style="border-radius: .5rem; background-color: #f4f5f7;">
<center>
<div class="about" id="history">
    <h3>Simple, Easy Recipes for all</h3>
    <br>
    <p>Juicy meatballs brisket slammin' baked shoulder. Juicy smoker soy sauce burgers brisket. polenta mustard hunk greens. Wine technique snack skewers chuck excess. Oil heat slowly. slices natural delicious, set aside magic tbsp skillet, bay leaves brown centerpiece.</p>
  </div>
</center>
</div>

</div>
</div>
</div>

<div class="pt-3">
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.twitter.com" role="button"
        ><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com" role="button"
        ><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com" role="button"
        ><i class="fab fa-instagram"></i></a>
      
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="Home.php">MyRecipes.com</a>
  </div>
  <!-- Copyright -->
</footer>
</div>


</body>
</html>
