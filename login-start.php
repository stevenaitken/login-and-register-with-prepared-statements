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
        <h2>Login form</h2>
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
                <p class="errorMsg"><a href="register.php">Register</a></p>
            </div>



            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


        </form>
    </div>

</body>

</html>

Ref: https://phpdelusions.net/mysqli_examples/prepared_select