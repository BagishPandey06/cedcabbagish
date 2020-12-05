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
require 'headeradmin.php';

?>
<!-- filter -->
<section id="fs">
<div class="row">
<div class="col-sm-2">
      <select class="form-control filter" style="width:10rem">
        <option>All-ride</option>
        <option value="week">Last 7 Days</option>
        <option value="month">Last 30 days</option>
        </select></div><div class="col-sm-2">
        <select class="form-control sort" style="width:10rem">
        <option>sort by</option>
        <option value="ridedate">Ride date</option>
        <option value="fare">Fare</option>
        <option value="ridedatea">Ride Date(ascending)</option>
        <option value="farea">Fare(ascending)</option>
        </select></div>
        </div>
</section>
<!-- end filter -->
<!-- filter pending ride -->
<section id="fsp">
<div class="row">
<div class="col-sm-2">
      <select class="form-control filterp" style="width:10rem">
        <option>All Pending</option>
        <option value="weekp">Last 7 Days</option>
        <option value="monthp">Last 30 Days</option>
        </select></div><div class="col-sm-2">
        <select class="form-control sortp" style="width:10rem">
        <option>sort by</option>
        <option value="ridedatep">Ride Date</option>
        <option value="farep">Fare</option>
        </select>
        </div>
        </div>
</section>
<!-- end filter pending -->
<!-- filter completed ride -->
<section id="fsc">
<div class="row">
<div class="col-sm-2">
      <select class="form-control filterc" style="width:10rem">
        <option>All Completed</option>
        <option value="weekc">Last 7 Days</option>
        <option value="monthc">Last 30 days</option>
        </select>
        </div><div class="col-sm-2">
        <select class="form-control sortc" style="width:10rem">
        <option>sort by</option>
        <option value="ridedatec">Ride Date</option>
        <option value="farec">Fare</option>
        </select></div>
        </div>
</section>
<!-- end filter completed -->
<!-- admin home -->
<section id="homeadmin">
<div class="container-fluid">
<div class="row  ml-5 text-dark text-center">
  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Total USER</h5>
            <i class="fa fa-user-circle-o" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tu'];?></h1>
        <button id="alluserb" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Approved USER</h5>
            <i class="fa fa-user-circle-o" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tau'];?></h1>
        <button id="acptuserb" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right fa-right"></i></button>
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-danger" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Pending USER</h5>
            <i class="fa fa-user-circle-o" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tpu'];?></h1>
        <button id="penuser" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Total Ride</h5>
            <i class="fa fa-car" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tr'];?></h1>
        <button id="rideb" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>     
         </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Pending Ride</h5>
            <i class="fa fa-car" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['pr'];?></h1>
        <button id="penride" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-danger" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">complete Ride</h5>
            <i class="fa fa-car" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['cr'];?></h1>
        <button id="compride" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Total locations</h5>
            <i class="fa fa-map" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tl'];?></h1>
        <button id="location" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Cancelled ride</h5>
            <i class="fa fa-car" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['canr'];?></h1>
        <button id="cancelride" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3 ">
    <div class="card  bg-danger" style="width :20rem;">
        <div class="card-header">
            <h5 class="card-title">Total Earning</h5>
            <i class="fa fa-inr" style="font-size:30px"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['t'];?></h1>
        <button id="compride" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>
  </div>

</div>
</div>

</section>

  <!-- admin home end -->
  
  
  <!-- pending user -->
  <section id='penduser'>
  </section>
  <!-- end pending user -->

  <!-- Accepted user -->
  <section id='acptuser'>
  </section>
  <!-- end Accepted user -->



  <!-- pending ride -->
  <section id='pendride'></section>
  <!-- end pending ride -->


  <!-- completed ride -->
  <section id='completride'></section>
  <!-- end completed ride -->
  

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
                    <button type="button" class="btn btn-secondary" onclick="printinvoice('exampleModal')"data-dismiss="modal">PRINT</button>
                  </div>
                </div>
              </div>
            </div>
                </section>
  <!-- Cancelled ride -->
  <section id='canride'></section>
  <!-- end Cancelled ride -->


  <!-- all rides -->
  <section id='allride'></section>
  <!-- end all rides -->
  
  
  <!-- location -->
  <section id="locationsec">
  </section>
  <!-- location ends -->
  <section id="edlocation">
                     
  </section>
  
  <!-- add location -->
  <section id="addlocation">
                      <form method="post">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="font-wegiht-bold">LOCATION NAME</label>
                          <input type="text" class="form-control"  id="locationa" >
                        </div>
                        <div class="form-group">
                          <label for="dsitance" class="font-wegiht-bold">Distance From Charbagh</label>
                          <input type="NUMBER" class="form-control"  id="distance">
                        </div>
                        <div class="form-group">
                          <label for="avilabilty" class="font-wegiht-bold">service avilable</label>
                          <select class="form-control" id="avilable" >
                            <option value="1">Avilable</option>
                            <option value="0">Not-avilable</option>
                          </select>
                        </div>
                        <input type="submit" class="btn btn-primary" id="Add" value="Add-location">
                      </form>
  </section>
  <!-- end add location -->
  <!-- all users -->
  <section id="alluser">
  
  </section>
  <!-- end all users -->

  <!-- change password form -->
<section id="chngadminpass">
<div class="container">
<div class="row text-light">
<div class="col-sm-1"></div>
<div class="col-sm-5 bg-dark border-top border-bottom rounded border-primary ml-5 p-5 ">
<h1 class=" text-center mb-5">Update Password</h1>
<form action="" method="POST">
               
                    <label for="old password" class="font-wegiht-bold">Old Password:<br>
                    <input type="password" class="form-control w-100" name="pass" id="op"
                    value="" required>
                    </label>
               
                <p>
                    <label for="new password" class="font-wegiht-bold">New Password:<br>
                        <input type="password" class="form-control" name="newpass" id="np"
                        value="" required>
                    </label>
                </p>
                <small style="font-size:15px;color:green">
  <ul>
  <li>Password must contain 6 to 20 characters</li>
  <li> must contain at least one numeric digit,one uppercase and one lowercase letter</li>
  </ul>
  </small>
                <p>
                    <input type="button" name="submit" class="btn btn-outline-warning mb-5" id="chngpass" value="SUBMIT">
                </p>
            </form>
            </div>
            </div>
            </div>
</section>
<!-- end change password form -->
 
  
<?php
require 'footeradmin.php';
?>