<?php
session_start();
require_once 'databaseInfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);
    
    http_response_code(200);
    $email = $_REQUEST['mail'] ?? "";
    $pass = $_REQUEST['pwd'] ?? "";
    $query = "select `id`,`email`,`username`,`role`,`image` from `user` where `email` = '$email' and password = '$pass';";
    $result = $conn->query($query);
    $rows = $result->num_rows;

    if ($rows != 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['user'] = $row;
        $query = "SELECT recipe_id FROM user_favorite WHERE user_id = " . $_SESSION['user']['id'];
        $result = $conn->query($query);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $_SESSION['fav'] = $rows;
       
        echo 'Success';
        
    } else {
        echo 'Fail';
    }
    ?>