<?php

    if(!isset($_SESSION['user']))  //if user session not set
    {   
        //user is not logged in

        $_SESSION['no-login-message'] = "<div class='delete text-center'>Please login to access Admin Panel.</div>";
        
        //redirect to login
        header('location:'.SITEURL.'admin/login.php');
    }
?>
