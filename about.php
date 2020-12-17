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

<h1>City Database Screenshot</h1>

<img src="images/cities.png" class="about" alt="" />

</br>

<h1>Final Users Screenshot</h1>
<img src="images/finalusers.png" class="about" alt="" />


<?php
include('includes/footer.php');
?>