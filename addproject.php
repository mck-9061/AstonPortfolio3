<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Add Project</title>
</head>
<body>

    <?php
        require 'top.php';
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
        }
    ?>
    <br>

    <h2>Add Project</h2>

    <div id="add-project-form" class="content">
        <form action="php/addproject.php" method ="post">
            <label>Title:</label><br>
            <input type="text" name="title" maxlength="100"> <br>

            <label>Start Date:</label><br>
            <input type="date" name="start"> <br>

            <label>End Date:</label><br>
            <input type="date" name="end"> <br>

            <label>Phase:</label><br>
            <select name="phase">
                <option value="design">Design</option>
                <option value="development">Development</option>
                <option value="testing">Testing</option>
                <option value="deployment">Deployment</option>
                <option value="complete">Complete</option>
            </select><br>

            <label>Description:</label><br>
            <textarea name="description" rows="10" cols="100" maxlength="5000"></textarea> <br><br>

            <input type="submit" value="Create Project">
        </form>
    </div>
</body>