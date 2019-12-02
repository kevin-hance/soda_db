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
    <h1>Sodatastic</h1>
    <form action='' method='POST'>
      <p>Username</p>
      <input type='text' name='username'/>
      <p>Password</p>
      <input type='password' name='password'/>
      </br>
      <input type='radio' name='user_type' value='U'>User</br>
      <input type='radio' name='user_type' value='M'>Manufacturer</br></br>
      <input type='submit' value='Login' name='login'/>
    </form>
    <?php
    // Need to put some shit in SESSION
    include('database.php');
    if(isset($_POST['login']) && isset($_POST['user_type'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $user_type = $_POST['user_type'];
      $user_id;
      
      $dbRecords = mysql_query("SELECT user_id FROM user WHERE username = '$username' AND user_password = '$password'",$dbLocalhost) or die("Problem reading table: ".mysql_error());
      $record = mysql_fetch_row($dbRecords);
      $user_id = $record[0];
      $_SESSION['user_id'] = $user_id;

      if($user_type == 'U'){
        header('Location: userHome.php');
        exit();
      }else {
        header('Location: manHome.php');
        exit();
      }
    }

    mysql_close($dbLocalhost);
    ?>
  </div>
</body>

</html>