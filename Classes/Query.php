<?php
session_start();
require_once "load.php";


class Query{

    private $pdo;

   public function __construct()
   {
    $dbObj =Dbconnection::getinstance();
    $this->pdo =$dbObj->getPDO();
   }


 public function insert($table,$data) {
    $fieldname = array_keys($data);
    $fieldvalues =array_values($data);
    $newfieldname =implode(',',$fieldname);
   // $newfieldvalues =implode(','.$fieldvalues);

    $placeholder =implode(',',array_map(function($name){
      return ':' .$name;
     },$fieldname));
       
    


    try{
    $sql ="INSERT INTO $table($newfieldname)
    VALUES($placeholder)";

    $stmt =$this->pdo->prepare($sql);
    foreach($fieldvalues as $key=>$value){
      $stmt->bindParam(':'. $fieldname[$key],$fieldvalues[$key]);
    }
    


    $stmt->execute();

     if($stmt->rowcount()>0){
        return true;
     }
       return false;

    }catch(PDOException $e){

      
       throw $e;
        

    }





 }
    
 public function selectEmail($email){
   try{
   //query
   $sql ="SELECT * FROM users WHERE email =:email";

   //create the statement
   $stmt =$this->pdo->prepare($sql);
   $stmt->bindParam(':email', $email, PDO::PARAM_STR);

   //execute the statement
   $stmt->execute();

   //fetching the result
   $user=$stmt->fetch(PDO::FETCH_ASSOC);
   return $user;
   }
   catch(PDOException $e){

      echo "could not execute query" . $e->getMessage() ;

   }

 }
}