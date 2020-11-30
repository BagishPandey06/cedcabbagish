<?php
session_start();
if (empty($_SESSION['userdata']['username'])) {
    header('location:login.php');
} else {
    header('location:userdashboard.php');
}
?>