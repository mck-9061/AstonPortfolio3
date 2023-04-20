<?php
include('connect.php');

session_start();

$givenUser = $_POST['username'];

$statement = $db->prepare("SELECT * FROM `users` WHERE username=:username");
$statement->bindParam(':username', $givenUser, PDO::PARAM_STR, 10);

$statement->execute();

$row = $statement->fetch();

if (empty($row)) {
    $_SESSION['message'] = "Username not recognized.";
    header("Location: ../login.php");
    exit;
} else {
    // Check that passwords match
    if (!password_verify(trim($_POST['password']), $row[2])) {
        $_SESSION['message'] = "Passwords do not match!";
        header("Location: ../login.php");
        exit;
    }

    session_start();
    $_SESSION['uid'] = $row[0];
    $_SESSION['user'] = $row[1];
    $_SESSION['email'] = $row[3];
    $_SESSION['message'] = "You are now logged in. Welcome, {$_SESSION['user']}.";
    header("Location: ../account.php");
}
