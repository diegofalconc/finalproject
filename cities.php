<?php

session_start();


include('server.php');

if (!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must log in first';
    header('Location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}
?>


<section class="cityfont">
    <h1>Take a look at our best cities and click on the name for more information</h1>
    <?php
    $sql = 'SELECT * FROM Cities';

    $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die(myerror(__FILE__, __LINE__, mysqli_connect_error()));

    $result = mysqli_query($iConn, $sql) or die(myerror(__FILE__, __LINE__, mysqli_error($iConn)));

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<ul class="switchlist">';
            echo '<li> For more information about <a href="cities-view.php?id=' . $row['CityID'] . ' ">' . $row['City'] . ' </a></li>';
            echo '<li>' . $row['City'] . ', ' . $row['State'] . '</li>';
            echo '<li>Median Home Price : ' . $row['Median Home Price'] . '</li>';
            echo '</ul>';
        }
    } else {
        echo 'Nobody home!';
    }

    @mysqli_free_result($result);

    @mysqli_close($iConn);
    ?>
</section>

<aside>
    <h2 class="pageID">Like what you're seeing?</h2>

    <?php
    echo $image;
    ?>
    <p>Click in the following link and learn more about the <a href="daily.php">City of the Day</a></p>
</aside>

<?php
include('includes/footer.php')
?>