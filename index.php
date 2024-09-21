<?php

require_once 'load.php';
session_start();
if(isset($_SESSION['email'],$_SESSION['id'])){
//access user details for display in the UI
$user =$queryObj->selectEmail($_SESSION['email']);

$email =$user['email'];
$firstname =$user['firstname'];
$lastname =$user['lastname'];
$username =$user['username'];

$ProfileObj = new Profile($email,$firstname,$lastname,$username);
$ProfileObj->showprofile();


}
else{
 
    // Redirect to login if user is not logged in
    header("Location:login.php");
    exit();
 }
 

 