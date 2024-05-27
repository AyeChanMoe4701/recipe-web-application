<?php
session_start();
require_once 'databaseInfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);
    
    $id = $_REQUEST['id'] ?? "";
    
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    switch ($method) {
        case 'get':
            if (isset($_SESSION['user'])) {
                $query = "SELECT * FROM `user_favorite` WHERE recipe_id = " . $id . " and user_id =" . $_SESSION['user']['id'];
                
                $result = $conn->query($query);
                $rows = $result->num_rows;
                
                if ($rows != 0) {
                    echo 'Favorite';
                } else {
                    echo 'Not Favorite';
                }
            } else {
                echo 'Login first!';
            }
            break;
        case 'post':
            $query = "INSERT INTO `user_favorite`(`recipe_id`, `user_id`) VALUES (" . $id . "," . $_SESSION['user']['id'] . ")";
            $result = $conn->query($query);
            if ($result === TRUE) {
                $query = "SELECT recipe_id FROM user_favorite WHERE user_id = " . $_SESSION['user']['id'];
                $result = $conn->query($query);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $_SESSION['fav'] = $rows;
                echo 'Success';
            } else {
                echo 'Fail';
            }
            break;
        case 'delete':
            $query = "DELETE FROM `user_favorite` WHERE `recipe_id` =" . $id . " and `user_id` =" . $_SESSION['user']['id'];
            $result = $conn->query($query);
            if ($result === TRUE) {
                
                $query = "SELECT recipe_id FROM user_Favorite WHERE user_id = " . $_SESSION['user']['id'];
                $result = $conn->query($query);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $_SESSION['fav'] = $rows;
                echo 'Success';
            } else {
                echo 'Fail';
            }
            break;
    }
    ?>