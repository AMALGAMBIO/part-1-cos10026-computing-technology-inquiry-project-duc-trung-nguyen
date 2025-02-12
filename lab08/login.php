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
    include("header.php");
    ?>

    <section class="container">
        <h1>LOGIN</h1>
        <form id="login-form" method="post" action="process.php">
            <div class="input-field">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="input-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="input-field">
                <input type="hidden" name="token" value="T105508266">
            </div>

            <button type="submit">
                Login
            </button>
        </form>
    </section>
    <?php
    include("footer.php");
    ?>
</body>

</html>