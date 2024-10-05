<?php
require_once "load.php";
if($_SERVER["REQUEST_METHOD"]==="POST"){
    
   $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   $password=trim(filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_SPECIAL_CHARS));

   
   $queryObj = new Query();
   $user =$queryObj->selectEmail($email);
   
   
   //check if user exist
   if($user){
    
    $passwordverified = password_verify($password,$user['password']);
  //  var_dump($hashedpassword, $user['password']);
    //if password is invalid display an error message
    if($passwordverified){
      $message = ['status' => 'success', 'msg' => 'Login successful'];
    
      session_start();
     $_SESSION['id'] = $user['id'];  
     $_SESSION['email'] = $user['email'];  
    }
    else{
      //establish a session for the authenticated user
      //send a successful message on log in
      $message = ['status' => 'error', 'msg' => 'Invalid password'];
    
    //var_dump($_SESSION['user_id'],$_SESSION['email']);

     
     
    
    }
   }
   
   else{
    //code to execute if the user dont exist
    $message = ['status' => 'error', 'msg' => 'User not found'];

   }
   
  


  
   

  
   

 echo json_encode($message);
  
}