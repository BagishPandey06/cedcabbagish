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
require 'loginop.php';
if (!empty($_SESSION['userdata'])) {
    header('location:userdashboard.php');
}
$expireAfter = 1;

if (isset($_SESSION['last_action'])) {
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if ($secondsInactive >= $expireAfterSeconds) {
        session_unset();
        session_destroy();
    }
    
}
$_SESSION['last_action']=time();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="rideindex.css">
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
      <ul class="navbar-nav ml-auto mr-3 ht text-right font-wegiht-bold">
      <li class="nav-item">
             <a class="nav-link pt-3" href="#">Features</a>
             
           </li>
           <li class="nav-item">
             <a class="nav-link pt-3" href="index.php">Book Now</a>
           </li>
           <li class="nav-item">
             <a class="nav-link pt-3" href="#">Reviews</a>
           </li>
           <?php if(!empty($_SESSION['ridedata'])) :?>
            <li class="nav-item">
             <a class="nav-link pt-3" href="index.php"><i class="fa fa-reply" style="font-size:36px"></i></a>
           </li>
           <?php endif;?>
      </ul>
    </div>
  </nav>
  <section>
  <div class="container p-0 m-0">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4 ">
  <article id="login">
  <form action="" class="p-5 bg-light mb-3"method="POST">
  <h1 class="text-center text-success">Login Here</h1>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="email" class="form-control" name="username" required >
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="password" required >
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="rem" class="form-check-input" id="s">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-outline-success d-block" >Submit</button>
  <span class="pt-2">Dont have account?</span><a href="signin.php" class="btn mt-3 btn-outline-warning">SIGN UP</a>
</form>
  </article>
  </div>
  </div>
  </div>
  </section>
 <section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 text-center">
        <div class="row">
          <div class="col-sm-4">
            <i class="fab fa-magento" style="font-size:50px;color:rgb(10, 10, 10);">
            </i></div>
          <div class="col-sm-4">
            <i class="fab fa-aws" style="font-size:50px;color:rgb(10, 10, 10);"></i>
          </div>
          <div class="col-sm-4">
            <i class="fab fa-php" style="font-size:50px;color:rgb(10, 10, 10);"></i>
          </div>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <p>COPYRIGHT@</p>
        <i class="fa fa-heart" style="font-size:50px;color:rgb(122, 255, 104);"></i>
      </div>
      <div class="col-sm-4 text-center">
        <div class="row">
          <div class="col-sm-4"><a href="#">Features</a></div>
          <div class="col-sm-4"><a href="#">Reviews</a></div>
          <div class="col-sm-4"><a href="#">Sign-up</a></div>
        </div>
      </div>
    </div>
  </div>
  </section>
  </body>
</html>