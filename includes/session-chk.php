<?php

if(!isset($_SESSION['username'])){

    header('location: login-verify-error-session.php');
    exit();

}


?>