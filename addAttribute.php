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
</body>
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
      <h3 style = "color:white;">Add Attribute:</h3> </p>
      <form action = "addAttributeHandle.php" method="POST" id="mainForm">

   <input type="text" name="addAtt" id="addAtt" placeholder="Attribute Name">


       <input type="submit" value="Submit" class="btn btn-success btn-sm"/>
</form>





      <hr>





      <p class="form-title">
          <h3 style = "color:white;">Remove Attribute:</h3> </p>
      <form action = "removeAttributeHandle.php" method="POST" id="mainForm">



      <input type="text" name="removeAtt" id="removeAtt" placeholder="Attribute Name">
      <input type="submit" value="Submit" class="btn btn-success btn-sm"/>
      </form>
