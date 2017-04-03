<?php
  session_start();
   include 'databaseConnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Add Pages!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/sorttable.js" type = "text/javascript"></script>
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
      <hr>
      <div class="wrap">
      <!-- This will display SQL results from DB -->
      <p class="form-title">
      <h3 style = "color:white;">Add a New Book:</h3> </p>
      <form action = "addBookToDatabase.php" method="post" id="mainForm">
      <?php
   

    


    $query = "SELECT * FROM attributes; ";
    
    $retval = mysqli_query($connection, $query);
    
       
              while ($row = mysqli_fetch_array($retval)){  
                echo '<input type="text" id="'.$row["attName"].'" name="'.$row["attName"].'" placeholder="'.$row["attName"].'"/>';
              }
             
             
      ?>
       <input type="submit" value="Submit" class="btn btn-success btn-sm"/>
     
      </form>
      
      
      <a href="addAttribute.php"><input type="submit" value="Add Attribute" class="btn btn-success btn-sm"/></a>
      
      <!-- CODE REPLACED BY PHP 
      <input type="text" name ="title" placeholder="Title of Book : "/>
      <input type="text" name ="authorFirst" placeholder="Author (First) : "/>
      <input type="text" name ="authorLast" placeholder="Author (Last) : "/>
      <input type="text" name ="pcity" placeholder="Publishing City : "/>
      <input type="text" name ="publisher" placeholder="Publisher : "/>
      <input type="text" name ="pdate" placeholder="Publisher Date : "/>
      <input type="text" name ="genre" placeholder="Genre : "/>
      <input type="submit" value="Submit" class="btn btn-success btn-sm"/>-->
      
      <hr>
      
      
      
      
      
      <p class="form-title">
          <h3 style = "color:white;">Search for Books:</h3> </p>
      <form action = "searchBookDatabase.php" method="POST" id="mainForm">
        
      <?php
       $query = "SELECT * FROM attributes  ";
    
       $retval = mysqli_query($connection, $query);
    
         while ($row = mysqli_fetch_array($retval)){
                echo '<input type="text" id="'.$row["attName"].'"name="'.$row["attName"].'" placeholder="'.$row["attName"].'"/>';
              }
        ?>
      <!--
      <input type="text" name ="ISBN" placeholder="ISBN : "/>
      <input type="text" name ="title" placeholder="Title of Book : "/>
      <input type="text" name ="authorFirst" placeholder="Author (First) : "/>
      <input type="text" name ="authorLast" placeholder="Author (Last) : "/>
      <input type="text" name ="pcity" placeholder="Publishing City : "/>
      <input type="text" name ="publisher" placeholder="Publisher : "/>
      <input type="text" name ="pdate" placeholder="Publisher Date : "/>
      <input type="text" name ="genre" placeholder="Genre : "/>-->
      
      
      <input type="submit" value="Submit" class="btn btn-success btn-sm"/> 
      </form>

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
