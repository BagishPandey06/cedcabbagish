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
require 'header.php';
$userid=$_SESSION['userdata']['id'];
$obj=new User();
$out=$obj->get($userid, $data);
?>
<!-- all ride filter -->
<section id="fs">
<div class="row">
<div class="col-sm-2 text-right">
      <select class="form-control filter" style="width:10rem">
        <option>All ride</option>
        <option value="week">Last 7 Days</option>
        <option value="month">Last 30 days</option>
        </select></div><div class="col-sm-2">
        <select class="form-control sort" style="width:10rem">
        <option>sort by</option>
        <option value="ridedate">Ride Date</option>
        <option value="fare">Fare</option>
        <option value="ridedatea">Ride Date(ascending)</option>
        <option value="farea">Fare(ascending)</option>
        </select></div>
        </div>
</section>
<!-- end all ride filter -->

<!-- pending ride filter -->
<section id="fsp">
<div class="row">
<div class="col-sm-2 text-right">
      <select class="form-control filterp" style="width:10rem">
        <option>All ride</option>
        <option value="weekp">Last 7 Days</option>
        <option value="monthp">Last 30 days</option>
        </select></div><div class="col-sm-2">
        <select class="form-control sortp" style="width:10rem">
        <option>sort by</option>
        <option value="ridedatep">Ride Date</option>
        <option value="farep">Fare</option>
        <option value="ridedateap">Ride Date(ascending)</option>
        <option value="fareap">Fare(ascending)</option>
        </select></div>
        </div>
</section>
<!-- end pending ride filter -->


<!-- USER dasboard -->
<section id="userdash">
<div class="row  ml-5 text-dark text-center">
  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title font-weight-bolder">Total Ride</h5>
            <i class="fa fa-car" style="font-size:45px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['b'];?></h1>
        <button id="allri" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>  
      </div>
    </div>
  </div>




  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title font-weight-bolder">Completed Ride</h5>
            <i class="fa fa-car" style="font-size:45px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['c'];?></h1>
        <button id="comri" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-warning" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title font-weight-bolder">Pending Ride</h5>
            <i class="fa fa-car" style="font-size:45px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['d'];?></h1>
        <button id="pndri" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>  
      </div>
    </div>
  </div>



  <div class="col-sm-4 mt-3">
    <div class="card  bg-danger" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title font-weight-bolder">Canceled Ride</h5>
            <i class="fa fa-car" style="font-size:45px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['e'];?></h1>
        <button id="canri" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>  
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-secondary" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title font-weight-bolder">Total Money Spent</h5>
            <i class="fa fa-inr" style="font-size:45px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['a'];?></h1>
        <button id="allri" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>  
        </div>
    </div>
  </div>
</div>
</section>
<!-- end USER dasboard -->





<!-- update info form -->
<section id="updateinfo" class="center">
<?php
    $obj=new User();
$out=$obj->getuser($userid, $data);
?>
<div class="row text-light">
<div class="col-lg-4 mt-5">
<div class="bg-dark p-2 mt-5 w-100"></div>
<div class="bg-dark p-2 mt-3 w-100"></div>
<div class="bg-dark p-2 mt-5 w-100"></div>
<div class="bg-dark p-2 mt-3 w-100"></div>
</div>
  <div class="col-lg-4 bg-dark mt-5 p-5 ">
  <h1 class=" text-center">Update Details</h1>
<form action="" method="POST">
                <p>
                    <label for="name" class="font-wegiht-bold">Name:<br>
                    <input type="text" name="name" id="name" 
                    value="<?php echo $out['a'];?>" class="form-control w-100" required>
                    </label>
                </p>
                <p>
                    <label for="mobile">Mobile:<br>
                        <input type="number" name="mobile" id="mobile"
                        value="<?php echo $out['b'];?>" onkeypress="return result()" class="form-control w-100" required>
                    </label>
                </p>
                <p>
                <input type="button" name="submit" id="info" class="btn btn-outline-success w-100" value="SUBMIT">
                </p>
            </form>
            </div>
            <div class="col-lg-4 mt-5">
            <div class="bg-dark p-2 mt-5 w-100"></div>
            <div class="bg-dark p-2 mt-3 w-100"></div>
            <div class="bg-dark p-2 mt-5 w-100"></div>
<div class="bg-dark p-2 mt-3 w-100"></div>
            </div>
            </div>
</section>
<!-- end update info form -->

<!-- change password form -->
<section id="changepass">
<div class="row text-light">
<div class="col-lg-4 pt-5">
<div class="bg-dark p-2 mt-5 w-100"></div>
            <div class="bg-dark p-2 mt-3 w-100"></div>
            <div class="bg-dark p-2 mt-5 w-100"></div>
           <div class="bg-dark p-2 mt-3 w-100"></div></div>
           <div class="col-lg-4 bg-dark mt-5 p-5 ">
  <h1 class=" text-center">Update Password</h1>

<form action="" method="POST">
                <p>
                    <label for="old password">Old Password:<br>
                    <input type="password" name="pass" class="form-control w-100" id="opass"
                    required>
                    </label>
                </p>
                <p>
                    <label for="new password">New Password:<br>
                        <input type="password" name="newpass" class="form-control w-100" id="npass"
                        required>
                    </label>
                </p>
                <small style="font-size:15px;color:green">
  <ul>
  <li>Password must contain 6 to 20 characters</li>
  <li> must contain at least one numeric digit,one uppercase and one lowercase letter</li>
  </ul>
  </small>
                <p>
                    <input type="button" name="submit" class="btn btn-outline-success  cpass w-100" value="SUBMIT">
                </p>
            </form>
</div>
<div class="col-lg-4 pt-5">
<div class="bg-dark p-2 mt-5 w-100" ></div>
            <div class="bg-dark p-2 mt-3 w-100"></div>
            <div class="bg-dark p-2 mt-5 w-100"></div>
<div class="bg-dark p-2 mt-3 w-100"></div></div>
</div>
</section>
<!-- end change password form -->

                                                          <!-- ride details -->
    <!-- pending user ride details -->
    <section id="pnd_ri">
    </section>
    <!-- end pending user ride details -->
   
    <!-- pending user ride details -->
    <section id="com_ri">
    </section>
    <!-- end pending user ride details -->
    <section id="canc"></section>
    <!-- invoice details -->
    <section id="bill">
            

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INVOICE</h5>  
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="printinvoice('exampleModal')" data-dismiss="modal">PRINT</button>
      </div>
    </div>
  </div>
</div>
    </section>
    <!-- end invoice details -->
    <!-- pending user ride details -->
    <section id="all_ri">
    </section>
    <!-- end pending user ride details -->
                                                         <!-- end ride details -->



<?php
require 'footer.php';
?>