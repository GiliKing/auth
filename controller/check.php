<?php

session_start();


$name = $_SESSION['users']['name1'];
$email = $_SESSION['users']['email1'];
$verify = $_SESSION['users']['verify1'];

if($email == null) {

    header("location: index");

}


?>