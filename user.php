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
                <li class="link1">
                    <a href="user.php">Home</a>
                </li>
                <li class="link3">
                <a href="logout.php">Sign Out</a>
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
                <a href='verify.php'>Click Here To Verify</a>
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