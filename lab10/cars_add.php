<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MySQL Introduction">
    <meta name="keywords" content="PHP, MySQL, Database">
    <meta name="author" content="Duc Trung Nguyen">
    <title>Add Car</title>

    <link rel="stylesheet" href="./style/addcar.css">
</head>

<body>
    <?php

    require_once "settings.php";
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if ($dbconn) {
        $make = htmlspecialchars(trim($_POST["carmake"]));
        $model = htmlspecialchars(trim($_POST["carmodel"]));
        $price = htmlspecialchars(trim($_POST["price"]));
        $yom = htmlspecialchars(trim($_POST["yom"]));

        $query = "INSERT INTO cars (make, model, price, yom) VALUES ('$make', '$model', '$price', '$yom')";
        $result = mysqli_query($dbconn, $query);

        if (!$result) {
            echo "<p class=\"wrong\">Something is wrong with", $query, "</p>";
        } else {
            echo "<p class=\"ok\">New car record added successfully.</p>";
        }

        mysqli_close($dbconn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
    ?>
</body>

</html>