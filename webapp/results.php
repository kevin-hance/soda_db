<!DOCTYPE html>
<html lang="en">

<head>
  <title>CPSC 321</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="container">
    <fieldset>
      <?php
        include('database.php');
        $drink_name = $_POST['drink_name'];
        //Get the drink information
        $query = "SELECT * FROM drink WHERE drink_name = '$drink_name'";
        $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
        $record = mysql_fetch_row($dbRecords);
        //Get the manufacturer name
        $query2 = "SELECT manufac_name FROM manufacturer WHERE manufac_id = '$record[2]'";
        $dbRecords = mysql_query($query2, $dbLocalhost) or die("Problem reading table: ".mysql_error());
        $record2 = mysql_fetch_row($dbRecords);
        //Get the flavor name
        $query3 = "SELECT flavor_name FROM flavor WHERE flavor_id = '$record[8]'";
        $dbRecords = mysql_query($query3, $dbLocalhost) or die("Problem reading table: ".mysql_error());
        $record3 = mysql_fetch_row($dbRecords);
        //Get the drink type name
        $query4 = "SELECT drink_type_name FROM drink_type WHERE drink_type_id = '$record[7]'";
        $dbRecords = mysql_query($query4, $dbLocalhost) or die("Problem reading table: ".mysql_error());
        $record4 = mysql_fetch_row($dbRecords);
        //Print out all the information
        echo "<legend>$drink_name</legend>";
        echo "<h2>Soda name: $record[1] </h2>";
        echo "<p>Manufacturer: $record2[0] </p>";
        echo "<p>Caffeine Content: $record[3] mg </p>";
        echo "<p>Sugar Content: $record[4] mg </p>";
        echo "<p>Sodium Content: $record[5] mg </p>";
        echo "<p>Serving Size: $record[6] fl oz</p>";
        echo "<p>Flavor: $record3[0]</p>";
        echo "<p>Drink Type: $record4[0]</p>";

        mysql_close($dbLocalhost);
      ?>
    </fieldset>
  </div>
</body>

</html>