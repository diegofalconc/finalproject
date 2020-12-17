<?php
include('server.php');



?>

<h2 style="text-align: center;">Welcome, Log in with your Username and Password</h2>

<form class="loginform " style="text-align: center;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="post">
    <fieldset>
        <label>Username</label>
        <input type="text" name="UserName" value="<?php if (isset($_POST['UserName'])) echo $_POST['UserName']; ?>">

        <label>Password</label>
        <input type="password" name="Password">
        <?php
        include('includes/errors.php');
        ?>
        <br>
        <button type="submit" class="btn" name="login_user">Login</button>

        <button type="button" class="btn" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>
    </fieldset>
</form>

<p style="text-align: center;">Haven't Registered? <a href="register.php">Register Here!</a></p>

<?php
include('includes/footer.php');
?>