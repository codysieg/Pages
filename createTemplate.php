<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login.php');
}

// user is legitimate.
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["tname"]) && isset($_POST["firstAtt"]) && isset($_POST["secondAtt"]) && isset($_POST["thirdAtt"]) && isset($_POST["fourthAtt"]) && isset($_POST["fifthAtt"]) && isset($_POST["sixthAtt"]) && isset($_POST["seventhAtt"]) && isset($_POST["eigthAtt"])){
    //only test to see if every attribute is filled in, this is mandatory for now.
    //will change it so only one can be entered later.

          include 'databaseConnection.php';
          //start to handle each attribute individually
          //test to see if it checked, italics, or whatever. then insert into database.
          //apply the styles selected and insert into database.

          $tname = $_POST['tname']; //name of template
          //attributes in order
          $firstAtt = $_POST['firstAtt'];
          $secondAtt = $_POST['secondAtt'];
          $thirdAtt = $_POST['thirdAtt'];
          $fourthAtt = $_POST['fourthAtt'];
          $fifthAtt = $_POST['fifthAtt'];
          $sixthAtt = $_POST['sixthAtt'];
          $seventhAtt = $_POST['seventhAtt'];
          $eigthAtt = $_POST['eigthAtt'];

          //get styles.
          if(isset($_POST['firstBold'])){
            //bold was selected for first attribute
            $firstStyle = "bold";
          }
          elseif(isset($_POST['firstItal'])){
            $firstStyle = "italics";
          }

          if(isset($_POST['secondBold'])){
            //bold was selected for first attribute
            $secondStyle = "bold";
          }
          elseif(isset($_POST['secondItal'])){
            $secondStyle = "italics";
          }

          if(isset($_POST['thirdBold'])){
            //bold was selected for first attribute
            $thirdStyle = "bold";
          }
          elseif(isset($_POST['thirdItal'])){
            $thirdStyle = "italics";
          }

          if(isset($_POST['fourthBold'])){
            //bold was selected for first attribute
            $fourthStyle = "bold";
          }
          elseif(isset($_POST['fourthItal'])){
            $fourthStyle = "italics";
          }

          if(isset($_POST['fifthBold'])){
            //bold was selected for first attribute
            $fifthStyle = "bold";
          }
          elseif(isset($_POST['fifthItal'])){
            $fifthStyle = "italics";
          }

          if(isset($_POST['sixthBold'])){
            //bold was selected for first attribute
            $sixthStyle = "bold";
          }
          elseif(isset($_POST['sixthItal'])){
            $sixthStyle = "italics";
          }

          if(isset($_POST['seventhBold'])){
            //bold was selected for first attribute
            $seventhStyle = "bold";
          }
          elseif(isset($_POST['seventhItal'])){
            $seventhStyle = "italics";
          }

          if(isset($_POST['eigthBold'])){
            $eigthStyle = "bold";
          }
          elseif(isset($_POST['eigthItal'])){
            $eigthStyle = "italics";
          }

          //get seperators
          $firstSep = $_POST['firstSep'];
          $secondSep = $_POST['secondSep'];
          $thirdSep = $_POST['thirdSep'];
          $fourthSep = $_POST['fourthSep'];
          $fifthSep = $_POST['fifthSep'];
          $sixthSep = $_POST['sixthSep'];
          $seventhSep = $_POST['seventhSep'];
          $eigthSep = $_POST['eigthSep'];

          //insert everything into database
          $sql = "INSERT INTO templates(tname, firstAtt, firstStyle, firstSep, secondAtt, secondStyle, secondSep, thirdAtt, thirdStyle, thirdSep, fourthAtt, fourthStyle, fourthSep, fifthAtt, fifthStyle, fifthSep, sixthAtt, sixthStyle, sixthSep, seventhAtt, seventhStyle, seventhSep, eigthAtt, eigthStyle, eigthSep)
          VALUES ('$tname', '$firstAtt', '$firstStyle', '$firstSep', '$secondAtt', '$secondStyle', '$secondSep', '$thirdAtt', '$thirdStyle', '$thirdSep', '$fourthAtt', '$fourthStyle', '$fourthSep', '$fifthAtt', '$fifthStyle', '$fifthSep', '$sixthAtt', '$sixthStyle', '$sixthSep',
          '$seventhAtt', '$seventhStyle', '$seventhSep', '$eigthAtt', '$eigthStyle', '$eigthSep');";
          $result = mysqli_query($connection, $sql);
          //execute query.

          if($result){
            header('Location: templates.php');
          } else{
            header('Location: templates.php');
          }
    }
  }
?>
