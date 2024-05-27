<?php
session_start();
if (isset($_SESSION['fav'])) {
    $jsonStr = json_encode($_SESSION['fav']);
    echo $jsonStr;
} else {
    echo 'Logged out';
}
?>