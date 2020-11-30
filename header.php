<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/register.php?
 */
session_start();
if (empty($_SESSION['userdata'])) {
  header('location:login.php');
} else {
   $userid=$_SESSION['userdata']['id'];
}
require 'Config.php';
require 'user.php';
$obj =new Config();
$data = $obj->Connect();

if (!empty($_SESSION['ridedata'])) {
    $pick=$_SESSION['ridedata']['pick'];
    $drop=$_SESSION['ridedata']['drop'];
    $cab=$_SESSION['ridedata']['cab'];
    $kg=$_SESSION['ridedata']['kg'];
    $cost=$_SESSION['ridedata']['cost'];
    $distance=$_SESSION['ridedata']['distance'];
    $userid=$_SESSION['userdata']['id'];
    unset($_SESSION['ridedata']);
    $ridede=new User();
                $out=$ridede->ride($pick, $drop, $cab, $kg, $cost, $data, $userid, $distance);
                echo "<script>alert('your ride requested succesfully');</script>;";
}              
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="rideindex.css">
  <script src="ride.js"></script>
  <title>BOOK A RIDE</title>
</head>

<body>
<!-- <nav class="navbar navbar-expand-md   navbar-light">
    
      <ul class="navbar-nav  text-right">

     
      </ul>
    </div>
  </nav> -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
  <a class="navbar-brand brand" href="#">
      <span class="ced">CED</span>&nbsp<span class="coss">CAB</span></a>
    <button class="navbar-toggler" type="button" 
    data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
  <ul class="navbar-nav text-right ml-auto mr-3 ht">
  <li class="nav-item dropdown">
    <a class="nav-link " href="#" id="home"  >
      <i class="fa fa-home" style="font-size:20px;color:rgb(10, 10, 10);"></i>
   HOME</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link" href="index.php" id="navbarDropdown2" >
    <i class="fa fa-car" style="font-size:20px;color:rgb(10, 10, 10);"></i>
   Book New Ride</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-car" style="font-size:20px;color:rgb(10, 10, 10);"></i>
    Rides
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item" id="pndri">Pending Rides</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="comri">Completed Rides</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="allri" >All Rides</a>
          </div>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-user" style="font-size:20px;color:rgb(10, 10, 10);"></i>
    ACCOUNT
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item" id="update"href="#">update info.</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="chngpass" href="#">Change password</a>
          </div>
    </li>
    <li class="nav-item">
        <a class="btn btn-info rounded-pill  
        mt-1 ml-3 pr-3 pl-3" href="logout.php">logout</a>
      </li>
  </ul>
</nav>