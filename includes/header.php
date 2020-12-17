<?php

include('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/6a71565c22.js"></script>


    <?php echo $spreadSheet ?>

    <title>My Portal</title>
</head>

<?php echo $body_class ?>
<?php echo $wrapper_class; ?>
<header>
    <label class="logout2">
        <?php
        if (isset($_SESSION['success']) && htmlspecialchars($_SERVER['PHP_SELF']) != "/it261/finalproject/register.php" &&  htmlspecialchars($_SERVER['PHP_SELF']) != "/it261/finalproject/login.php") : ?>
            <?php
            echo $_SESSION['success'];

            ?>

        <?php endif ?>
    </label>

    <?php echo $headLine; ?>
    <label class="logout">
        <?php
        if (isset($_SESSION['UserName']) && $_SERVER['PHP_SELF'] != "/it261/finalproject/register.php" &&  $_SERVER['PHP_SELF'] != "/it261/finalproject/login.php") : ?>
            <a href="index.php?logout="> Welcome,
                <?php echo $_SESSION['UserName']; ?> <br>Log out!</a>

        <?php endif ?>
    </label>
    <nav>
        <ul class="topnav" id="myTopnav">
            <?php echo makeLinks($nav); ?>
        </ul>

    </nav>
</header>