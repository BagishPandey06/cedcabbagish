
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
require 'insertsign.php';
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
      <ul class="navbar-nav ml-auto mr-3 ht text-right">
      <li class="nav-item">
             <a class="nav-link pt-3" href="#">FEATURES</a>
             <section>
               <div class="container">
                 <div class="row">
                 </div>
             </section>
           </li>
           <li class="nav-item">
             <a class="nav-link pt-3" href="#">REVIEWS</a>
           </li>
           <li class="nav-item">
             <a class="nav-link pt-3" href="index.php">Book Now</a>
           </li>
      </ul>
    </div>
  </nav>
  <section>
  <div class="container p-0 m-0">
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4 ml-5">
  <article id="login">
  
  <form action=""class="pr-2 pl-2 bg-light" method="POST">
  <h1 class="text-center text-success">Register Here</h1>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="nam" class="form-control"required >
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="email" name="username"class="form-control" required >
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" id="pass" class="form-control"required >
  </div>
  <div class="form-group">
    <label for="rePassword">Re-Password</label>
    <input type="password" name="repassword" id="repass" class="form-control"required >
  </div>
  <div class="form-group">
    <label for="mobile">Mobile</label>
    <input type="number" name="mobile" onkeypress="return check()" class="form-control" required >
  </div>
  <div class="form-group d-block">
  <button type="submit" name="submit" class="btn btn-outline-primary ">Submit</button>
  <button type="submit" onclick='window.location.href="login.php"' name="submit" class="btn btn-outline-success ml-5">LOGIN</button>
  </div>
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
  <script>
    
    $("#nam").keypress(function(event) {
    var character = String.fromCharCode(event.keyCode);
    return isValid(character);     
});

function isValid(str) {
    return !/[~`.!@#$%\^&*()+=\-\[\]\\';0123456789,/{}|\\":<>\?]/g.test(str);
}
  function check(){
    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
      alert("Please enter numeric value only");
      return false;
    } else {
     
      return true;
    }
  }
  </script>
  </body>
</html>
