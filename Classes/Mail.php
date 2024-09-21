<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
 

class Mail{
    public function sendmail($recipientemail,$recipientname,$code){
        $mail = new PHPMailer(true);
        try{
        // Server settings
            $mail->isSMTP();                                         
            $mail->Host       = 'smtp.gmail.com';                 
            $mail->SMTPAuth   = true;                                
            $mail->Username   = getenv('EMAIL_USERNAME') ;          
            $mail->Password   = getenv('EMAIL_PASSWORD');              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
            $mail->Port       = 587;                                

            // Recipients
            $mail->setFrom( getenv('EMAIL_USERNAME'), 'Gabuto');    // Sender's email and name
            $mail->addAddress($recipientemail, $recipientname); // Add a recipient

            // Content
            $mail->isHTML(true);                                       // Set email format to HTML
            $mail->Subject = 'Verification link';
            $mail->Body    = '<p>Hello'. $recipientname . ',This is you verification code:'. $code .'</p>';
            $mail->AltBody = 'Hello'. $recipientname . 'This is you verification code:'. $code ;

            $mail->send();                                            // Send the email
            echo 'Message has been sent';
        } 
        catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        }



}