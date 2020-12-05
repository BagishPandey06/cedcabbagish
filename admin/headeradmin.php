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
if (empty($_SESSION["admindata"])) {
    header('location:../login.php');
} else {
    $adminid=$_SESSION['admindata']['id'];
}

require '../Config.php';
require 'Admin.php';
$obj =new Config();
$data = $obj->Connect();
$objj=new Admin();
$out=$objj->fetchdata($data);
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="rideadmin.css">
  <script> 
  function printinvoice(exampleModal){
    var printt=document.getElementById('exampleModal');
    var winPrint =window.open('', '', 'width=900, hegiht=650');
    winPrint.document.write(printt.innerHTML);
    winPrint.document.close();
    winPrint.focus();
    winPrint.print();
    winPrint.close(); 
  }</script>
  <title>BOOK A RIDE</title>
</head>
<body>
<nav class="navbar navbar-expand-md   navbar-light">
    <a class="navbar-brand brand" href="#">
    <span class="ced">CED</span>&nbsp<span class="coss">CAB</span></a>
    <button class="navbar-toggler" type="button" 
    data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="navbar-nav ml-auto mr-3 ht text-right">

      <li class="nav-item">
        <a class="btn btn-info rounded-pill  
        mt-1 ml-3 pr-3 pl-3" href="../logout.php">logout</a>
      </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid m-0">
    <div class="row">
      <div class="col-sm-2 bg-dark pt-5">
        <div class="dropdown d-block mb-5 mt-5">
  <button class="btn btn-outline-success " type="button" id="home">
  <i class="fa fa-home" style="font-size:20px;color:rgb(10, 10, 10);"></i> &nbsp;Home
  </button>
</div>
<div class="dropdown d-block mb-5 mt-5">
  <button class="btn btn-outline-success  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-car" style="font-size:20px;color:rgb(10, 10, 10);"></i> &nbsp;Rides
  </button>
  <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" id="penride" href="#">Pending rides</a>
    <a class="dropdown-item" id="compride" href="#">Completed rides</a>
    <a class="dropdown-item" id="cancelride" href="#">Canceled rides</a>
    <a class="dropdown-item" id="rideb"href="#">All Rides</a>
  </div>
</div>
<div class="dropdown d-block mb-5 mt-5">
  <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-user-circle-o" style="font-size:20px;color:rgb(10, 10, 10);"></i> &nbsp; Users
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" id="penuser" href="#">Pending user request</a>
    <a class="dropdown-item"  id="acptuserb" href="#">Approved User Request</a>
    <a class="dropdown-item" id="alluserb" href="#">All User</a>
  </div>
</div>
<div class="dropdown d-block mb-5 mt-5">
  <button class="btn btn-outline-success dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-map-marker" style="font-size:20px;color:rgb(10, 10, 10);"></i> &nbsp;Location
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" id="location" href="#">Location List</a>
    <a class="dropdown-item" id="alocation" href="#"><i class="material-icons m-0 p-0">add_location</i>Add New Location</a>
  </div>
</div>
<div class="dropdown d-block mb-5 mt-5">
  <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-user-circle-o" style="font-size:20px;color:rgb(10, 10, 10);"></i> &nbsp;Account
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" id="adminpass" href="#">Change Password</a>
  </div>
</div>
</div>
      <div class="col-sm-10">