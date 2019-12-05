<!DOCTYPE html>
<html lang="en">

<head>
    <title>CPSC 321</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="container">
        <fieldset>
                <legend>Account Creation</legend>
            <form action='' method='POST'>
                Username:<br>
                <input type="text" name="username"><br>
                Password:<br>
                <input type="password" name="password"><br>
                Repeat Pasword:<br>
                <input type="password" name="re-password"><br>
                Location Id: <strong> Only fill if manufacturer </strong> <br>
                <input type="text" name="location"><br>
                Manufacturer Name: <strong> Only fill if manufacturer </strong> <br>
                <input type="text" name="man_name"><br>
                Net Worth: <strong> Only fill if manufacturer </strong> <br>
                <input type="text" name="net_worth"><br>
                <input type='radio' name='usertype' value='U'>User</br>
                <input type='radio' name='usertype' value='M'>Manufacturer</br>
                <input type="submit" value="Submit" name='create'>
            </form>
        </fieldset>
        <?php
        include('database.php');
        if(isset($_POST['create']) && isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $usertype = $_POST['usertype'];
            $query = "INSERT INTO user VALUES (NULL, '$username', '$password', '$usertype')";
            $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());

            if($usertype == 'M') {
                $dbRecords = mysql_query("SELECT user_id FROM user WHERE username = '$username' AND user_password = '$password'",$dbLocalhost) or die("Problem reading table: ".mysql_error());
                $record = mysql_fetch_row($dbRecords);
                $user_id = $record[0];
                $location = $_POST['location'];
                $manufac_name = $_POST['man_name'];
                $net_worth = $_POST['net_worth'];
                $query = "INSERT INTO manufacturer VALUES (NULL, '$manufac_name', '$location', '$net_worth', '$user_id')";
                $dbRecords = mysql_query($query,$dbLocalhost) or die("Problem reading table: ".mysql_error());
            }
           
            header('Location: index.html');
        }
        mysql_close($dbLocalhost);
        ?>
    </div>
</body>

</html>