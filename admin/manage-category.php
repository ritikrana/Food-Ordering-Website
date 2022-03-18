<?php include('partials/menu.php') ?>

<div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1>


                <br/><br/>

                <?php

                if(isset($_SESSION['add'])) //checking if the session is set or not
                    {
                        echo $_SESSION['add']; //desplaying session
                        unset($_SESSION['add']); //removing session
                    }

                 if(isset($_SESSION['remove'])) //checking if the session is set or not
                    {
                        echo $_SESSION['remove']; //desplaying session
                        unset($_SESSION['remove']); //removing session
                    }

                    if(isset($_SESSION['delete'])) //checking if the session is set or not
                    {
                        echo $_SESSION['delete']; //desplaying session
                        unset($_SESSION['delete']); //removing session
                    }

                    if(isset($_SESSION['no-category-found']))
                    {
                        echo $_SESSION['no-category-found'];
                        unset($_SESSION['no-category-found']);
                    }

                    if(isset($_SESSION['update'])) //checking if the session is set or not
                    {
                        echo $_SESSION['update']; //desplaying session
                        unset($_SESSION['update']); //removing session
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['failed-remove']))
                    {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }
                ?>


                <br/><br/>

                    <!--button to add admin-->
                    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

                    <br/><br/><br/>

                    <table class="tbl-full">
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        
                        <?php
                            $sql = "SELECT * FROM tbl_category";

                            //execute query
                            $res = mysqli_query($conn,$sql);

                            //count rows
                            $count = mysqli_num_rows($res);

                            //Create Serial Number Variable and assign value as 1
                            $sn=1;

                            if($count>0)
                            {
                                //we have data in db
                                while($row= mysqli_fetch_assoc($res))
                                {
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];

                                    ?>

                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td>

                                            <?php  
                                                //Chcek whether image name is available or not
                                                if($image_name!="")
                                                {
                                                    //Display the Image
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    //Display the Message
                                                    echo "<div class='delete'>Image not Added.</div>";
                                                }
                                            ?>

                                        </td>

                                            <td><?php echo $featured; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td>
                                                
                                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a> 
                                            </td>
                                        </tr>


                                    <?php
                                }
                            }
                            else
                            {
                                //we dont have data in db
                                //we will display msg inside table
                                ?>

                                <tr>
                                    <td colspan="6">
                                       <div class="delete">No Category Added.</div> 
                                    </td>
                                </tr>

                            <?php
                            }

                        ?>

                       

                    </table>



            </div>
        </div>

<?php include('partials/footer.php') ?>     