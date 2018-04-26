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


$query = "SELECT * FROM hero WHERE `username` = '$user'";



$response = @mysqli_query($dbc, $query);


while($row = mysqli_fetch_array($response)){

  echo "username: ".$row['username'];
  echo "<br/>";
  echo "name: ".$row['name'];
  echo '
  <form action="edit_profile.php" method="POST">
    <input type="text" name="new">
    <input type="hidden" name="option" value="name">
    <input type="submit" value="edit"/>
  </form>
  ';
  echo "<br/>";
  echo "age: ".$row['age'];
  echo '
  <form action="edit_profile.php" method="POST">
    <input type="text" name="new">
    <input type="hidden" name="option" value="age">
    <input type="submit" value="edit"/>
  </form>
  ';
  echo "<br/>";
  echo "superpowers: ".$row['superpowers'];
  echo '
  <form action="edit_profile.php" method="POST">
    <input type="text" name="new">
    <input type="hidden" name="option" value="superpowers">
    <input type="submit" value="edit"/>
  </form>
  ';
  echo "<br/>";
  echo "bio: ".$row['bio'];
  echo '
  <form action="edit_profile.php" method="POST">
    <input type="text" name="new">
    <input type="hidden" name="option" value="bio">
    <input type="submit" value="edit"/>
  </form>
  ';
  echo "<br/>";


}





 ?>
