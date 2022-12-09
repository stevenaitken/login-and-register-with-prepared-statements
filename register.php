<?php include('includes/error-reporting.php');include('includes/connx.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
</head>


<body>
    <?php

   /*php code goes here */
?>
    <div class="container">
        <h2>Register form - activity #1</h2>
        <form method="POST" name="login_form" action=" <?php echo strip_tags(htmlentities($_SERVER["PHP_SELF"])); ?>"> <!--Convert some characters to HTML entities and strips HTML and PHP tags from a string -->
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="username" name="username" class="form-control" required>
                <label class="form-label" for="username">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" required value="" />
                <label class="form-label" for="password">Password</label>
                <p class="errorMsg"><?php echo $errorMsg; ?></p>
            </div>

            <!-- Submit button -->
            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Register">


        </form>

        <p>This example receives form data sent by the POST method and inserts into a database. The form in this instance posts back to itself rather than executing an external php file - $_SERVER["PHP_SELF"].

        <p>The problem with this method is that you can add duplicate entries of the username. The username must be unique. The password doesn't. Informing a user that a password exists would create a security breach.</p>
    </div>

</body>

</html>

