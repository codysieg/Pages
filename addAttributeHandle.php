<?php

  session_start();
  include 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $attribute = $_POST['addAtt'];


  $sql = "INSERT INTO attributes (attNAME) VALUES ('$attribute');";
  $retval = mysqli_query($connection, $sql);
  $sql = "ALTER TABLE books ADD $attribute VARCHAR(30);";
  $retval = mysqli_query($connection, $sql);
  header("Location:index.php");

}

?>
