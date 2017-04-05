<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
  include 'databaseConnection.php';
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
  <script src="js/sorttable.js" type = "text/javascript"></script>
  <link rel="stylesheet" href="css/index.css">
  <style>

    .modal-body{
      margin-left: 30%;
    }

    .wrap{
      margin-left: 400px;
      margin-right: 400px;
    }

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

<?php
  //test to see if user is logged in, if they are not, send them back to the login page.
  //for this website, you need to be a registered user to use it.
  if(!isset($_SESSION['username'])){
    //send to login.php
    header('Location: login.php');
  }
?>
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
        <li><a href="templates.php">Templates</a></li>
        <li><a class = "logoutButton" href="logout.php">Log Out</a></li>
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
      <div class="wrap">
      <!-- This will display SQL results from DB -->
<p></p>

          <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" id ="close" data-target="#myModal">Add a New Book</button>
          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

          <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a New Book: </h4>
              </div>
              <div class="modal-body">
                <form action = "addBookToDatabase.php" method="POST" id="mainForm"/>
                <?php
                $query = "SELECT * FROM attributes; ";
                $retval = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($retval)){
                  echo '<input type="text" id="'.$row["attName"].'" name="'.$row["attName"].'" placeholder="'.$row["attName"].'"/>';
                  echo "<br/>";

                }
                  ?>
                  <input type="submit" value="Submit" class="btn btn-success btn-sm"/>
                </form>
              </div>
            <a href="addAttribute.php"><input type="submit" value="Add Attribute" class="btn btn-success btn-sm"/></a>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            </div>
          </div>

          <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" id ="close" data-target="#myModal2">Search</button>
          <!-- Modal -->
          <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog">

          <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search for a Book: </h4>
              </div>
              <div class="modal-body">
                <form action = "searchBookDatabase.php" method="POST" id="mainForm"/>
                <input type="text" name ="ISBN" placeholder="ISBN : "/><br/><br/>
                <input type="text" name ="title" placeholder="Title of Book : "/><br/><br/>
                <input type="text" name ="authorFirst" placeholder="Author (First) : "/><br/><br/>
                <input type="text" name ="authorLast" placeholder="Author (Last) : "/><br/><br/>
                <input type="text" name ="pcity" placeholder="Publishing City : "/><br/><br/>
                <input type="text" name ="publisher" placeholder="Publisher : "/><br/><br/>
                <input type="text" name ="pdate" placeholder="Publisher Date : "/><br/><br/>
                <input type="text" name ="genre" placeholder="Genre : "/><br/><br/>
                <input type="submit" value="Submit" class="btn btn-success btn-sm"/>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            </div>
          </div>
        </div>
          <hr>

      <div class = "container centered">
        <h2>Returned Books: </h2>
        <?php
        if(isset($_SESSION['sql'])){
          $sql = $_SESSION['sql'];

        }else{
          //session sql not set, return all books instead
          $sql = "SELECT * FROM books;";
        }
        //uncomment to see sql query being run
        //echo "<p>".$sql."</p>";
        echo "<div class = 'table-responsive'>";
        echo "<table class = 'table sortable'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ISBN</th>";
        echo "<th>Title</th>";
        echo "<th>Author Last, First</th>";
        echo "<th>Publishing City</th>";
        echo "<th>Publisher</th>";
        echo "<th>Publish Date</th>";
        echo "<th>Genre</th>";
        echo "<th>Collections</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        include 'databaseConnection.php';
        $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>";
          echo "<td>".$row['ISBN']."</td>";
          echo "<td>".$row['title']."</td>";
          echo "<td>".$row['authorLast'].", ".$row['authorFirst']."</td>";
          echo "<td>".$row['pcity']."</td>";
          echo "<td>".$row['publisher']."</td>";
          echo "<td>".$row['pdate']."</td>";
          echo "<td>".$row['genre']."</td>";
          $ISBN = $row['ISBN'];
          echo "<td>";
          echo "<form action = 'addToCart.php' method = 'post'>";
          echo "<input type ='hidden' name='ISBN' value='$ISBN'>";
          echo "<input type='submit' value ='Add' class='btn btn-success'>";
          echo "</form>";
          echo "</td>";
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
