<?php
    
    include('../config/constants.php');

    //check if the id and image_name value is set or not

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get value and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the image file if available 
        if($image_name != ""){
            //image is avail 
            $path = "../images/category/".$image_name;

             //remove image
             $remove = unlink($path);

             //if failed to remove image
             if($remove == false)
             {
                //session msg
                $_SESSION['remove'] = "<div class='delete'>Failed to Remove Category Image.</div>";
                //redirect
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop process
             }
        }



        //dalete data from database
        //sql delete data query
        $sql = "DELETE FROM tbl_category WHERE id =$id ";

        //execute query
        $res = mysqli_query($conn,$sql);

        //check if data is delete from database or not
        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='delete'>Failed to Delete Category.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }



        //redirect to manage category page with msg

    }
    else
    {   
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>