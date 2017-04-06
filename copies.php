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
  <title>Pages</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/confirmDelete.js"></script>
  <script src="js/sorttable.js" type = "text/javascript"></script>
  <link rel="stylesheet" href="css/index.css">
  <style>
  body{
    background: url('http://wallpapercave.com/wp/ijo8KeK.jpg');
    background-size: cover;
  }

  h1{
    color: white;
  }

  table{
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

            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" id ="close" data-target="#myModal3">Edit A Copy</button>
            <!-- Modal -->
            <div id="myModal3" class="modal fade" role="dialog">
              <div class="modal-dialog">

            <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Warning: confirmed entries will overwrite existing entries!</h4>
                </div>
                <div class="modal-body">
                  <form action = "copydata.php" method="POST" id="mainForm"/>

                  <?php
                  $_SESSION['bcopy'] = $_GET['id'];
                  $sql = "SELECT * FROM copies WHERE ISBN = ".$_SESSION['bcopy'].";";
                  $results = mysqli_query($connection, $sql);
                  echo "Copy: <select name='copyID'>";
                  while($row = mysqli_fetch_assoc($results)){
                    echo '<option value="'.$row['copyID'].'">'.$row['copyID'].'</option>';
                  }
                  echo "</select><br/><br/>
                  Field to change: <select name='field'>
                  <option value = 'notes'>Notes</option>
                  <option value = 'condition'>Condition</option>
                  </select><br/><br/>
                  <textarea id='speshul' maxlength = 255 name='writing'/></textarea><br/><br/>";
                    ?>
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
          <?php
          $sql = "SELECT title FROM books WHERE ISBN = ".$_SESSION['bcopy'].";";
          $results = mysqli_query($connection, $sql);
          while($row = mysqli_fetch_assoc($results)){
            echo "<h2>Copies of ".$row['title']."</h2>";
          }
          echo "<div class = 'table-responsive'>";
          echo "<table class = 'table sortable'>";
          echo "<thead>";
          echo "<tr>";
          echo "<th>Copy Number</th>";
          echo "<th>Notes</th>";
          echo "<th>Condition</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          $sql = "SELECT copyID, notes, condtn FROM copies WHERE ISBN = ".$_SESSION['bcopy'].";";
          $results = mysqli_query($connection, $sql);
          while($row = mysqli_fetch_assoc($results)){
            echo "<tr>";
            echo "<td>".$row['copyID']."</td>";
            echo "<td>".$row['notes']."</td>";
            echo "<td>".$row['condtn']."</td>";
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
