<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'hero');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

if(isset($_GET['user'])){
  $loggin_user = $_GET['user'];
}else{
  $loggin_user = $_POST['username'];
}


$query = "SELECT * FROM hero WHERE `username` = '$loggin_user'";



$response = @mysqli_query($dbc, $query);


while($row = mysqli_fetch_array($response)){

  echo "username: ".$row['username'];
  echo "<br/>";
  echo "name: ".$row['name'];
  echo "<br/>";
  echo "age: ".$row['age'];
  echo "<br/>";
  echo "superpowers: ".$row['superpowers'];
  echo "<br/>";
  echo "bio: ".$row['bio'];
  echo "<br/>";
  echo "likes: ".$row['likes'];

  echo "<br/>";
  echo '
  <form action="like.php" method="POST">
    <input type="hidden" name="username" value="'.$row['username'].'"/>
    <input type="submit" value="LIKE"/>
  </form>
  ';

}


$querya = "SELECT * FROM comments WHERE superhero = '$loggin_user'";
$responsea = @mysqli_query($dbc, $querya);
while($row = mysqli_fetch_array($responsea)){

  echo $row['body'];
  echo "<br/>";


}

session_start();
if ( isset($_SESSION['username']) ){
  if ( $_SESSION['loggedin'] ){
    echo '
      <form action="addComment.php" method="POST">
        <input type="text" name="comment" value="" placeholder="add comment..."/>
        <input type="hidden" name="superhero" value="'.$loggin_user.'"/>
        <input type="submit" value="send"/>
      </form>
    ';
  }
}



 ?>
