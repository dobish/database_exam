<html>
  <body>
    <?php
    session_start();
    if ( isset($_SESSION['username']) ){
      if ( $_SESSION['loggedin'] ){
        echo "logged as " . $_SESSION["username"];
        echo '<br/><a href="logout.php">Logout</a><br/>';
        echo '<br/><a href="edit.php">Edit your profile</a><br/>';
      }
    }else{
      echo '<a href="register.html">Register</a><br/>';
      echo '<a href="login.html">Login</a>';
    }


    ?>
    <br/>
    <br/>
    <a href="heroes.php">Check</a> other heroes

  </body>
</html>
