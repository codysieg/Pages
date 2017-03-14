<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to Pages!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/index.css">
  <style>
    .logoutButton{
      float: right !important;
    }
    .bookList a{
      float: left;
      height: 100%;
    }
    .bookList{
    background-color: white !important;
    font-style: italic !important;
    color: black !important;
    height: 35px;

    }
    .container{
      color: white;
    }

    .table-responsive{
      color: white;
    }
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
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
        <li><a href="collections.php">My Collection</a></li>
        <li><a href="#">Templates</a></li>
        <li><a class = "logoutButton" href="login.php">Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <!--Search area for books. Will connect to DB-->

    </div>
    <div class="col-sm-8 text-left">
      <hr>
      <div class="wrap">
      <!-- This will display SQL results from DB -->
      <p class="form-title">
          <h3 style = "color:white;">Add a New Book:</h3> </p>
      <form action = "addBookToDatabase.php" method="POST" id="mainForm"/>
      <input type="text" name ="ISBN" placeholder="ISBN : "/>
      <input type="text" name ="title" placeholder="Title of Book : "/>
      <input type="text" name ="author" placeholder="Author : "/>
      <input type="text" name ="publisher" placeholder="Publisher : "/>
      <input type="text" name ="pdate" placeholder="Publisher Date : "/>
      <input type="text" name ="genre" placeholder="Genre : "/>
      <input type="submit" value="Submit" class="btn btn-success btn-sm"/>
      </form>
      <hr>
      <p class="form-title">
          <h3 style = "color:white;">Search for Books:</h3> </p>
      <form action = "searchBookDatabase.php" method="POST" id="mainForm"/>
      <input type="text" name ="ISBN" placeholder="ISBN : "/>
      <input type="text" name ="title" placeholder="Title of Book : "/>
      <input type="text" name ="author" placeholder="Author : "/>
      <input type="text" name ="publisher" placeholder="Publisher : "/>
      <input type="text" name ="pdate" placeholder="Publisher Date : "/>
      <input type="text" name ="genre" placeholder="Genre : "/>
      <input type="submit" value="Submit" class="btn btn-success btn-sm"/>
      </form>

      <div class = "container">
        <h2>Returned Books</h2>
        <?php
        echo "<div class = 'table-responsive'>";
        echo "<table class = 'table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ISBN</th>";
        echo "<th>Title</th>";
        echo "<th>Author</th>";
        echo "<th>Publisher</th>";
        echo "<th>Publish Date</th>";
        echo "<th>Genre</th>";
        echo "<th>Collections</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $retval = $_SESSION['retvalue'];
        $row = $_SESSION['row'];
        if($row){
            echo "<tr>";
            echo "<td>".$row['ISBN']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['author']."</td>";
            echo "<td>".$row['publisher']."</td>";
            echo "<td>".$row['pdate']."</td>";
            echo "<td>".$row['genre']."</td>";
            echo "<td><form action = 'addToCart.php' method ='post'>";
            echo "<input class='btn btn-success' type = 'submit' value='Add'>";
            $_SESSION['bookToAdd'] = $row;
            echo "</form></td>";
            echo "</tr>";
          } else{
            echo "<tr>";
            echo "<td>Nothing found.</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['author']."</td>";
            echo "<td>".$row['publisher']."</td>";
            echo "<td>".$row['pdate']."</td>";
            echo "<td>".$row['genre']."</td>";
            echo "</tr>";
          }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
          ?>
        </div>
    </div>

  </div>
</div>
</body>
</html>
