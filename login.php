<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'hero');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

$loggin_user = $_POST['username'];

$query = "SELECT `password` FROM `hero` WHERE `username` = '$loggin_user'";

$response = @mysqli_query($dbc, $query);


while($row = mysqli_fetch_array($response)){

  if($row['password'] == $_POST['password']){
    session_start();
    $_SESSION["username"] = $loggin_user;
    $_SESSION['loggedin'] = true;
  }

}

header('Location: /');


 ?>
