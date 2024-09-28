<?php
  
  require_once __DIR__ ."/../load.php";
   
  


    if($_SERVER["REQUEST_METHOD"]==="POST"){
            header('Content-Type: application/json');
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

              //Generate a unique code for each user
              $code = $codeobj ->generatecode();

              //set the session for  each input field
               $fieldname =['email','username','Firstname','lastname','password','code'];
                $values =[$email,$Username,$firstname,$lastname,$password,$code];
               $data = array_combine($fieldname,$values);

               //function to set the session
               $sessionobj->setsession($data);
               $mailObj->sendmail($email,$firstname,$code);
                $message =['Status'=>'pending','msg'=>' A verification code has been sent to your email. '];
            
                echo json_encode($message);
              

              
              
            
           //  $fieldname =['email','username','firstname','lastname','password'];
            // $values  =[$email,$Username,$firstname,$lastname,$hashedPassword];

             // $data = array_combine($fieldname,$values);
            
            
              
            
            
              //insert data into the database
         /* try{
            $queryObj = new Query();
           $query = $queryObj->insert('users',$data);
             if ($query){
             
            
            
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
            
              

          }*/

              
          
          
          
          
          }
          
    
  