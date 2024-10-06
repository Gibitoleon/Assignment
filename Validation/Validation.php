<?php
  
  require_once __DIR__ ."/../load.php";
   require_once 'send_email.php';
   require_once 'validatefunction.php';
  


    if($_SERVER["REQUEST_METHOD"]==="POST"){
            header('Content-Type: application/json');
               $message =[];
              $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
              if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $message=["Status"=>"failed","msg"=>"invalid email format"];


          }

              $Username=trim(filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_SPECIAL_CHARS));
              $firstname=trim(filter_input(INPUT_POST, 'Firstname', FILTER_SANITIZE_SPECIAL_CHARS));
              $lastname=trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
              $password=trim(filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_SPECIAL_CHARS));

            

              //Generate a unique code for each user
              $code =trim( $codeobj ->generatecode());
             

              //Array data for manipulation
               $fieldname =['email'=>$email,'username'=>$Username,'firstname'=>$firstname,'lastname'=>$lastname,'password'=>$password,'code'=>$code];
               
              
               $messages =validate($fieldname);
               $haserrors =false;
                     foreach($messages as $key=>$data){
                           if($data!==true){
                            
                            $messages[$key] =$data;
                        
                            $haserrors =true;
                          
                           }
                          
                          }
                        if($haserrors){
                          echo json_encode($messages);
                          exit;
                        }


               
                   
                       
                       
                        $fieldname['password'] =password_hash( $fieldname['password'], PASSWORD_DEFAULT);
                         session_start();
                        foreach($fieldname as $field=>$value){
                           $_SESSION[$field] =$value;
                        }
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
                         echo json_encode($message);
                       }
                         else{
                         $message = ['Status' => 'failedSend', 'msg' => 'Failed to send verification email. Please try again later.'];
                         echo json_encode($message);
                       }

                       }
                           
                          
                         
                           
                          

                          
                          
                          
                           
                           
                          
                          
                          

                      
                  
                   
                  
                  
                   
                         
                          
                      
                    
                  
                
                  
   
                 
                 
                 
                 
                

                    
                  
                

                  
              

                 


                



               

               
                
               

             
               
              
          
    
  