
<?php
 require_once __DIR__ ."/../load.php";
if($_SERVER["REQUEST_METHOD"]==="POST"){

    $code=trim(filter_input(INPUT_POST, 'verification_code', FILTER_SANITIZE_SPECIAL_CHARS));
    $message =[];

    //getting them session variables
    session_start();
    if(isset($_SESSION['code'])&& isset($_SESSION['email'])&& isset($_SESSION['username'])&& isset($_SESSION['password'])&& isset($_SESSION['firstname'])&&isset($_SESSION['lastname'])&&isset($_SESSION['codeexpiry'])){

      $newcode =$_SESSION['code'];
      $email =$_SESSION['email'];
      $Username =$_SESSION['username'];
      $password =$_SESSION['password'];
      $firstname =$_SESSION['firstname'];
      $lastname =$_SESSION['lastname'];
      $codeexpiry =$_SESSION['codeexpiry'];


    }
  

    $fieldname =['email','username','firstname','lastname','password'];
    $values  =[$email,$Username,$firstname,$lastname,$password];

         $data = array_combine($fieldname,$values);

    //check if the code has expired AND do the appropiate
      
    //comparing the code  with the input  code
    if($code ===$newcode){
        
          //insert data into the database
           //if true insert user details to db and redirect to the login page
          try{
            $queryObj = new Query();
           $query = $queryObj->insert('users',$data);
             if ($query){
             
                $message =["Status"=>"Success","msg"=>" Successful registration"];
              
           }
           else{
                $message =["Status"=>"failed","msg"=>"failed registration"];
            }

    } catch(PDOException $e){
       
        
           $message =["Status"=>"failed","msg" =>"errors :could not execute query"];
        
       
         

     }   

}else{
    $message=["Status"=>"failed","msg"=>"invalid code:$code"];
}
   
    echo  json_encode($message);
}

