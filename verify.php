
<?php


if(!isset($_SESSION['email1'])) {   

    header("location: index.php");

} else {

    session_start();

    $name = $_SESSION['name1'];
    $email = $_SESSION['email1'];
    $token = $_SESSION['token_tok'];

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
    $headers .= 'From: Your name <chrisogili@gmail.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

    $send = mail($to, $subject, $message, $headers);


    if($send) {

        require 'news.php';

    } else {

        header("location: error.php");

    }

}



 
?>