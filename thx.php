<?php
session_start();

if (!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must log in first';
    header('Location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}
include('server.php');
?>


<section>
    <h2 class="pageID">Thank you for your order, we'll contact you as soon as possible</h2>



</section>

<aside>
    <h2 class="pageID">Like what you're seeing?</h2>

    <?php
    echo $image;
    ?>
    <p>Click in the following link and learn more about the <a href="daily.php">City of the Day</a></p>
</aside>
<?php
include('includes/footer.php');
?>