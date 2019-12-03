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
            header('Location: index.html');
        }
        ?>
    </div>
</body>

</html>