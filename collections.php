<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Collection Page!</title>
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

  table{
    background: white;
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

  	<h1>Collection List</h1><hr>
  	<table class="table">
          <tbody>
              <tr>
                  <th>ISBN</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Publish Date</th>
                  <th>Genre</th>
              </tr>

              <?php
              include 'databaseConnection.php';
              $booksInCollection = "select * from books, collections where books.ISBN = collections.ISBN";
              $retval = mysqli_query($connection, $booksInCollection);
              $_SESSION['booksInCollection'] = $booksInCollection;
              while ($row = mysqli_fetch_array($retval)){
                echo "<tr>";
                echo "<td>".$row['ISBN']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['author']."</td>";
                echo "<td>".$row['publisher']."</td>";
                echo "<td>".$row['pdate']."</td>";
                echo "<td>".$row['genre']."</td>";
                echo "</tr>";

              }
               ?>

                  <td><a href="index.php" class="btn btn-primary">Continue Searching</a></td>
                  <td colspan="5"><a href="templates.php" class="pull-right btn btn-success">Create Template</a></td>
              </tr>
          </tbody>
      </table>

  </div>
</body>
</html>
