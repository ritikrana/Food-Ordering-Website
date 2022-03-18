<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br/>

        <?php 
                    if(isset($_SESSION['add'])) //checking if the session i s set or not
                    {
                        echo $_SESSION['add']; //desplaying session
                        unset($_SESSION['add']); //removing session
                    }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td><label for="full_name">Full Name:</label></td>
                    <td><input type="text" name="full_name" id="full_name" placeholder="full name"></td>
                </tr>

                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name="username" id="username" placeholder="username"></td>
                </tr>

                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password" id="password" placeholder="password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //process the value from form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
       
        //1.get the data from form

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //md5 for  encrription password

        //2.SQL Query to save data into database
        
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        //3.Executing Query and saving Data into Database
       $res = mysqli_query($conn, $sql) or die(mysql_error());

       //4. check whether the data is inserted or not and display appropriate message
       if($res==TRUE)
       {
            //create a session to display msg
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";

            //redirect page to manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
       }
       else
       {
             //create a session to display msg
             $_SESSION['add'] = "Failed to Add Admin";

             //redirect page to Add  Admin
             header("location:".SITEURL.'admin/manage-admin.php');
       }
    }
    
?>