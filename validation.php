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
   

  $message = $queryObj->insert('users',$data);
   

 echo json_encode($message);
 
}

