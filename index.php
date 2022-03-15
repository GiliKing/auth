<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">
        <!-- simple nav -->
        <nav>
            <ul>
                <li class="link1">
                    <a href="index">Home</a>
                </li>

                <li class="link4">
                    <a href="user">Dashboard</a>
                </li>

                    <?php 

                        session_start();

                        if(!isset($_SESSION['users']['email1'])) {

                            echo'
                            <li class="link2">
                                <a href="login">Login</a>
                            </li>
                            <li class="link3">
                            <a href="Register">Register</a>
                            </li>
                            ';
                        }

                    ?>

                
            </ul>
        </nav>

        <br>
        <br>

        <div class="body">
            <h1>Welcome To Authentication</h1>
            <p>ok</p>
        </div>


        
    </div>

</body>
</html>