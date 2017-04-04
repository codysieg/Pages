<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $bookToRemove = $_POST['ISBN'];
    include 'databaseConnection.php';

    $sql = "DELETE FROM collections WHERE ISBN = $bookToRemove";
    $retval = mysqli_query($connection, $sql);
    if($retval){
      header('Location: collections.php'); //values were deleted successfully. link back to main page
    } else{
      header('Location: collections.php'); // values were not deleted successfully. link back to main page with err msg
    }
}
?>
