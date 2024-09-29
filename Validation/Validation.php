<?php
  
  require_once __DIR__ ."/../load.php";
   require_once 'send_email.php';
  


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
               $fieldname =['email'=>$email,'username'=>$Username,'firstname'
               =>$firstname,'lastname'=>$lastname,'password'=>$lastname,'code'=>$code];
                session_start();
               foreach($fieldname as $field=>$value){
                  $_SESSION[$field] =$value;
               }
              
               //function to set the session
                // $_SESSION['email'] =$email;
                // $_SESSION['username']=$Username;
                // $_SESSION['Firstname'] =$firstname;
                // $_SESSION['lastname'] =$lastname;
                // $_SESSION['passworD'] = $password;
                // $_SESSION['code'] =$code;
              
                //sending request to email endpoint
                 $newdata =[
                    'email' => $email,
                    'firstname' => $firstname,
                    'code' => $code
                 ];
                  //encoding
                 $jsonData = json_encode($newdata);
                 $value =sendEmail($jsonData);
                if($value){
                 $message =['Status'=>'pending','msg'=>' A verification code has been sent to your email. '];
                }
                else{
                  $message = ['Status' => 'failed', 'msg' => 'Failed to send verification email. Please try again later.'];
                }
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
          
    
  