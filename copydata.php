<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
  include 'databaseConnection.php';

    $copyID = mysqli_real_escape_string($connection, $_POST["copyID"]);
    $field = mysqli_real_escape_string($connection, $_POST["field"]);
    $writing = mysqli_real_escape_string($connection, $_POST["writing"]);
if($field === "notes"){
  $sql = "UPDATE copies SET notes = '$writing' WHERE ISBN = ".$_SESSION['bcopy']." AND copyID = '$copyID';";
} else {
  $sql = "UPDATE copies SET condtn = '$writing' WHERE ISBN = ".$_SESSION['bcopy']." AND copyID = '$copyID';";
}
if ($connection->query($sql) === false) {
  echo "Error: " . $sql . "<br>" . $connection->error;
} else {
mysqli_query($connection, $sql);
mysqli_close($connection);
header("Location: copies.php?id=".$_SESSION['bcopy']);
}

?>
