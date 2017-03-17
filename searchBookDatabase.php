<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["ISBN"]) || isset($_POST["title"]) || isset($_POST["authorFirst"]) || isset($_POST["authorLast"]) || isset($_POST["pcity"]) || isset($_POST["publisher"]) || isset($_POST["pdate"]) || isset($_POST["genre"])){
        $ISBN = $_POST["ISBN"];
        $title = $_POST["title"];
        $authorFirst = $_POST["authorFirst"];
        $authorLast = $_POST["authorLast"];
        $pcity = $_POST["pcity"];
        $publisher= $_POST["publisher"];
        $pdate = $_POST["pdate"];
        $genre = $_POST["genre"];
        if($ISBN=="" && $title == "" && $authorFirst == "" && $authorLast == "" && $pcity == "" && $publisher == "" && $pdate == "" && $genre == ""){
          header('Location: index.php');
          //fields not filled out properly, all are required. do nothing.
          //possibly alert all fields need to be filled out.
        }
        else{
            include 'databaseConnection.php';
            //will return matches that start with entries.
            $sql = "SELECT * FROM books;";
            //pass sql
            $_SESSION['sql'] = $sql;
            //$retval = mysqli_query($connection, $sql);
            //$_SESSION['retvalue'] = $retval;
            //$row = mysqli_fetch_assoc($retval);
            //$_SESSION['row'] = $row;

            header('Location: index.php');
        }
      }

    else{
      header('Location: index.php');
    }
  }
  ?>
</body>
</html>
