   <?php
     
    include 'databaseConnection.php';
      
   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ISBN"])){
      
   
       $key = $_POST["ISBN"];
       
      $query = "INSERT INTO books (ISBN) VALUES ('$key');";
      $retval = mysqli_query($connection, $query);
      
      $query2 = "SELECT * FROM attributes;";
      $retval2 = mysqli_query($connection, $query2);
      
      
      
    
         while ($row = mysqli_fetch_array($retval2)){
              
                 $attributeVal = $_POST[$row['attName']];
                $att = $row['attName'];
                echo $attributeVal;
                echo $att;
                  $query3 = "UPDATE books SET $att='$attributeVal' WHERE books.ISBN='$key';";
                  $retval3 = mysqli_query($connection, $query3);
                  header("Location: index.php");
                 
                    
              }
   }
    ?>
  
  