<?php
session_start();
require_once 'databaseInfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);
    $id = $_REQUEST['id'] ?? 0;
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    switch ($method) {
        case 'get':
            $query = "SELECT `username`, `image`, `comment`, `rating`, r.`created_date` FROM `review` r INNER JOIN `user` u ON r.user_id = u.id WHERE Recipe_id = " . $id;
            
            $result = $conn->query($query);
            $rows = $result->num_rows;
            
            if ($rows != 0) {
                $data = $result->fetch_all(MYSQLI_ASSOC);
                $json_string = json_encode($data);
                echo $json_string;
            }
            break;
        case 'post':
            $comment = $_REQUEST['comment'] ?? "";
            $rating = $_REQUEST['rating'] ?? "";
            $query = "SELECT `username` FROM `review` r INNER JOIN `user` u ON r.user_id = u.id WHERE recipe_id = " . $id . " and user_id = " . $_SESSION['user']['id'];
            $result = $conn->query($query);
            $rows = $result->num_rows;
            
            if ($rows == 0) {
                $query = "INSERT INTO `review`( `recipe_id`, `user_id`, `comment`, `rating`) VALUES (" . $id . "," . $_SESSION['user']['id'] . ",'" . $comment . "'," . intval($rating) . ")";
                $result = $conn->query($query);
                if ($result === TRUE) {
                    $query = "SELECT `username`, `image`, `comment`, `rating`, r.`created_date` FROM `review` r INNER JOIN `user` u ON r.user_id = u.id WHERE recipe_id = " . $id . " ORDER BY created_date DESC LIMIT 1";
                    $result = $conn->query($query);
                    $rows = $result->num_rows;
                    
                    if ($rows != 0) {
                        $data = $result->fetch_array(MYSQLI_ASSOC);
                        $json_string = json_encode($data);
                        echo $json_string;
                    }
                }
            } else {
                echo '{"error":"Rating cannot be added twice"}';
            }
            break;
    }
    ?>