
<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

session_start();

if(!isset($_SESSION['users']['email1'])) {   

    header("location: error.php");

} else {

    $name_entry = $_SESSION['users']['name1'];
    $email_entry = $_SESSION['users']['email1'];
    $token_entry = $_SESSION['users']['token_tok'];

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'chrisogili12@gmail.com';                     //SMTP username
        $mail->Password   = 'gle9090#';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('chrisogili12@gmail.com', 'Ogili Christian');
        $mail->addAddress("$email_entry", "$name_entry");     //Add a recipient
        $mail->addReplyTo('chrisogili12@gmail.com', 'Ogili Christian');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verify Your Email';
        $mail->Body    = '
        <html>
            <head>
                <title>'.$name_entry.' Verify Your Email</title>
            </head>
            <body>
            <a href="https://auth-only.herokuapp.com/verifyemail?id='.$token_entry.'">Verify</a>
            </body>
        </html>
        ';

        $success = $mail->send();

        if($success) {
            
            header("location: sent");
            
            // echo 'Message has been sent';
        }

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

 
?>