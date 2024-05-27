<?php
session_start();
require_once 'databaseInfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);
    
    http_response_code(200);
    $query = $_REQUEST['query'];
 
    $result = $conn->query($query);
    $rows = $result->num_rows;
    
   if ($rows != 0){
    for ($i = 1; $i <= $rows; $i++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $recipe_id=$row['id'];
        $image = $row['image_link'];
        $name = $row['name'];
        $category = $row['category'];
        $cuisine = $row['cuisine'];
        $time = $row['preparation_time'];
        $link=$row['link'];
        echo 
        <<<SQL
        <div class="col-12 col-md-6 p-3" key = "$recipe_id">
        <div class="card shadow">
        <img class="card-img-top recipe-img" src="$image" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">"$name"</h5>
        <div><span class="recipe-info category">"$category"</span> <span class="recipe-info cuisine">"$cuisine"</span> <span class="recipe-info time">"$time"</span></div>
        <p class="card-text"></p>
        <a href="$link" type ="button" class="btn btn-dark fav-btn" id="view">View</a>
        </div>
        </div>
        </div> 
        SQL;
    }
    }
    else echo "There is no recipe!";
    $conn->close();
?>