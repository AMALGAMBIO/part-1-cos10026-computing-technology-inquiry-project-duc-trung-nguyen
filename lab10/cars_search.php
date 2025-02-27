<?php
session_start();
$_SESSION["valid_input"] = false;

require_once "settings.php";
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

if ($dbconn) {
    if ($_POST["search"] == "make") {
        $make = htmlspecialchars(trim($_POST["carmake"]));

        if ($make == '') {
            redirect_to_result($dbconn);
        }

        $query = "SELECT * FROM cars WHERE make LIKE \"$make%\"";
    } elseif ($_POST["search"] == "model") {
        $model = htmlspecialchars(trim($_POST["carmodel"]));

        if ($model == '') {
            redirect_to_result($dbconn);
        }

        $query = "SELECT * FROM cars WHERE model LIKE \"$model%\"";
    } elseif (($_POST["search"] == "pricemin") || ($_POST["search"] == "pricemax")) {
        $price = $_POST["search"] == "pricemin" ? $_POST["pricemin"] : $_POST["pricemax"];
        $price = htmlspecialchars(trim($price));

        // Simple data validation
        if (($price == '') || (intval($price) <= 0)) {
            redirect_to_result($dbconn);
        }

        if ($_POST["search"] == "pricemin") {
            $query = "SELECT * FROM cars WHERE price >= $price";
        } else {
            $query = "SELECT * FROM cars WHERE price <= $price";
        }
    } elseif ($_POST["search"] == "yom") {
        $yom = htmlspecialchars(trim($_POST["yom"]));

        // Simple data validation
        if (($yom == '') || (intval($yom) <= 0)) {
            redirect_to_result($dbconn);
        }

        $query = "SELECT * FROM cars WHERE yom = $yom";
    }


    $result = mysqli_query($dbconn, $query);
    $_SESSION["search_result"] = $result->fetch_all();
    $_SESSION["valid_input"] = true;
    redirect_to_result($dbconn);
} else {
    // Error msg displayed in place, no need for redirecting to result page
    echo "<p>Unable to connect to the database. Please try again at another time.</p>";
}


function redirect_to_result($dbconn)
{
    // Handle closing the db connection and redirecting to the result page
    // Reduce repeat code
    mysqli_close($dbconn);
    header("Location: cars_search_result.php");
    // Exit() to stop the rest of the script running
    exit();
}

// Formatter automatically removes the closing tag. Apparently it's a convention.
