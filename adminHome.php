<?php session_start(); include('includes/error-reporting.php');include('includes/connx.php');include('includes/session-chk.php');

$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">
</head>


<body>

    <div class="container">
        <h2>Admin Home</h2>
        
        <p> You are logged in as: <?php echo $_SESSION['username']. " on ". $date; ?> </p>
<a href = "logout.php">Log out </a>
     <div class = "cpanel">

<div class="optionBox">1</div>
<div class="optionBox">2</div>
<div class="optionBox">3</div>
<div class="optionBox">4</div>
<div class="optionBox">5</div>
<div class="optionBox">6</div>
     </div> 


    </div>

</body>

</html>

