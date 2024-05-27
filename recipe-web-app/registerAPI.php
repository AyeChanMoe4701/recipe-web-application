<?php
session_start();
require_once 'databaseInfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);
    
    $email = $_REQUEST['email'] ?? "";
    $pass = $_REQUEST['pass'] ?? "";
    $username = $_REQUEST['username'] ?? "";
    $phone =$_REQUEST['phone'] ?? "";
    $query = "SELECT `email` FROM `user_information` WHERE email = '$email'";
    $result = $conn->query($query);
    if ($result->num_rows == 0) {
        $query = "INSERT INTO `user_information`( `email`, `username`, `password`, `role`, `phone`) VALUES ('$email','$username','$pass','User','$phone')";
        $result = $conn->query($query);
        if ($result === TRUE) {
            $query = "select `id`,`email`,`username`,`role`,`image`,`phone` from `user_information` where `email` = '$email'";
            $result = $conn->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['user'] = $row;
            echo "Success";
        } else
            echo "Fail";
    } else {
        echo "Registered";
    }
    
    ?>