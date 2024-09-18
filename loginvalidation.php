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
     //send a successful login message
     $message = ['status' => 'success', 'msg' => 'Login successful'];
     //establish a session for the authenticated user
    
     $_SESSION['user_id'] = $user['id'];  
     $_SESSION['email'] = $user['email'];  
    }
   }
   
   else{
    //code to execute if the user dont exist
    $message = ['status' => 'error', 'msg' => 'User not found'];

   }
   
  


  
   

  
   

 echo json_encode($message);
  
}