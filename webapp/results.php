<!DOCTYPE html>
<html lang="en">

<head>
  <title>CPSC 321</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="container">
    <h2> SODA NAME </h2>
    <p> Attribute 1: #MANUFACTURER HERE# </p>
    <p> Attribute 2: #CAFFEINE CONTENT# </p>
    <p> Attribute 3: #SUGAR CONTENT# </p>
    <p> Attribute 4: #SODIUM CONTENT# </p>
    <p> Attribute 5: #SERVING SIZE# </p>
    <p> Attribute 6: #DRINKTYPE# </p>
    <p> Attribute 7: #FLAVOR# </p>
    <?php
    // ZAKCKCK USE THIS VARIABLE!!!!
    $drink_name = $_POST['drink_name'];
    echo "$drink_name";
    ?>
  </div>
</body>

</html>