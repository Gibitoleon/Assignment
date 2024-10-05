<?php
 require_once __DIR__ ."/../load.php";
 
function validate($dataarray){
     $message = [];
  foreach($dataarray as $key =>$data){
     
     if(empty($data)){
     $message[$key] = ['Status'=>'failed','key'=>$key,'msg'=>$key .'field cannot be empty'];
     }
     else{
       if($key === 'username'){
        $message[$key] = validateUsername($key,$data);
        
       }
       }
       if($key === 'email'){
         $message[$key] = validateEmail($key,$data);
        
       }
       if($key === 'password'){
        $message[$key] = validatepassword($key,$data);
       
    }
       if($key === 'firstname'){
       $message[$key] = validatename($key,$data);
         
      }
    
      if($key === 'lastname'){
        $message[$key]=validatename($key,$data);
        

    }
}
     return $message;

     }
    

  





function validateUsername($key,$data){
    $queryObj = new Query();
    if (!preg_match('/[a-zA-Z]/', $data) || !preg_match('/[0-9]/', $data)) {

       return ['Status' => 'failed','key'=>$key, 'msg' => 'Username must contain both letters and numbers'];
    }
   else if(($queryObj->selectUsername($data))>0){

    return ['Status'=>'failed','key'=>$key,'msg'=>'Username already exists'];
 
   }
     return true;

 }

 function validateEmail($key,$data){
    $queryObj = new Query();
  $domainoptions = ['gmail.com','edu','yahoo.com'];
    if(!empty($data)){
    $emailarray = explode('@',$data);
    $emaildomain =$emailarray[1];
   if(!in_array($emaildomain,$domainoptions)){

    return ['Status' => 'failed','key'=>$key, 'msg' => 'Email domain is not allowed'];
    
   }

   else if(($queryObj->selectUniqueEmail($data))>0){

    return ['Status' => 'failed','key'=>$key, 'msg' => 'Email already exists'];
   }
   return true;

   }
   else{
    return ['Status' => 'failed','key'=>$key, 'msg' => 'Email field is empty'];
   }
 }

 function  validatepassword($key,$data){
   if(strlen($data)<6){
    return ['Status'=>'failed','key'=>$key,'msg'=>'Password should be more than six characters'];
   }
   if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/', $data)) {
    return ['Status' => 'failed', 'key'=>$key,'msg' => 'Password must include at least one uppercase letter, one lowercase letter, and one number'];

  }
   return true;
 }

 function validatename($key,$data){
    
     $data = trim($data);
    if (!preg_match("/^[a-zA-Z-']+$/", $data)) {
        return ['Status' => 'failed','key'=>$key, 'msg' => 'Name can only contain letters, hyphens, and apostrophes.'];
    }
    return true;
    }
    
 



