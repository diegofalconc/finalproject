<?php

include('server.php');


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
?>
<section>
    <?php echo $message; ?>
    <?php echo  $quotes; ?>

</section>

<aside class="picture">
    <?php
    echo $image;
    ?>
    <h2>Check out our sponsored cities</h2>
    <ul class="switchlist">
        <li><a href="daily.php?today=Monday">Brevard, North Carolina</a></li>
        <li><a href="daily.php?today=Tuesday">Charlotte, North Carolina</a></li>
        <li><a href="daily.php?today=Wednesday">Winchester, Washington D.C</a></li>
        <li><a href="daily.php?today=Thursday">Clearwater, Florida</a></li>
        <li><a href="daily.php?today=Friday">Delray Beach, Florida</a></li>
        <li><a href="daily.php?today=Saturday">Maryville, Tennesse</a></li>
        <li><a href="daily.php?today=Sunday">Sun City, Phoenix</a></li>

    </ul>
</aside>

<?php
include('../includes/footer.php')
?>