<?php

use Database as GlobalDatabase;

class DATABASE{
    static $instance;
   private $connection;
   private function __construct()
{    
    $servername="localhost";
     $username="root";
     $password="";
     $databasename="library";
    $this->connection=new mysqli($servername,$username,$password,$databasename);
    if($this->connection->connect_error)
    {
        die("faild connection:".$this->connection->connect_error);
    }
}
public static function getinstance()
{ if(!isset(self::$instance))
    {
        self::$instance=new DATABASE();
    }
   return self::$instance;

} 
public  function getconnection()
{
    return $this->connection;

}

}
$data=DATABASE::getinstance();
$data->getconnection();
// var_dump($data);