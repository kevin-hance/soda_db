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
    <h1>Add Soda To Favorites</h1>
    <form action='' method='POST'>
      <p>Enter soda name to add to favorites: </p>
      <input name='drink_name' type='text'>
      </br></br>
      <input type='submit' value='Submit' name ='submit'/>
    </form>
    <?php
      include('database.php');
      $user_id = $_SESSION['user_id'];
      if(isset($_POST['drink_name']) && isset($_POST['submit'])){
        $drink_name = $_POST['drink_name'];
        $query = "SELECT drink_id FROM drink WHERE drink_name = '$drink_name'";
        $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
        $record = mysql_fetch_row($dbRecords);
        $drink_id = $record[0];
        // if drink in the db
        if(empty($drink_id)){
          echo '<script language="javascript">';
          echo 'alert("Drink does not exist in database")';
          echo '</script>';
        }else {
          $query = "SELECT user_id, drink_id FROM favorite WHERE user_id = '$user_id' AND drink_id = '$drink_id'";
          $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
          $record = mysql_fetch_row($dbRecords);
          $chk_user_id = $record[0];
          $chk_drink_id = $record[1];
          // if drink is in favorites tbl
          if($chk_user_id == $user_id && $chk_drink_id == $drink_id){
            echo '<script language="javascript">';
            echo 'alert("This is already your favorite")';
            echo '</script>';
          }else{
            // add drink to favorites tbl
            $query = "INSERT INTO favorite VALUES ($user_id, $drink_id)";
            mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
            header('Location: userHome.php');
            exit();
          }
        }
      }
  
      mysql_close($dbLocalhost);
    ?>
  </div>
</body>

</html>