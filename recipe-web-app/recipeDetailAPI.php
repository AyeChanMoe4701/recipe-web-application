<?php
session_start();
require_once 'databaseInfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);
    
    http_response_code(200);
    $id = $_REQUEST['id'];
    $query = "SELECT `recipes`.*, `user`.`name`, `review`.`rating` FROM `recipes` INNER JOIN `user` ON `recipes`.`chef_id`=`user`.`id` INNER JOIN `review` ON `recipes`.`id`=`review`.`recipe_id` WHERE `recipes`.`id`='$id';";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    if($row!=0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $recipe_id=$row['recipes.id'];
        $image = $row['recipes.image_link'];
        $name = $row['recipes.name'];
        $category = $row['recipes.category'];
        $rating = $row['review.rating'];
        $cuisine = $row['recipes.cuisine'];
        $time = $row['recipes.preparation_time'];
        $chef_name=$row['user.name'];
        $ingredients=$row['recipes.ingridents'];
        $method=$row['recipes.method'];
        echo<<<SQL
<img src="$image" class="img-fluid" alt="...">

<div class="container"> 

<div class="row justify-content-between"> 

<div class="py-3">
    <center><h3>"$name"</h3>
    <input class="btn btn-secondary" type="button" value="Add to Favorite" id="fav-btn">
    <p> </p>
    </center>
</div>
 <div class="container py-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-lg-11 mb-4 mb-lg-0">
      		
      <div class="panel mb-3 p-4" style="border-radius: .5rem; background-color: #f4f5f7;">
      		<div class="container"> 

			<div class="row justify-content-between"> 
					<div class="col-6 col-md-3 px-2 py-2">
						<h5><i class="fa-solid fa-clock"></i> Preparation</h5>
						<p class="ps-4">"$time" mins</p>
					</div>
					
					<div class="col-6 col-md-3 px-2 py-2">
						<h5>Cuisine</h5>
						<p class="ps-4">"$cuisine"</p>
					</div>
					
					<div class="col-6 col-md-3 px-2 py-2">
						<h5>Overall Rating</h5>
						<p class="ps-4">"$rating"</p>
					</div>
					
					<div class="col-6 col-md-3 px-2 py-2">
						<h5>Chef</h5>
						<p class="ps-4">"$chef_name"</p>
					</div>
			</div>
			</div>
      </div>
 <div class="panel mb-3 p-4" style="border-radius: .5rem; background-color: #f4f5f7;">
	<h4>INGREDIENTS</h4>
	<p>"$ingredients"</p>
</div>
</div>
</div>
</div>

 <div class="container py-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col col-lg-11 mb-4 mb-lg-0">
<div class="panel mb-3 p-4" style="border-radius: .5rem; background-color: #f4f5f7;">

	<h4>Method</h4>
	<p>"$method"</p>

</div>
</div>
</div>
</div>
SQL;
    }
    else
        echo "Error!";
    $conn->close();
    ?>