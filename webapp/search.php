<!DOCTYPE html>
<html lang="en">

<head>
  <title>CPSC 321</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
    <fieldset>
      <legend>Search Query</legend>
      <form action='' method='POST'>
        
        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchcheckbox[]" value="drink_name_checkbox">
          <h4>Drink name:</h4>
          <input type="text" name="drink_name_field"><br>
        </div>

        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchCheckbox[]" value="manufac_checkbox">
          <h4>Manufacturer name:</h4>
          <input type="text" name="manufac_field"><br>
        </div>

        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchCheckbox[]" value="caffeine_checkbox">
          <h4>Caffeine content (mg):</h4>
          <input type="text" name="caffeine_field"><br>
        </div>

        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchCheckbox[]" value="sugar_checkbox">
          <h4>Sugar content (g):</h4>
          <input type="text" name="sugar_field"><br>
        </div>

        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchCheckbox[]" value="sodium_checkbox">
          <h4>Sodium content (mg):</h4>
          <input type="text" name="sodium_field"><br>
        </div>

        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchCheckbox[]" value="servingsize_checkbox">
          <h4>Serving size (fl oz):</h4>
          <input type="text" name="servingsize_field"><br>
        </div>

        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchCheckbox[]" value="drinktype_checkbox">
          <h4>Drink type:</h4>
          <input type="text" name="drinktype_field"><br>
        </div>

        <div class="search-div">
          <input class="search-box" type="checkbox" name="searchCheckbox[]" value="flavor_checkbox">
          <h4>Flavor:</h4>
          <input type="text" name="flavor_field"><br>
        </div>
        <input type="submit" name="search_button" value="Search">
      </form>
    </fieldset>


  
  <div>
    <?php
      include('database.php');
      if(isset($_POST['search_button'])){ //  && isset($_POST['searchCheckbox[]'])
        $drink_name = $_POST['drink_name_field'];
        $manufac_name = $_POST['manufac_field'];
        $caffeine_content = $_POST['caffeine_field'];
        $sugar_content = $_POST['sugar_field'];
        $sodium_content = $_POST['sodium_field'];
        $serving_size = $_POST['servingsize_field'];
        $drink_type = $_POST['drinktype_field'];
        $flavor = $_POST['flavor_field'];

        $query = "SELECT d.drink_name, m.manufac_name, d.caffeine_content, d.sugar_content, d.sodium_content, d.serving_size, dt.drink_type_name, f.flavor_name 
                  FROM drink d JOIN flavor f ON d.flavor_id = f.flavor_id
                  JOIN drink_type dt ON d.drink_type_id = dt.drink_type_id
                  JOIN manufacturer m ON d.manufac_id = m.manufac_id
                  WHERE ";

        // this is where the forloop goes
        $wherestatement = "d.caffeine_content > 0";
        
        if(isset($_POST['done'])){
          
        }

        $orderby = " ORDER BY d.drink_name ASC;";

        $query .= $wherestatement;
        $query .= $orderby;
        

        $dbRecords = mysql_query($query, $dbLocalhost) or die("Problem reading table: ".mysql_error());
        

        echo "<div>
                <table border=\"1\">
                  <caption><strong>Search Results</strong></caption>
                  <tr>
                    <td><strong>Drink Name</strong></td>
                    <td><strong>Manufacturer</strong></td>
                    <td><strong>Caffeine Content</strong></td>
                    <td><strong>Sugar Content</strong></td>
                    <td><strong>Sodium Content</strong></td>
                    <td><strong>Serving Size</strong></td>
                    <td><strong>Drink Type</strong></td>
                    <td><strong>Flavor</strong></td>
                  </tr>";

        while($record = mysql_fetch_row($dbRecords)){
          $drink_name_result = $record[0];
          $manufac_name_result = $record[1];
          $caffeine_content_result = $record[2];
          $sugar_content_result = $record[3];
          $sodium_content_result = $record[4];
          $serving_size_result = $record[5];
          $drink_type_result = $record[6];
          $flavor_result = $record[7];
          echo "<tr>
                <td>$record[0]</td>
                <td>$record[1]</td>
                <td>$record[2]</td>
                <td>$record[3]</td>
                <td>$record[4]</td>
                <td>$record[5]</td>
                <td>$record[6]</td>
                <td>$record[7]</td>
              </tr>";
        }

        echo "</table></div>";
        
        

        mysql_close($dbLocalhost);
        
      }
    ?>
  </div>
</body>

</html>