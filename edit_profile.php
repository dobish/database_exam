<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'hero');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

session_start();
$user = $_SESSION['username'];
$option = $_POST['option'];
$new = $_POST['new'];


$query = "UPDATE hero SET $option = '$new' WHERE `username` = '$user'";
$stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_execute($stmt);


header('Location: edit.php');





 ?>
