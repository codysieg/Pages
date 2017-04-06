<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
  error_reporting(E_ALL & ~E_NOTICE);
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'databaseConnection.php';
    $booksInCollection = "select * from books, collections where books.ISBN = collections.ISBN";
    $retval = mysqli_query($connection, $booksInCollection);
    $website_string = $_POST['website_string']; //get the proper tid.
    $returnTemplate = [];

    //get everything else from database associated with selection.
    $sql = "SELECT * FROM templates WHERE tid = '$website_string';";
    $result = mysqli_query($connection, $sql);

    //stores attributes
    $tname;
    $firstAtt;
    $secondAtt;
    $thirdAtt;
    $fourthAtt;
    $fifthAtt;
    $sixthAtt;
    $seventhAtt;
    $eigthAtt;

    //stores styles for attributes
    $firstStyle;
    $secondStyle;
    $thirdStyle;
    $fourthStyle;
    $fifthStyle;
    $sixthStyle;
    $seventhStyle;
    $eigthStyle;

    $firstSep;
    $secondSep;
    $thirdSep;
    $fourthSep;
    $fifthSep;
    $sixthSep;
    $seventhSep;
    $eigthSep;


    while($row = mysqli_fetch_array($result)){
      $tname = $row['tname'];
      if(isset($row['firstAtt'])){
        $firstAtt = $row['firstAtt'];
      }
      if(isset($row['secondAtt'])){
        $secondAtt = $row['secondAtt'];
      }
      if(isset($row['thirdAtt'])){
        $thirdAtt = $row['thirdAtt'];
      }
      if(isset($row['fourthAtt'])){
        $fourthAtt = $row['fourthAtt'];
      }
      if(isset($row['fifthAtt'])){
        $fifthAtt = $row['fifthAtt'];
      }
      if(isset($row['sixthAtt'])){
        $sixthAtt = $row['sixthAtt'];
      }
      if(isset($row['seventhAtt'])){
        $seventhAtt = $row['seventhAtt'];
      }
      if(isset($row['eigthAtt'])){
        $eigthAtt = $row['eigthAtt'];
      }

      $firstStyle = $row['firstStyle'];
      $secondStyle = $row['secondStyle'];
      $thirdStyle = $row['thirdStyle'];
      $fourthStyle = $row['fourthStyle'];
      $fifthStyle = $row['fifthStyle'];
      $sixthStyle = $row['sixthStyle'];
      $seventhStyle = $row['seventhStyle'];
      $eigthStyle = $row['eigthStyle'];

      $firstSep = $row['firstSep'];
      $secondSep = $row['secondSep'];
      $thirdSep = $row['thirdSep'];
      $fourthSep = $row['fourthSep'];
      $fifthSep = $row['fifthSep'];
      $sixthSep = $row['sixthSep'];
      $seventhSep = $row['seventhSep'];
      $eigthSep = $row['eigthSep'];
    }
    // all attributes are now set
    $first = "";
    $second = "";
    $third = "";
    $fourth = "";
    $fifth = "";
    $sixth = "";
    $seventh = "";
    $eigth = "";

    while($row = mysqli_fetch_array($retval)){
      $first = "";
      $second = "";
      $third = "";
      $fourth = "";
      $fifth = "";
      $sixth = "";
      $seventh = "";
      $eigth = "";

      if(!empty($firstAtt)){
        $first = "<span class ='".$firstStyle."'>".$row[$firstAtt]."</span> ";
      }

      if(!empty($secondAtt)){
        $second = "<span class ='".$secondStyle."'>".$row[$secondAtt]."</span> ";
      }
      if(!empty($thirdAtt)){
        $third = "<span class ='".$thirdStyle."'>".$row[$thirdAtt]."</span> ";
      }
      if(!empty($fourthAtt)){
        $fourth = "<span class ='".$fourthStyle."'>".$row[$fourthAtt]."</span> ";
      }
      if(!empty($fifthAtt)){
        $fifth = "<span class ='".$fifthStyle."'>".$row[$fifthAtt]."</span> ";
      }
      if(!empty($sixthAtt)){
        $sixth = "<span class ='".$sixthStyle."'>".$row[$sixthAtt]."</span> ";
      }
      if(!empty($seventhAtt)){
        $seventh = "<span class ='".$seventhStyle."'>".$row[$seventhAtt]."</span> ";
      }
      if(!empty($eigthAtt)){
        $eigth = "<span class ='".$eigthStyle."'>".$row[$eigthAtt]."</span>";
      }

      //all styles are applied, now apply the seperators.
      $returnTemplate[] = $first.$firstSep.$second.$secondSep.$third.$thirdSep.$fourth.$fourthSep.$fifth.$fifthSep.$sixth.$sixthSep.$seventh.$seventhSep.$eigth.$eigthSep;
    }



    //old code
    /*
    //check to see which one it is.
    if($website_string == "MLA"){
      //do mla stuff
      while($row = mysqli_fetch_array($retval)){
        $returnTemplate[] = $row['authorLast'].", ".$row['authorFirst'].".<i> ".$row['title']."</i>. ".$row['publisher'].", ".$row['pdate'].". Print.";
      }

    }
    elseif($website_string == "APA"){
      //do apa stuff
      while($row = mysqli_fetch_array($retval)){
        $returnTemplate[] = $row['authorLast'].", ".substr($row['authorFirst'], 0, 1).". (".$row['pdate'].") ".$row['title']." ".$row['pcity'].": ".$row['publisher'].".";
      }

    }
    elseif($website_string == "Chicago/Turabian"){
      //do chicago stuff
      while($row = mysqli_fetch_array($retval)){
        $returnTemplate[] = $row['authorLast'].", ".$row['authorFirst'].". <i>".$row['title']."</i>. ".$row['pcity'].": ".$row['publisher'].", ".$row['pdate'].".";
      }

    }

    elseif($website_string == "Custom"){
        //get template from database
        $sql = "SELECT * FROM templates WHERE tname = '$website_string';";
        $result = mysqli_query($connection, $sql);

        $firstAtt;
        $secondAtt;
        $thirdAtt;
        $fourthAtt;
        $fifthAtt;
        $sixthAtt;
        $seventhAtt;
        $eigthAtt;

        while($row = mysqli_fetch_array($result)){
          $firstAtt = $row['firstAtt'];
          $secondAtt = $row['secondAtt'];
          $thirdAtt = $row['thirdAtt'];
          $fourthAtt = $row['fourthAtt'];
          $fifthAtt = $row['fifthAtt'];
          $sixthAtt = $row['sixthAtt'];
          $seventhAtt = $row['seventhAtt'];
          $eigthAtt = $row['eigthAtt'];
        }
        //attributes are stored now.
        while($row = mysqli_fetch_array($retval)){
          $returnTemplate[] = $row[$firstAtt].", ".$row[$secondAtt].", ".$row[$thirdAtt].", ".$row[$fourthAtt].", ".$row[$fifthAtt].", ".$row[$sixthAtt].", ".$row[$seventhAtt].", ".$row[$eigthAtt];


        }
    }

    */


    // now return the template selected and print it out.
    //save as a session variable
    $_SESSION['template_name'] = $tname;
    $_SESSION['return_template'] = $returnTemplate;
    header('Location: templates.php');
  }
?>
</body>
</html>
