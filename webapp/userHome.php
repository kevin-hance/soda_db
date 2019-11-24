<!DOCTYPE html>
<html lang="en">

<head>
  <title>CPSC 321</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="container">
    <h2> WELCOME USER </h2>
    <div>
      <div style="float:left; width:40%;">
        <form action="favorites.php" style="margin:10px;">
          <input type="submit" value="Your Favorites"/>
        </form>
        <form action="search.php" style="margin:10px;">
          <input type="submit" value="Search Sodas"/>
        </form>
        <form action="search.php" style="margin:10px;">
          <input type="submit" value="Search Manufacturers"/>
        </form>
      </div>
      <div style="float:left; width:40%; border:black; border-width:3px; border-style:solid; padding:3px;">
        <p> Favorite soda result here </p>
      </div>
    </div>
    <?php

    ?>
  </div>
</body>

</html>