

<?php

// registration
if(isset($_POST['username'])) {

    session_start();

    $token_sess = trim($_SESSION['token']);

    $token_ajax = htmlspecialchars(trim($_POST['token']), ENT_QUOTES);

    if($token_sess != $token_ajax) {

        echo "err";

    } else {
        
        $name = htmlspecialchars(trim($_POST['username']), ENT_QUOTES);
        $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
        $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES);

        require  '../controller/control.php';

        $feedback = register($name, $email, $password, $token_ajax);

        echo $feedback;
                
    }


}

// login
if(isset($_POST['email1'])) {

    session_start();

    $token_sess = trim($_SESSION['token1']);

    $token_ajax = htmlspecialchars(trim($_POST['token1']), ENT_QUOTES);

    $remember = htmlspecialchars(trim($_POST['remem']), ENT_QUOTES);

    if($token_sess != $token_ajax) {

        echo $token_ajax;

    } else {

        if($remember == "yes") {

            $email = htmlspecialchars(trim($_POST['email1']), ENT_QUOTES);
            $password = htmlspecialchars(trim($_POST['password1']), ENT_QUOTES);

            require  '../controller/control.php';

            $feedback = login($email, $password, $token_ajax);

            echo $feedback;

        }

        if($remember == "no") {

            $email = htmlspecialchars(trim($_POST['email1']), ENT_QUOTES);
            $password = htmlspecialchars(trim($_POST['password1']), ENT_QUOTES);

            require  '../controller/control.php';

            $feedback = loginno($email, $password);

            echo $feedback;

        }
                
    }


}



// remeber me

if(isset($_POST['remember_user'])) {

    $rememberMe = htmlspecialchars(trim($_POST['remember_user']), ENT_QUOTES);

    require  '../controller/control.php';

    $feedback = rememberOnly($rememberMe);

    echo $feedback;
}


// verify when onload
if(isset($_POST['verify_only'])) {

    $email = htmlspecialchars(trim($_POST['email_only']), ENT_QUOTES);

    $verify = htmlspecialchars(trim($_POST['verify_only']), ENT_QUOTES);

    require '../controller/control.php';

    $feedback = verifyOnly($email, $verify);

    echo $feedback;

}




?>