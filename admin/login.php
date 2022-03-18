<?php include('../config/constants.php')?>


<html>
    <head>
        <title>
            Login- Food order system
        </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">
                login
            </h1>
            <br/><br/>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br/><br/>

            <!--form-->
            <form action=""method="POST" class="text-center">
                    <label for="username">username:</label>
                    <br/>
                    <input type="text" name="username" id="username" placeholder="Enter username">
                    <br/><br/>

                    <label for="password">Password:</label></td>
                    <br/>
                    <input type="password" name="password" id="password" placeholder="Enter password">
                    <br/><br/>
                    <input type="submit" name="submit" value="Login" class="btn-primary">
                    <br/><br/>
            </form>


            <p class="text-center">
                Created By - <a href="https://github.com/ritikrana">Ritik Rana</a>
            </p>
        </div>

    </body>
</html>

<?php

    //check if submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //get data from form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql to check whether the user with username and password are  exist or not

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn,$sql);

        //count rows to check if user exist or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Login Successfull.</div>";
            $_SESSION['user'] = $username; //to check user is logged in or not and logout will unset it


            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='delete text-center'>Username or Password did not match.</div>";

            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>