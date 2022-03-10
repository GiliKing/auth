<?php


session_start();

if(isset($_SESSION['users']['email1'])) {

    header("location: user.php");

} else {

    // do nothing
}



?>