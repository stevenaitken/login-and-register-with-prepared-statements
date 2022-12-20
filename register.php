<?php include('includes/error-reporting.php');include('includes/connx.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
</head>


<body>
    <?php
   
 $errorMsg = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //checks if server has sent data via POST method  
    
        $username = $_POST['username']; //assign variables to POST data 
        $chk_user = $conn->prepare("SELECT user FROM user_details WHERE user=?"); // prepare sql statement
        $chk_user->bind_param("s", $username); //bind the variables to the sql statement as parameters 
        $chk_user->bind_result($username_db); //binds the variables to the prepared statement
        $chk_user->execute(); //Execute the prepared statement
        $chk_user->fetch();


        if ($username == $username_db) { 

            $errorMsg = "Username exists."; // create a message variable to display within body of document
    
        } 
                     
        else {

            $sql = $conn->prepare("INSERT INTO user_details (user, pwd) VALUES (?, ?)"); // prepare sql statement
            $sql->bind_param("ss", $myUser, $myPwd); //bind the variables to the sql statement as parameters 
            $myUser = $_POST['username']; //assign variables to POST data
            $myPwd = $_POST['password']; //assign variables to POST data   
            $myPwd = password_hash($myPwd, PASSWORD_DEFAULT);     
            $sql->execute(); //Execute the prepared statement
            header('location: login.php'); // redirects to another web page
            $stmt->close(); // close sql statement - optional and depends on context
            $conn->close(); //Closes a previously opened database connection - optional and depends on context
            exit(); //terminate script
        
    
        }
    }
     
      
  
?>
    <div class="container">
        <h2>Register form - activity #2</h2>
        <form method="POST" name="login_form" action=" <?php echo strip_tags(htmlentities($_SERVER["PHP_SELF"])); ?>">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="username" name="username" class="form-control" required>
                <label class="form-label" for="username">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" required value="" />
                <label class="form-label" for="password">Password</label>

                <p class="errorMsg"><?php echo $errorMsg; ?></p><!-- display error message -->
            </div>



            <!-- Submit button -->
            <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Register">


        </form>


        <p>This example receives form data sent by the POST method and inserts into a database. The form in this
            instance posts back to itself rather than executing an external php file - $_SERVER["PHP_SELF"].

        <p>This time the code checks the database for any duplicate users. We can only have unique usernames. in this
            ecxample you can see that we run a SELECT statement to check the database. If the query returns TRUE then we
            have a match and a duplicate entry exists.</p>

        <p>If the query returns FALSE then no user exists with that name and we INSERT values into the database.</p>

        <p>The next problem we have is that we want to hash the password before we insert data to the database.</p>

    </div>

</body>

</html>

Ref: https://phpdelusions.net/mysqli_examples/prepared_select














