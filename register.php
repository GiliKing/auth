<?php require 'controller/set.php'   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <form>
        <h1>Create An Account</h1>

        <div class="exist"></div>

        

        <?php

        $token = bin2hex(random_bytes(50));
        
        session_start();

        $_SESSION['token'] = $token;

        echo '
            <input type="hidden" id="hid" value="'.$token.'">
        ';


        ?>

        <input type="text"  id="in1" placeholder="Enter your username">
        <div class="err1"></div>
        <input type="email" id="in2" placeholder="Enter your email">
        <div class="err2"></div>
        <input type="password" id="in3" placeholder="Enter your password">
        <div class="err3"></div>
        <input type="password" id="in4" placeholder="Enter your password again">
        <div class="err4"></div>

        <button type="button" id="submit" >Submit</button>
        <span>Or <a href="login">Sign in</a> if you have an account </span>
    </form>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>