<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/contact.js"></script>
    <title>Logged Out</title>
</head>
<body>
    <?php
        require 'top.php';
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
    ?>
    <br>

    <div id="logout" class="content">
        <div class="container">
            <p>You have been logged out successfully.</p><br>
            <a href="login.php">Log back in</a>
        </div>
    </div>


</body>