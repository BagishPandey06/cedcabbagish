<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/config.php
 */

class Config
{
    public $hostname;
    public $username;
    public $password;
    public $dbname;
    public $con;
    /**
     * Constructor function
     */
    public function __construct()
    {
        $this->hostname="localhost";
        $this->username="root";
        $this->password="";
        $this->dbname="rider";
    }
    /**
     * Constructor function
     * @return Connect
     */
    public function Connect()
    {
        $this->con = new mysqli
        ($this->hostname, $this->username, $this->password, $this->dbname);
        if ($this->con->connect_error) {
            die("Not Connected".$this->con->connect_error);
        } else {
             return $this->con;
        
        }
    }

}

?>