<?php

$auth = new stdClass();

$auth->auth = "";

setcookie('auth', json_encode($auth), time() - 3600);

session_start();

$_SESSION['users']['name1'] = '';
$_SESSION['users']['email1'] = '';

session_unset();

header("location: index");


?>