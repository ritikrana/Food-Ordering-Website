<?php include('partials/menu.php'); ?>

        <!--main content section-->

        
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br/>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //desplaying session
                        unset($_SESSION['add']); //removing session
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                ?>

                <br/><br/><br/>

                <!--button to add admin-->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br/><br/><br/>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //get all admins
                        $sql = "SELECT * FROM tbl_admin";

                        //execute the query
                        $res = mysqli_query($conn,$sql);

                        //check whether query is execute or not
                        if($res == TRUE)
                        {
                            //count rows to check if we have data in db or not
                            $count = mysqli_num_rows($res); //get all rows in db

                            $sn=1; //create var for num

                            //check number of rows
                            if($count > 0)
                            {
                                //we have data n db
                                while($count = mysqli_fetch_assoc($res))
                                {
                                    //using while to get all data from db
                                    //while loop will run as long as we have data in db

                                    //get individual data
                                    $id=$count['id'];
                                    $full_name=$count['full_name'];
                                    $username=$count['username'];

                                    //display the values in our table
                                    ?>
                                    
                                    <tr>
                                        <td><?php  echo $sn++; ?></td>
                                        <td><?php  echo $full_name;  ?></td>
                                        <td><?php  echo $username;  ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                            
                                        </td>
                                    </tr>


                                    <?php
                                }
                            }
                            else
                            {
                                //we dont have data in db
                            }
                        }

                    ?>
                    
                   

                </table>

            </div>
        </div>


<?php include('partials/footer.php'); ?>