<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Log In</title>
</head>
<body>
    <?php require 'top.php'; ?>

    <br>

    <div id="login-form" class="content">
        <h2>Log In</h2>
        <form action="php/login.php" method ="post" >
            <label>Username:</label><br>
            <input type="text" name="username"> <br>
            <label>Password:</label><br>
            <input type="password" name="password"> <br><br>
            <input type="submit" value="Login">
        </form> <br>
        <a href="register.php">(Register)</a>
    </div>


</body>
</html>