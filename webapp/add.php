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
            <form>
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
            </form>
            <form>
                <select>
                    <option value="Soda">Cola</option>
                    <option value="Lemon-Lime">Lemon-Lime</option>
                    <option value="Cherry">Cherry</option>
                    <option value="Redbull">Redbull</option>
                    <option value="Orange">Orange</option>
                    <option value="Grape">Grape</option>
                </select>
            </form>
            <form>
                <select>
                    <option value="Soda">Soda</option>
                    <option value="Health">Health</option>
                    <option value="Energy">Energy</option>
                </select>
                <input type="submit" value="Submit">
            </form>
        </fieldset>
        <?php
    ?>
    </div>
</body>

</html>