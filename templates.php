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

  #close{
    position: relative;
    right: -43%;
    width: 15%;
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
    <h2>Select a Template: </h2>
    <form method = "post" action = "selectTemplate.php">
      <div class="form-group">
        <label for="sel1">Select which template you wish to use: </label>
        <select class="form-control" id="sel1" name = "website_string">
          <option value = "mla">MLA Citation Style</option>
          <option value = "apa">APA Citation Style</option>
          <option value = "chic">Chicago/Turabian Style</option>
        </select>
      </div>
      <input type="submit" value="Submit" name ="submit" class="btn btn-success btn-sm" id="close"/>
    </form>
    <hr>
    <h2 align="center">Bibliography</h2>
    <?php
    //get session variable w/ template in it
      $return_template = $_SESSION['return_template'];
      foreach($return_template as $row){
        echo "<p align='center'>";
        echo $row;
        echo "</p>";
      }
      echo "<br/>";
    ?>
  </div>

</body>
</html>
