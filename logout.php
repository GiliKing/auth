
<?php

$auth = new stdClass();

$auth->auth = "";

setcookie('auth', json_encode($auth), time() - 3600);

$_SESSION = [];

session_destroy();

header("location: index.php");


?>