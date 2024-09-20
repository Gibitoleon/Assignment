<?php

 
 class Profile{
        private $email;
        private $firstname;
        private $lastname;
        private $username;
    
    
    public function __construct($email,$firstname,$lastname,$username)
    {
        $this->email =$email;
        $this->firstname =$firstname;
        $this->lastname =$lastname;
        $this->username =$username;


}
    
    
    
    
    public function showprofile(){
        ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="Styles/Profile.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-md-8">
                <!-- Profile Details -->
                <div class="card">
                    <div class="card-header">
                        <h4>Profile</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Welcome :<?= $this->username?></h5>
                        <p class="card-text"><strong>Email:</strong><?=$this->email?></p>
                        <p class="card-text"><strong>Username:</strong><?= $this->username?></p>
                        <p class="card-text"><strong>First Name:</strong><?= $this->firstname?></p>
                        <p class="card-text"><strong>Last Name:</strong><?=$this->lastname?></p>

                        <!-- Edit Profile Button -->
                        <a href="#" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div style ="margin-top:30px">
       <a style="padding:10px 20px;border:1px solid blue; background:#007bff; color:#fff;
        border-radius:5px;text-decoration:none;" href="logout.php">logout</a>
        </div> 
       
    </div>

           
</body>
</html>
     
  <?php
    }
        
 }