<?php require 'controller/set.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <form>

        <h1>Sign in</h1>
        
        <div class="exist"></div>

        <?php

        $token = bin2hex(random_bytes(50));
        
        session_start();

        $_SESSION['token1'] = $token;

        echo '
            <input type="hidden" id="hid" value="'.$token.'">
        ';


        ?>

        <input type="email" id="in2" placeholder="Enter your email">
        <div class="err2"></div>
        <input type="password" id="in3" placeholder="Enter your password">
        <div class="err3"></div>

        <span><input type="checkbox" name="remember">Remember me</span>

        <button type="button" id="submit">Submit</button>
        <span>Or <a href="register">Signup</a> if you dont have an account </span>
    </form>
    

    <script src="js/jquery.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>