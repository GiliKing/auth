
<?php

// logout the user
if(isset($_POST['token_logout'])) {

    session_start();

    $token_sess  = htmlspecialchars(trim($_SESSION['token2']));

    $token_logout = htmlspecialchars(trim($_POST['token_logout']));

    if($token_sess == $token_logout) {

        $auth = new stdClass();

        $auth->auth = "";

        setcookie('auth', json_encode($auth), time() - 3600);


        $_SESSION['users']['name1'] = '';
        $_SESSION['users']['email1'] = '';

        session_unset();


        echo "yes";



    } else {

        echo "no";

    }


} else {
    
    header('location: index');
}


?>