<?php

  session_start();
  include 'databaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $attribute = $_POST['removeAtt'];
  

  $sql = "DELETE FROM attributes WHERE attributes.attName='$attribute';";
  $retval = mysqli_query($connection, $sql);
  
   $sql = "ALTER TABLE books DROP COLUMN $attribute;";
  $retval = mysqli_query($connection, $sql);
  header("Location:index.php");

}

?>