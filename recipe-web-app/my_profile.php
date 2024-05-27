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
          <a class="nav-link active" aria-current="page" href="Home.php"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="Recipes.php"><i class="fa-solid fa-utensils"></i> All Recipes</a>
        </li>
                        
      </ul>
        <?php  
       if (! isset($_SESSION['user'])) {
        header('location:login.php');
    } else {
       $userImg = $_SESSION['user']['image'];
        $userName = $_SESSION['user']['username'];
        $userEmail = $_SESSION['user']['email'];
        $role = $_SESSION['user']['role'];
        $userPhone = $_SESSION['user']['phone'];
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


    
<section>
  <div class="container py-3">
    <div class="row d-flex justify-content-between align-items-center">
      <div class="col col-lg-11 mb-4 mb-lg-0">
        <div class="panel mb-3" style="border-radius: .5rem; background-color: #f4f5f7;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center bg-dark text-white"
              style="border-radius: .5rem;">
              
              <?php
                if ($userImg == "") {
                    echo '<img class="img-fluid d-block mt-5 mb-3 mx-auto rounded-circle" alt="' .$userName .'" width="150" src="images/profile-icon-white-7.jpg">';
                } else {
                    echo '<img class="img-fluid d-block mt-5 mb-3 mx-auto rounded-circle" alt="' .$userName .'" width="150" src="' . $userImg . '">';
                }
                ?>
                
                
              <div class="mb-3">
              <input class="btn btn-light" type="button" value="Upload Photo">
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="panel p-4">
       			<center><h2>Personal Information</h2></center>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  
                 <center> 
                    <?php
                       echo '<h3>' . $userName . '</h3>';
    	               echo '<p><i class="fas fa-user"></i>&nbsp;' . $role . '</p>';
                    ?>
                  </center> 
                  <hr class="mt-2 mb-3">
                </div>
               <div class="container">
                <div class=" col-12 col-md-6 mb-3">
                    <h6><i class="fa-solid fa-envelope"></i> Email</h6>
                    <?php
                        echo '<p>' . $userEmail . '</p>';
                    ?>
                  </div>
                  
                  <div class="col-12 col-md-6 mb-3">
                    <h6><i class="fa-solid fa-phone"></i> Phone No</h6>
                    <?php
                        echo '<p>' . $userPhone . '</p>';
                    ?>
                  </div>
                </div>  

                
                <div class="row pt-1">
                  <div class="col-6 mb-3 text-center">
                    <button type="button" class="btn btn-dark edit-info" data-bs-toggle="modal" data-bs-target="#infoEditModal"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                  </div>
                  
                  
                  <div class="col-6 mb-3 text-center">
                    <button type="button" class="btn btn-dark logout" id="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<hr class="mt-5 mb-3">

<div class="py-3">
<?php
if ($_SESSION['user']['role'] === "User")
    echo '<center><h2>My Favorite</h2></center>
		  </div>';
else
    echo '<center><h2>My Recipes</h2></center>
            <button class="btn btn-dark recipe-add" data-bs-toggle="modal" data-bs-target="#recipeAddModal"><i class="fas fa-utensils"></i> Add Recipes</button>
            </div>';
?>

<div class="container" > 

<div class="row justify-content-between" id="card-container"> 

<div class="col-12 col-md-6 p-3">
<a style="text-decoration:none; color:black;" href="RecipeDetail.php">
<div class="card shadow"> 

  <img class="card-img-top" src="images/fried_dumplings.jpg" alt="Card image cap"> 

  <div class="card-body"> 

    <h5 class="card-title">Fried Dumpling</h5> 
    
        <div><span class="recipe-info category">Fast Food</span> <span class="recipe-info cuisine">Chinese</span> <span class="recipe-info time">45 Mins</span></div>

    <p class="card-text"><p class="card-text"><button class="btn btn-dark fav-btn">View</button></p> </p> 

    

  </div> 
</div>
</a>
</div> 



<div class="col-12 col-md-6 p-3">
<a style="text-decoration:none; color:black;" href="RecipeDetail.php">
<div class="card shadow"> 

  <img class="card-img-top" src="images/tom-yum-mixed-seafood-soup.jpg" alt="Card image cap"> 

  <div class="card-body"> 

    <h5 class="card-title">Tom Yum Seafood Soup</h5> 
    
        <div><span class="recipe-info category">Soup</span> <span class="recipe-info cuisine">Thai</span> <span class="recipe-info time">30 Mins</span></div>

    <p class="card-text"><p class="card-text"><button class="btn btn-dark fav-btn">View</button></p> </p> 

    

  </div> 
</div>
</a>
</div> 

<div class="col-12 col-md-6 p-3">
<a style="text-decoration:none; color:black;" href="RecipeDetail.php">
<div class="card shadow"> 

  <img class="card-img-top" src="images/shrimp-fried-rice.jpg" alt="Card image cap"> 

  <div class="card-body"> 

    <h5 class="card-title">Shrimp Fried Rice</h5> 
    
    <span class="recipe-info category">Curry</span> <span class="recipe-info cuisine">American</span> <span class="recipe-info time">35 Mins</span>

    <p class="card-text"><p class="card-text"><button class="btn btn-dark fav-btn">View</button></p> </p> 

    

  </div> 
</div>
</a>
</div> 



<div class="col-12 col-md-6 p-3">
<a style="text-decoration:none; color:black;" href="RecipeDetail.php">
<div class="card shadow"> 

  <img class="card-img-top" src="images/bean-paste-soup-korean-style.jpg" alt="Card image cap"> 

  <div class="card-body"> 

    <h5 class="card-title">Bean Paste Soup</h5> 
    
        <div><span class="recipe-info category">Soup</span> <span class="recipe-info cuisine">Korean</span> <span class="recipe-info time">40 Mins</span></div>

    <p class="card-text"><p class="card-text"><button class="btn btn-dark fav-btn">View</button></p> </p> 

    

  </div> 
</div>
</a>
</div> 

<div class="col-12 col-md-6 p-3">
<a style="text-decoration:none; color:black;" href="RecipeDetail.php">
<div class="card shadow"> 

  <img class="card-img-top" src="images/baked-chicken-with-dark-sauce.jpg" alt="Card image cap"> 

  <div class="card-body"> 

    <h5 class="card-title">Baked Chicken</h5> 
    
        <div><span class="recipe-info category">Fast Food</span> <span class="recipe-info cuisine">Korean</span> <span class="recipe-info time">55 Mins</span></div>

    <p class="card-text"><p class="card-text"><button class="btn btn-dark fav-btn">View</button></p> </p> 

    

  </div> 
	</div>
	</a>
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
<div class="modal fade" id="infoEditModal" tabindex="-1" aria-labelledby="infoEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoEditModalLabel"><i class="fas fa-edit"></i>  Edit My Personal Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    	  <div class="d-flex justify-content-between align-items-center">
            <label for="username" class="col-3 form-label fw-bold"><i class="info-edit-icon fas fa-user"></i> Username</label>
            <?php
            echo '<input type="text" class="form-control info-edit-input p-2" id="username" name="username" value="' . $userName . '" onClick="this.select()">';
            ?>
          </div>
          <div class="d-flex justify-content-between align-items-center mt-4 ">
            <label for="email" class="form-label fw-bold"><i class="info-edit-icon fas fa-envelope"></i> Email</label>
            <?php
            echo '<input type="email" class="form-control info-edit-input p-2" id="email" name="email" value="' . $userEmail . '" disabled>';
            ?>
          </div>
          <div class="d-flex justify-content-between align-items-center mt-4 ">
            <label for="phone" class="form-label fw-bold"><i class="info-edit-icon fa-solid fa-phone"></i> Phone</label>
            <?php
            echo '<input type="tel" class="form-control info-edit-input p-2" id="phone" name="phone" value="' . $userPhone . '" onClick="this.select()">';
            ?>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button id="edit-info-btn" type="button" class="btn btn-dark" data-bs-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

 
<script>
	$('Document').ready(function(){
	
        
		$('.logout').click(function(){
			window.location.href = 'logoutAPI.php';
		});

	
	$('#edit-info-btn').click(function(){
		var username = $('#username').val();
		var phone = $('#phone').val();
		
		$.ajax({
			type: 'POST',
			url: 'updateInfoAPI.php',
			data: {username:username,phone:phone}
		}).done(function(msg){
    		if(msg == 'Success'){
    			alert('User Info updated');
    			window.location.href='my_profile.php';
    		}
    		else{
    			alert('Info update failed');
    		}
		});

	});
	$('#card-container').on('click','.card',function(){
			window.location.href="RecipeDetail.php?recipe_id="+$(this).parent().attr('key');
	});
});
</script>

</body>
</html>

