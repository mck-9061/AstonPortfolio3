<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Edit Project</title>
</head>
<body>

<?php
require 'top.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

// Make sure the user is authorized to edit this project
require 'php/connect.php';
$pid = htmlspecialchars($_GET['pid']);

$statement = $db->prepare("SELECT * FROM projects WHERE pid=:pid");
$statement->bindParam(':pid', $pid, PDO::PARAM_STR, 100);

$statement->execute();
$got = $statement->fetch();

if ($got[6] != $_SESSION['uid']) {
    $_SESSION['message'] = 'You are not authorized to edit that project.';
    header("Location: index.php");
    exit();
}

if (htmlspecialchars($_GET['d']) == 'true') {
    $statement = $db->prepare("DELETE FROM projects WHERE pid=:pid");
    $statement->bindParam(':pid', $pid, PDO::PARAM_STR, 100);

    $statement->execute();
    $_SESSION['message'] = "Project deleted successfully.";
    header("Location: account.php");
    exit();
}

$title = $got[1];
$start_date = $got[2];
$end_date = $got[3];
$phase = $got[4];
$description = $got[5];

?>
<br>

<h2>Edit Project</h2>

<div id="edit-project-form" class="content">
    <form action="php/editproject.php?pid=<?php echo $pid ?>" method="post">
        <label>Title:</label><br>
        <input type="text" name="title" maxlength="100" value="<?php echo $title ?>"> <br>

        <label>Start Date:</label><br>
        <input type="date" name="start" value="<?php echo $start_date ?>"> <br>

        <label>End Date:</label><br>
        <input type="date" name="end" value="<?php echo $end_date ?>"> <br>

        <label>Phase:</label><br>
        <select name="phase">
            <option value="design" <?php if ($phase == 'design') echo 'selected' ?>>Design</option>
            <option value="development" <?php if ($phase == 'development') echo 'selected' ?>>Development</option>
            <option value="testing" <?php if ($phase == 'testing') echo 'selected' ?>>Testing</option>
            <option value="deployment" <?php if ($phase == 'deployment') echo 'selected' ?>>Deployment</option>
            <option value="complete" <?php if ($phase == 'complete') echo 'selected' ?>>Complete</option>
        </select><br>

        <label>Description:</label><br>
        <textarea name="description" rows="10" cols="100" maxlength="5000"><?php echo $description ?></textarea> <br><br>

        <input type="submit" value="Update Project">
    </form>
</div>
</body>