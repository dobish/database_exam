<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'hero');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());



$query = "SELECT username FROM hero";



$response = @mysqli_query($dbc, $query);


while($row = mysqli_fetch_array($response)){

  $log = $row['username'];
  echo $row['username'];
  echo '
  <form action="hero.php" method="POST">
    <input type="hidden" name="username" value="'.$log.'"/>
    <input type="submit" value="check out"/>
  </form>
  ';

  echo "<br/>";

}


 ?>
