<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Search</title>
</head>
<body>
    <?php
        require 'top.php';
        require("php/connect.php");
        require("php/getproject.php");
    ?>
    <br>

    <h2>Search</h2>
    <div id="search" class="content">
        <form action="search.php" method="post">
            <label>Search for:</label> <input id="search_box" type="text" name="term" maxlength="100" value="<?php echo $_POST['term'] ?>"><br>
            <label>Search in:</label>
            <input type="radio" id="projects_button" name="in" value="title" <?php if ($_POST['in'] == 'title') echo 'checked="checked"' ?>>
            <label for="projects_button">Project Names</label>


            <input type="radio" id="authors_button" name="in" value="authors" <?php if ($_POST['in'] == 'authors') echo 'checked="checked"' ?>>
            <label for="authors_button">Project Lead Usernames</label>

            <input type="radio" id="date_button" name="in" value="start_date" <?php if ($_POST['in'] == 'start_date') echo 'checked="checked"' ?>>
            <label for="date_button">Start Date</label>
            <br>


            <input type="submit" value="Search">
        </form>
        <script src="js/search_type_changer.js"></script>
    </div>

    <div class="projects">
        <?php
        $term = "%" . $_POST['term'] . "%";
        $column = $_POST['in'];

        if ($column == 'authors') {
            $statement = $db->prepare('SELECT * FROM projects INNER JOIN users ON projects.uid = users.uid WHERE users.username LIKE :term ORDER BY projects.uid');
        } else {
            $statement = $db->prepare('SELECT * FROM projects WHERE ' . $column .  ' LIKE :term ORDER BY uid');
        }

        $statement->bindParam(':term', $term, PDO::PARAM_STR, 100);



        $statement->execute();

        $row = $statement->fetch();

        $i = 0;

        while (!empty($row)) {
            $i++;
            displayProject($row[0], true);
            $row = $statement->fetch();
        }

        if ($i == 0) echo '<div class="content">No projects found.</div>'

        ?>
        <script src="js/collapse.js"></script>
    </div>


