<?php
session_start();
include 'databaseConnection.php';
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <?php
  $check = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //if any fields are set, appends them to SQL query
      $query = "SELECT * FROM attributes;";
      $retval = mysqli_query($connection, $query);
      
      
    while ($row = mysqli_fetch_array($retval)){
     
    if($_POST[$row['attName']] != ""){
      $sql = "SELECT * FROM books WHERE";
      if($_POST[$row['attName']] != ""){
        $ISBN = $_POST[$row['attName']];
        if($check==0){
          $check=1;
          $attr = $row['attName'];
          $sql .= " $attr LIKE \"%".$ISBN."%\" and";
       
        }
        else{
          $sql .= " and $attr LIKE \"%".$ISBN."%\"";
         
        }
      }
  
      $_SESSION['sql'] = $sql;
      //header("Location:index.php");
      echo $_SESSION['sql'];
    }
    
    elseif($ISBN=="" && $title == "" && $authorFirst == "" && $authorLast == "" && $pcity == "" && $publisher == "" && $pdate == "" && $genre == ""){
      
      $sql = "SELECT * FROM books;";
      $_SESSION['sql'] = $sql;
      header('Location: index.php');
      //fields not filled out properly, all are required. do nothing.
      //possibly alert all fields need to be filled out.
    }
    else{
      
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
  }

  else{
    header('Location: index.php');
  }
?>
</body>
</html>