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

class Admin
{
    public $rows=array();
    public function insertloc($location, $distance, $avi, $data) 
    {
        $sql = "INSERT INTO location 
                (`name`,`distance`,`isavilable`) 
                VALUES ( '$location', '$distance','$avi')";
        if ($data->query($sql) === true) {
            $out="inserted";
        } else {
            $out=array('input'=>'form','msg'=>$con->error);
        }
        return $out;
    }
    public function getloc($data) 
    {
        $sql = "SELECT * FROM location";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function uploc( $id, $avi, $dis, $loc, $data) 
    {
        $sql = "UPDATE `location` SET `isavilable`='$avi',`distance`='$dis',`name`='$loc' WHERE `id`=$id";
        if ($data->query($sql) === true) {
            $out="inserted";
        } else {
            $out="sory";
        }
        return $out;
       
    }
    public function editloc($id, $data) 
    {
        $sql = "SELECT * FROM location where `id`=$id";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function getuser($data) 
    {
        $sql = "SELECT * FROM user";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    
    public function getride($data) 
    {
        $sql = "SELECT * FROM ride";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function acptuser($data) 
    {
        $sql = "SELECT * FROM user where `isblock`=1";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function getpenuser($data) 
    {
        $sql = "SELECT * FROM user where `isblock`=0";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function acpt($id, $data) 
    {
        $sql ="UPDATE user SET `isblock`=1,`dateofsignup`=CURDATE() WHERE `userid`=$id";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="khtm"; 
        }
        return $out;
       
    }
    public function ban($id, $data) 
    {
        $sql ="UPDATE user SET `isblock`=0,`dateofsignup`=CURDATE() WHERE `userid`=$id";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="khtm"; 
        }
        return $out;
       
    }
    public function deluser($id, $data) 
    {
        $sql ="DELETE FROM user WHERE `userid`=$id";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="khtm"; 
        }
        return $out;
       
    }
    public function delloc($id, $data) 
    {
        $sql ="DELETE FROM `location` WHERE `id`=$id";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="khtm"; 
        }
        return $out;
       
    }
    public function getpenride($data) 
    {
        $sql = "SELECT * FROM ride where `status`=0";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function acptr($id, $data) 
    {
        $sql ="UPDATE ride SET `status`=1,`ridedate`=CURDATE() WHERE `rideid`=$id";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="khtm"; 
        }
        return $out;
       
    }
    public function delr($id, $data) 
    {
        $sql ="UPDATE ride SET `status`=2,`ridedate`=CURDATE() WHERE `rideid`=$id";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="khtm"; 
        }
        return $out;
       
    }
    public function compride($data) 
    {
        $sql = "SELECT * FROM ride where `status`=1";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function canride($data) 
    {
        $sql = "SELECT * FROM ride where `status`=2";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }


    public function fetchdata($data)
    {
        //echo "<pre>";
        $tu=mysqli_fetch_assoc($data->query('SELECT count(userid) as num from user'));
        $tau=mysqli_fetch_assoc($data->query("SELECT count(userid) as num from user where `isblock`=1"));
        $tpu=mysqli_fetch_assoc($data->query("SELECT count(userid) as num from user where `isblock`=0"));
        $tr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride"));
        $cr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride where `status`=1"));
        $pr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride where `status`=0"));
        $canr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride where `status`=2"));
        $tl=mysqli_fetch_assoc($data->query("SELECT count(id) as num from location where `isavilable`=1"));
        $te=$data->query("SELECT * from ride where `status`=1");
        $r=0;
        while ($row=$te->fetch_assoc()) {    
            $r=(int)$row['totalefare']+$r;

     }
       
        $out=array(
            'tu'=>$tu['num'],
            'tau'=>$tau['num'],
            'tpu'=>$tpu['num'],
            'tr'=>$tr['num'],
            'cr'=>$cr['num'],
            'pr'=>$pr['num'],
            'canr'=>$canr['num'],
            'tl'=>$tl['num'],
            't'=>$r
        );
        return $out;
    }
    //all ride
    public function getfilterridew($data)
    {
        
        $sql="SELECT *FROM ride Where `ridedate` > DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY `ridedate`";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getfilterridem($data)
    {
            $sql="SELECT *FROM ride Where `ridedate` > DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY `ridedate`";

        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getsortd($data)
    {
        
        $sql="SELECT *FROM ride order by DATE(`ridedate`) desc";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getsortf($data)
    {
        
        $sql="SELECT * FROM ride ORDER BY `totalefare` DESC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getsortra($data)
    {
        
        $sql="SELECT *FROM ride order by DATE(`ridedate`) ASC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getsortfa($data)
    {
        
        $sql="SELECT * FROM ride ORDER BY `totalefare` ASC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    //pending ride filter
    public function getfilterpendridew($data)
    {
        
        $sql="SELECT *FROM ride Where `status`=0 and `ridedate` > DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY `ridedate`";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getfilterpendridem($data)
    {
            $sql="SELECT *FROM ride Where `status`=0 and `ridedate` > DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY `ridedate`";

        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
  
    //pending sort
    public function getpendsortd($data)
    {
        
        $sql="SELECT *FROM ride where `status`=0 order by DATE(`ridedate`) desc";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getpendsortf($data)
    {
        
        $sql="SELECT * FROM ride where `status`=0 ORDER BY (`totalefare`) DESC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    //filter completed
    public function getfiltercomridew($data)
    {
        
        $sql="SELECT *FROM ride Where `status`=1 and `ridedate` > DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY `ridedate`";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getfiltercomridem($data)
    {
            $sql="SELECT *FROM ride Where `status`=1 and `ridedate` > DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY `ridedate`";

        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
  
    //completed sort
    public function getcomsortd($data)
    {
        
        $sql="SELECT *FROM ride where `status`=1 order by DATE(`ridedate`) desc";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getcomsortf($data)
    {
        
        $sql="SELECT * FROM ride where `status`=1 ORDER BY (`totalefare`) DESC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    //end completed filter



   
    public function pass($newp, $old, $adminid, $data)
    {   
        $sql="SELECT * FROM user WHERE `userid`=$adminid";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $oldp=$row['password'];
            }
            
        }
        
        $olda=md5($old);
        

        if ($oldp==$olda) {
            $newpa=md5($newp);
            $sql="UPDATE user SET `password`='$newpa' WHERE `userid`=$adminid";
            if ($res=$data->query($sql)==true) {
                $out="inserted";
            } else {
                $out="sorry"; 
            }
              return $out;
        } 
    }
    public function invoice($id, $data) 
    {
        $sql = "SELECT * FROM ride where`rideid`='$id'";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
}
?>
