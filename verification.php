<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST["uname"]) && isset($_POST["pass"])){
        //handle the user inputted data
        $username= $_POST["uname"];
        $password = $_POST["pass"];
        include 'databaseConnection.php';
        $count = "SELECT userName, pass from account WHERE userName='$username' AND pass='$password';";
        $result = mysqli_query($connection, $count);
        if($result && mysqli_num_rows($result) > 0){
          //user is found, set session variable and redirect to main page.
          $_SESSION['username'] = $username;
          header('Location: index.php');
          //username and password combo exist in database, redirect to index.php
        }
        else{
          header('Location: login.php');
          //username and password combo do not exist, redirect to login.php
        }

      }

      else{
        //username or password was not set, redirect back to the login password_get_info
        header('Location: login.php');
      }
    }

    else{
      //user is trying to access page indirectly, redirect to login page
      header('Location: login.php');
    }
  ?>
</body>
</html>
