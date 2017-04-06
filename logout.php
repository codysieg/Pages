<?php
  session_start();
?>

<?php
    if(isset($_SESSION["username"])){
      //user is actually a user and trying to logout
      //clear session variable and re-direct to login.php
      unset($_SESSION["username"]);
      session_destroy();
      header('Location: login.php');
    }

  else{
    //user is trying to logout when they are not even a registered user, send back to login.php
    header('Location: login.php');
  }

?>
