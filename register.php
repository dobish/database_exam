<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'hero');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());


$query = 'INSERT INTO hero(name, username, age, bio, superpowers, password) VALUES (?,?,?,?,?,?)';
$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_bind_param($stmt, "ssisss", $_POST["name"], $_POST["username"], $_POST["age"], $_POST["bio"], $_POST["superpowers"], $_POST["password"]);
mysqli_stmt_execute($stmt);

mysqli_close($dbc);



header('Location: /');
 ?>
