<?php
session_start();
include 'databaseConnection.php';
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <?php
  
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //if any fields are set, appends them to SQL query
      $query = "SELECT * FROM attributes;";
      $retval = mysqli_query($connection, $query);
      
      $check = 0;
    while ($row = mysqli_fetch_array($retval)){
      $attri = $row['attName'];
      $search = $_POST[$row['attName']];
    
    if($_POST[$row['attName']] !="" &&  $check==0){
     
      $check = $check +1;
      
      $sql = "SELECT * FROM books WHERE $attri LIKE \"%".$search."%\"";
 
      
      }
      else {
       if($_POST[$row['attName']] !="" && $check>0){
          $sql .= " OR $attri LIKE \"%".$search."%\";";
        
       }
    }
        
       
        }
        
    
     $_SESSION['sql'] = $sql;
    echo  $_SESSION['sql'] ;
    //  header("Location:index.php");
      }
  
   
     
    
    
  else{
    header('Location: index.php');
  }
?>  
</body>
</html>
