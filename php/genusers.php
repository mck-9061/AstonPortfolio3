<?php
// Script used to generate users and projects.

require 'connect.php';
require 'lastnames.php';

$pid = 0;

for ($i = 1; $i <= 15; $i++) {
    $last_name = lcfirst($last_names[array_rand($last_names)]);
    $initial = lcfirst(substr($last_names[array_rand($last_names)], 0, 1));
    $username = $initial . $last_name . $i;

    $password = password_hash('password' . $i, null);
    $email = $username . "@gmail.com";


    $statement = $db->prepare("INSERT INTO users VALUES(:uid, :username, :password, :email)");

    $statement->bindParam(':uid', $i, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR, 10);
    $statement->bindParam(':password', $password, PDO::PARAM_STR, 64);
    $statement->bindParam(':email', $email, PDO::PARAM_STR, 100);

    $statement->execute();

    for ($j = 1; $j <= 3; $j++) {
        $pid++;
        $title = ucfirst($last_name) . ' Project ' . $j;
        $start = '2023-04-' . rand(10, 20);
        $end = '2023-05-' . rand(10, 30);
        $phases = array('design', 'development', 'testing', 'deployment', 'complete');
        $phase = $phases[array_rand($phases)];
        $description = "Test Project made by " . $username . ".";

        // Generate a couple of projects
        $statement2 = $db->prepare("INSERT INTO projects VALUES(:pid, :title, :start, :end, :phase, :description, :uid)");
        $statement2->bindParam(':pid', $pid, PDO::PARAM_STR);
        $statement2->bindParam(':title', $title, PDO::PARAM_STR, 100);
        $statement2->bindParam(':start', $start, PDO::PARAM_STR);
        $statement2->bindParam(':end', $end, PDO::PARAM_STR);
        $statement2->bindParam(':phase', $phase, PDO::PARAM_STR);
        $statement2->bindParam(':description', $description, PDO::PARAM_STR, 5000);
        $statement2->bindParam(':uid', $i, PDO::PARAM_STR);

        $statement2->execute();
    }
}
