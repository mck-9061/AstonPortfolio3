<div class="main-header">
    <div class="container-fluid">
        <h1>Aston Projects</h1>
    </div>
    <div class="container-fluid" id="nav-bar">
        <a href="index.php">Home</a>
        <a href="projects.php">Projects</a>
        <?php
            session_start();
            if (isset($_SESSION['user'])) {
                echo "<a href='account.php'>{$_SESSION['user']}</a>";
            } else echo "<a href='login.php'>Log In</a>";
        ?>
    </div>
    <div id="message" class="content">
        <?php
            if (isset($_SESSION['message'])) {
                echo "{$_SESSION['message']}";
                unset($_SESSION['message']);
            }
        ?>
    </div>
</div>
