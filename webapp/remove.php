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
    <h1>Remove Soda</h1>
    <form action='remove.php' method='POST'>
      <p>Enter soda name to remove: </p>
      <input name='remove' type='text'>
      </br></br>
      <input type='submit' value='Submit' name ='submit'/>
    </form>
    <?php
       include('database.php');
       if(isset($_POST['submit']) && isset($_POST['remove'])){
         $remove = $_POST['remove'];
         $query1 = "SELECT drink_name FROM drink WHERE drink_name = '$remove'";
         $dbRecords = mysql_query($query1,$dbLocalhost) or die("Problem reading table: ".mysql_error());
         $record = mysql_fetch_row($dbRecords);
         $deleteDrink = $record[0];
         if(empty($deleteDrink)){
          echo '<script language="javascript">';
          echo 'alert("Drink does not exist in database")';
          echo '</script>';
         }
         else{
          $query2 = "SELECT drink_id FROM drink WHERE drink_name = '$remove'";
          $dbRecords = mysql_query($query2,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          $record = mysql_fetch_row($dbRecords);
          $deleteDrinkId = $record[0];
          $query3 = "DELETE FROM favorite WHERE drink_id = '$deleteDrinkId'";
          mysql_query($query3,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          $query4 = "DELETE FROM drink WHERE drink_id = '$deleteDrinkId'";
          mysql_query($query4,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          echo '<script language="javascript">';
          echo 'alert("Drink deleted")';
          echo '</script>';
          header('Location: manHome.php');
          exit();
         }
         
       }
   
       mysql_close($dbLocalhost);
    ?>
  </div>
</body>

</html>