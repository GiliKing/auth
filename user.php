<?php require 'controller/check.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <!-- simple nav -->
        <nav>
            <ul>
                <li class="link5">
                    <a href="index">Home</a>
                </li>
                <li class="link4">
                    <a href="user">Dashboard</a>
                </li>
                <li class="link3">
                    <?php

                        $token = bin2hex(random_bytes(50));

                        $_SESSION['token2'] = $token;

                        echo '
                            <input type="hidden" id="hid" value="'.$token.'">
                        ';

                    ?>
                <a>Sign Out</a>
                </li>
            </ul>
        </nav>

        <br>
        <br>

        <div class="body">
            <h1>Registered User</h1>
            <p>ok</p>

            <?php 

            if ($verify == 0) {

                echo "
                <h1>Your Email is not verified</h1>
                <a href='verify'>Click Here To Verify</a>
                ";
                
            } 
            
            if($verify == 1) {

                echo "<h1>Your Email is verified</h1>";

            }
            
            ?>
        </div>



        <input type="hidden" id="special1" value="<?php echo $name; ?>">
        <input type="hidden" id="special2" value="<?php echo $email; ?>">
        <input type="hidden" id="special3" value ="<?php echo $verify; ?>">

        <script src="js/jquery.min.js"></script>
        <script src="js/user.js"></script>
    </div>
</body>
</html>