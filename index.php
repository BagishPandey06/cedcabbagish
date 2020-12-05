<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/logout.php
 */
session_start();
//print_r($_SESSION['ridedata']);
require 'Config.php';
require 'user.php';
$obj =new Config();
$data = $obj->Connect();
$obj=new User();
$out=$obj->getusrloc($data);
// echo "<script>alert(".print_r($out).")</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
    <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
        <a class="navbar-brand brand" href="#">
            <span class="ced">CED</span>&nbsp<span class="coss">CAB</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav text-right ml-auto mr-3 ht">
                <?php if(empty($_SESSION['userdata']) ) :?>
                <li class="nav-item">
                    <a class="nav-link pt-3" href="#">Features</a>
                    <section>
                        <div class="container">
                            <div class="row">
                            </div>
                    </section>
                </li>
                <li class="nav-item">
                    <a class="nav-link pt-3" href="#">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn2 btn-info rounded-pill  mt-1 ml-3" href="login.php">SIGN-IN</a>
                </li>
                <?php 
    endif;?>
                <?php if (!empty($_SESSION['userdata']) ) :?>
               
                <li class="nav-item dropdown">
                    <a class="nav-link" href="userdashboard.php" id="navbarDropdown2">
                        <i class="fa fa-USER" style="font-size:20px;color:rgb(10, 10, 10);"></i>
                        YOUR BOARD</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-info rounded-pill  
        mt-1 ml-3 pr-3 pl-3" href="logout.php">logout</a>
                </li>
                <?php endif;?>
            </ul>
    </nav>

    <section>
        <div class="conatiner-fluid img">
            <div class="text-center pt-3 mb-5 on">
                <h1 class="head ">Book Your ride to Travel anywhere in city</h1>
                <h2 class="head">choose your ride of choice</h2>
            </div>
            <div class="row mb-5 mr-0 bd-dark">
              <div class="col-sm-4 a ml-5">
                <form action="#" class="ml-5 mr-5">

                            <div class="text-center mt-2 ">
                                <span class="p-1 pr-2 pl-2 b mb-3">LUCKNOW</span>
                                <h3 class=" mb-0 c mt-3">Your Everyday Travel Partner</h3>
                                <h4 class="mt-0 d">AC cabs for point to point traverl</h4>
                            </div>


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text ">Pickup</div>
                                </div>
                                <select class="form-control " id="pick">
                                    <option selected value="cu">Pickup-location</option>
                                    <?php foreach($out as $key=>$value) :?>
                                    <option value="<?php echo $key;?>"><?php echo $key;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text ">DROP</div>
                                </div>
                                <select class="form-control " id="drop">
                                    <option selected value="cu">Drop-location</option>
                                    <?php foreach($out as $key=>$value) :?>
                                    <option value="<?php echo $key;?>"><?php echo $key;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text ">CAB-TYPE</div>
                                </div>
                                <select class="form-control " id="cab">
                                    <option value="cu">Choose your cab</option>
                                    <option value="CedMicro">CedMicro</option>
                                    <option value="CedMini">CedMini </option>
                                    <option value="CedRoyal">CedRoyal</option>
                                    <option value="CedSuv">CedSUV</option>

                                </select>
                            </div>


                            <div class="input-group mb-3 kg">
                                <div class="input-group-prepend">
                                    <div class="input-group-text ">Luggage</div>
                                </div>
                                <input type="NUMBER" class="form-control mob" id="kg"
                                    onKeypress="return check()"placeholder="Enter Weghit in KG">
                            </div>



                            <div class="input-group mb-3">
                                <a class="btn btn-block btn1" id="inlineFormInputGroup"value="">CALCULATE FARE</a>
                            </div>

                            <div class="input-group mb-3 res">
                                <span>
                                    <h3 id="res">
                                    </h3>
                                </span>
                            </div>
                        
                        </form>
                    </div>
           
        
      
        <div class="col-sm-4 a ml-5 rideinfo" >
          <h1 class="text-center">Booking Details</h1>
        <table class="table">
                <tr><td class="font-weight-bold ">Pick-Up:</td><td ><span class="pick font-italic"></span></td></tr>
                <tr><td class="font-weight-bold ">Drop:</td><td ><span class="drop font-italic"></span></td></tr>
                <tr><td class="font-weight-bold ">CAB:</td><td class="cab font-italic"></td></tr>
                <tr><td class="font-weight-bold ">Luggage:</td><td ><span class="kgm font-italic"></span><small>kg</small></td></tr>
                <tr><td class="font-weight-bold ">Distance:</td><td ><span class="dis font-italic"></span><small>km</small></td></tr>
                <tr><td class="font-weight-bold ">Cost of Ride:</td>
                <td ><i class="fa fa-inr" style='font-size:15px'></i><span class="cost font-italic"></span></td></tr>
                <tr><td class="font-weight-bold"><a class="btn  btn-outline-success book" id="inlineFormInputGroup" >BOOK NOW</a></td>
              <td><a class="btn  btn-outline-danger " id="cancel" >CANCEL</a></td></tr></table>
        </div>
     




        </div>
                                       
        </div>
    </section>
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
    <script>
        
        $(".mob").keypress(function(event) {
           var m=$(this).val();
           if(m.length>=3){
               alert("luggage is only allowed upto 999kg !");
              return false;
           } else {
            return true;
           }
            var character = String.fromCharCode(event.keyCode);
            return isValidm(character);     
        });
        function check(){
            if(event.keyCode > 47 && event.keyCode < 58){
                return true;
            } else {
                alert("Only Numeric  value allowed");
                return false;
            }
        }
        function isValidm(str) {
            return !/[~`.-!@#$%\^&*()+=\\[\]\\';(a-z)(A-Z),/{}|\\":<>\?]/g.test(str);
        }
        
            </script>
</body>

</html>