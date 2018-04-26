<?php
session_start();
$_SESSION['loggedin'] = null;
$_SESSION["username"] = null;
header('Location: /');
 ?>
