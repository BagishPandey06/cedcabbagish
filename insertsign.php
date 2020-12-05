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

if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $repassword=isset($_POST['repassword'])?$_POST['repassword']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $mobile=isset($_POST['mobile'])?$_POST['mobile']:'';
    if ($password != $repassword) {
        echo "<script>alert('Password Doesnt Match');</script>";
        return false;
       
    } else {
         $pass=md5($password);
    }

                $obj=new User();
                $out=$obj->sign($username, $name, $mobile, $pass, $data);
               
    if ($out=="same") {
            echo ("<script>alert('Username already exsits');</script>");
        //echo ("<script>alert('$out');</script>");
                    
    } else if ($out=='inserted') {
        echo ("<script>alert('You Sigend up Successfully!!! Ones Admin Accepts your request you can logged In');</script>");
        echo ("<script>window.location.href='login.php');</script>");
       
    }
    else {
            echo ("<script>alert('ohhohh Data Is Not Correct');</script>");
            echo ("<script>window.location.href='signin.php');</script>");
            
    }
 
     $data->close();
}
?>

