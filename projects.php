<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Projects</title>
</head>
<body>
    <?php
        require 'top.php';
        require("php/connect.php");
        require("php/getproject.php");
    ?>
    <br>

    <h2>Projects</h2>
    <div id="search" class="content">
        <form action="search.php" method="post">
            <label>Search for:</label> <input id="search_box" type="text" name="term" maxlength="100"><br>
            <label>Search in:</label>
            <input type="radio" id="projects_button" name="in" value="title" checked="checked">
            <label for="projects_button">Project Names</label>


            <input type="radio" id="authors_button" name="in" value="authors">
            <label for="authors_button">Project Lead Usernames</label>

            <input type="radio" id="date_button" name="in" value="start_date">
            <label for="date_button">Start Date</label>
            <br>


            <input type="submit" value="Search">
        </form>
        <script src="js/search_type_changer.js"></script>
    </div>


    <div class="projects">
        <?php
        $statement = $db->prepare("SELECT * FROM projects ORDER BY uid");
        $statement->execute();

        $row = $statement->fetch();

        while (!empty($row)) {
            displayProject($row[0], true);
            $row = $statement->fetch();
        }
        ?>
        <script src="js/collapse.js"></script>
    </div>

</body>
</html>