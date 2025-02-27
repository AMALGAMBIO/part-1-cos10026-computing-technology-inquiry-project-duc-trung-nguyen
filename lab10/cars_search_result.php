<?php
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
    <title>Search Result</title>

    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="container table-container">
        <?php
        if (!$_SESSION["valid_input"]) {
            echo "<p class=\"invalid\">In valid input. Click <a href=\"searchcar.html\">here</a> to go back.</p>";

            // Clear all session variables
            session_unset();
            exit();
        }
        ?>

        <?php
        if (count($_SESSION["search_result"]) == 0) {
            echo "<p>No data found.</p>";
        } else {
            print_db_data($_SESSION["search_result"]);
        }
        ?>
    </div>

    <script>
        // Simple JS script to handle back btn
        function redirect_local(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>

<?php
function print_db_data($data)
{
    echo "
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
                            <tbody>";

    foreach ($data as $row) {
        // Format number ouput so it looks cleaner
        echo "<tr>
                    <td>" . $row[0] . "</td>
                    <td>" . $row[1] . "</td>
                    <td>" . $row[2] . "</td>
                    <td>$" . number_format($row[3], 2) . "</td>
                    <td>" . $row[4] . "</td>
                </tr>";
    }

    echo "</tbody>
                        </table>";
    echo "<button class=\"btn back-btn\" onclick=\"redirect_local('searchcar.html')\">Back</button>";
}
?>

<?php
session_unset();
ob_end_flush();
?>