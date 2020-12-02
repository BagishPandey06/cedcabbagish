<?php
 /**
  * * PHP version 7.2.10
  * 
  * @category Components
  * @package  PackageName
  * @author   Bagish <Bagishpandey999@gmail.com>
  * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
  * @link     http://localhost/training2/aj.php
  */ 
  session_start();
  require 'Config.php';
require 'user.php';
$obj =new Config();
$data = $obj->Connect();
$obj=new User();
$arr=$obj->getusrloc($data);
    $pick=$_REQUEST['pick'];//to fetch pickup location
    $drop=$_REQUEST['drop'];//to fetch drop location
    $cab=$_REQUEST['cab'];//to fetch cab detail
if ($cab=="CedMicro") {
        $kg=0;
} else {
        $kg=$_REQUEST['kg'];
}
     $cost=0;//cost to caluculate money
    global $fixed;
    global $distance;
    // $arr=array(
    //     'Charbagh'=>'0',
    //     'Indira Nagar'=>'10',
    //     'BBD'=>'30',
    //     'Barabanki'=> '60',
    //     'Faizabad'=> '100',
    //     'Basti'=>'150',
    //     'Gorakhpur'=>'210'
    // );
    global $pd;//to initilazie pickup distance
    global $dd;//to initilazie drop distance
    //to push pickup distance to pd
    foreach ($arr as $keys=>$values) {
        if ($keys==$pick) {
            $pd=(int)$values;
        }
       
    }
    //to push drop distance to dd
    foreach ($arr as $key=>$value) {
        if ($key==$drop) {
            $dd=(int)$value;
            
        }
    }
    $distance =abs((int)$dd-(int)$pd);//to get absolute distance
    
    
    
    switch ($cab) {
    case 'CedMicro':
        micro($distance, $pick, $drop, $kg, $cab);
        break;
    case 'CedMini':
        mini($distance, $pick, $drop, $kg, $cab);
        break;
    case 'CedRoyal':
        royal($distance, $pick, $drop, $kg, $cab);
        break;
    case 'CedSuv':
        suv($distance, $pick, $drop, $kg, $cab);
        break;         
    };
    /**
     * Convert an object to an array
     *
     * @distance object $object The object to convert
     * @return micro()
     */
    function micro($distance, $pick, $drop, $kg, $cab)
    {
        $cost=0;
        $fixed=50;
        if ($distance>0 && $distance<=10) {
             $fixed+=($distance*13.50);
        } elseif ($distance>10 && $distance<=50) {
            $fixed+=(10*13.50);
            $distance-=10;
            $fixed+=($distance*12.00);
        } elseif ($distance>50 && $distance<=150) {
            $fixed+=(10*13.50);
            $distance-=10;
            $fixed+=(50*12.00);
            $distance-=50;
            $fixed+=($distance*10.20);

        } elseif ($distance>150) {
            $fixed+=(10*13.50);
            $distance-=10;
            $fixed+=(50*12.00);
            $distance-=50;
            $fixed+=(100*10.20);
            $distance-=100;
            $fixed+=($distance*8.50);
            
        }
        display($distance, $fixed, $cost, $pick, $drop, $kg, $cab);
    }
    /**
     * Convert an object to an array
     *
     * @distance object $object The object to convert
     * @return   royal()
     */
    function royal($distance, $pick, $drop, $kg, $cab)
    {
        if ($kg<=0) {
            $cost=0;
        } elseif ($kg<=10 ) {
            $cost=50;
        } elseif ($kg>10 && $kg<=20 ) {
            $cost=100;
        } elseif ($kg>20) {
            $cost=200;
        }
        $fixed=200;
        if ($distance>0 && $distance<=10) {
             $fixed+=($distance*15.50);
        } elseif ($distance>10 && $distance<=50) {
            $fixed+=(10*15.50);
            $distance-=10;
            $fixed+=($distance*14.00);
        } elseif ($distance>50 && $distance<=150) {
            $fixed+=(10*15.50);
            $distance-=10;
            $fixed+=(50*14.00);
            $distance-=50;
            $fixed+=($distance*12.20);

        } elseif ($distance>150) {
            $fixed+=(10*15.50);
            $distance-=10;
            $fixed+=(50*14.00);
            $distance-=50;
            $fixed+=(100*12.20);
            $distance-=100;
            $fixed+=($distance*10.50);
            
        }
        display($distance, $fixed, $cost, $pick, $drop, $kg, $cab);
    }
    /**
     * Convert an object to an array
     *
     * @distance object $object The object to convert
     * @return mini()
     */
    function mini($distance, $pick, $drop, $kg, $cab)
    {
        if ($kg<=0) {
            $cost=0;
        } elseif ($kg<=10 ) {
            $cost=50;
        } elseif ($kg>10 && $kg<=20 ) {
            $cost=100;
        } elseif ($kg>20) {
            $cost=200;
        }
        $fixed=150;
        if ($distance>0 && $distance<=10) {
             $fixed+=($distance*14.50);
        } elseif ($distance>10 && $distance<=50) {
            $fixed+=(10*14.50);
            $distance-=10;
            $fixed+=($distance*13.00);
        } elseif ($distance>50 && $distance<=150) {
            $fixed+=(10*14.50);
            $distance-=10;
            $fixed+=(50*13.00);
            $distance-=50;
            $fixed+=($distance*11.20);

        } elseif ($distance>150) {
            $fixed+=(10*14.50);
            $distance-=10;
            $fixed+=(50*13.00);
            $distance-=50;
            $fixed+=(100*11.20);
            $distance-=100;
            $fixed+=($distance*9.50);
            
        }
        display($distance, $fixed, $cost, $pick, $drop, $kg, $cab);
    }
    /**
     * Convert an object to an array
     *
     * @distance object $object The object to convert
     * @return suv()
     */
    function suv($distance, $pick, $drop, $kg, $cab)
    {
        if ($kg<=0) {
            $cost=0;
        } elseif ($kg>0 && $kg<=10 ) {
            $cost=50;
        } elseif ($kg>10 && $kg<=20 ) {
            $cost=100;
        } elseif ($kg>20) {
            $cost=200;
        }
        $fixed=250;
        if ($distance>0 && $distance<=10) {
             $fixed+=($distance*16.50);
        } elseif ($distance>10 && $distance<=50) {
            $fixed+=(10*16.50);
            $distance-=10;
            $fixed+=($distance*15.00);
        } elseif ($distance>50 && $distance<=150) {
            $fixed+=(10*16.50);
            $distance-=10;
            $fixed+=(50*15.00);
            $distance-=50;
            $fixed+=($distance*13.20);

        } elseif ($distance>150) {
            $fixed+=(10*16.50);
            $distance-=10;
            $fixed+=(50*15.00);
            $distance-=50;
            $fixed+=(100*13.20);
            $distance-=100;
            $fixed+=($distance*11.50);
            
        }
        display($distance, $fixed, $cost, $pick, $drop, $kg, $cab);
    }
    /**
     * Convert an object to an array
     *
     * @distance object $object The object to convert
     * @return   dispaly()
     */
    function display($distance, $fixed,$cost,$pick,$drop,$kg,$cab) 
    {
         $cost=(int)$cost+(int)$fixed;
         echo $cost;
         $_SESSION['ridedata']=array(
            'pick'=>$pick,
            'drop'=>$drop,
            'cab'=>$cab,
            'cost'=>$cost,
            'kg'=>$kg ,
            'distance'=>$distance);
            
    }
    //session_destroy();
    ?>