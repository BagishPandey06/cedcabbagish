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
require 'Config.php';
require 'user.php';
$obj =new Config();
$data = $obj->Connect();
$error=array();
$message='';
if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $repassword=isset($_POST['repassword'])?$_POST['repassword']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $mobile=isset($_POST['mobile'])?$_POST['mobile']:'';
    if ($password != $repassword) {
        $error=array('input'=>'password','msg'=>'password doesnt match1');
    } else {
         $pass=md5($password);
    }

    $sql="select * from user where (username='$username')";

    $res=mysqli_query($data, $sql);

    if (mysqli_num_rows($res) > 0) {
   
        $row = mysqli_fetch_assoc($res);
        if ($username==$row['username']) {
            $error=array('input'=>'username','msg'=>'Username already exsist');
        } 
    }



    if (sizeof($error) == 0) {
                $obj=new User();
                $out=$obj->sign($username, $name, $mobile, $pass, $data);
        if ($out=="inserted") {
                    header('location:login.php');
        } else {
            echo ("<script>alert('ohhohh data is not correct');</script>");
            header('location:signin.php');
        }
                
               

    }
     $data->close();
    
}
?>
