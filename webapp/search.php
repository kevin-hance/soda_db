<!DOCTYPE html>
<html lang="en">

<head>
  <title>CPSC 321</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
<div id='container'>
    <fieldset>
      <legend>Search Query</legend>
      
        <form action='' method='POST'>
          <h4 style="display:inline-block;">Drink name:</h4>
          <input type="text" name="drink_name_field"><br>

          <h4 style="display:inline-block;">Manufacturer name:</h4>
          <input type="text" name="manufac_field"><br>

          <h4 style="display:inline-block;">Caffeine content (mg):</h4>
          <input type="text" name="caffeine_field"><br>

          <h4 style="display:inline-block;">Sugar content (g):</h4>
          <input type="text" name="sugar_field"><br>

          <h4 style="display:inline-block;">Sodium content (mg):</h4>
          <input type="text" name="sodium_field"><br>

          <h4 style="display:inline-block;">Serving size (fl oz):</h4>
          <input type="text" name="servingsize_field"><br>

          <h4 style="display:inline-block;">Flavor:</h4>
          <select name="flavor">
              <option value="0">Please select a flavor</option>
              <option value="1">Cola</option>
              <option value="2">Lemon-Lime</option>
              <option value="3">Cherry</option>
              <option value="4">Redbull</option>
              <option value="5">Orange</option>
              <option value="6">Grape</option>
          </select><br>

          <h4 style="display:inline-block;">Type:</h4>
          <select name="type">
            <option value="0">Please select a type</option>
            <option value="1">Soda</option>
            <option value="2">Health</option>
            <option value="3">Energy</option>
          </select><br>

          <input type="submit" name="search_button" value="Search">
        </form>
        
    </fieldset>
    </div>

  
  <div id='container'>
    <fieldset>
      <legend>Search Results</legend>
    <?php
      include('database.php');
      if(isset($_POST['search_button'])){
        $drink_name = $_POST['drink_name_field'];
        $manufac_name = $_POST['manufac_field'];
        $caffeine_content = $_POST['caffeine_field'];
        $sugar_content = $_POST['sugar_field'];
        $sodium_content = $_POST['sodium_field'];
        $serving_size = $_POST['servingsize_field'];
        $drink_type = $_POST['type'];
        $flavor = $_POST['flavor'];

        $query = "SELECT d.drink_name
                  FROM drink d JOIN flavor f ON d.flavor_id = f.flavor_id
                  JOIN drink_type dt ON d.drink_type_id = dt.drink_type_id
                  JOIN manufacturer m ON d.manufac_id = m.manufac_id ";
        $wherestatement = "WHERE ";
        
        $firstAtt = 1;
        if(!empty($drink_name)){
          $wherestatement .= " d.drink_name = '$drink_name' ";
          $firstAtt = 0;
        }
        if(!empty($manufac_name)){
          if($firstAtt == 0){
            $wherestatement .= 'AND ';
          }
          $wherestatement .= " m.manufac_name = '$manufac_name' ";
          $firstAtt = 0;
        }
        if(!empty($caffeine_content)){
          if($firstAtt == 0){
            $wherestatement .= 'AND ';
          }
          $wherestatement .= " d.caffeine_content >= '$caffeine_content' ";
          $firstAtt = 0;
        }
        if(!empty($sugar_content)){
          if($firstAtt == 0){
            $wherestatement .= 'AND ';
          }
          $wherestatement .= " d.sugar_content >= '$sugar_content' ";
          $firstAtt = 0;
        }
        if(!empty($sodium_content)){
          if($firstAtt == 0){
            $wherestatement .= 'AND ';
          }
          $wherestatement .= " d.sodium_content >= '$sodium_content' ";
          $firstAtt = 0;
        }
        if(!empty($serving_size)){
          if($firstAtt == 0){
            $wherestatement .= 'AND ';
          }
          $wherestatement .= " d.serving_size >= '$serving_size' ";
          $firstAtt = 0;
        }
        if($drink_type != 0){
          if($firstAtt == 0){
            $wherestatement .= 'AND ';
          }
          $wherestatement .= " dt.drink_type_id = '$type' ";
          $firstAtt = 0;
        }
        if($flavor != 0){
          if($firstAtt == 0){
            $wherestatement .= 'AND ';
          }
          $wherestatement .= " f.flavor_id = '$flavor' ";
          $firstAtt = 0;
        }
        if(!($wherestatement == 'WHERE ')){
          $query .= $wherestatement;
        }

        $orderby = " ORDER BY d.drink_name ASC;";
        
        $query .= $orderby;
        

        $dbRecords = mysql_query($query, $dbLocalhost) or die("Problem reading table: ".mysql_error());
        
        echo "<form action='results.php' method='POST'>";
          while($record = mysql_fetch_row($dbRecords)){
            echo "<input type= 'submit' value='{$record[0]}' name='drink_name'/>";
            echo "<br></br>";
          }
        echo "</form>";
        
        mysql_close($dbLocalhost);
        
      }
    ?>
    </fieldset>
  </div>
</body>

</html>