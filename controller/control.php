
<?php

// register the user
function register($name, $email, $password, $token_ajax) {


    $response = checkUser($name, $email);

    if($response == true) {

        echo "exist";

    } else {

        require '../database/connect.php';

        $username_entry = mysqli_real_escape_string($conn, $name);
    
        $email_entry = mysqli_real_escape_string($conn, $email);
    
        $password_entry = mysqli_real_escape_string($conn, $password);
    
        $token_entry = mysqli_real_escape_string($conn, $token_ajax);    
    
        $verify = 0;
    
        $remember = null;

        $hash = password_hash($password_entry, PASSWORD_DEFAULT);

        $hash_entry = mysqli_real_escape_string($conn, $hash);  
    
    
        $check = "INSERT INTO `users` (`username`, `email`, `password`, `verify`, `token`, `remember`) VALUES ('$username_entry', '$email_entry', '$hash_entry', '$verify', '$token_entry', '$remember')";
    
    
        $result = mysqli_query($conn, $check);
    
    
        if($result) {
    
            $_SESSION['users']['name1'] = $username_entry;
            $_SESSION['users']['email1'] = $username_entry;
            $_SESSION['users']['verify1'] = $verify;
    
            echo "yes";
    
    
        } else {
    
            echo "err";
        }

    }

    
}

// check if user exist
function checkUser($name, $email) {

    require '../database/connect.php';

    $check = "SELECT * FROM `users` WHERE `username` = '$name' AND `email` = '$email' LIMIT 1";

    $result = mysqli_query($conn, $check);

    if($result) {
        
        if (mysqli_num_rows($result) == 1) {
        
            return true;

        } else {

            return false;
            
        }


    } else {

        echo "err";

    }

}



// login in the user with remember me
function login($email, $password, $token_ajax) {

    require '../database/connect.php';

    $email_entry = mysqli_real_escape_string($conn, $email);

    $password_entry = mysqli_real_escape_string($conn, $password);

    $token_entry = mysqli_real_escape_string($conn, $token_ajax);




    $check = "SELECT `password` AS `pass` FROM `users` WHERE `email` = '$email_entry'LIMIT 1";

    $result = mysqli_query($conn, $check);

    if($result) {

        if (mysqli_num_rows($result) == 1) { 

            $row = mysqli_fetch_assoc($result);

            $hash = $row['pass'];

            $pass = password_verify($password_entry, $hash);

            if($pass) {

                $again = "UPDATE `users` SET `remember` = '$token_entry' WHERE `email` = '$email_entry' LIMIT 1";
    
                $again_check = mysqli_query($conn, $again);
    
                if($again_check) {

                    $check1 = "SELECT * FROM `users` WHERE `email` = '$email_entry'LIMIT 1";

                    $result1 = mysqli_query($conn, $check1);


                    if($result1) {

                        if(mysqli_num_rows($result1) == 1) {

                            $_SESSION['users'] = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    
                            $_SESSION['users']['name1'] = $_SESSION['users']['username'];
            
                            $_SESSION['users']['email1'] = $_SESSION['users']['email'];
                        
                            $verified = $_SESSION['users']['verify'];

                            if($verified == 0) {
    
                                $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];
    
                                $_SESSION['users']['token_tok'] = $_SESSION['users']['token'];
    
                            } else {
    
                                $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];
    
                            }
            
                            echo "yes";

                        }

                       

                    }


                } else {

                    echo "err";
                }

            } else {

                echo "not";
            }



        } else {

            echo "not";
        }        
 


    } else {

        echo "exit";

    }

}


// login in the user without remember me
function loginno($email, $password) {

    require '../database/connect.php';

    $email_entry = mysqli_real_escape_string($conn, $email);

    $password_entry = mysqli_real_escape_string($conn, $password);


    $check = "SELECT `password` AS `pass` FROM `users` WHERE `email` = '$email_entry'LIMIT 1";

    $result = mysqli_query($conn, $check);

    if($result) {

        if (mysqli_num_rows($result) == 1) { 

            $row = mysqli_fetch_assoc($result);

            $hash = $row['pass'];

            $pass = password_verify($password_entry, $hash);

            if($pass) {
                
                $check1 = "SELECT * FROM `users` WHERE `email` = '$email_entry'LIMIT 1";

                $result1 = mysqli_query($conn, $check1);


                if($result1) {

                    if(mysqli_num_rows($result1) == 1) {

                        $_SESSION['users'] = mysqli_fetch_array($result1, MYSQLI_ASSOC);

                        $_SESSION['users']['name1'] = $_SESSION['users']['username'];
        
                        $_SESSION['users']['email1'] = $_SESSION['users']['email'];
        
                        $verified = $_SESSION['users']['verify'];

                        if($verified == 0) {

                            $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];

                            $_SESSION['users']['token_tok'] = $_SESSION['users']['token'];

                        } else {

                            $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];

                        }
        
                        echo "yes";


                    }

                   

                }

            } else {

                echo "not";
            }



        } else {

            echo "not";
        }        
 


    } else {

        echo "exit";

    }

}



// get the inputs with remeber me 
function rememberOnly($rememberMe) {

    require '../database/connect.php';


    $remember_entry = mysqli_real_escape_string($conn, $rememberMe);

    $check = "SELECT * FROM `users` WHERE `remember` = '$remember_entry' LIMIT 1";

    $result = mysqli_query($conn, $check);

    if($result) {

        if (mysqli_num_rows($result) == 1) {

            $_SESSION['users'] = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $_SESSION['users']['name1'] = $_SESSION['users']['username'];

            $_SESSION['users']['email1'] = $_SESSION['users']['email'];

            $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];

            $verified = $_SESSION['users']['verify'];

            echo "yes";

        } else {

            echo "err";
        }

    } else {

        echo "no";
    }
}


// verify only when onload
function verifyOnly($email, $verify) {

    require '../database/connect.php';

    $email_entry = mysqli_real_escape_string($conn, $email);

    $verify_entry = mysqli_real_escape_string($conn, $verify);

    $check = "SELECT `verify` AS `ver`  FROM `users` WHERE `email` = '$email_entry' LIMIT 1";

    $result = mysqli_query($conn, $check);

    if($result) {

        if (mysqli_num_rows($result) == 1) { 

            $row = mysqli_fetch_assoc($result);

            $verify_real = $row['ver'];

            if($verify_entry != $verify_real) {

                $check1 = "SELECT * FROM `users` WHERE `email` = '$email_entry'LIMIT 1";

                $result1 = mysqli_query($conn, $check1);

                if($result1) {

                    if(mysqli_num_rows($result1) == 1) {

                        $_SESSION['users'] = mysqli_fetch_array($result1, MYSQLI_ASSOC);

                        $_SESSION['users']['name1'] = $_SESSION['users']['username'];
        
                        $_SESSION['users']['email1'] = $_SESSION['users']['email'];
        
                        $_SESSION['users']['token_tok'] = $_SESSION['users']['token'];

                        $_SESSION['users']['verify1'] = $_SESSION['users']['verify'];

                        echo "yes";


                    }

                   

                }

            } else {

                echo "no";
            }

        } else {

            echo "nothing to show";
        }

    } else {

        echo mysqli_error($conn);

    }
}



?>