<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using PHP Variables, Arrays and Operators</title>
    <meta name="description" content="Using PHP Variables, Arrays and Operators">
    <meta name="keywords" content="PHP, Variables, Arrays, Operators">
    <meta name="author" content="Duc Trung Nguyen">
</head>
<body>
    <h1>Using PHP Variables, Arrays and Operators</h1>
    <?php
        $marks = array(85, 85, 90);
        $marks[1] = 90;
        $ave = ($marks[0] + $marks[1] + $marks[2]) / 3;
        if ($ave > 50)
            $status = "PASSED";
        else
            $status = "FAILED";
        echo "<p>The average score is $ave. You $status.</p>";
    ?>
</body>
</html>