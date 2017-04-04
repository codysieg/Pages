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
  $check = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //if any fields are set, appends them to SQL query
    if($_POST["ISBN"] != "" || $_POST["title"] != "" || $_POST["authorFirst"] != "" || $_POST["authorLast"] != "" || $_POST["pcity"] != "" || $_POST["publisher"] != "" || $_POST["pdate"] != "" || $_POST["genre"] != ""){
      $sql = "SELECT * FROM books WHERE";
      if($_POST["ISBN"] != ""){
        $ISBN = $_POST["ISBN"];
        if($check==0){
          $check=1;
          $sql .= " ISBN LIKE \"%".$ISBN."%\"";
        }
        else{
          $sql .= " and ISBN LIKE \"%".$ISBN."%\"";
        }
      }
      if($_POST["title"] != ""){
        $title = $_POST["title"];
        if($check==0){
          $check=1;
          $sql .= " title LIKE \"%".$title."%\"";
        }
        else{
          $sql .= " and title LIKE \"%".$title."%\"";
        }
      }
      if($_POST["authorFirst"] != ""){
        $authorFirst = $_POST["authorFirst"];
        if($check==0){
          $check=1;
          $sql .= " authorFirst LIKE \"%".$authorFirst."%\"";
        }
        else{
          $sql .= " and authorFirst LIKE \"%".$authorFirst."%\"";
        }
      }
      if($_POST["authorLast"] != ""){
        $authorLast = $_POST["authorLast"];
        if($check==0){
          $check=1;
          $sql .= " authorLast LIKE \"%".$authorLast."%\"";
        }
        else{
          $sql .= " and authorLast LIKE \"%".$authorLast."%\"";
        }
      }
      if($_POST["pcity"] != ""){
        $pcity = $_POST["pcity"];
        if($check==0){
          $check=1;
          $sql .= " pcity LIKE \"%".$pcity."%\"";
        }
        else{
          $sql .= " and pcity LIKE \"%".$pcity."%\"";
        }
      }
      if($_POST["publisher"] != ""){
        $publisher = $_POST["publisher"];
        if($check==0){
          $check=1;
          $sql .= " publisher LIKE \"%".$publisher."%\"";
        }
        else{
          $sql .= " and publisher LIKE \"%".$publisher."%\"";
        }
      }
      if($_POST["pdate"] != ""){
        $pdate = $_POST["pdate"];
        if($check==0){
          $check=1;
          $sql .= " pdate LIKE \"%".$pdate."%\"";
        }
        else{
          $sql .= " and pdate LIKE \"%".$pdate."%\"";
        }
      }
      if($_POST["genre"] != ""){
        $genre = $_POST["genre"];
        if($check==0){
          $check=1;
          $sql .= " genre LIKE \"%".$genre."%\"";
        }
        else{
          $sql .= " and genre LIKE \"%".$genre."%\"";
        }
      }
      include 'databaseConnection.php';
      $_SESSION['sql'] = $sql;
      header('Location: index.php');
    }
    elseif($ISBN=="" && $title == "" && $authorFirst == "" && $authorLast == "" && $pcity == "" && $publisher == "" && $pdate == "" && $genre == ""){
      include 'databaseConnection.php';
      $sql = "SELECT * FROM books;";
      $_SESSION['sql'] = $sql;
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
?>
</body>
</html>
