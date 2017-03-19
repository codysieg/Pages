<?php
  session_start();
?>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'databaseConnection.php';
    $booksInCollection = "select * from books, collections where books.ISBN = collections.ISBN";
    $retval = mysqli_query($connection, $booksInCollection);
    $website_string = $_POST['website_string'];
    $returnTemplate = [];
    //check to see which one it is.
    if($website_string == "mla"){
      //do mla stuff
      while($row = mysqli_fetch_array($retval)){
        $returnTemplate[] = $row['authorLast'].", ".$row['authorFirst'].".<i> ".$row['title']."</i>. ".$row['publisher'].", ".$row['pdate'].". Print.";
      }

    }
    elseif($website_string == "apa"){
      //do apa stuff
      while($row = mysqli_fetch_array($retval)){
        $returnTemplate[] = $row['authorLast'].", ".substr($row['authorFirst'], 0, 1).". (".$row['pdate'].") ".$row['title']." ".$row['pcity'].": ".$row['publisher'].".";
      }

    }
    elseif($website_string == "chic"){
      //do chicago stuff
      while($row = mysqli_fetch_array($retval)){
        $returnTemplate[] = $row['authorLast'].", ".$row['authorFirst'].". <i>".$row['title']."</i>. ".$row['pcity'].": ".$row['publisher'].", ".$row['pdate'].".";
      }

    }
    // now return the template selected and print it out.
    //save as a session variable
    $_SESSION['return_template'] = $returnTemplate;
    header('Location: templates.php');
  }
?>
