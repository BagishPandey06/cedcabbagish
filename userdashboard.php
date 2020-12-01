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
<!-- USER dasboard -->
<section id="userdash">
<div class="row  ml-5 text-dark text-center">
  <div class="col-sm-4 mt-3">
    <div class="card  bg-info" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Total ride</h5>
            <i class="fa fa-car" style="font-size:20px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['b'];?></h1>
       
      </div>
    </div>
  </div>




  <div class="col-sm-4 mt-3">
    <div class="card  bg-success" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">completed ride</h5>
            <i class="fa fa-car" style="font-size:20px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['c'];?></h1>
       
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-warning" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">pending ride</h5>
            <i class="fa fa-car" style="font-size:20px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['d'];?></h1>
       
      </div>
    </div>
  </div>



  <div class="col-sm-4 mt-3">
    <div class="card  bg-danger" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">canceled ride</h5>
            <i class="fa fa-car" style="font-size:20px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['e'];?></h1>
       
      </div>
    </div>
  </div>

  <div class="col-sm-4 mt-3">
    <div class="card  bg-secondary" style="width :15rem;">
        <div class="card-header">
            <h5 class="card-title">Total money spent</h5>
            <i class="fa fa-inr" style="font-size:20px;color:rgb(10, 10, 10);"></i>
        </div>
      <div class="card-body">
        <h1 class="card-text"><?php echo $out['a'];?></h1>
        
        </div>
    </div>
  </div>
</div>
</section>
<!-- end USER dasboard -->
<!-- update info form -->
<section id="updateinfo">
<?php
    $obj=new User();
$out=$obj->getuser($userid, $data);
?>
<form action="" method="POST">
                <p>
                    <label for="name">name:<br>
                    <input type="text" name="name" id="name" 
                    value="<?php echo $out['a'];?>"required>
                    </label>
                </p>
                <p>
                    <label for="mobile">mobile:<br>
                        <input type="number" name="mobile" id="mobile"
                        value="<?php echo $out['b'];?>" required>
                    </label>
                </p>
                <p>
                <input type="button" name="submit" id="info" class="btn" value="SUBMIT">
                </p>
            </form>
</section>
<!-- end update info form -->
<!-- change password form -->
<section id="changepass">
<form action="" method="POST">
                <p>
                    <label for="old password">old Password:<br>
                    <input type="password" name="pass" id="opass"
                    value=""required>
                    </label>
                </p>
                <p>
                    <label for="new password">New Password:<br>
                        <input type="password" name="newpass" id="npass"
                        value="" required>
                    </label>
                </p>
               
                <p>
                    <input type="button" name="submit" class="btn cpass" value="SUBMIT">
                </p>
            </form>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">PRINT</button>
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