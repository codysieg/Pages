<?php
$host = "localhost";
$database = "pages";
$user = "root";
$pass = "";
$connection = mysqli_connect($host, $user, $pass, $database) or die("Unable to connect.");

/*
$sql = "SELECT * FROM account";
$result = mysqli_query($connection, $sql);

while($row = mysqli_fetch_assoc($result)){
  echo $row['aid']." - ".$row['firstName']." - ".$row['lastName']." - ".$row['email']." - ".$row['userName']." - ".$row['pass'];
  echo "<br/>";
}*/

?>
