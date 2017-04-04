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
    if(isset($_POST["ISBN"]) && isset($_POST["title"]) && isset($_POST["authorFirst"]) && isset($_POST["authorLast"]) && isset($_POST["pcity"]) && isset($_POST["publisher"]) && isset($_POST["pdate"]) && isset($_POST["genre"])){
        $ISBN = $_POST["ISBN"];
        $title = $_POST["title"];
        $authorFirst = $_POST["authorFirst"];
        $authorLast = $_POST["authorLast"];
        $pcity = $_POST["pcity"];
        $publisher= $_POST["publisher"];
        $pdate = $_POST["pdate"];
        $genre = $_POST["genre"];
        if($ISBN=="" || $title=="" || $authorFirst == "" || $authorLast == "" || $pcity == "" || $publisher == "" || $pdate == "" || $genre == ""){
          //fields not filled out properly, all are required. do nothing.
          //possibly alert all fields need to be filled out.
          //send back to index.php with error msg.
          header('Location: index.php');
        }
        else{
            //all fields were filled out, create new book.
            include 'databaseConnection.php';
            $sql = "INSERT INTO books (ISBN, title, authorFirst, authorLast, pcity, publisher, pdate, genre) VALUES ('$ISBN', '$title', '$authorFirst', '$authorLast', '$pcity', '$publisher', '$pdate', '$genre');";
            $retval = mysqli_query($connection, $sql);
            if($retval){
              header('Location: index.php'); //values were inserted successfully. link back to main page.
            } else{
              printf("Errormessage: %s\n", mysqli_error($connection));
              //header('Location: index.php');
              // book was not inserted for whatever reason, send back to main page w/ an error.
              //header('Location: index.php');
            }
        }
      }
  }
  ?>
</body>
</html>
