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
    <h2>Welcome to Recityre, your first step for retirement</h2>


    <p>
        Dazzle yourself with the best cities the United States of America can offer for retirement.
        Learn about their population, security and Median Home Price.
        <br />
        <br />
    </p>

    <h2>Looking for the best?</h2>

    <p>
        We got you covered, check our <a href="cities.php">Top 7 Cities</a> and enjoy, be carefull not to pick fast, check all of them.
    </p>
    <br />


    <h2>Questions regarding our support?</h2>

    <p>
        Click <a href="contact.php">here</a> and email us directly, your well being is our primary concern
    </p>
    <br />
    <br />

</section>

<aside>
    <h2>Like what you're seeing?</h2>

    <?php
    echo $image;
    ?>
    <p>Click in the following link and learn more about the <a href="daily.php">City of the Day</a></p>
</aside>

<?php
include('includes/footer.php');
?>