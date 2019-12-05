<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>CPSC 321</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="container">
  <?php
    include('database.php');
    $user_id = $_SESSION['user_id'];
    $dbRecords = mysql_query("SELECT manufac_name,manufac_id FROM manufacturer WHERE user_id = '$user_id'",$dbLocalhost) or die("Problem reading table: ".mysql_error());
    $record = mysql_fetch_row($dbRecords);
    $manufac_name = $record[0];
    $manufac_id = $record[1];
    $_SESSION['manufac_id'] = $manufac_id;
    
    $headername = strtoupper($manufac_name);
    echo "<h2> WELCOME $headername</h2>";
    ?>
    <div>
      <div style="float:left; width:40%;">
        <form action="add.php" style="margin:10px;">
          <input type="submit" value="Enter Soda"/>
        </form>
        <form action="remove.php" style="margin:10px;">
          <input type="submit" value="Remove Soda"/>
        </form>
        <form action="search.php" style="margin:10px;">
          <input type="submit" value="Search Sodas"/>
        </form>
      </div>
      <div style="float:left; width:40%; border:black; border-width:3px; border-style:solid; padding:3px;">
        <p> All manufacture sodas </p>
        <?php
          $query = "SELECT d.drink_name 
                    FROM drink d
                    WHERE manufac_id = '$manufac_id'";
          $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          while($record = mysql_fetch_row($dbRecords)){
            echo "<p>{$record[0]}</p>";
        }
        ?>
      </div>
    </div>
    <?php

    ?>
  </div>
</body>

</html>