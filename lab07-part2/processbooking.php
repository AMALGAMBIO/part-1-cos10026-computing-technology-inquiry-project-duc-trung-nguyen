<?php
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Booking Confirmation">
    <meta name="keywords" content="PHP, Data Validation, Regexs">
    <meta name="author" content="Duc Trung Nguyen">
    <title>Booking Confirmation</title>

    <link rel="stylesheet" type="text/css" href="style/processBooking.css">
</head>

<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>

    <?php
    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
        // echo "<p>Your first name is: $firstname.</p>";
    } else {
        echo "<p>Error: Enter data in the <a href=\"register.html\">form</a>.</p>";
    }

    if (isset($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
        // echo "<p>Your last name is: $lastname.</p>";
    } else {
        echo "<p>Error: Enter data in the <a href=\"register.html\">form</a>.</p>";
    }

    if (isset($_POST["age"])) {
        $age = $_POST["age"];
        // echo "<p>Your age is: $age.</p>";
    } else {
        echo "<p>Error: Enter data in the <a href=\"register.html\">form</a>.</p>";
    }

    // Has value "none" by default so no need to check
    $food = $_POST["food"];


    if (isset($_POST["partysize"])) {
        $partySize = $_POST["partysize"];
        // echo "<p>Your party size is: $partySize.</p>";
    } else {
        // echo "<p>Error: Enter data in the <a href=\"register.html\">form</a>.</p>";

        // Redirect
        header ("location: register.html");
    }

    if (isset($_POST["species"])) {
        $species = $_POST["species"];
        // echo "<p>Your party size is: $partySize.</p>";
    } else {
        $species = "Unknown species";
        // echo "<p>Error: Enter data in the <a href=\"register.html\">form</a>.</p>";
    }

    $tour = array();
    $accomodation = false;
    // Is Accomodation considered a "tour"? Design is not very clear...
    // I've decided to make accomodation a separate variable
    if (isset($_POST["Accommodation"])) {
        $accomodation = true;
    }

    if (isset($_POST["4day"])) {
        $tour[] = "Four-day tour";
    }

    
    if (isset($_POST["10day"])) {
        $tour[] = "Ten-day tour";
    }

    $firstname = sanitize_input($firstname);
    $lastname = sanitize_input($lastname);
    $age = sanitize_input($age);
    $species = sanitize_input($species);
    $food = sanitize_input($food);
    $partySize = sanitize_input($partySize);

    $errMsg = "";
    if ($firstname == "") {
        $errMsg .= "<p class='err-msg'>You must enter your first name.</p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        $errMsg .= "<p class='err-msg'>Only alpha letters allowed in your first name.</p>";
    }

    if ($lastname == "") {
        $errMsg .= "<p class='err-msg'>You must enter your last name.</p>";
    } else if (!preg_match("/^[a-zA-Z-]*$/", $lastname)) {
        $errMsg .= "<p class='err-msg'>Only alpha letters and hyphens allowed in your last name.</p>";
    }

    if ($age == "") {
        $errMsg .= "<p class='err-msg'>You must enter your age.</p>";
    } else if (!is_numeric($age)) {
        $errMsg .= "<p class='err-msg'>Your age must be a valid number.</p>";
    } else if (intval($age) < 10 || intval($age) > 10000) {
        $errMsg .= "<p class='err-msg'>Your age must be between 10 and 10,000.</p>";
    }

    if ($partySize == "") {
        $errMsg .= "<p class='err-msg'>You must enter the number of travellers.</p>";
    } else if (!is_numeric($partySize)) {
        $errMsg .= "<p class='err-msg'>Your party size must be a valid number.</p>";
    }

    if ($errMsg != "") {
        echo $errMsg;
    } else {
        echo "<p>Welcome <em class='booking-details'>$firstname</em>!</p>";

        if ($accomodation) {
            echo "<p>You have booked for accomdation.</p>";
        } else {
            echo "<p>You have not booked for accomodation.</p>";
        }

        if (count($tour) == 0) {
            echo "<p>You have not booked for any tour.</p>";
        } else {
            echo "<p>You are now booked on the ";

            for ($i = 0; $i < count($tour); $i++) {
                echo "<em class='booking-details'>" . $tour[$i] . "</em>";
                if ($i != count($tour) - 1) {
                    echo " and ";
                }
            }
            echo " tour(s).";
        }

        echo "<p>Species: <em class='booking-details'>$species</em></p>";
        echo "<p>Age: <em class='booking-details'>$age</em></p>";
        echo "<p>Meal Preferences: <em class='booking-details'>$food</em></p>";
        echo "<p>Number of travellers: <em class='booking-details'>$partySize</em></p>";
    }

    ?>
</body>

</html>