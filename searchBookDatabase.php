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
            if($retval){
              while($row = mysqli_fetch_assoc($retval)){
                echo "<p>";
                echo $row['ISBN']." ";
                echo $row['title']." ";
                echo $row['author']." ";
                echo $row['publisher']." ";
                echo $row['pdate']." ";
                echo $row['genre']." ";
                echo "</p>";
                echo "<br/>";
              }

            } else{
              echo "Nothing found";
              //header('Location: index.php');
            }
        }
      }
  }
  ?>
</body>
</html>
