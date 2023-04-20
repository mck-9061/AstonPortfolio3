<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Home</title>
</head>
<body>

<?php
    include("top.php");
    require("php/connect.php");
    require("php/getproject.php");


    displayProject(1, false);
    displayProject(2, true);
?>

<br>
<script src="js/collapse.js"></script>




