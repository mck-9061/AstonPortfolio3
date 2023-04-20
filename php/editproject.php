<?php
include("connect.php");

session_start();

if (!isset($_SESSION['uid'])) header("Location: ../login.php");

$pid = $_GET['pid'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$phase = $_POST['phase'];
$description = $_POST['description'];

if (empty($title) or empty($start) or empty($end) or empty($description)) {
    $_SESSION['message'] = "One or more fields not filled out. Please try again.";
    header("Location: ../editproject.php?pid=" . $pid);
    exit;
}

// make sure the dates line up
if (strtotime($end) < strtotime($start)) {
    $_SESSION['message'] = "Your end date is before your start date. Please try again.";
    header("Location: ../editproject.php?pid=" . $pid);
    exit;
}

try {
    $statement = $db->prepare("UPDATE projects SET title = :title, start_date = :start_date, end_date = :end_date, phase = :phase, description = :description WHERE pid = :pid;");

    $statement->bindParam(':title', $title, PDO::PARAM_STR, 100);
    $statement->bindParam(':start_date', $start, PDO::PARAM_STR);
    $statement->bindParam(':end_date', $end, PDO::PARAM_STR);
    $statement->bindParam(':phase', $phase, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR, 5000);
    $statement->bindParam(':pid', $pid, PDO::PARAM_STR);

    $statement->execute();

    $_SESSION['message'] = "Project updated successfully.";
    header("Location: ../account.php");

} catch (PDOException $ex) {
    ?>
    <p>(Error details: <?= $ex->getMessage() ?>)</p>
    <?php
}

