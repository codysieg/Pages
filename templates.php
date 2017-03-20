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
  #close{
    position: relative;
    right: -43%;
    width: 15%;
  }
  #myModal{
    color: black;
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
          <option value = "MLA">MLA Citation Style</option>
          <option value = "APA">APA Citation Style</option>
          <option value = "Chicago/Turabian">Chicago/Turabian Style</option>
        </select>
      </div>
      <input type="submit" value="Submit" name ="submit" class="btn btn-success btn-sm" id="close"/>
    </form>

    <p></p>

    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" id ="close" data-target="#myModal">Create Template...</button>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create a new template: </h4>
        </div>
        <div class="modal-body">
          <!--Insert form that will be used to create a new template. -->
          <!--Will only satisfy the 8 attributes currently in Books. (ISBN, title, authorFirst, authorLast, pcity, publisher, pdate, genre)-->
          <form method = "post" action = "createTemplate.php">
          <label>Enter the attributes you want to have...</label><br/>
          <div class="form-group">
            <input type="text" name ="firstAtt" class = "form-control" placeholder="First Attribute: "/>
          </div>
          <div class="form-group">
            <input type="text" name ="secondAtt" class = "form-control" placeholder="Second Attribute: "/>
          </div>
          <div class="form-group">
            <input type="text" name ="thirdAtt" class = "form-control" placeholder="Third Attribute: "/>
          </div>
          <div class="form-group">
            <input type="text" name ="fourthAtt" class = "form-control" placeholder="Fourth Attribute: "/>
          </div>
          <div class="form-group">
            <input type="text" name ="fifthAtt" class = "form-control"  placeholder="Fifth Attribute: "/>
          </div>
          <div class="form-group">
            <input type="text" name ="sixthAtt" class = "form-control" placeholder="Sixth Attribute: "/>
          </div>
          <div class="form-group">
            <input type="text" name ="seventhAtt" class = "form-control" placeholder="Seventh Attribute: "/>
          </div>
          <div class="form-group">
            <input type="text" name ="eigthAtt" class = "form-control" placeholder="Eigth Attribute: "/>
          </div>
          <div>
            <input type="submit" value="Submit" class="btn btn-info btn-sm"/>
          </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

      </div>
    </div>
    <hr>
    <h2 align="center"><?php echo $_SESSION['template_name'] ?> Bibliography</h2>
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
  <div class="text-center" >
  <a href="./exportWord.php" class="btn btn-info">Export to Word.doc</a>
  </div>

</body>
</html>
