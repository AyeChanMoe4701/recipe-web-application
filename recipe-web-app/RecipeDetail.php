<?php
session_start();
$ID = $_REQUEST['id'];
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
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
          <a class="nav-link" href="Home.php"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="Recipes.php"><i class="fa-solid fa-utensils"></i> All Recipes</a>
        </li>
        
        
      </ul>
          
         <?php
    if (! isset($_SESSION['user'])) {
        echo '<a class="navbar-brand ms-auto" href="register.php"><i class="fa-solid fa-user"></i></a>';
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

<?php
echo '<div class="recipe-detail container" key = ' . $ID . '>';
?>
<div id = "detail-container">


    	
</div>
<hr>
    	<h4>Add a Review</h4>
    	<form>
    		<div class="mt-4">
                <label for="comment" class="form-label fw-bold"><i class="login-icon fas fa-user"></i> Comment</label>
                <input type="text" class="form-control comment-input p-2" id="comment" name="comment" value="" onClick="this.select()">
                <div id="comment-error" style="color:red;">
                
                </div>
            </div>
            <p class="form-label fw-bold"><i class="fas fa-star"></i> Rating</p>
             <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2"/>
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" checked/>
                <label for="star1" title="text">1 star</label>
             </div>
             <button id="review-submit" class="btn btn-dark">Submit</button>
    	</form>
	</div>

</div>

<div class="pt-3">
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      
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


<script>
$('document').ready(function(){

	var id = $('.recipe-detail').attr('key');
	
	 $.ajax({
		type: 'GET',
        url: 'recipeDetailAPI.php',
        datatype: 'json',
        data: {id:id}
	}).done(function(msg){
		$('#detail').html(msg);
		});
								
});
</script>
</body>
</html>
