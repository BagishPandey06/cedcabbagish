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
case 'getfilterpendride':
     
     $filter=$_POST['filter'];
    if ($filter=='weekp') {
        $out=$obj->getfilterpendridew($userid, $data);
    } elseif ($filter=='monthp') {
        $out=$obj->getfilterpendridem($userid, $data);
    } else {
        $out=$obj->pndri($userid, $data);
    
    }

     print_r($out);
    break;
case 'getsortpendride':
     $sort=$_POST['sort'];
    if ($sort=='ridedatep') {
         $out=$obj->getpendsortd($userid, $data);
    } elseif ($sort=='farep') {
         $out=$obj->getpendsortf($userid, $data);
    } elseif ($sort=='ridedateap') {
         $out=$obj->getpendsortra($userid, $data);
    } elseif ($sort=='fareap') {
         $out=$obj->getpendsortfa($userid, $data);
    } 
     
     print_r($out);
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
case 'getfilterride':
     
     $filter=$_POST['filter'];
    if ($filter=='week') {
        $out=$obj->getfilterridew($userid, $data);
    } elseif ($filter=='month') {
        $out=$obj->getfilterridem($userid, $data);
    } else {
        $out=$obj->allride($userid, $data);
    
    }

     print_r($out);
    break;
case 'getsortride':
     $sort=$_POST['sort'];
    if ($sort=='ridedate') {
         $out=$obj->getsortd($userid, $data);
    } elseif ($sort=='fare') {
         $out=$obj->getsortf($userid, $data);
    } elseif ($sort=='ridedatea') {
         $out=$obj->getsortra($userid, $data);
    } elseif ($sort=='farea') {
         $out=$obj->getsortfa($userid, $data);
    } 
     
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
    break;
case 'invoice':
     $id=$_POST['id'];
     $out=$obj->invoice($id, $data);
     print_r($out);
    break;

}

     $data->close();
    

?>