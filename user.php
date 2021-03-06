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

   class User
{
    public $userid;
    public $username;
    public $name;
    public $dateofsignup;
    public $mobile;
    public $isblock;
    public $password;
    public $isadmin;
    public $rows=array();
    public $oldp;
    /**
     * Function Sign
     */
    public function sign($username, $name, $mobile, $pass, $data) 
    {
        $sql="SELECT * from `user` where `username` LIKE '$username'";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            return 'same';
           
        } else {
                     $sql = "INSERT INTO user 
                (`username`,`password`,`name`,`mobile`,`dateofsignup`) 
                VALUES ( '$username', '$pass','$name','$mobile',CURDATE())";
            if ($data->query($sql) === true) {
                    $out="inserted";
            } else {
                    $out=$data->error;
            }
                return $out;
       
        }
        
    }
    /**
     * Function Login
    */
    public function login($username,$pass,$data)
    {
        $sql='SELECT * FROM user WHERE 
        `password`="'.$pass.'" AND `username`="'.$username.'"';
         $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                 $b=$row["isblock"];
                $r=$row["isadmin"];
                if ($r == '1') {
                    $_SESSION['admindata']=array
                    ('username'=>$row['username'],'id'=>$row['userid']);
                    $out="admin";
                    
                } else if (($r=='0') && ($b=='1') ) {
                    $_SESSION["userdata"]=array
            ('username'=>$row['username'],'id'=>$row['userid']);         
                    $out="customer";
                    
                } else if (($r=='0') && ($b=='0') ) {
                     $out="wait";
                } else {
                    $out="credentials";
                }
                return $out;
            }
        } else {
            $error=array('input'=>'form','msg'=>"login details are wrong");  
        }

    }
    public function ride($pick, $drop, $cab, $kg, $cost, $data, $userid, $distance) 
    {
        $sql = "INSERT INTO ride
                (`ridedate`,`froml`,`tol`,`totaldistance`,
                `luggage`,`totalefare`,`cab`,`userid`) 
                VALUES ( CURDATE(),'$pick','$drop','$distance',
                '$kg','$cost','$cab','$userid')";
        if ($data->query($sql) === true) {
            $out="inserted";
        } else {
            
             $out=array('input'=>'form','msg'=>$data->error);
        }
        return $out;
    }
    public function get($userid, $data)
    {
        $tr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride WHERE `userid`=$userid"));
        $cr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride where `status`=1 and `userid`=$userid"));
        $pr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride where `status`=0 and `userid`=$userid"));
        $canr=mysqli_fetch_assoc($data->query("SELECT count(rideid) as num from ride where `status`=2 and `userid`=$userid"));
        $te=$data->query("SELECT * from ride where `status`=1 and `userid`=$userid");
        $r=0;
        while ($row=$te->fetch_assoc()) {    
            $r=(int)$row['totalefare']+$r;

     }
            $d=array(
                'a'=>$r,
                'b'=>$tr['num'],
                'c'=>$cr['num'],
                'd'=>$pr['num'],
                'e'=>$canr['num']
            );
            return $d;    
            

        
    }
    public function getuser($userid, $data)
    {
        $sql="SELECT * FROM user WHERE `userid`=$userid";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
                    $r=0;
                    $t=0;
            while ($row=$res->fetch_assoc()) {
                $d=array(
                    'a'=>$row['name'],'b'=>$row['mobile'],'c'=>$row['password']);
            }
            return $d;    
            
        }
        
    }
    public function update($name, $mobile, $userid, $data)
    {
        $sql="UPDATE user SET`name`='$name',`mobile`='$mobile'WHERE `userid`=$userid";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="sorry"; 
        }
        return $out;
    }
    public function pass($newp, $old, $userid, $data)
    {   
        $sql="SELECT * FROM user WHERE `userid`=$userid";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $oldp=$row['password'];
            }
            
        }
        
        $olda=md5($old);
        

        if ($oldp==$olda) {
            $newpa=md5($newp);
            $sql="UPDATE user SET`password`='$newpa'WHERE `userid`=$userid";
            if ($res=$data->query($sql)==true) {
                $out="inserted";
            } else {
                $out="sorrydfg"; 
            }
              return $out;
        } else {
              return "sorry";
        }
    }
    public function getusrloc($data)
    {
        $sql = "SELECT `name`,`distance` FROM location where `isavilable`=1";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[$row['name']]=$row['distance'];
            }
            return $this->rows;
        }
    }
    public function pndri($userid, $data) 
    {
        $sql = "SELECT * FROM ride where `userid`='$userid' and `status`=0";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $rows[]=$row;
            }
            return json_encode($rows);
        }
    }
    public function getfilterpendridew($userid, $data)
    {
        $sql = "SELECT * FROM ride where`userid`='$userid' and  `status`=0 and `ridedate` > DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY `ridedate`";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function getfilterpendridem($userid, $data)
    {
            $sql="SELECT *FROM ride Where `userid`='$userid' and `status`=0 and `ridedate` > DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY `ridedate`";

        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getpendsortd($userid, $data)
    {
        
        $sql="SELECT *FROM ride Where  `status`=0 and `userid`='$userid'order by DATE(`ridedate`) desc";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getpendsortf($userid, $data)
    {
        
        $sql="SELECT * FROM ride Where  `status`=0 and`userid`='$userid' ORDER BY `totalefare` DESC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }

    public function getpendsortra($userid, $data)
    {
        
        $sql="SELECT *FROM ride Where  `status`=0 and`userid`='$userid' order by DATE(`ridedate`) ASC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getpendsortfa($userid, $data)
    {
        
        $sql="SELECT * FROM ride Where  `status`=0 and`userid`='$userid' ORDER BY `totalefare` ASC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function delr($id, $data) 
    {
        $sql ="DELETE FROM ride WHERE `rideid`=$id";
        if ($res=$data->query($sql)==true) {
            $out="inserted";
        } else {
            $out="khtm"; 
        }
        return $out;
       
    }
    public function compride($userid, $data) 
    {
        $sql = "SELECT * FROM ride where`userid`='$userid' and `status`=1";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function can($userid, $data) 
    {
        $sql = "SELECT * FROM ride where`userid`='$userid' and `status`=2";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function allride($userid, $data) 
    {
        $sql = "SELECT * FROM ride where`userid`='$userid'";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function getfilterridew($userid, $data)
    {
        $sql = "SELECT * FROM ride where`userid`='$userid' and `ridedate` > DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY `ridedate`";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }
       
    }
    public function getfilterridem($userid, $data)
    {
            $sql="SELECT *FROM ride Where `userid`='$userid' and `ridedate` > DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY `ridedate`";

        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getsortd($userid, $data)
    {
        
        $sql="SELECT *FROM ride Where `userid`='$userid'order by DATE(`ridedate`) desc";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getsortf($userid, $data)
    {
        
        $sql="SELECT * FROM ride Where `userid`='$userid' ORDER BY `totalefare` DESC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }

    public function getsortra($userid, $data)
    {
        
        $sql="SELECT *FROM ride Where `userid`='$userid' order by DATE(`ridedate`) ASC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
        }

    }
    public function getsortfa($userid, $data)
    {
        
        $sql="SELECT * FROM ride Where `userid`='$userid' ORDER BY `totalefare` ASC";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                $this->rows[]=$row;
            }
            return json_encode($this->rows);
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
