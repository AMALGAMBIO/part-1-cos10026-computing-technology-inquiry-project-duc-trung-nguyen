<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Session, Include, and Hidden Fields in PHP">
    <meta name="keywords" content="PHP, Sessions, Include, Hidden Fields">
    <meta name="author" content="Duc Trung Nguyen">
    <title>Session, Include, and Hidden Fields in PHP</title>

    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <?php
    session_start();
    $username_friend = "johndoe";
    $password_friend = "123459876";
    $fav_movies = ["Interstellar", "Dune 2", "Oppenheimer", "John Wick", "Killers of the Flower Mooon"];
    $fav_movies_friend = ["Tenet", "The Prestige", "Dunkirk", "Predestination", "Knives Out"];

    $username = $_POST["username"];
    $password = $_POST["password"];


    if ($username == "trung" && $password == "105508266") {
        $_SESSION["user"] = $username;
        $_SESSION["movies"] = $fav_movies;
        header("location: welcome.php");
    } else if ($username == $username_friend && $password == $password_friend) {
        $_SESSION["user"] = $username;
        $_SESSION["movies"] = $fav_movies_friend;
        header("location: welcome.php");
    } else {
        // Displaying an alert then wait 2s before re-directing back to login page
        // Using JS for convenience's sake
        echo "<div class='error-msg'>
            <p>Incorrect Username or Password, please try again. Re-directing...</p>
        </div>";
        echo "<script type='text/javascript'>
            setTimeout(() => {
                window.location.href = 'login.php';
            }, 2000);
        </script>";
        // header("location: login.html");
    }
    ?>
</body>

</html>