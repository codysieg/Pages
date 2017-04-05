<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
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

  .italics{
    white-space: nowrap;
    font-style: italic;
  }

  .bold{
    white-space: nowrap;
    font-weight: bold;
  }

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
<?php
//check to see if user is logged on
if(!isset($_SESSION['username'])){
  //redirect to login page.
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
          <li><a href='index.php'>Home</a></li>
          <li><a href="collections.php">My Collection</a></li>
          <li><a href="templates.php">Templates</a></li>
          <li><a class = "logoutButton" href="logout.php">Log Out</a></li>
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
          <?php
          //get all of the templates in the database
          include "databaseConnection.php";
          $sql = "SELECT tid, tname FROM templates;";
          $result = mysqli_query($connection, $sql);
          while($rows = mysqli_fetch_array($result)){
            $id = $rows['tid'];
            $name = $rows['tname'];
            echo "<option value = ".$id.">$name</option>";
          }
          ?>
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
          <input type="text" name ="tname" class = "form-control" placeholder="Title of Template: "/><br/><br/>
          <label>Enter the attributes you want to have...</label><br/>
          <div class="form-group">
            <input type="text" name ="firstAtt" class = "form-control" placeholder="First Attribute: "/>
            <input type="checkbox" name = "firstBold">Bold
            <input type="checkbox" name = "firstItal">Italics
            <select name="firstSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name ="secondAtt" class = "form-control" placeholder="Second Attribute: "/>
            <input type="checkbox" name = "secondBold">Bold
            <input type="checkbox" name = "secondItal">Italics
            <select name="secondSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name ="thirdAtt" class = "form-control" placeholder="Third Attribute: "/>
            <input type="checkbox" name = "thirdBold">Bold
            <input type="checkbox" name = "thirdItal">Italics
            <select name="thirdSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name ="fourthAtt" class = "form-control" placeholder="Fourth Attribute: "/>
            <input type="checkbox" name = "fourthBold">Bold
            <input type="checkbox" name = "fourthItal">Italics
            <select name="fourthSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name ="fifthAtt" class = "form-control"  placeholder="Fifth Attribute: "/>
            <input type="checkbox" name = "fifthBold">Bold
            <input type="checkbox" name = "fifthItal">Italics
            <select name="fifthSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name ="sixthAtt" class = "form-control" placeholder="Sixth Attribute: "/>
            <input type="checkbox" name = "sixthBold">Bold
            <input type="checkbox" name = "sixthItal">Italics
            <select name="sixthtSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name ="seventhAtt" class = "form-control" placeholder="Seventh Attribute: "/>
            <input type="checkbox" name = "seventhBold">Bold
            <input type="checkbox" name = "seventhItal">Italics
            <select name="seventhSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name ="eigthAtt" class = "form-control" placeholder="Eigth Attribute: "/>
            <input type="checkbox" name = "eigthBold">Bold
            <input type="checkbox" name = "eigthItal">Italics
            <select name="eigthSep">
              <option value=" "> </option>
              <option value=", ">, </option>
              <option value=". ">. </option>
            </select>
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
    <?php
    //get session variable w/ template in it
      if(isset($_SESSION['return_template'])){
        //template has been returned
        echo "<h2 align='center'>".$_SESSION['template_name']." Bibliography</h2>";
        $return_template = $_SESSION['return_template'];
        foreach($return_template as $row){
          echo "<p align='center'>";
          echo $row;
          echo "</p>";
        }
        echo "<br/>";
      }
      else{
        //template has not been returned, do not print anything.
        echo "<h2 align='center'>No Template Selected</h2>";
        echo "<p align='center'></p>";
      }
    ?>
  </div>

  <div class="text-center" >
    <a href="./exportWord.php" class="btn btn-info">Export to Word.doc</a>
  </div>

</body>
</html>
