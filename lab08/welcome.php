<?php
// ob_start() and ob_end_flush() to set up buffering flow and stop the server from flushing output early, causing echo statements appearing in wrong places
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Session, Include, and Hidden Fields in PHP">
    <meta name="keywords" content="PHP, Sessions, Include, Hidden Fields">
    <meta name="author" content="Duc Trung Nguyen">
    <title>Welcome Page</title>

    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <?php

    include("header.php");
    ?>

    <div class="container">
        <?php

        if (isset($_SESSION["user"])) {
            echo "<p class='welcome-msg'>Welcome, <span>" . $_SESSION["user"] . "</span>.</p>";
        } else {
            echo "<div class='error-msg'>
            <p>You are not logged in. Re-directing...</p>
        </div>";
            echo "<script type='text/javascript'>
            setTimeout(() => {
                window.location.href = 'login.html';
            }, 2000);
        </script>";

            // header ("location: login.html");
        }
        ?>

        <p><?php echo $_SESSION["user"] ?>'s favorite movies:</p>

        <table class='movie-table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($_SESSION["movies"]); $i++) {
                    echo "<tr><td>" . ($i + 1) . "</td>";
                    echo "<td>" . $_SESSION["movies"][$i] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>
<?php ob_end_flush(); ?>