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
        <form action="favorites.php" style="margin:10px;">
          <input type="submit" value="Your Favorites"/>
        </form>
        <form action="search.php" style="margin:10px;">
          <input type="submit" value="Search Sodas"/>
        </form>
        <form action="search.php" style="margin:10px;">
          <input type="submit" value="Search Manufacturers"/>
        </form>
      </div>
      <div style="float:left; width:40%; border:black; border-width:3px; border-style:solid; padding:3px;">
        <p> User favorite sodas </p>
      </div>
    </div>
    <?php
    ?>
  </div>
</body>

</html>