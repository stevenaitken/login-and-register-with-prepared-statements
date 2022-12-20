<?php
//this script is added to all pages within secure admin section to prevent non login access

if(!isset($_SESSION['username'])){ //does $_SESSION username exist. If not then navigate back to login page

    header('location: login.php?logged=denied'); //redirect to login and append URL string with $_GET variable
    exit(); //terminate current script

}


?>