<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
?>

<!DOCTYPE html>
  <?php
  // http header describes type of file output, filename and attachment type
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=bibliography.doc");
  session_start();
  ?>

<html>
  <head>
    <script src="jquery-1.11.1.min.js"></script>
    <script src="FileSaver.js"></script>
    <script src="jquery.wordexport.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
    <style>
    .italics{
      display: inline;
      font-style: italic;
    }

    .bold{
      display: inline;
      font-weight: bold;
    }
    </style>
  </head>
    <body>

      <h1 align="center"> <u>Bibliography</u> </h1>
      <?php
      $return_template = $_SESSION['return_template'];
      foreach($return_template as $row){
        echo "<p align='center'>";
        echo $row;
        echo "</p>";
      }
      echo "<br/>";
      ?>

    </body>
</html>
