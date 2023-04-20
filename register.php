<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Register</title>
</head>
<body>
    <?php require 'top.php'; ?>

    <br>

    <div id="register-form" class="content">
        <h2>Register</h2>
        <form action="php/register.php" method="post">
            <label> Username:</label><br/>
            <input type="text" name="username" maxlength="255" /> <br>
            <label> Password:</label><br/>
            <input type="password" name="password" maxlength="255" /> <br>
            <label> E-Mail Address:</label><br/>
            <input type="email" name="email" maxlength="255" /> <br><br>
            <input type="submit" value="Register" />
        </form>
    </div>
</body>
</html>