<?php
session_start();
if (isset($_SESSION['user'])) {
    echo 'Logged in';
} else {
    echo 'Logged out';
}
?>