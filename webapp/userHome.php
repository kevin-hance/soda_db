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

    $dbRecords = mysql_query("SELECT username FROM user WHERE user_id = '$user_id'",$dbLocalhost) or die("Problem reading table: ".mysql_error());
    $record = mysql_fetch_row($dbRecords);
    $username = $record[0];
    $headername = strtoupper($username);
    echo "<h2> WELCOME $headername</h2>";
    ?>
    <div>
      <div style="float:left; width:40%;">
        <form action="favorites.php" method="POST" style="margin:10px;">
          <input type="submit" value="Add Favorites"/>
        </form>
        <form action="search.php" style="margin:10px;">
          <input type="submit" value="Search Sodas"/>
        </form>
      </div>
      <div style="float:left; width:40%; border:black; border-width:3px; border-style:solid; padding:3px;">
        <?php
          $query = "SELECT d.drink_name 
                    FROM drink d JOIN favorite f USING (drink_id)
                    WHERE user_id = '$user_id'";
          $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          echo "<fieldset> <legend>Your favorite sodas</legend>";
          echo "<form action='results.php' method='POST'>";
          while($record = mysql_fetch_row($dbRecords)){
            echo "<input type= 'submit' value='{$record[0]}' name='drink_name'/>";
            echo "<br></br>";
          }
          echo "</form>";
          echo "</fieldset>";
          $query = "SELECT f.flavor_id
                    FROM flavor f JOIN drink d ON (f.flavor_id = d.flavor_id)
                    GROUP BY f.flavor_id
                    HAVING count(*) = (SELECT max(l.cf)
                                       FROM (SELECT count(*) AS cf
                                             FROM drink d2
                                             GROUP BY d2.flavor_id) l);";
          $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          $record = mysql_fetch_row($dbRecords);
          $query = "SELECT d.drink_name 
                    FROM drink d JOIN flavor f USING (flavor_id)
                    WHERE f.flavor_id = '$record[0]'";
          $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          echo "<fieldset> <legend>Most Popular Sodas</legend>";
          echo "<form action='results.php' method='POST'>";
          while($record = mysql_fetch_row($dbRecords)){
            echo "<input type= 'submit' value='{$record[0]}' name='drink_name'/>";
            echo "<br></br>";
          }
          echo "</form>";
          echo "</fieldset>";
          mysql_close($dbLocalhost);
        ?>
      </div>
    </div>
  </div>
</body>

</html>