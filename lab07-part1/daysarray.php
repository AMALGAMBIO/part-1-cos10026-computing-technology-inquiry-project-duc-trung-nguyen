<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using PHP Variables, Arrays and Operators Pt. 2</title>
    <meta name="description" content="Using PHP Variables, Arrays and Operators">
    <meta name="keywords" content="PHP, Variables, Arrays, Operators">
    <meta name="author" content="Duc Trung Nguyen">
</head>
<body>
    <h1>Using PHP Variables, Arrays and Operators Pt. 2</h1>
    <?php
        $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

        echo "<p>The Days of the week in English are: ";
        for ($i = 0; $i < 7; $i++) {
            if ($i != 6)
                echo $days[$i] . ", ";
            else
                echo $days[$i];
        };
        echo ".</p>";

        $days[0] = "Dimanche";
        $days[1] = "Lundi";
        $days[2] = "Mardi";
        $days[3] = "Mercredi";
        $days[4] = "Jeudi";
        $days[5] = "Vendredi";
        $days[6] = "Samedi";

        echo "<p>The Days of the week in French are: ";
        for ($i = 0; $i < 7; $i++) {
            if ($i != 6)
                echo $days[$i] . ", ";
            else
                echo $days[$i];
        };
        echo ".</p>";
    ?>
</body>
</html>