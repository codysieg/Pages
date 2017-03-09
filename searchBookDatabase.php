<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["ISBN"]) && (isset($_POST["title"]) || isset($_POST["author"]) || isset($_POST["publisher"]) || isset($_POST["pdate"]) || isset($_POST["genre"]))){
        $ISBN = $_POST["ISBN"];
        $title = $_POST["title"];
        $author = $_POST["author"];
        $publisher= $_POST["publisher"];
        $pdate = $_POST["pdate"];
        $genre = $_POST["genre"];
        if($ISBN==""){
          header('Location: index.php');
          // need to atleast search with ISBN
          //fields not filled out properly, all are required. do nothing.
          //possibly alert all fields need to be filled out.
        }
        else{
            include 'databaseConnection.php';
            $sql = "SELECT * FROM books WHERE ISBN = $ISBN;";
            $retval = mysqli_query($connection, $sql);
            $_SESSION['retvalue'] = $retval;
            $row = mysqli_fetch_assoc($retval);
            $_SESSION['row'] = $row;
            header('Location: index.php');
        }
      }
  }
  ?>
</body>
</html>
