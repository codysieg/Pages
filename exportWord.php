<!DOCTYPE html>
  <?php
  // http header describes type of file output, filename and attachment type
  header("Content-type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=bibliography.doc");
  session_start();

  ?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
  </head>
    <body>

      <h1 align="center"> <u>Bibliography</u> </h1>
      <?php
      $return_template = $_SESSION['return_template'];
      foreach($return_template as $row){
        echo "<p align='center' style='font-size: 20px'>";
        echo $row;
        echo "</p>";
      }
      echo "<br/>";
      ?>

    </body>
</html>
