<!DOCTYPE html>
<html lang="en">

<head>
  <title>CPSC 321</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
    <fieldset>
      <legend>Search Query</legend>
      <form>
        <input type="checkbox" name="drink_name_checkbox" value="drink_name_checkbox">
        <h4>Drink name:</h4>
        <input type="text" name="drink_name_field"><br>

        <input type="checkbox" name="manufac_checkbox" value="manufac_checkbox">
        <h4>Manufacturer name:</h4>
        <input type="text" name="manufac_field"><br>

        <input type="checkbox" name="caffeine_checkbox" value="caffeine_checkbox">
        <h4>Caffeine content (mg):</h4>
        <input type="text" name="caffeine_field"><br>

        <input type="checkbox" name="sugar_checkbox" value="sugar_checkbox">
        <h4>Sugar content (g):</h4>
        <input type="text" name="sugar_field"><br>

        <input type="checkbox" name="sodium_checkbox" value="sodium_checkbox">
        <h4>Sodium content (mg):</h4>
        <input type="text" name="sodium_field"><br>

        <input type="checkbox" name="servingsize_checkbox" value="servingsize_checkbox">
        <h4>Serving size (fl oz):</h4>
        <input type="text" name="servingsize_field"><br>

        <input type="checkbox" name="drinktype_checkbox" value="drinktype_checkbox">
        <h4>Drink type:</h4>
        <input type="text" name="drinktype_field"><br>

        <input type="checkbox" name="flavor_checkbox" value="flavor_checkbox">
        <h4>Flavor:</h4>
        <input type="text" name="flavor_field"><br>

      </form>
    </fieldset>

  <input type="button" name="search_button" value="Search">

  <div id="container">
    <?php

    ?>
  </div>
</body>

</html>