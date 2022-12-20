<?php session_start(); //when working with sessions always start with this method and place at top of script. Do not leave any empty lines above. 
include('includes/error-reporting.php');
include('includes/connx.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
</head>


<body>
    <?php

 $errorMsg = "";//initiate variable for error message

if(isset($_GET['logged'])== "denied"){ // check if get variable has been sent back to page via URL string

    $errorMsg = "WARNING: Unauthorised attempt to access admin section."; // if condition true then display message
        $logged = "";

}


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $userPassword = $_POST['password'];


        $stmt = $conn->prepare("SELECT user, pwd from user_details where user = ?");  // prepares the sql statement with placeholders
    
        $stmt->bind_param("s", $username); // bind the parameters to the sql statement
        $stmt->bind_result($username_db, $password_db); //binds the variables to the prepared statement
        $stmt->execute(); //executes the prepared statement
        $stmt->fetch(); // fetches the results from the prepared statement into the bound variables

        if (  $username ==$username_db && password_verify($userPassword, $password_db)) { //check if username and hashed password match

                $_SESSION['username'] = $username; // adedign session to username
                header('location:adminHome.php');       // redirect                
                exit(); //terminate current script
                
            } // end  if


            else {
                $errorMsg = "Invalid login details."; //display user message


            } // end of else
            $stmt->close(); // close sql statement - optional and depends on context
            $conn->close(); //Closes a previously opened database connection - optional and depends on context
    
        } // end of server request

    
    
      
?>
    <div class="container">
        <h2>Login form</h2>
        <form method="POST" name="login_form" action=" <?php echo strip_tags(htmlentities($_SERVER["PHP_SELF"])); ?>">
            <!--Convert some characters to HTML entities and strips HTML and PHP tags from a string -->
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
                <p><a href="register.php">Register</a></p>
            </div>



            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


        </form>
    </div>

</body>

</html>

Ref: https://phpdelusions.net/mysqli_examples/prepared_select