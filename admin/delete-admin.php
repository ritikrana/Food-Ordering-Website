<?php

    //include contants.php file here
    include("../config/constants.php");

    //1. get id of admin to be deleted

    $id = $_GET['id'];
    

    //2.create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute query

    $res = mysqli_query($conn,$sql);

    //check if the query execute successfully or not 
    if($res==true)
    {
        //Admin deleted
        //create session var to display msg 
        $_SESSION['delete'] = "<div class='delete'> Admin Deleted Successfully</div>";

        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete Admin
        $_SESSION['delete'] = "<div class=''> Failed to delete Admin. try again later.</div>";

        header('location:'.SITEURL.'admin/manage-admin.php');
    }


    //3. redirect to manage admin page with msg

?>