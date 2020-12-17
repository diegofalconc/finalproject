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


<?php


if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header('Location:cities.php');
}

$sql = 'SELECT * FROM Cities WHERE CityID  = ' . $id . '';

$iConn =
    @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die(myerror(__FILE__, __LINE__, mysqli_connect_error()));

$result = mysqli_query($iConn, $sql) or
    die(myerror(__FILE__, __LINE__, mysqli_error($iConn)));

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $City = stripslashes($row['City']);
        $State = stripslashes($row['State']);
        $MedianHP = stripslashes($row['Median Home Price']);
        $Population = stripslashes($row['Population']);
        $Description = stripslashes($row['Description']);
        $Feedback = '';
    }
} else {

    $Feedback = 'Sorry, no cities - we are searching';
}


?>


<?php
if ($Feedback == '') {
    echo '<section class="cityfont">';
    echo '<ul class="switchlist">';
    echo '<li><b>City: </b>' . $City . ' </li>';
    echo '<li><b>State: </b>' . $State . ' </li>';
    echo '<li><b>Median Home Price: </b>' . $MedianHP . ' </li>';
    echo '<li><b>Population: </b>' . $Population . ' </li>';
    echo '<li><b>Description: </b>' . $Description . ' </li>';
    echo '</ul>';
    echo '</section>';
} else {

    echo $Feedback;

    echo '<p><a href="cities.php"> Go back to the cities page!</p>';
}

?>


<aside class="viewaside">

    <?php
    if ($Feedback == '') {
        echo '<img src="images/city' . $id . '.jpg" alt = "' . $City . '" width="300px">';
    } else {
        echo $Feedback;
    }


    @mysqli_free_result($result);

    @mysqli_close($iConn);
    ?>
</aside>
<?php
include('includes/footer.php');
?>