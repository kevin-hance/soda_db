<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Enter New Soda </title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="container">
        <fieldset>
            <legend>Add a new drink</legend>
            <form action='' method='POST'> 
                Drink Name:<br>
                <input type="text" name="drink_name"><br>
                Caffeine Content:<br>
                <input type="text" name="caffeine_content"><br>
                Sugar Content:<br>
                <input type="text" name="sugar_content"><br>
                Sodium Content:<br>
                <input type="text" name="sodium_content"><br>
                Serving Size:<br>
                <input type="text" name="serving_size"><br>
                <select name="flavor">
                    <option value="1">Cola</option>
                    <option value="2">Lemon-Lime</option>
                    <option value="3">Cherry</option>
                    <option value="4">Redbull</option>
                    <option value="5">Orange</option>
                    <option value="6">Grape</option>
                </select>
                <select name="type">
                    <option value="1">Soda</option>
                    <option value="2">Health</option>
                    <option value="3">Energy</option>
                </select>
                <input type="submit" value="Submit">
            </form>
        </fieldset>
        <?php
        include('database.php');
        if(isset($_POST['drink_name']) && isset($_POST['caffeine_content']) && isset($_POST['sugar_content']) && isset($_POST['sodium_content']) && isset($_POST['serving_size'])){
            $drink_name = $_POST['drink_name'];
            $caffeine = $_POST['caffeine_content'];
            $sugar = $_POST['sugar_content'];
            $sodium = $_POST['sodium_content'];
            $serving = $_POST['serving_size'];
            $flavor = $_POST['flavor'];
            $type = $_POST['type'];
            $manufac_id = $_SESSION['manufac_id'];
            $query = "SELECT drink_name FROM drink WHERE drink_name = '$drink_name'";
            $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
            $record = mysql_fetch_row($dbRecords);
            if(empty($record)){
                $query = "INSERT INTO drink VALUES (NULL, '$drink_name', '$manufac_id', '$caffeine', '$sugar', '$sodium', '$serving', '$type', '$flavor')";
                $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
                header('Location: manHome.php');
                exit();
            } else {
                echo '<script language="javascript">';
                echo 'alert("Drink already in database, please use a new name")';
                echo '</script>';
                header('Location: add.php');
                exit();
            }
        }
        mysql_close($dbLocalhost);
    ?>
    </div>
</body>

</html>