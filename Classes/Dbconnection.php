<?php
class Dbconnection{
private static $instance = null;
private $pdo;

private function __construct(){
    $this->getconnection();
}

public static function getinstance(){
    if(self::$instance===null){
      self::$instance =new self();
    }
    return self::$instance;
}

 public function getconnection(){
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="assignment";

    
      try {
        if ($this->pdo === null) {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }              
    } catch (PDOException $e) {
        echo "connection failed". $e->getMessage();
    }
}
  public function getPDO(){
   return $this->pdo;
  }
}



