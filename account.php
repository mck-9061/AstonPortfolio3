<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Account</title>
</head>
<body>
    <?php
        require 'top.php';
        require("php/connect.php");
        require("php/getproject.php");
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
        }
    ?>
    <br>

    <div id="details" class="content">
        <h2>Account Details</h2>
        <div class="container">
            <p>Username: <?php echo $_SESSION['user'] ?>
            <a href="logout.php"> (log out)</a></p>

            <p>Email: <?php echo $_SESSION['email'] ?></p>

        </div>
    </div><br>

    <div id="user-projects">
        <h2>Your Projects</h2>
        <div class="content"> <a href="addproject.php">Create Project</a><br> </div>

        <?php
            $statement = $db->prepare("SELECT * FROM projects WHERE uid=:uid");
            $statement->bindParam(':uid', $_SESSION['uid'], PDO::PARAM_STR);
            $statement->execute();

            $row = $statement->fetch();

            while (!empty($row)) {
                displayProject($row[0], false, true);
                $row = $statement->fetch();
            }
        ?>
        <script src="js/collapse.js"></script>

    </div>
</body>
