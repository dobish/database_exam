<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'hero');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

session_start();

$query = 'INSERT INTO comments(body, author, superhero) VALUES (?,?,?)';
$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_bind_param($stmt, "sss", $_POST["comment"], $_SESSION['username'], $_POST["superhero"]);
mysqli_stmt_execute($stmt);

mysqli_close($dbc);



header('Location: hero.php?user='.$_POST["superhero"]);
 ?>
