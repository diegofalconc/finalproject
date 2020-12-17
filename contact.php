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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>
            <label>Name</label>
            <input type="text" name="name" value="<?php
                                                    if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>">
            <span><?php echo $nameErr; ?></span>
            <label>Email</label>
            <input type="email" name="email" value="<?php
                                                    if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
            <span><?php echo $emailErr; ?></span>
            <label>Telephone</label>
            <input type="tel" name="tel" placeholder="xxx-xxx-xxxx" value="<?php
                                                                            if (isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); ?>">
            <span><?php echo $telErr; ?></span>
            <label>Choose your Banking Institution</label>

            <select name="bank">
                <option value="NULL" <?php if (isset($_POST['bank']) && $_POST == 'NULL') {
                                            echo 'selected = "unselected"';
                                        } ?>>
                    Select One

                </option>
                <option value="Bank of America" <?php if (isset($_POST['bank']) && $_POST['bank'] == 'Bank of America') {
                                                    echo 'selected = "selected"';
                                                } ?>>
                    Bank of America

                </option>
                <option value="Chase Bank" <?php if (isset($_POST['bank']) && $_POST['bank'] == 'Chase Bank') {
                                                echo 'selected = "selected"';
                                            } ?>>
                    Chase Bank

                </option>
                <option value="Boeing Credit Union" <?php if (isset($_POST['bank']) && $_POST['bank'] == 'Boeing Credit Union') {
                                                        echo 'selected = "selected"';
                                                    } ?>>
                    Boeing Credit Union

                </option>
                <option value="Wells Fargo" <?php if (isset($_POST['bank']) && $_POST['bank'] == 'Wells Fargo') {
                                                echo 'selected = "selected"';
                                            } ?>>
                    Wells Fargo

                </option>
                <option value="Mattress" <?php if (isset($_POST['bank']) && $_POST['bank'] == 'Mattress') {
                                                echo 'selected = "selected"';
                                            } ?>>
                    Mattress

                </option>
            </select>
            <span><?php echo $bankErr; ?></span>
            <label>Favorite Cities</label>
            <ul class="switchlist">
                <li>
                    <input type="checkbox" name="city[]" value="Winchester" <?php if (isset($_POST['city']) && $_POST['city'] == 'Winchester') echo 'checked="checked"'; ?>>Winchester
                </li>
                <li>
                    <input type="checkbox" name="city[]" value="Charlotte" <?php if (isset($_POST['city']) && $_POST['city'] == 'Charlotte') echo 'checked="checked"'; ?>>Charlotte
                </li>
                <li>
                    <input type="checkbox" name="city[]" value="Brevard" <?php if (isset($_POST['city']) && $_POST['city'] == 'Brevard') echo 'checked="checked"'; ?>>Brevard
                </li>
                <li>
                    <input type="checkbox" name="city[]" value="Clearwater" <?php if (isset($_POST['city']) && $_POST['city'] == 'Clearwater') echo 'checked="checked"'; ?>>Clearwater
                </li>
                <li>
                    <input type="checkbox" name="city[]" value="Delray Beach" <?php if (isset($_POST['city']) && $_POST['city'] == 'Delray Beach') echo 'checked="checked"'; ?>>Delray Beach
                </li>
                <li>
                    <input type="checkbox" name="city[]" value="Maryville" <?php if (isset($_POST['city']) && $_POST['city'] == 'Maryville') echo 'checked="checked"'; ?>>Maryville
                </li>
                <li>
                    <input type="checkbox" name="city[]" value="Sun City" <?php if (isset($_POST['city']) && $_POST['city'] == 'Sun City') echo 'checked="checked"'; ?>>Sun City
                </li>
            </ul>
            <span><?php echo $cityErr; ?></span>
            <input type="radio" name="privacy" value="<?php
                                                        if (isset($_POST['privacy'])) echo htmlspecialchars($_POST['privacy'])
                                                        ?>">
            I agree to your Privacy Policy
            <span><?php echo $privacyErr; ?></span>
            <input type="submit" value="Send it">
            <p><a href="">Reset me!</a></p>
        </fieldset>
    </form>
</section>

<aside style="text-align: center;">
    <h2 class="pageID">Like what you're seeing?</h2>

    <?php
    echo $image;
    ?>
    <p>Click in the following link and learn more about the <a href="daily.php">City of the Day</a></p>
</aside>
<?php
include('includes/footer.php');
?>