<?php
session_start();
require_once 'databaseInfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);
    
    http_response_code(200);
    $username = $_REQUEST['username'] ?? "";
    $phone = $_REQUEST['phone'] ?? "";
    
    $query = "UPDATE `user` SET `username`='" . $username . "',`phone`='" . $phone . "',`modify_date`=CURRENT_TIME WHERE id = " . $_SESSION['user']['id'];
    $result = $conn->query($query);
    if ($result === TRUE) {
        $query = "select `id`,`email`,`username`,`role`,`image`,`phone` from `user` where `id` = " . $_SESSION['user']['id'];
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['user'] = $row;
        
        echo 'Success';
    } else {
        echo 'Fail';
    }
    ?>