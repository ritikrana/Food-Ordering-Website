<?php
    include('../config/constants.php');

    //destroy the session 
    session_destroy(); // unser $_SESSION['user']
    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>