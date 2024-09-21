<?php
require_once "load.php";
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $message =[];
   $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $message=["Status"=>"failed","msg"=>"invalid email format"];


}
    $Username=filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_SPECIAL_CHARS);
    $firstname=filter_input(INPUT_POST, 'Firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname=filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);;
    $password=filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_SPECIAL_CHARS);;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $fieldname =['email','username','firstname','lastname','password'];
    $values  =[$email,$Username,$firstname,$lastname,$hashedPassword];

    $data = array_combine($fieldname,$values);
   
 try{
    $query = $queryObj->insert('users',$data);
    if ($query){
   $message = ["Status"=>"Success","msg"=>"successful registration!"];
  }
   else{
       $message =["Status"=>"failed","msg"=>"failed registration"];
   }

 }catch(PDOException $e){
    if ($e->getCode() == 23000) {
      $message = ["Status"=>"failed","msg"=>"email already exist"];

    } 
    else{
       $message =["Status"=>"failed","msg" =>"errors :could not execute query"];
    }
   
    

}

     
 
 
 echo json_encode($message);
 
}

