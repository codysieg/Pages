<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["uname"]) && isset($_POST["pass"])){
      //if all values are set, create new entry in DB and send to index.php
        $firstName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $email = $_POST["email"];
        $userName= $_POST["uname"];
        $password = $_POST["pass"];
        if($firstName=="" || $lastName =="" || $email == "" || $userName == "" || $password == ""){
          //fields not filled out, send back to registration page
          header('Location: register.php');
        }
        else{
            //all fields were filled out, create user and send to index.php
            include 'databaseConnection.php';
            $count = "SELECT count(*) as total from account";
            $result = mysqli_query($connection, $count);
            while($rows = mysqli_fetch_assoc($result)){
              $count = $rows['total'];
            }
            $count = $count + 1;
            $sql = "INSERT INTO account (aid, firstname, lastName, email, userName, pass) VALUES ('$count', '$firstName', '$lastName', '$email', '$userName', '$password');";
            $retval = mysqli_query($connection, $sql);
            if($retval){
              $_SESSION['username'] = $userName;
              header('Location: index.php'); //values were inserted successfully. link to main page.
            } else{
              header('Location: register.php'); // values were not inserted successfully. link back to register page.
            }
        }
      }
    }
  ?>
</body>
</html>
