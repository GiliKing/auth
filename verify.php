
<?php


session_start();

if(!isset($_SESSION['users']['email1'])) {   

    header("location: error.php");

} else {


    $name = $_SESSION['users']['name1'];
    $email = $_SESSION['users']['email1'];
    $token = $_SESSION['users']['token_tok'];

    $to = "$email";


    $subject = "Verify Your Email";


    $message = '
    <html>
    <head>
        <title>Verify Your Email</title>
    </head>
    <body>
        <h1>Please Verify Your Email</h1>


        <a href="localhost/verifyemail.php?kk='.$token.'">Verify Email</a>
    </body>
    ';

    $headers =  'MIME-Version: 1.0' . "\r\n"; 
    $headers .= 'Content-type: text/html; charset=iso-8' . "\r\n"; 
    $headers .= 'From: Ogili <chrisogili@gmail.com>' . "\r\n";
    
    $send = mail($to, $subject, $message, $headers);


    if($send) {

        require 'news.php';

        echo "worked";

    } else {

        $errorv = error_get_last()['message'];

        echo $errorv;

        echo "not working";

    }

}



 
?>