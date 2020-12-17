<?php
include('server.php');



?>

<h1 style="text-align: center;">Register Today!</h1>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
        <label>First Name</label>
        <input type="text" name="FirstName" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>">

        <label>Last Name</label>
        <input type="text" name="LastName" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>">

        <label>User Name</label>
        <input type="text" name="UserName" value="<?php if (isset($_POST['UserName'])) echo $_POST['UserName']; ?>">

        <label>Email</label>
        <input type="text" name="Email" value="<?php if (isset($_POST['Email'])) echo $_POST['Email']; ?>">

        <label>Password</label>
        <input type="password" name="Password_1">

        <label>Confirm Password</label>
        <input type="password" name="Password_2">
        <br>
        <button type="submit" class="btn" name="reg_user">Register </button>


        <?php

        include('includes/errors.php'); ?>
    </fieldset>
</form>


<p style="text-align: center;"> Already a member? <a href="login.php"> Please sign in ! </a> </p>



<?php
include('includes/footer.php');
?>
