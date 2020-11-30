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
        $sql = "INSERT INTO user 
                (`username`,`password`,`name`,`mobile`,`dateofsignup`) 
                VALUES ( '$username', '$pass','$name','$mobile',CURDATE())";
        if ($data->query($sql) === true) {
            $out="inserted";
        } else {
            $error=array('input'=>'form','msg'=>$con->error);
        }
        return $out;
    }
    /**
     * Function Login
     */
    public function login($username,$pass,$data)
    {
        $sql='SELECT * FROM user WHERE 
        (`password`="'.$pass.'" AND `username`="'.$username.'" AND `isblock`=1)';
         $res=$data->query($sql);
        if ($res->num_rows > 0) {
            while ($row=$res->fetch_assoc()) {
                 
                $r=$row["isadmin"];
                if ($r == '1') {
                    $out="admin";
                    $_SESSION["admindata"]=array
                ('username'=>$row['username'],'id'=>$row['userid']);
                } else {
                    $out="customer";
                    $_SESSION["userdata"]=array
                ('username'=>$row['username'],'id'=>$row['userid']);
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
        $sql="SELECT*FROM ride WHERE `userid`=$userid and `status`=1";
        $res=$data->query($sql);
        if ($res->num_rows > 0) {
                    $r=0;
                    $t=0;
            while ($row=$res->fetch_assoc()) {
                   $t++;     
                $r=(int)$row['totalefare']+$r;

            }
            $d=array('a'=>$r,'b'=>$t);
            return $d;    
            
        }
        
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
        $sql = "SELECT `name`,`distance` FROM location";
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
}
?>
