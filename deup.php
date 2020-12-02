<?php
session_start();
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/logout.php
 */
require 'Config.php';
require 'user.php';
$obj =new Config();
$data = $obj->Connect();
$obj=new User();
$userid=$_SESSION['userdata']['id'];


$a=$_POST['action'];
switch($a){
case 'update':
     $name=$_POST['name'];
     $mobile=$_POST['mobile'];
     $out=$obj->update($name, $mobile, $userid, $data);
     print_r($out);
    break;

case 'pndri':
     $out=$obj-> pndri($userid, $data);
     print_r($out);
     // echo "hua ro"; 
    break;
case 'delride':
     $id=$_POST['id'];
     $out=$obj->delr($id, $data);
     print_r($out);
    break;
case 'compride':
     $out=$obj->compride($userid, $data);
     print_r($out);
    break;
case 'allride':
     $out=$obj->allride($userid, $data);
     print_r($out);
    break; 
case 'canc':
     $out=$obj->can($userid, $data);
     print_r($out);
     break; 
case 'pass':
     $newp=$_POST['newp'];
     $old=$_POST['old'];
     $out=$obj->pass($newp, $old, $userid, $data);  
     print_r($out);
case 'invoice':
     $id=$_POST['id'];
     $out=$obj->invoice($id, $data);
     print_r($out);
    break;

}

     $data->close();
    

?>