<?php

// only use after connecting to database
function displayProject($pid, $showauthor, $edit=false) {
    global $db;
    try {
        $statement = $db->prepare("SELECT * FROM projects WHERE pid=:pid");
        $statement->bindParam(':pid', $pid, PDO::PARAM_STR);
        $statement->execute();

        $row = $statement->fetch();

        // Get the username of the project lead
        $statement2 = $db->prepare("SELECT * FROM users WHERE uid=:uid");
        $statement2->bindParam(':uid', $row[6], PDO::PARAM_STR);
        $statement2->execute();

        $row2 = $statement2->fetch();

        ?>

        <button type="button" class="collapsible"> <?php echo $row[1]; if ($showauthor) echo ' (' . $row2[1] . ')'?> </button>
        <div class="collapse-content">
            <p>Project Lead: <?php echo $row2[1] . ' (<a href="mailto:' . $row2[3] . '">' . $row2[3] . '</a>)' ?></p>
            <p>Start Date: <?php echo $row[2] ?></p>
            <p>End Date: <?php echo $row[3] ?></p>
            <p>Phase: <?php echo ucfirst($row[4]) ?></p>
            <p>Description: <?php echo $row[5] ?></p>
            <?php if ($edit) echo '<a href="../editproject.php?pid=' . $row[0] . '&d=false">Edit Project</a><br>' ?>
            <?php if ($edit) echo '<a href="../editproject.php?pid=' . $row[0] . '&d=true">Delete Project</a><br><br>' ?>
        </div>
        <?php


    } catch (PDOException $ex) {
        ?>
        <p>(Error details: <?= $ex->getMessage() ?>)</p>
        <?php
    }
}
