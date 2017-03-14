<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Templates</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
    background: url('http://wallpapercave.com/wp/ijo8KeK.jpg');
    background-size: cover;
  }

  h1{
    color: white;
  }

  .container{
    color: white;
  }
  </style>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">
              <?php
              echo "Welcome, ".$_SESSION['username']."!";
              ?>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href='index.php'>Home</a></li>
          <li><a href="collections.php">My Collection</a></li>
          <li><a href="templates.php">Templates</a></li>
          <li><a class = "logoutButton" href="login.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h1 align="center">MLA Template Based on Your Collection: </h1>
    <hr>
    <h2 align="center">Bibliography</h2>
    <?php
      include 'databaseConnection.php';
      $booksInCollection = "select * from books, collections where books.ISBN = collections.ISBN";
      $retval = mysqli_query($connection, $booksInCollection);
      while($row = mysqli_fetch_array($retval)){
        echo "<p align='center'>";
        echo $row['author'].". <i>".$row['title']."</i>. ".$row['publisher'].", ".$row['pdate'].". Print.";
        echo "</p>";
        echo "<br/>";
      }
    ?>
  </div>

</body>
</html>
