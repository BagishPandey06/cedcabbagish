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
require 'Config.php';
require 'user.php';
$obj =new Config();
$data = $obj->Connect();
$error=array();
$message='';
if (isset($_POST['submit'])) {
    $password=isset($_POST['password'])?$_POST['password']:'';
    $username=isset($_POST['username'])?$_POST['username']:'';
     $pass=md5($password);
    if (sizeof($error) == 0) {

        $obj=new User();
        $out=$obj->login($username, $pass, $data);
        if ($out=="customer") {
           
            if (!empty($_post['rem'])) { 
                setcookie("username", $username, time()+(10*36524*60*60));
                setcookie("password", $pass, time()+(10*36524*60*60));
            } else {
                if (isset($_COOKIE['username'])) {
                    setcookie("username", "");
                } 
                if (isset($_COOKIE['password'])) {
                    setcookie("password", "");
                }
            }
            header('location:userdashboard.php');
        } elseif ($out=="admin") {
            header('location:admin/dashboardadmin.php');
        } else {
            echo '<script>alert("Please enter valid username and password");</script>';
            return false;
        }     
       
    }
    $data->close();
}
?>
