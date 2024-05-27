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
          <a class="nav-link active" aria-current="page" href="Recipes.php"><i class="fa-solid fa-utensils"></i> All Recipes</a>
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

<div class="container"> 

<form class="row justify-content-between" id="search-form"> 

<div class="col-6 col-md-3 px-2 py-3">
 <div class="input-group rounded">
 <button type="button" id="keyword-search"><span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span></button>
  <input type="text" class="form-control rounded" placeholder="Keyword" aria-label="Search" aria-describedby="search-addon" id="keyword"/>
  
</div>
<div id="search-error" style="color:red;">

</div>
</div>


<div class="col-6 col-md-3 px-2 py-3">
 <select class="form-select" aria-label="Default select example" id="collection-container">
  <option selected value="">Collection</option>
  <option value="Chicken">Chicken</option>
  <option value="Pork">Pork</option>
  <option value="Beef">Beef</option>
  <option value="Seafood">Seafood</option>
  <option value="Vegan">Vegan</option>
</select>
 </div>
 
 <div class="col-6 col-md-3 px-2 py-3">
 <select class="form-select" aria-label="Default select example" id="cuisine-container">
  <option selected value="">Cuisine</option>
  <option value="Itilian">Itilian</option>
  <option value="Japanese">Japanese</option>
  <option value="American">American</option>
  <option value="Chinese">Chinese</option>
  <option value="Korean">Korean</option>
  
</select>
 </div>
 
 <div class="col-6 col-md-3 px-2 py-3">
 <select class="form-select" aria-label="Default select example" id="category-container">
  <option selected value="">Category</option>
  <option value="Soup">Soup</option>
  <option value="Curry">Curry</option>
  <option value="Pasta">Pasta</option>
  <option value="Salad">Salad</option>
  <option value="Dessert">Dessert</option>
  <option value="Drink">Drink</option>
  <option value="Fast Food">Fast Food</option>
</select>
 </div>
    
<div class="pb-3">
    <center>
    <div class="col-6 col-md-3 pb-3">
    <select class="form-select" aria-label="Default select example" id="sort-container">
  <option selected value="">Sort by</option>
  <option value="name">Alphabetically</option>
  <option value="rating">Overall Rating</option>
  <option value="preparation_time">Preparation Time</option>
  </select>
  </div>
  <button type="button" class="btn btn-dark" id="search">Search</button>
  </center>
</div>
    
    
</form>
 
</div>



<div class="container">
<div class="row row-cols-sm-2 justify-content-between" id ="card-container"> 
       
</div>
</div>

<div id="error"></div>
<div class="pt-3" id="footer-fixed">
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

$(document).ready(function() {
$('#search').click(function(){
var keyword = $('#keyword').val();
var category = $('#category-container').val();
var cuisine = $('#cuisine-container').val();
var collection = $('#collection-container').val();
var sort = $('#sort-container').val();
var query = 'SELECT `recipes`.*, `review`.`rating` FROM `recipes` INNER JOIN `review` ON `recipes`.`id` = `review`.`recipe_id`';
if (keyword == "")keyword="%";
query += ' WHERE `recipes`.`name` LIKE "%'+keyword+'%"';

if (category == "")category ="%";
query += ' AND `recipes`.`category` LIKE "'+category+'"';

if (cuisine == "")cuisine ="%";
query += ' AND `recipes`.`cuisine` LIKE "'+cuisine+'"';

if (collection == "")collection ="%";
query += ' AND `recipes`.`collection` LIKE "'+collection+'"';

switch(sort){
case "":
break;
case "name":
query += ' Order by `recipes`.`name`;';
break;
case "preparation_time":
query += ' Order by `recipes`.`preparation_time`;';
break;
case "rating":
query += ' Order by `review`.`rating`;';
break;
default:
break;

}
$.ajax({
                method: 'GET',
                url: 'RecipeAPI.php',
                data: {query:query},
                datatype : 'json'
            }).done(function(msg){
               $('#card-container').html(msg);
                
           });
          
           
	$('#view').click(function(){
		console.log($(this).parent().parent().parent().attr('key'));
		window.location.href="RecipeDetail.php?id="+$(this).parent().parent().parent().attr('key');
	});
	

})
})

 
 </script>
</body>
</html>

