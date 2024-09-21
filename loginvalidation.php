<?php
require_once "load.php";
if($_SERVER["REQUEST_METHOD"]==="POST"){
    
   $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   $password=filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_SPECIAL_CHARS);

   $user =$queryObj->selectEmail($email);
   
   
   //check if user exist
   if($user){
    
    $passwordverified = password_verify($password,$user['password']);
    //if password is invalid display an error message
    if(!$passwordverified){
        $message = ['status' => 'error', 'msg' => 'Invalid password'];
    }
    else{
      //establish a session for the authenticated user
    
      session_start();
     $_SESSION['id'] = $user['id'];  
     $_SESSION['email'] = $user['email'];  
    //var_dump($_SESSION['user_id'],$_SESSION['email']);

     //send a successful message on log in
     $message = ['status' => 'success', 'msg' => 'Login successful'];
     
    
    }
   }
   
   else{
    //code to execute if the user dont exist
    $message = ['status' => 'error', 'msg' => 'User not found'];

   }
   
  


  
   

  
   

 echo json_encode($message);
  
}