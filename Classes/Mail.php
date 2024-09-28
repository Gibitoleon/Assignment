<?php

require __DIR__.'/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 

class Mail{
    private $username;
    private $password;

     public function __construct($username,$password){
     $this->username =$username;
     $this->password =$password;
     }

    public function sendmail($recipientemail,$recipientname,$code){
        $mail = new PHPMailer(true);
        try{
        // Server settings
            $mail->isSMTP();                                         
            $mail->Host       = 'smtp.gmail.com';                 
            $mail->SMTPAuth   = true;                                
            $mail->Username   = $this->username ;          
            $mail->Password   = $this->password;              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
            $mail->Port       = 587;                                

            // Recipients
            $mail->setFrom($this->username, 'Gabuto');    // Sender's email and name
            $mail->addAddress($recipientemail, $recipientname); // Add a recipient

            // Content
            $mail->isHTML(true);                                       // Set email format to HTML
            $mail->Subject = 'Verification link';
            $mail->Body    = '<p>Hello'. $recipientname . ',This is you verification code:'. $code .'</p>';
            $mail->AltBody = 'Hello'. $recipientname . 'This is you verification code:'. $code ;

            $mail->send();                                            // Send the email
        
        } 
        catch (Exception $e) {
        echo "Message could not be sent . Mailer Error: {$mail->ErrorInfo}";
        }


        }



}