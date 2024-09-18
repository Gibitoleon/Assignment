<?php
require_once 'load.php';



$userid =$_SESSION['user_id'];
$email =  $_SESSION['email'];

 if (!isset($userid)) {
    // Redirect to login if user is not logged in
    header("Location: login.php");
    exit();
 }

 //access user details for display in the UI
  $user =$queryObj->selectEmail($email);

   $email =$user['email'];
   $firstname =$user['firstname'];
   $lastname =$user['lastname'];
   $username =$user['username'];

 $ProfileObj = new Profile($email,$firstname,$lastname,$username);
 $ProfileObj->showprofile();