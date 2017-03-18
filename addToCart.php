<?php
  session_start();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $ISBN = $_POST['ISBN'];
  include 'databaseConnection.php';

  $count = "SELECT count(*) as total from collections";
  $result = mysqli_query($connection, $count);
  while($rows = mysqli_fetch_assoc($result)){
    $count = $rows['total']; // total number
  }
  $count = $count + 1; // cid is always going to be one

  $sql = "INSERT INTO collections (cid, ISBN) VALUES ('$count', '$ISBN');";
  $retval = mysqli_query($connection, $sql);
  if($retval){
    header('Location: index.php'); //values were inserted successfully. link back to main page
  } else{
    header('Location: index.php'); // values were not inserted successfully. link back to main page with err msg
  }
}
?>
