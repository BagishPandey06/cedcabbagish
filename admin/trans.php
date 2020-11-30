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
require '../Config.php';
require 'Admin.php';
$obj =new Config();
$data = $obj->Connect();
$obj=new Admin();
$a=$_POST['action'];
switch($a){
case 'insertloc':
    $location=$_POST['location'];
    $distance=$_POST['distance'];
    $avi=$_POST['avi'];
        $out=$obj->insertloc($location, $distance, $avi, $data);
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
case 'getfilterride':
    $filter=$_POST['filter'];
    if ($filter=='week') {
        $out=$obj->getfilterridew($data);
    } elseif ($filter=='month') {
        $out=$obj->getfilterridem($data);
    }
    
    print_r($out);
    break;
case 'getsortride':
    $sort=$_POST['sort'];
    if ($sort=='ridedate') {
        $out=$obj->getsortd($data);
    } elseif ($filter=='fare') {
        $out=$obj->getsortf($data);
    }
    
    print_r($out);
    break;
}

     $data->close();
    

?>