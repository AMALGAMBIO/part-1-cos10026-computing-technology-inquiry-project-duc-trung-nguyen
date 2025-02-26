<?php
// ob_start() and ob_end_flush() to set up buffering flow and stop the server from flushing output early, causing echo statements appearing in wrong places
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MySQL Introduction">
    <meta name="keywords" content="PHP, MySQL, Database">
    <meta name="author" content="Duc Trung Nguyen">
    <title>Cars</title>

    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="container">
        <h1>List of cars</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>YOM</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require_once "settings.php";
                $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

                if ($dbconn) {
                    $query = "SELECT * FROM cars";
                    $result = mysqli_query($dbconn, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['car_id'] . "</td>";
                            echo "<td>" . $row['make'] . "</td>";
                            echo "<td>" . $row['model'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['yom'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<p>Database is empty.</p>";
                    }

                    mysqli_close($dbconn);
                } else {
                    echo "<p>Unable to connect to the database.</p>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>