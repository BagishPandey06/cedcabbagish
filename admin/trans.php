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
require '../Config.php';
require 'Admin.php';
$obj =new Config();
$data = $obj->Connect();
$obj=new Admin();
$adminid=$_SESSION['admindata']['id'];
$a=$_POST['action'];
switch($a){
case 'insertloc':
    $location=$_POST['location'];
    $distance=$_POST['distance'];
    $avi=$_POST['avi'];
        $out=$obj->insertloc($location, $distance, $avi, $data);
      print_r($out);
    break;
case 'uploc':
    $id=$_POST['id'];
    $avi=$_POST['avi'];
    $dis=$_POST['dis'];
    $loc=$_POST['loc'];
        $out=$obj->uploc($id, $avi, $dis, $loc, $data);
        print_r($out);
    break;
case 'getloc':
     $out=$obj->getloc($data);
    print_r($out);
    break;
case 'getuser':
    $out=$obj->getuser($data);
    print_r($out);
    break;
case 'getpenuser':
    $out=$obj->getpenuser($data);
    print_r($out);
    break;    
case 'acceptuser':
    $id=$_POST['id'];
    $out=$obj->acpt($id, $data);
    print_r($out);
    break;
case 'deluser':
    $id=$_POST['id'];
    $out=$obj->deluser($id, $data);
    print_r($out);
    break; 
case 'delloc':
    $id=$_POST['id'];
    $out=$obj->delloc($id, $data);
    print_r($out);
    break; 
case 'getacptuser':
    $out=$obj->acptuser($data);
    print_r($out);
    break;
case 'getride':
    $out=$obj->getride($data);
    print_r($out);
    break;
case 'compride':
    $out=$obj->compride($data);
    print_r($out);
    break;
case 'canride':
    $out=$obj->canride($data);
    print_r($out);
    break;
case 'getpenride':
    $out=$obj->getpenride($data);
    print_r($out);
    break;    
case 'acceptride':
    $id=$_POST['id'];
    $out=$obj->acptr($id, $data);
    print_r($out);
    break;
case 'delride':
    $id=$_POST['id'];
    $out=$obj->delr($id, $data);
    print_r($out);
    break;
    //filter all ride
case 'getfilterride':
    $filter=$_POST['filter'];
    if ($filter=='week') {
        $out=$obj->getfilterridew($data);
    } elseif ($filter=='month') {
        $out=$obj->getfilterridem($data);
    } else {
        $out=$obj->getride($data);
    
    }
    
    print_r($out);
    break;
case 'getsortride':
    $sort=$_POST['sort'];
    if ($sort=='ridedate') {
        $out=$obj->getsortd($data);
    } elseif ($sort=='fare') {
        $out=$obj->getsortf($data);
    } elseif ($sort=='ridedatea') {
        $out=$obj->getsortra($data);
    } elseif ($sort=='farea') {
        $out=$obj->getsortfa($data);
    } 
    
    print_r($out);
    break;
    //filrter all ride
    //filrter pending ride
case 'getfilterpendride':
    $filter=$_POST['filter'];
    if ($filter=='weekp') {
        $out=$obj->getfilterpendridew($data);
    } elseif ($filter=='monthp') {
        $out=$obj->getfilterpendridem($data);
    } else {
        $out=$obj->getpenride($data);
    
    }
    
    print_r($out);
    break;
case 'getsortpendride':
    $sort=$_POST['sort'];
    if ($sort=='ridedatep') {
        $out=$obj->getpendsortd($data);
    } elseif ($sort=='farep') {
        $out=$obj->getpendsortf($data);
    } 
    
    print_r($out);
    break;
//filrter complete ride
//filrter complete ride
case 'getfiltercomride':
    $filter=$_POST['filter'];
    if ($filter=='weekc') {
        $out=$obj->getfiltercomridew($data);
    } elseif ($filter=='monthc') {
        $out=$obj->getfiltercomridem($data);
    } else {
        $out=$obj->compride($data);
    
    }
    
    print_r($out);
    break;
case 'getsortcomride':
    $sort=$_POST['sort'];
    if ($sort=='ridedatec') {
        $out=$obj->getcomsortd($data);
    } elseif ($sort=='farec') {
        $out=$obj->getcomsortf($data);
    } 
    
    print_r($out);
    break;
//end filter completed
case 'password':
    $newp=$_POST['newp'];
    $old=$_POST['old'];
    $out=$obj->pass($newp, $old, $adminid, $data);  
    print_r($out);
    break;
case 'invoice':
    $id=$_POST['id'];
    $out=$obj->invoice($id, $data);
    print_r($out);
    break;
case 'editloc':
    $id=$_POST['id'];
    $out=$obj->editloc($id, $data);
    print_r($out);
    break;

case 'blockuser':
    $id=$_POST['id'];
    $out=$obj->ban($id, $data);
    print_r($out);
    break;
}

     $data->close();
    

?>