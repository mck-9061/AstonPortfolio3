<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=u_220088206_db", "u-220088206", "WNOHqTADi6j12Bg");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        ?>
        <p>A database error has occurred.</p>
        <p>Details: <em> <?= $ex->getMessage() ?> </em></p>

    <?php
    }
?>