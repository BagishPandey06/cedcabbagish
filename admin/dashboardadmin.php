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
<!-- admin home -->
<section id="homeadmin">
<div class="container-fluid">
<div class="row  ml-5 text-dark text-center">
  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Total USER</h5>
            <i class="fa fa-user"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tu'];?></h1>
        <button id="alluserb" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Approved USER</h5>
            <i class="fa fa-user"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tau'];?></h1>
        <button id="acptuserb" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-danger" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Pending USER</h5>
            <i class="fa fa-user"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tpu'];?></h1>
        <button id="penuser" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Total Ride</h5>
            <i class="fa fa-car"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tr'];?></h1>
        <button id="rideb" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>     
         </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">pending Ride</h5>
            <i class="fa fa-car"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['pr'];?></h1>
        <button id="penride" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-danger" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">complete Ride</h5>
            <i class="fa fa-car"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['cr'];?></h1>
        <button id="compride" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Total locations</h5>
            <i class="fa fa-map"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['tl'];?></h1>
        <button id="location" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>      
        </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">cancelled ride</h5>
            <i class="fa fa-car" ></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['canr'];?></h1>
        <button id="cancelride" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></button>
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3 ">
    <div class="card  bg-danger" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Total Earning</h5>
            <i class="fa fa-inr"></i>
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

<!-- filter -->
<section id="fs">
<select class="form-control filter" style="width:10rem">
        <option>filter by</option>
        <option value="week">Week</option>
        <option value="month">Month</option>
        </select>
        <select class="form-control sort" style="width:10rem">
        <option>sort by</option>
        <option value="ridedate">Ride date</option>
        <option value="fare">Fare</option>
        </select>
        </section>
<!-- end filter -->

  <!-- pending ride -->
  <section id='pendride'></section>
  <!-- end pending ride -->


  <!-- completed ride -->
  <section id='completride'></section>
  <!-- end completed ride -->


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
  
  
  <!-- add location -->
  <section id="addlocation">
                      <form method="post">
                        <div class="form-group">
                          <label for="exampleInputEmail1">LOCATION NAME</label>
                          <input type="text" class="form-control" style="width: 25rem;" id="locationa" >
                        </div>
                        <div class="form-group">
                          <label for="dsitance">Distance From Charbagh</label>
                          <input type="number" class="form-control" style="width: 25rem;" id="distance">
                        </div>
                        <div class="form-group">
                          <label for="avilabilty">service avilable</label>
                          <select class="form-control" id="avilable" style="width: 25rem;">
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
  
<?php
require 'footeradmin.php';
?>